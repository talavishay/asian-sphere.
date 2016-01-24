jQuery(document).ready(function(){
		var content = jQuery('#content'),
			registration = jQuery('.field-name-field-register', content);
		
		jQuery('.field-label', content).each(function(i ,val){
			jQuery(val).text(jQuery(val).text().replace(/:/g, ""));
		});
		
		jQuery('.form-item', content).each(function(i, val){
			var l = jQuery("label", val),
				t = l.text();
			jQuery("input,textarea", val).attr("placeholder", t);
			l.remove();
			console.log(t);
		});	
	
		jQuery(".form-submit", registration).attr("value", "register");
		
		
		var h = jQuery(".field-name-field-map", content).height();
		jQuery(".google-map-field", content).height(h-40);
		
		var h = jQuery('<div class="field"><div class="field-label">Contact Us</div></div>');
		jQuery('#contact').before(h);
		
		
		jQuery(".field-name-field-schedule p", content).each(function(i, val){
			if (jQuery(val).text().length <= 1){
				jQuery(val).remove();
			}
		});
		var menu = jQuery(".jumpMenu", content);
		jQuery(".region-footer").prepend(menu.clone());
});
