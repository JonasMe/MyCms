var editTransform = [
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
								 		{ tag : "span", html : "${title}"}
								 	] }
							]}, 
						];


var editJsonRenderer =  {
		render : function(data) {
			console.log(data);
			var menu = $('<div></div>');
			var top = $('<div class="heading"></div>').appendTo(menu);
			var ul = $('<ul class="tree"></ul>').appendTo(menu);

			$.each(data.menu,function(k,f) {
				ul.json2html(f,transform)
			});

			return menu;
		}
	};

$(function() {
		s = new contentArea();
		s.addData(Base_Pages_editPage,editJsonRenderer).open();
});