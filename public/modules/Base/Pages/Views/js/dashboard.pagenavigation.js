var myObj = this;
var _l;

function getPageChilds(parent) {
		var menu = new MenuItem;
		menu.set(parent);

		Request.fetch(
				 		{
				 			pckClass : "Base.Pages",
				 			call : "Dashboard\\Pages",
				 			method : "getPages",
				 			urlArguments : parent,
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


function renderMenu(s,menu) {
		console.log("Setting element off!");
		s.element.off('click','ul.tree .linktxt',function(e){});
		console.log("Setting element on!");
		s.element.on('click','ul.tree .linktxt',function(e) {
			console.log("Calling !!");
			e.preventDefault();
			menu.set( $(this).parent('a').attr('attr-pagetree-anchor') );
			editPageHandler();

		});

		s.element.off('click','.pageTreeItem-expendable .expander',function() {});
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

		s.element.off('click','ul.tree .settings',function() {});
		s.element.on('click','ul.tree .settings',function(e) {
			e.preventDefault();
			var pid = $(this).parent('a').attr('attr-pagetree-anchor');
			menu.set( pid );
			pageSettings(pid);
		});
}

function addPage() {
				Request.fetch(
						 		{
						 			pckClass : "Base.Pages",
						 			call : "Dashboard\\Pages",
						 			method : "getViews",
						 			noJs : true,
						 			noCss : true,
						 			success : function(data) {
											Modal.reset()
												.title("Add page")
												.body(json2html.transform(data,pageSettingsTransform))
												.submit(function() {
													Request.fetch(
															{
																pckClass : "Base.Pages", 
																call : "Dashboard\\Pages", 
																method : "updateMultiple",
																arguments : Modal.formElement.serialize() ,
																success : function(data) {
																	var not = json2html.transform(data,pageSaveTransform);
																	Modal.clearNotifications().addNotification(not);

																	if( data.Error == false ) {
																		var title = Modal.formElement.find('input.title').val();
																		menu.set( data.id );
																		editPageHandler();
																	}
															}
													} );
													}).open();
											}});
}

function pageSettings(id) {
				Request.fetch(
						 		{
						 			pckClass : "Base.Pages",
						 			call : "Dashboard\\Pages",
						 			method : "editPage",
						 			urlArguments : id,
						 			noJs : true,
						 			noCss : true,
						 			success : function(data) {
										Modal.reset()
											.title( _l.get('edit') + ": " + data.title)
											.body(json2html.transform(data,pageSettingsTransform))
											.submit(function() {
													Request.fetch(
														{
															pckClass : "Base.Pages", 
															call : "Dashboard\\Pages", 
															method : "updateMultiple", 
															urlArguments : id,
															arguments : Modal.formElement.serialize() ,
															success : function(data) {
																var not = json2html.transform(data,pageSaveTransform);
																Modal.clearNotifications().addNotification(not);
																editPageHandler();
																var title = Modal.formElement.find('input.title').val();
																menu.set( id );
																menu.a.find('.linktxt').html(title).fadeOut('slow',function() { $(this).fadeIn('slow'); });
															}
														} );
											}).open();
						 			}
						 		});
}


function editPageHandler() {
				Request.fetch(
						 		{
						 			pckClass : "Base.Pages",
						 			call : "Dashboard\\Pages",
						 			method : "editPage",
						 			urlArguments : menu.pid,
						 			noJs : true,
						 			noCss : true,
						 			success : function(data) {
						 				//Adding data to view.
						 				Content.addData(data,editJsonRendere);
						 				/*Bind object click*/
						 					$('#mainContent .heading').off('click','a.addObject',function(){});
						 					$('#mainContent .heading').on('click','a.addObject',function(e) {
						 						e.preventDefault();
						 						addObject();
						 					});

						 					$('.pages_edit_placeholders').off('click','iAmSortable a .objectEditTrigger',function(){});
						 					$('.pages_edit_placeholders').on('click','.iAmSortable a .objectEditTrigger',function(e) {
						 						e.preventDefault();
						 						var oid = $(this).parent('a').attr('object-id');
						 						editObject(oid);
						 					});

						 					$('.pages_edit_placeholders').off('click','iAmSortable a .activeTrigger',function(){});
						 					$('.pages_edit_placeholders').on('click','.iAmSortable a .activeTrigger',function(e) {
						 						e.preventDefault();
						 						var oid = $(this).parent('a').attr('object-id');
						 						if( $(this).hasClass('glyphicon-play') ) {
						 							$(this).removeClass('glyphicon-play').addClass('glyphicon-stop');
						 							updateObject(oid,'active',1);
						 						} else {
						 							$(this).removeClass('glyphicon-stop').addClass('glyphicon-play');
						 							updateObject(oid,'active',0);
						 						}
						 					});
						 					
						 				/* /Bind object click*/

						 				/*Sortable placeholders*/
											 $( ".iAmSortable" ).sortable({
											      connectWith: ".iAmSortable",
											      placeholder: "ui-state-highlight",
											      update: function( event, ui ) {
											      	var placeholder	= $(this).attr('placeholder-id');
											      	var object  	= ui.item.attr('object-id');
											      	var posArr = [];

											      	$(this).find('a.list-group-item').each(function() {
											      		posArr.push( $(this).attr('object-id') );
											      	});

											      	setObjectPositions(posArr);
											      },
											      receive: function( event, ui ) {
											      	var placeholder	= $(this).attr('placeholder-id');
											      	var object  	= ui.item.attr('object-id');
											      	setObjectPlaceholder(placeholder,object);
											      }
											    }).disableSelection();
										/* /Sortable placeholders */
						 			},
						 		});
}


function updatePage(page,key,value) {
	Request.fetch(
		{
			pckClass : "Base.Pages", 
			call : "Dashboard\\Pages", 
			method : "update", 
			urlArguments : page+'/'+key,
			arguments : {value : value},
			success : function(data) {}
		} );
}


/*Object handling*/

function setObjectPlaceholder(placeholder,object) {
	Request.fetch(
		{
			pckClass : "Base.Pages", 
			call : "Dashboard\\Object", 
			method : "update", 
			urlArguments : object+"/placeholder",
			arguments : { value : placeholder },
		} );
}

function setObjectPositions(posArr) {
	Request.fetch(
		{
			pckClass : "Base.Pages", 
			call : "Dashboard\\Object", 
			method : "positionate", 
			arguments : { positions : posArr },
		} );
}

function editObject(object) {
	Request.fetch(
		{
			pckClass : "Base.Pages", 
			call : "Dashboard\\Object", 
			method : "edit", 
			urlArguments : object,
			success : function(data) {
				Modal.reset().title("Edit object").body(data.html).submit(function() {
					saveObject( object );
				}).open()
			}
		} );
}

function addObject() {
	Request.fetch({
	pckClass : "Base.Pages",
	call : "Dashboard\\Pages",
	method : "moduleOptions",
	success : function(data) {
		men = data;
		data = { options : men };

		Modal.reset()
					.title("New object")
					.body( json2html.transform(data,addObjectTransform) )
					.submit(function() {
						var ph = $('.pages_edit_placeholders').children('div[placeholder-id]:first').attr('placeholder-id');
							Request.fetch(
								{
									pckClass : "Base.Pages", 
									call : "Dashboard\\Object", 
									method : "add", 
									urlArguments : ph,
									arguments : Modal.formElement.serialize() ,
									success : function(data) {
										if( data.Error == true ) {
										var not = json2html.transform(data,pageSaveTransform);
										Modal.clearNotifications().addNotification(not);
										} else {
											Modal.close();
											editObject(data.id);
											editPageHandler();
										}
									}
								} );
					}).open();
	},
});
}

function saveObject(object) {
	Request.fetch(
		{
			pckClass : "Base.Pages", 
			call : "Dashboard\\Object", 
			method : "save", 
			urlArguments : object,
			arguments : Modal.formElement.serialize() ,
			success : function(data) {
				var not = json2html.transform(data,pageSaveTransform);
				Modal.clearNotifications().addNotification(not);
			}
		} );
}

function updateObject(object,key,value) {
	Request.fetch(
		{
			pckClass : "Base.Pages", 
			call : "Dashboard\\Object", 
			method : "update", 
			urlArguments : object+'/'+key,
			arguments : {value : value},
			success : function(data) { }
		} );
}

function deleteObject(object) {
		Request.fetch(
			{
				pckClass : "Base.Pages", 
				call : "Dashboard\\Object", 
				method : "delete", 
				urlArguments : ph,
				arguments : Modal.formElement.serialize() ,
				success : function(data) {
					var not = json2html.transform(data,pageSaveTransform);
					Modal.clearNotifications().addNotification(not);
					editPageHandler(c);
				}
			} );
}

/*Transforms*/
var navigationTransform = [
				 {tag : "li", "attr-pagetree-anchor" : "${id}", children : [
					{tag : "a", href : "${id}", "attr-pagetree-anchor" : "${id}", class : function() { 
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
								 		{ tag : "span", class : "linktxt", html : "${title}"},
								 		{ tag : "span", class : "pull-right settings glyphicon glyphicon-cog"}
								 	] }
							]}, 
						];
var pageSettingsTransform = [

			{ tag : "div", class : "form-group", children : [
				{ tag : "label", html : function() { return _l.get('page_title') } },
				{ tag : "input", type : "text", value : "${title}", name : "title", placeholder : "Page title goes here.", class : "form-control title" },
			]},
			{ tag : "div", class : "form-group", children : [
				{ tag : "label", html : function() { return _l.get('page_url') } },
				{ tag : "div", class : "input-group",children : [
					{ tag : "span", class : "input-group-addon", html :"/"},
					{ tag : "input", type : "text", value : "${slug}", name : "slug", placeholder : "Page url goes here.", class : "form-control" },
				]},
			]},
			{ tag : "div", class : "form-group", children : [
				{ tag : "label", html : function() { return _l.get('page_layout') } },
				{ tag : "select",  name : "view", class : "form-control", children : function() {
					return json2html.transform(this.templateViews,pageSettingsViewsTransform);
				}},
			]},
			{ tag : "div", class : "form-group", children : [
				{ tag : "input",  name : "frontpage", type : "checkbox", value : "1" },
				{ tag : "label", html : function() { return _l.get('is_frontpage') } },
			]},
			{ tag : "div", class : "form-group", children : [
				{ tag : "input",  name : "active", type : "checkbox", value : "1", checked : function() {
					if( this.is_active == 1 ) { return "true"; } else { return "false"; }
				} },
				{ tag : "label", html : function() { return _l.get('is_active') } },
			]},];
var pageSettingsViewsTransform = [
	{ tag : 'option', value : '${view}', html : "${view}" },
];

var placeholderTransform = [
	{ 
		tag : "a", 
		class : "list-group-item active", 
		html : "${title}"
	},
	{ 
		tag : "div", 
		class : "iAmSortable", 
		"placeholder-id" : "${placeholder_id}", 
		children : function() {  return( json2html.transform(this.objects,placeholderObjectTransform) ); }
	},];

var placeholderObjectTransform = [
	{ 
		tag : "a", 
		class : "list-group-item", 
		"object-id" : "${placeholder_object_id}", 
		children : [
			{ 
				tag   : 'span',
				class : 'objectEditTrigger',
				html  : '${title}', 
			},
			{
				tag	  : 'span',
				class : function() {
					if( this.enabled == 0 ) {
						return "pull-right activeTrigger glyphicon glyphicon-play";
					} else {
						return "pull-right activeTrigger glyphicon glyphicon-stop";
					}
				}
			}
		]
	},];

var editPageTransform = [
							{tag : "div", children : [
								{ tag : "div", class : "heading", children : [
									{ tag : "input", type : 'text', class : 'pageTitleEdit', value : '${title}'},
									{ tag : "span", children : [
										{ tag : "a", href : "javascript:void(0);", class : "addObject", html : function() { return _l.get('add')  } }
									]}
								]},
								{ tag : "div", class : "subline", html : function() { return _l.get('page_url') + ': /' + this.slug; } },
								{ 
									tag : "div",
									class : "pages_edit_placeholders",
									children : function() { return( json2html.transform(this.placeholders,placeholderTransform) ); }
							}, ] },
						];
						
var pageSaveTransform = [
	{ tag : "div", html : "${Message}", class : function() {
		if( typeof(this.Error) != "undefined" || this.Error != null ) {
			return "alert alert-danger";
		} else if( typeof(this.Success) != "undefined" || this.Success != null ) {
			return "alert alert-success";
		} else {
			return "alert alert-warning";
		}
	}}
];

var addObjectTransform = [
	{ tag : "div", class : "form-group", children : [
		{ tag : "input", type : "text", name : "objectTitle", class : "form-control", placeholder : function() { return _l.get('title')  } },
		{ tag : "select", name : "objectOption", children : function() {
			return json2html.transform(this.options,addObjectOptionsTransform);
		}},
	]}
];

var addObjectOptionsTransform = [
	{ tag : "option", value : "${id}", html : "${title}" }
];
/*End Transforms*/

/*Renderes*/
var pagesJsonRendere =  {
		render : function(data) {
			console.log(data);
			var menu = $('<div></div>');
			var top = $('<div class="heading"><a href="javascript:void(0);" onClick="addPage();">' + _l.get('add') + '</a></div>').appendTo(menu);
			var ul = $('<ul class="tree"></ul>').appendTo(menu);

			$.each(data.menu,function(k,f) {
				ul.json2html(f,navigationTransform)
			});

			return menu;
		}
	};

var editJsonRendere = {
		render : function(data) {
			return json2html.transform(data,editPageTransform);
		}
};
/*End Renderes*/



/*Menu*/
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
			if( typeof(myObj.data.l) != "undefined" ) {
				_l = new LanguageControl( myObj.data.l );
			} else {
				_l = new LanguageControl( [] );
			}
			menu = new MenuItem();
			MainSideBar.addData(myObj.data,pagesJsonRendere).open();
			renderMenu(MainSideBar,menu);
});