(function( $ ) {
	'use strict';

	const ajaxUrl = bptcfedd_admin_obj.ajaxurl,
		coman_select2_obj = {
			width: 'resolve',
		};
	var search_downloads = null,
		select2_obj = {};

	select2_obj['bptcfedd_select2_downloads'] = {
		ajax:{ 
			type: 'POST',
			url: ajaxUrl,
			data: function (params) {
		      var query = {
		      	action: 'bptcfedd_search_downloads',
		        search_text: params.term,
		      }
		      return query;
		    },
			dataType: "json",
			processResults: function (responsData) {
		     	var opitons = [];
				$.each( responsData.data, function( key, value ) {
					opitons.push({ id: key, text: value });
				});
				return {
					results: opitons,
				};
		    }
		},
		minimumInputLength: 3,
	};
	select2_obj['bptcfedd_select2_exclude_downloads'] = select2_obj['bptcfedd_select2_downloads'];

	$('.bptcfedd-select2').each(function(key, el){

		var obj = coman_select2_obj; 
		var id = $(this).attr('id');
		if( select2_obj.hasOwnProperty(id) ){
			obj = select2_obj[id];
		}

		$(this).select2(obj);
	});

})( jQuery );
