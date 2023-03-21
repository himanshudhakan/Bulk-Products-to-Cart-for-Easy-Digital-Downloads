(function( $ ) {
	'use strict';

	var search_downloads = null;
	var ajaxUrl = bptcfedd_admin_obj.ajaxurl;

	$('.bptcfedd-select2').select2();

	$('#bptcfedd_select2_downloads').next().find('input.select2-search__field').attr('id', 'bptcfedd_select2_downloads_field')
	$('#bptcfedd_select2_downloads_field').bind('keyup', function() {
      	
      	var select = $('#bptcfedd_select2_downloads');
      	select.empty().trigger("change");
      	var search_text = $(this).val();

      	if( search_downloads !== null ){
			search_downloads.abort();
		}

		search_downloads = $.ajax({
			type: 'POST',
			url: ajaxUrl,
			data: {
				action: 'bptcfedd_search_downloads',
				search_text: search_text,
			},
			dataType: "json",
			success: function(responsData){ 
				
				$.each( responsData.data, function( key, value ) {
				  	var newOption = new Option(value, key, false, false);
					select.append(newOption);
				});

				select.trigger('change');

			}
		});

 	});

})( jQuery );
