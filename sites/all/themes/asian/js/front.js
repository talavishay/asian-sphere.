var docElem = document.documentElement,
	didScroll = false,
	changeHeaderOn = 300,
	w = 0;
	
jQuery(document).ready(function(){
	var body = jQuery("body");
	if(body.hasClass("front")){
		
	var content = jQuery("#content", body),
		news = jQuery("#block-views-news-block-1", content),
		calendar = jQuery('#block-views-calendar-block-1', content),
		staff = jQuery('#block-views-stuff-view-block', content),
		blockSlideshow = jQuery('#block-bean-homepage-slide-show', body),
		gallery = jQuery('.view-gallery', content);
	
	_fix_slideshow('.field-slideshow-1');
	
	
	//views-calendar block
	
	jQuery('td', calendar).each(function(i,val){
		//calc desired height one time ..
		w = (i == 0) ? jQuery(val).width():w;
		jQuery(val).height(w*.9);
		
		jQuery("a", val).tooltip({
			tooltipClass : "eventName",
			position : {				my : 'bottom',				at : 'top',				of : val
		}});
		jQuery("a", val).attr("href","");
		var elm  = jQuery("a", val),
			data = elm.data();
		if(data){		
			jQuery(elm).on("click", data, open_popup );
			jQuery(elm).on("click", function(event){
				//~ jQuery("a", val).tooltip('destroy');
			} );
		};
	});
	calendar.after('<div class="sep"><div>');
	gallery.parents(".block").after('<div class="sep"><div>');
	
	var _a = jQuery('<a class="moreInfoBar"  href="#"></a>'),
		ts= 'go to full staff list',
		cs='go to full courses list',
		position = {				my : 'bottom',				at : 'top'};
	//~ jQuery('#block-views-stuff-view-block').after(_a.clone().text(ts).attr("title",ts).tooltip({position:position}) );
	//~ jQuery('#block-bean-traveling-courses').after(_a.clone().text(cs).attr("title",cs).tooltip({position:position}) );
	jQuery('#block-views-stuff-view-block').after(_a.clone().text(ts).attr("title",ts) );
	jQuery('#block-bean-traveling-courses').after(_a.clone().text(cs).attr("title",cs) );
	
	jQuery('.views-field-field-profile-image', staff).each(function(i,val){
		//calc desired height one time ..
		w = (i == 0) ? jQuery(val).width():w;
		jQuery(val).height(w);
		jQuery(".views-field-nothing", jQuery(val).parent()).height(w);
	});

	
	jQuery('.views-row', gallery).each(function(i,val){
		//calc desired height one time ..
		w = (i == 0) ? jQuery(val).width():w;
		jQuery(val).height(w);
	});
	jQuery(jQuery("ul", gallery)[0].childNodes).each(function () { 
		jQuery(this).html() || jQuery(this).remove();
	});

	//~ .view-stuff-view
	jQuery(".view-stuff-view .views-field-nothing .field-content span").bind("click", function(ev){
			var c = jQuery(this).attr("class");
			switch (c){
			case 'publication':
				window.open(jQuery(this).data(c), '_blank');
			break;	
			default:
				window.open('/node/'+jQuery(this).data("nid"), '_self');
			
			break;
				//~ 
			//~ case:
			//~ break;
				
			}
	});
	// equal heigths
	//~ #block-bean-traveling-courses,
	//~ #block-views-our-futured-courses-block{
	var bvof = jQuery('#block-views-our-futured-courses-block'),
		bbtc = jQuery('#block-bean-traveling-courses'),
		bvof_h = bvof.outerHeight(),
		bvof_h2_h = jQuery("h2", bvof).outerHeight(),
		fnfg_h = 	jQuery('.field-name-field-gallery-teaser', bbtc).outerHeight();
		fnfg_h2_h = jQuery('h2', bbtc).outerHeight(true),
		fnfg_item = 	jQuery('.field-name-field-gallery-img .field-item', bbtc),
		fnfg_img = 	jQuery('.field-name-field-gallery-img img', bbtc),
		fnfg_img_w = fnfg_item.first().outerWidth();
		
		
	//~ jQuery(".content", bbtc).first().height(bvof_h - bvof_h2_h-fnfg_h2_h);
	//~ bbtc.css({"min-height": bvof_h - bvof_h2_h });
	
	fnfg_img.each(function(i, val){
		jQuery(val).height(fnfg_img_w);
	});
	
	
	//~ 
	//~ #block-bean-nuri img,
//~ #block-bean-nuri2 img,
//~ #block-bean-nuri3 img, 
//~ #block-bean-nuri4ac img{
//~ var images = jQuery('#block-bean-nuri img,#block-bean-nuri2 img,#block-bean-nuri3 img, #block-bean-nuri4ac img'),
	//~ images_h = images.first().outerWidth();
	//~ images.each(function(i, val){
			//~ jQuery(val).height(images_h);
	//~ });
		var bbhss = blockSlideshow,
			body = jQuery('.field-name-field-text-body' , bbhss),
			height = body.outerHeight(),
			menu = jQuery('header#menu'),
			menu_h = menu.outerHeight();
			
		jQuery('.field-name-field-slide-show-image', blockSlideshow).css({
			"height" : height + menu_h + 50,
			 top : menu_h*-1
			});		
		jQuery( bbhss).height(height  + 50);
	}
	var nuriBlocks = jQuery('#block-bean-nuri,#block-bean-nuri2,#block-bean-nuri3, #block-bean-nuri4ac');
	nuriBlocks.each(function(i, val){
		var m = jQuery('<div class="moreInfo" />');
		jQuery(".content", val).first().after(m);
	});
	var c = jQuery('<div class="cols_4"/>').append(nuriBlocks);
	jQuery('#block-views-stuff-view-block').before(c);
	
	//~ jQuery('.view-testimonials .views-row > img').each(function(i, val){
		//~ var w = jQuery(val).width();
		//~ jQuery(val).height(w);
	//~ });
});




//~ window.addEventListener( 'scroll', function( event ) {
	//~ if( !didScroll ) {
		//~ didScroll = true;
		//~ setTimeout( function scrollPage() {
			//~ var sy = scrollY();
			//~ if ( sy >= 400 ) {
				//~ jQuery("body").addClass(  'scrolled' );
			//~ }
			//~ else {
				//~ jQuery("body").removeClass(  'scrolled' );
			//~ }
			//~ didScroll = false;
		//~ }, 250 );
	//~ }
//~ }, false );

function open_popup(event){
	event.preventDefault();
	jQuery('<div>'+popup_template(event.data)+'</div>').dialog({
		dialogClass : "calPopup",
		title : event.data.title,
		width: 200,
		position : {
			my: "top",
			at: "bottom",
			of: event
		},
		close: function( event, ui ) {
			jQuery(this).dialog('destroy');
		},
	});
	return false;
}
	
function popup_template(data){
	var d = jQuery(data.date).text().split('-'),
		day = d[0].trim(),
		hour = d[1].trim();
		return '<p>'+day+'</p><p>'+data.day+' '+hour+'</p><p>'+data.title+'</p><p>'+data.field_place_event+'</p><a id="moreInfo" href="'+data.href+'">Click for more information</span>';

}
function scrollY() {
	return window.pageYOffset || docElem.scrollTop;
}
function _fix_slideshow(_class){
	var slideshow = jQuery(_class),
		header = jQuery('header#menu'),
		changedOpts = {};
		
	if(slideshow && header){
		var body = jQuery('.field-name-field-text-body', slideshow.parents(".content")),
			menu = jQuery('#main-menu'),
			width   =	header.width()-30,
			height	=	body.height() +  menu.height();
			
		
		
		//~ jQuery("#main-wrapper")
			//~ .animate({"margin-top" : height}, "fast");
			
		//~ body.animate({"top" :v }, "slow");

		//~ changedOpts.timeout = 150;
		//~ changedOpts.speed = 100;
		changedOpts.fit = 1;
		changedOpts.containerResize = 1;
		changedOpts.width       =       width;
		changedOpts.height      =       height;
		//~ changedOpts.height      =       100;
			 
		slideshow.cycle(changedOpts);
	}

};
	//~ jQuery('.view-gallery .view-content').isotope({
		  //~ itemSelector: '.views-row',
		  //~ percentPosition: true 
		//~ });
	// front -teaser view -- created field	// split text and wrap
