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

function asian_theme_views_pre_render($vars){
	if($vars->name === "news"){
		drupal_add_css(drupal_get_path("theme", "asian_theme").'/css/view-news.css', array('group' => CSS_THEME, 'every_page' => FALSE));
		drupal_add_js(drupal_get_path("theme", "asian_theme").'/js/view-news.js');
	}
	
}

/**
 * Override of theme('textarea').
 * Deprecate misc/textarea.js in favor of using the 'resize' CSS3 property.
 */
 
function asian_theme_textarea($variables) {
  $element = $variables ['element'];
  element_set_attributes($element, array('id', 'name', 'cols', 'rows'));
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element ['#attributes']) . '>' . check_plain($element ['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}
?>
