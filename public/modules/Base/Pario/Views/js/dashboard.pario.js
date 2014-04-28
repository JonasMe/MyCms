var myObj = this;
var types;

var navigationTransform = [
				 {tag : "li", "attr-groupname" : "${name}", "attr-groupslug" : "${slug}", class : "parioGroup", html : "${name}" } 
				 ];

var contentTransform = [
	{ tag : "div", class : "heading", children : [
		{ tag : "h2", html : "${name}" }
	]},
	{ tag : "div", class : "container", children : 
	[
		{ tag : "form", "method" : "post", "action" : "", class : "form", children : 
		function() {
			return json2html.transform(this.types,groupFieldTransform);
		}}
	] }
];

var bodyTransform = [
				{ tag : "div", class : "form-group", children : [
					{ tag : "label", html : "${name}" },
					{ tag : "div", html : "${html}" },
				] },
];

var groupOptionTransform = [
	{ tag : "option", value : "${type}", html : "${name}"}
];

var groupFieldTransform = [
				{ tag : "div", class : "form-group", children : [
					{ tag : "label", html : "${name}" },
					{ tag : "select", class : "form-control", children : function() {
						var s = $('<div></div>');
						that = this;
						$.each(myObj.data.availableTypes, function(k,v) {
							var item = $( json2html.transform(v,groupOptionTransform) );
							if( item.val() == that.type ) {
								item.attr('selected','selected');
							}
							item.appendTo(s);
						});

						return s.html();
					
					} },
					{ tag : "input", type : "text", class : "form-control",  name : "${name}_default", placeholder : "Default value" }
				] },
];

var pagesJsonRendere =  {
		render : function(data) {
			console.log(data);
			var menu = $('<div></div>');
			var top = $('<div class="heading"><a href="javascript:void(0);" onClick="addParioGroup();">Add</a></div>').appendTo(menu);
			var ul = $('<ul class="tree"></ul>').appendTo(menu);

			$.each(data.groups,function(k,f) {
				ul.json2html(f,navigationTransform)
			});

			return menu;
		}
	};

var viewGroupRenderer = {
	render : function(data) {
		return json2html.transform(data,contentTransform);
	}
};


MainSideBar.addData(myObj.data,pagesJsonRendere).open();
MainSideBar.element.off('click','.parioGroup',function() {} );
MainSideBar.element.on('click','.parioGroup',function(e) {
	e.preventDefault();
				Request.fetch(
						 		{
						 			pckClass : "Base.Pario",
						 			call : "Dashboard\\Pario",
						 			method : "getGroup",
						 			urlArguments : $(this).attr('attr-groupslug'),
						 			noJs : true,
						 			noCss : true,
						 			success : function(data) {
						 				//Adding data to view.	
						 				Content.addData(data,viewGroupRenderer);
						 			}});
} );