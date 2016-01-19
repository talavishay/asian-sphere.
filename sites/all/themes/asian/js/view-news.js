jQuery(document).ready(function(){
	var news = jQuery(".view-news.view-display-id-block_1");
			
	jQuery(".wrap > div", news).each(function(i, val){
			var val = jQuery(val),
				split = val.text().split(' ');
			val.html('<div class="text">'+split[1]+'</div><div class="numbers">'+split[0]+'</div>');
	});
});
