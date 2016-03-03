jQuery(document).ready(function(){
	var	content 		= jQuery("#content"),
		news 			= jQuery("#block-views-news-block-1", content),
		calendar		= jQuery('#block-views-calendar-block-1', content),
		staff 			= jQuery('#block-views-stuff-view-block', content),
		travel 			= jQuery('#block-bean-traveling-courses', content),
		blockSlideShow 	= jQuery('#block-bean-homepage-slide-show'),
		courses			= jQuery('#block-views-our-futured-courses-block', content),
		gallery 		= jQuery('.view-gallery', content),
		top		 		= jQuery('header#top');
	
	_fix_slideshow('.field-slideshow-1');
	
	//views-calendar block
	
	jQuery('td', calendar).each(function(i,val){
		var a = jQuery("a", val);
		a.tooltip({
			tooltipClass : "eventName",
			content : "Event",
			position : {				
				my : 'bottom+7',				
				at : 'top',				
				of : val, 
				collision : 'none'
		}});
		setTimeout(function(){ a.tooltip("open") },0);
		jQuery("a", val).attr("href","");
		var elm  = jQuery("a", val),
			data = elm.data();
		if(data){		
			jQuery(elm).on("click", data, open_popup );
		};
	});
	calendar.after('<div class="sep"><div>');
	gallery.parents(".block").after('<div class="sep"><div>');
	gallery.parents(".block").before('<div class="sep"><div>');
	
	
	var _a = jQuery('<a class="moreInfoBar"  href=""></a>'),
		ts= 'go to full staff list',
		cs='go to full courses list',
		position = {				my : 'bottom',				at : 'top'};
	
	staff.after(_a.clone().text(ts).attr({"title":ts, "href" : "/staff"}) );
	travel.after(_a.clone().text(cs).attr({"title":cs, "href": "/Curriculum"}) );
	
	jQuery('.views-field-field-profile-image', staff).each(function(i,val){
		//calc desired height one time ..
		w = (i == 0) ? jQuery(val).width():w;
		jQuery(val).height(w);
		jQuery(".views-field-nothing", jQuery(val).parent()).height(w);
	});

	
	//~ jQuery('.views-row', gallery).each(function(i,val){
		//~ //calc desired height one time ..
		//~ w = (i == 0) ? jQuery(val).width():w;
		//~ jQuery(val).height(w);
	//~ });
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
		//~ bvof_h2_h = jQuery("h2", bvof).outerHeight(),
		//~ fnfg_h = 	jQuery('.field-name-field-gallery-teaser', bbtc).outerHeight();
		//~ 
	//~ var bvof = courses ;
	
	
		//~ var	bvof = jQuery('#block-views-our-futured-courses-block');
			//~ bbtc = jQuery('#block-bean-traveling-courses'),
			//~ bvof_h = bvof.outerHeight(true),
			//~ fnfg_img = 	jQuery('.field-name-field-gallery-img img', bbtc),
			//~ bbtch2_h = jQuery('h2', bbtc).outerHeight(true),
			//~ fnfg_item = 	jQuery('.field-name-field-gallery-img .field-item', bbtc),
			//~ fnfg_item_h = 	jQuery('.field-name-field-gallery-img', bbtc).outerHeight(true) ,
			//~ 
			//~ fnfg_img_w = fnfg_item.first().outerWidth();
	//~ 
	//~ fnfg_img.each(function(i, val){
		//~ jQuery(val).height(fnfg_img_w);
	//~ });
		
	courses.before(jQuery("h2", courses));
	
	jQuery(travel)
		.height(jQuery(courses).height())
		.append(jQuery('.field-name-field-gallery-teaser', travel));
		
		
	jQuery(".views-row", courses).on("click", function(ev){
		ev.preventDefault();
		
		var h =jQuery(".views-field-view-node a", ev.currentTarget).attr("href");
		document.location.replace(h);
		
		return false;
	});
	
	var nuriBlocks = jQuery('#block-bean-nuri,#block-bean-nuri2,#block-bean-nuri3, #block-bean-nuri4ac', content);
	nuriBlocks.each(function(i, val){
		var m = jQuery('<div class="moreInfo" />');
		jQuery(".content", val)
			.first().after(m);
	});
	var c = jQuery('<div class="cols_4"/>').append(nuriBlocks);
	staff.before(c);
	
	//~ jQuery('.view-testimonials .views-row > img').each(function(i, val){
		//~ var w = jQuery(val).width();
		//~ jQuery(val).height(w);
	//~ });
	
	var 	bodyFieldHeight = jQuery('.field-name-field-text-body' , blockSlideShow).outerHeight(),
			//~ header_top_h = jQuery('header#headerRegion').outerHeight(),
			menu_h = jQuery('nav#main-menu').outerHeight(),
			t = top.outerHeight();
			
	jQuery('.field-name-field-slide-show-image', blockSlideShow)
		.css({
			"height" : bodyFieldHeight + menu_h +97 ,//body-css :  position :absolute, top:30...
			"top" : (menu_h + 67) * -1
		});		
	jQuery( blockSlideShow ).height( bodyFieldHeight + 97 );
	
});


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
			height	=	body.outerHeight() +  menu.outerHeight();
			
		
		
		//~ jQuery("#main-wrapper")
			//~ .animate({"margin-top" : height}, "fast");
			
		//~ body.animate({"top" :v }, "slow");

		//~ changedOpts.timeout = 150;
		//~ changedOpts.speed = 100;
		changedOpts.fit = 1;
		changedOpts.containerResize = 1;
		changedOpts.width       =       width;
		changedOpts.height      =       height;
		changedOpts.before      =       function(currSlideElement, nextSlideElement, options, forwardFlag) {
				var h = jQuery("#headerRegion").height();
				 jQuery(nextSlideElement).height(h);
		};
		slideshow.cycle(changedOpts);
	}

};
//~ jQuery('.view-gallery .view-content').isotope({
	  //~ itemSelector: '.views-row',
	  //~ percentPosition: true 
	//~ });
// front -teaser view -- created field	// split text and wrap
//~ var docElem = document.documentElement,
	//~ didScroll = false,
	//~ changeHeaderOn = 300,
	//~ w = 0;





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
