jQuery(document).ready(function(){
	var contactBlock = jQuery("#block-webform-client-block-4"),
		fields = jQuery('.webform-component--full-name,'
			+'.webform-component--email,'
			+'.webform-component--phone', contactBlock);
			
	fields.each(function(i, val){
			var t = jQuery("label", val).text();
			jQuery("input", val).attr("placeholder", t);
			console.log(t);
	});	
		
	fields.wrapAll('<div class="col_3"/>');
	
});
