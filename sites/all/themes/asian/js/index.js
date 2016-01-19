jQuery(document).ready(function(){
	var footer = jQuery("footer#footer"),
		content = jQuery("#content"),
		gallery = jQuery('.node-gallery', content);
	
		contactBlock = jQuery("#block-webform-client-block-4", footer),
		fields = jQuery('.webform-component--full-name,'
			+'.webform-component--email,'
			+'.webform-component--phone', contactBlock);
			
		
	fields.wrapAll('<div class="col_3"/>');
	
	jQuery('.webform-component-textfield,.webform-component-email', footer).each(function(i, val){
			var l = jQuery("label", val),
				t = l.text();
			jQuery("input", val).attr("placeholder", t);
			l.remove();
			console.log(t);
	});	
	
	var joinBlock = jQuery('#block-webform-client-block-64', footer);
	
	jQuery('.webform-component--email', joinBlock).after(jQuery('.form-actions', joinBlock));
	
	//~ jQuery("#messages").bind("click", function(ev){
		//~ jQuery(this).hide("slow");
	//~ });
	
	var headerTop = jQuery('header#top');
	
	if(jQuery('body').hasClass('not-front')){
		jQuery("#logo", headerTop).after(jQuery("#block-block-2", headerTop));
		
		//~ jQuery(	".wrap", headerTop).after(jQuery("#block-bean-default", headerTop);
	}
	jQuery(	"#block-block-2, #logo", headerTop).wrapAll('<div class="wrap"/>');
	var wcf5 = jQuery('#webform-client-form-5');
	_fix_webform_description(wcf5);
	
	var menu = jQuery('nav.bottom'),
		last = jQuery("li", menu).last(),
		li = last.clone().addClass("last"),
		li_2 =		last.clone();
		
		jQuery("a", li_2).text("about us").attr("href", "/about-us");
		last.after(li_2)
		
		jQuery("a", li).text("עברית").attr("href", "/אודות");
		li.css({"float": "right", "margin" : "0 1em"});
		last.after(li).removeClass("last");
	
	//~ 
	//~ 
	jQuery('.views-row, .field-item', gallery).each(function(i,val){
		//calc desired height one time ..
		w = (i == 0) ? jQuery(val).width():w;
		jQuery(val).height(w);
	});
	
	if(window.location.pathname === "/contact-us"){
		var mailing = jQuery('#block-webform-client-block-64', footer);
		
		jQuery(".webform-component--new-markup", mailing)
			.before('<hr/>');
		
		jQuery(content)
			.append('<hr/>')
			.append(mailing);
			
	}
});

function _fix_webform_description(context){
	jQuery('.labelExtra' ,context ).each(function(i, val){
		var p = jQuery(val).parent(".form-item");
		jQuery("label", p).append(val);
	});
	jQuery('.form-managed-file input[type=file]' ,context ).bind("change", function(ev){
		var p = jQuery(ev.currentTarget).parent(".form-managed-file");
		setTimeout(function(){
			jQuery(".form-submit", p).click().trigger('mousedown');
		
		},0);
		
		
	});
}


Drupal.behaviors.asian = {
    attach: function(context, settings){
		_fix_webform_description(context);
	}
};
