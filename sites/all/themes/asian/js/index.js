jQuery(document).ready(function(){
	var footer = jQuery("footer#footer"),
		content = jQuery("#content"),
		gallery = jQuery('.node-gallery,.view-gallery', content);
	
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
	
	var headerTop = jQuery('header#top'),
		bbd = jQuery('#block-bean-default', headerTop);
	if(jQuery('body').hasClass('not-front')){
		jQuery("#logo", headerTop).after(jQuery("#block-block-2", headerTop));
		
		//~ jQuery(	".wrap", headerTop).after(jQuery("#block-bean-default", headerTop);
	}
	jQuery(	"#block-block-2, #logo", headerTop).wrapAll('<div class="wrap"/>');
	
	jQuery( headerTop).prepend(bbd);
	
	var wcf5 = jQuery('#webform-client-form-5');
	_fix_webform_description(wcf5);
	
	
	var menu = jQuery('nav.bottom'),
		last = jQuery("li", menu).last();
		last_clone = last.clone();
		jQuery("a", last_clone).removeClass("active").removeClass("active-trail");
		
		var li = last_clone.clone().removeClass("last"),
			li_2 =		last_clone.clone();
		
		jQuery("a", li_2).text("about us").attr("href", "/about-us");
		
		last.after(li_2)
		
		jQuery("a", li).text("עברית").attr("href", "/אודות");
		li.css({"float": "right", "margin" : "0 1em"});
		last.after(li).addClass("last");
		console.log(jQuery(li,li_2));
		jQuery("li", menu).each(function(i, val){
			console.log(jQuery("a", val).attr("href") );
			console.log("location.pathname  --  "+location.pathname);
			if(jQuery("a", val).attr("href") == location.pathname || jQuery("a", val).attr("href") == decodeURI(location.pathname) ){
				jQuery("a", val).addClass("active").addClass("active-trail");
			}
		});
	
	//~ 
	//~ 
	jQuery('.views-row li', gallery).each(function(i,val){

		var w =  jQuery(val).width();
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
	
	
	jQuery('.block-bean .moreInfo').on("click", function(ev){
		var block = jQuery(ev.currentTarget).parents(".block-bean"),
			more = jQuery(".field_more_info", block);
		if(more.length){
			window.open(more.attr("href"), "_blank");
		}
	})
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
