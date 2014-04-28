var myObj = this.data;
var _l = new LanguageControl(this.data.l);

var moduleListRenderer = {
		render : function(data) {
			return json2html.transform(data,moduleListTransform);
		}
};

var moduleListItemsTransform = [
		{ tag : "tr", children : [
			{ tag : "td", html : "${name}"},
			{ tag : "td", html : function() {
				if( this.active == 1 ) {
					return _l.get('deactivate');
				} else {
					return _l.get('activate');
				}
			}},
			{ tag : "td", children : [
				{ tag : "a",
				href : "javascript:void(0);",
				class : "moduleAction",
				'attr-type' : function() {
					if( this.installed == true ) {
						return "uninstall";
					} else {
						return "install";
					}
				},
				'attr-info' : function() {
					if( this.installed == true ) {
						return this.id;
					} else {
						return this.package + "\\" + this.name;
					}
				}, html : function() {
				if( this.installed == true ) {
					return _l.get('uninstall');
				} else {
					return _l.get('install');
				}
			}}
			]},
		]},
];

var moduleListTransform = [
	{tag : "div", children : [
			{ tag : "div", class : "heading", children : [
				{tag : "h2", html : "Modules"},
			]},

							{ tag : "table", class : "table table-bordered", children : [
								{ tag : "thead", children : [
									{ tag : "tr", children : [
										{ tag : "th", html : function() { return _l.get('module') } },
										{ tag : "th", html : function() { return _l.get('status') } },
										{ tag : "th", html : function() { return _l.get('action') } },
									]},	
								]},

								{ tag : "tbody", children : function() {
									return json2html.transform(this.modules,moduleListItemsTransform);
								}},
							]},
	]},
];

function makeList(data) {
	Content.addData(data,moduleListRenderer);
	$(Content.element).off('click','.moduleAction',function() {});
	$(Content.element).on('click','.moduleAction',function() {
		var type = $(this).attr('attr-type');
		var info = $(this).attr('attr-info');
		var that = $(this);
		if( type == "uninstall" ) {
			var s = confirm( _l.get('confirm') );
			if( s ) {
				Request.fetch(
					{
						pckClass : "Base.Dashboard",
						call : "ModuleHandler",
						method : "uninstallModule",
						urlArguments : info,
						noJs : true,
						noCss : true,
						success : function(data) {
							if( data.Error == true ) {

							} else {
								that.attr('attr-type','install');
								that.attr('attr-info',data.package + "\\" + data.name);
								that.html( _l.get('install') );
							}
						}
					});
			}
		} else if( type == "install" ) {
				var pcknameSplit = info.split("\\");

				Request.fetch(
					{
						pckClass : "Base.Dashboard",
						call : "ModuleHandler",
						method : "installModule",
						urlArguments : pcknameSplit[0] +"/"+ pcknameSplit[1],
						noJs : true,
						noCss : true,
						success : function(data) {
							if( data.Error == true ) {

							} else {
								that.attr('attr-type','uninstall');
								that.attr('attr-info',data.id);
								that.html( _l.get('uninstall') );
							}
						}
					});
		}
	});
}


makeList(myObj);