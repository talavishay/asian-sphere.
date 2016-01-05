var docElem = document.documentElement,
	didScroll = false,
	changeHeaderOn = 300,
	w = 0;
	
jQuery(document).ready(function(){
	// front - top background slideshow -- created field
	if(jQuery("body").hasClass("front")){
		_fix_slideshow('.field-slideshow-1');
	}
	// front -teaser view -- created field	// split text and wrap
	jQuery(".view-news .wrap >div ").each(function(i, val){
			var val = jQuery(val),
				split = val.text().split(' ');
			val.html('<div class="numbers">'+split[0]+'</div><div class="text">'+split[1]+'</div>');
	});
	// front views-calendar
	
	jQuery('#block-views-calendar-block-1 td').each(function(i,val){
		w = (i == 0) ? jQuery(val).width():w;
		jQuery(val)
			.height(w)
			.on("click", calnd_popup)
			.addClass("fixed");
	});
});
window.addEventListener( 'scroll', function( event ) {
	if( !didScroll ) {
		didScroll = true;
		setTimeout( function scrollPage() {
			var sy = scrollY();
			if ( sy >= 400 ) {
				jQuery("body").addClass(  'scrolled' );
			}
			else {
				jQuery("body").removeClass(  'scrolled' );
			}
			didScroll = false;
		}, 250 );
	}
}, false );

function calnd_popup(e){
	var x =jQuery("a",e.currentTarget).data();
	if(x){
		console.log(x);
	}
};

function scrollY() {
	return window.pageYOffset || docElem.scrollTop;
}
function _fix_slideshow(_class){
	var slideshow = jQuery(_class),
		header = jQuery('#header'),
		changedOpts = {};
		
	if(slideshow && header){
		var body = jQuery('.field-name-field-text-body', slideshow.parents(".content")),
			menu = jQuery('#main-menu'),
			width   =	header.width()-30,
			height	=	body.height() + body.offset().top + menu.height()+ 30,
			v 		=	menu.height() + menu.offset().top;

		jQuery("#main-wrapper")
			.animate({"margin-top" : height}, "slow");
		body.animate({"top" :v }, "slow");

		//~ changedOpts.timeout = 150;
		//~ changedOpts.speed = 100;
		changedOpts.fit = 1;
		//~ changedOpts.containerResize = 0;
		changedOpts.width       =       width;
		changedOpts.height      =       height;
		//~ changedOpts.height      =       100;
			 
		slideshow.cycle(changedOpts);
	}

};
