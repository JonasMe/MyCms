  $(function() {
  	var justRecieved;
  $( ".sortable" ).sortable({
      connectWith: ".sortable",
      placeholder: "ui-state-highlight",
       receive: function( event, ui ) {
       	justRecieved = true;
      	var placeholder = $(event.target);
      	var object = $(event.toElement);

      	var placeholderID = placeholder.attr('id');
      		placeholderID = placeholderID.replace("ph","");

      	var objectID = object.attr('id');
      		objectID = objectID.replace("object","");

      	console.log( placeholderID + " - " + objectID);
      	$.get('/Module/Base.Pages/Dashboard%5CPages/setObjectPlaceholder/'+objectID+'/'+placeholderID);
      	console.log( "Change object with ID " + objectID + ". To reside in placeholder " + placeholderID);
      },
      update: function( event, ui ) {
      	if( justRecieved == true ) { justRecieved=false; return; }
      	var sort = [];

      	$('.sortable tr').each(function() {
      	var placeholderID = $(this).parent('tbody').attr('id');
      		placeholderID = placeholderID.replace("ph","");

      	var objectID = $(this).attr('id');
      		objectID = objectID.replace("object","");

      		if( typeof(sort[placeholderID]) == "undefined" ) {
      			sort[placeholderID] = [];
      		}

      		sort[placeholderID].push(objectID);
      	})
      
      	$.post('/Module/Base.Pages/Dashboard%5CPages/setPositions', { 'pos': sort });

      }
    });
  });

$(function() {
		$('.tree li').each(function() {
			if( $(this).children('ul').length > 0 ) {
				$(this).prepend('<span class="trigger glyphicon glyphicon-expand" style="cursor:pointer;"></span>');
			}
		});


	    $('.tree li li:not(.current,.current_ancestor)').hide();
	    $('.tree li .trigger').on('click', function (e) {
	    	if( $(this).parent().children('ul').length > 0 ) {

	        	var children = $(this).parent().find('> ul > li');
	        	if (children.is(":visible")) {
	        		$(this).removeClass('glyphicon-collapse-down').addClass('glyphicon-expand');
	        		children.hide('fast');
	        	} else {
	        		$(this).removeClass('glyphicon-expand').addClass('glyphicon-collapse-down');
	        		children.show('fast');
	        	}
	        	e.stopPropagation();
	        }
	    });
	});