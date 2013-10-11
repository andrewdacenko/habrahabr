<script>
$(document).ready(function(){ 
	$('#expires').datepicker({dateFormat: "yy-mm-dd"});

	var uploadInput = $('#file'),
		imageInput = $('[name="image"]'),
		thumb = document.getElementById('thumb'),
		error = $('div.error');

	uploadInput.on('change', function(){
		var data;

		data = new FormData();
		data.append('file', uploadInput[0].files[0]);
		var token = $('[name="_token"]').val();
		data.append('_token', token);
		
		$.ajax({
			url: '/upload',
			data: data,
			processData: false,
			contentType: false,
			type: 'POST',
			dataType: 'json',
			success: function(result) {
				if (result.filelink) {
					thumb.setAttribute('src', result.filelink);
					imageInput.val(result.filelink);
					error.hide();
				} else {
					error.text(result.message);
					error.show();
				}
			},
			error: function (result) {
				error.text("Upload impossible");
				error.show();
			}
		});
	});

	function split( val ) {
		return val.split( /,\s*/ );
	}
	function extractLast( term ) {
		return split( term ).pop();
	}
 
	$( "#tags" )
	// don't navigate away from the field on tab when selecting an item
	.bind( "keydown", function( event ) {
		if ( event.keyCode === $.ui.keyCode.TAB &&
			$( this ).data( "ui-autocomplete" ).menu.active ) {
			event.preventDefault();
		}
	})
	.autocomplete({
		source: function( request, response ) {
			$.getJSON( "/tags", {
					term: extractLast( request.term ),
				}, 
				function( data ) {
					response($.map(data, function(item) {
						return {
							value: item.name
						}
					}))
				}
			);
		},
		search: function() {
			// custom minLength
			var term = extractLast( this.value );
			if ( term.length < 2 ) {
			return false;
			}
		},
		focus: function() {
			// prevent value inserted on focus
			return false;
		},
		select: function( event, ui ) {
			console.log(ui);
			console.log(this);
			var terms = split( this.value );
			// remove the current input
			terms.pop();
			// add the selected item
			terms.push( ui.item.value );
			// add placeholder to get the comma-and-space at the end
			terms.push( "" );
			this.value = terms.join( ", " );
			return false;
		}
	});
});
</script>