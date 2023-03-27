(function( $ ) {
	'use strict';

	const ajaxUrl = bptcfedd_public_obj.ajaxurl,
		addtocart_success_html = bptcfedd_public_obj.addtocart_success_html;

	$('.bptcfedd-alladdtocart-selectall').change(function(){

		var main = $(this).closest('.bptcfedd-table-wrap'),
		 	checkboxes = main.find('.bptcfedd-download-table .bptcfedd-table-checkbox');

		if ( $(this).is(":checked") ) {
			checkboxes.prop('checked', true);
		}else{
			checkboxes.prop('checked', false);
		}

	});

	$('.bptcfedd-alladdtocart-btn').click(function(){

		var main = $(this).closest('.bptcfedd-table-wrap'),
			btn = $(this),
			checkboxes = main.find('.bptcfedd-download-table .bptcfedd-table-checkbox:checked').serialize(),
			seria_data = checkboxes + '&action=bptcfedd_alladdtocart';
		
		$.ajax( {
			type: 'POST',
			data: seria_data,
			url: ajaxUrl,
			beforeSend: function(){
				btn.addClass('bptcfedd-loading');
			},
			complete: function(){
				btn.removeClass('bptcfedd-loading');
			},
			success: function( response ) {
				if ( response.success ) {
					btn.after(addtocart_success_html);
				}

				setTimeout(function(){
					main.find('.edd-cart-added-alert').remove();
				}, 3000);
			}
		} );

	});

})( jQuery );
