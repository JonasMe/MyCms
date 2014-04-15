$(function() {
	$('.selectModule').change(function() {
		$.getJSON('/Module/Base.Pages/Dashboard%5CPages/getOptionsJson/Base/Pages',function(c) {
			console.log(c);
		});
	})
});