<?php

function asian_theme_preprocess_calendar_mini(&$vars,$name){
	//format header day names
	foreach($vars["day_names"] as $k => $v){
		$vars["day_names"][$k]["data"] = explode(" ", $v["class"])[1];
	};
	//dialog for event info
	drupal_add_library('system', 'ui.dialog');
	drupal_add_library('system', 'ui.tooltip');
}
function asian_theme_preprocess_calendar_datebox(&$vars){
		//~ dpm($vars);
}
function asian_theme_calendar_empty_day($vars) {
	$curday = $vars['curday'];
	$view = $vars['view'];
	if( !$vars ){
	  if ($view->date_info->calendar_type != 'day') {
		return '<div class="calendar-empty">&nbsp;</div>' . "\n";
	  }
	  else {
		return '<div class="calendar-dayview-empty">' . t('Empty day') . '</div>';
	  }
	} else {
		return '';
	}
}
function asian_theme_preprocess_image(&$variables) {        
	unset($variables['width']);
	unset($variables['height']);
}
/*function asian_theme_preprocess_node(&$vars) {
  if($vars['view_mode'] == 'teaser' && $vars['type'] == "gallery") {
	  //~ $ni = array_slice($vars['content']['field_gallery_img']['#items'], 3);
//~ $vars['content']['field_gallery_img']['#items'] = 
    
	  
	  //~ dpm($vars['content']['field_gallery_img']['#items']);
  }
}*/
function asian_theme_preprocess_field__field_gallery_img(&$vars) { 
	$vars['items'] = array_slice($vars['items'], -3);
	return $vars;
}
function asian_theme_preprocess_field(&$vars) { 
	if($vars['element']['#field_name'] === "field_gallery_img"){
		$function = 'asian_theme_preprocess_field__'. $vars['element']['#field_name'];
		if(function_exists($function)) {
			$vars = $function($vars);
		}
	}
}

?>
