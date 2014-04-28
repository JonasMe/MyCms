var navigationTransform = [
				 {tag : "li", "attr-pagetree-anchor" : "${id}", children : [
					{tag : "a", href : "${id}", "attr-pagetree-anchor" : "${id}", class : 
						function() { 
							if( this.has_children == true) {
								 return "pageTreeItem-expendable";
							}
						}, children : [
										{ tag : "span", html : "", class : function() {
												var classes = "expander ";
												if( this.has_children == true) {
													classes += "glyphicon glyphicon-plus-sign";
												}
											
												return classes;
											}
										},
								 		{ tag : "span", class : "linktxt", html : "${title}"}
								 	] }
							]}, 
						];

var placeholdersTransform = [
	{ tag : "li", html : "${title}"}
];

var editPageTransform = [
							{tag : "div", children : [
								{ tag : "div", class : "heading", children : [
									{ tag : "h2", html : "${title}"},
								]},
								{ tag : "div", class : "subline", html : "url: /${slug}" },
								{ tag : "div", class : "placeholders", html : function() {
									if( typeof(this.placeholders) != "undefined" && this.placeholders != null ) {
										var ret = "";
										$.each( this.placeholders, function(key,ph) {
											ret +="<div>"+ph.title+"</div><ul>";
											$.each(ph.objects, function(okey,obj){
												ret += json2html.transform(obj,placeholdersTransform);
											});
											ret += "</ul>";
										});
										
										return ret;
									}
								}},
							]},
						];

var pagesJsonRendere =  {
		render : function(data) {
			console.log(data);
			var menu = $('<div></div>');
			var top = $('<div class="heading"></div>').appendTo(menu);
			var ul = $('<ul class="tree"></ul>').appendTo(menu);

			$.each(data.menu,function(k,f) {
				ul.json2html(f,navigationTransform)
			});

			return menu;
		}
	};

var editJsonRendere = {
		render : function(data) {
			var ret = $('<div></div>');
			var top = $('<div class="heading"></div>').appendTo(ret);
			var heading = $('<h2></h2>').html(data.title).appendTo(top);



			return json2html.transform(data,editPageTransform);
		}
};

function getPageChilds(parent) {
		var menu = new MenuItem;
		menu.set(parent);

		request.fetch(
				 		{
				 			pckClass : "Base.Pages",
				 			call : "Dashboard\\Pages",
				 			method : "getPages",
				 			arguments : { id : parent },
				 			noJs : true,
				 			noCss : true,
				 			success : function(data) {
				 				menu.submenu = $('<ul class="submenu"></ul>').hide();
									$.each(data.menu,function(k,f) {
										menu.submenu.json2html(f,navigationTransform)
									});
								menu.submenu.appendTo(menu.li);
								menu.toggleSub();
				 			},
				 		});
}

function MenuItem() {};
MenuItem.prototype = {
	expandedclass : "glyphicon-minus-sign",
	subtractedclass : "glyphicon-plus-sign",
	animationspeed : 'fast',
	set : function(pageId) {
		this.pid 		= pageId;
		this.li			= $('li[attr-pagetree-anchor='+pageId+']');
		this.a 			= $('a[attr-pagetree-anchor='+pageId+']');
		this.expander	= this.a.find('.expander');
		this.submenu	= this.li.find('>ul');
		return this;
	},
	toggleSub : function() {
		if( this.submenu.is(":visible") ) {
			this.submenu.slideUp(this.animationspeed);
			this.expander.removeClass( this.expandedclass ).addClass( this.subtractedclass );
		} else {
			this.submenu.slideDown(this.animationspeed);
			this.expander.removeClass( this.subtractedclass ).addClass( this.expandedclass );
		}
	}

}

$(function() {
		menu = new MenuItem();

		s = new mainSideBar();
		s.addData(Base_Pages_getPages,pagesJsonRendere).open();

		s.element.on('click','ul.tree .linktxt',function(e) {
			e.preventDefault();
			c = new contentArea();
			menu.set( $(this).parent('a').attr('attr-pagetree-anchor') );
			c.loading(true);
				request.fetch(
						 		{
						 			pckClass : "Base.Pages",
						 			call : "Dashboard\\Pages",
						 			method : "editPage",
						 			arguments : { id : menu.pid },
						 			noJs : true,
						 			noCss : true,
						 			success : function(data) {
						 				c.addData(data,editJsonRendere);
						 			},
						 		});
		});

		s.element.on('click','.pageTreeItem-expendable .expander',function(e) {
			e.preventDefault();
			var anchor = $(this).parent('a');
			menu.set( anchor.attr('attr-pagetree-anchor') );
			if( typeof(menu.li.attr('childs-loaded')) == "undefined" ) {
				getPageChilds(menu.pid);
				menu.li.attr('childs-loaded',true);
			} else {
				menu.toggleSub();
			}
		});
});