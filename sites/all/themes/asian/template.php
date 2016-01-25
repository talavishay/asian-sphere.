<?php

/**
 * Implements template_preprocess_block
 *
 * enable bean blocks to be themed by bean-type:
 * i.e. block__bean__BEAN-TYPE.tpl
 */
function asian_theme_preprocess_block(&$variables) {
  $block = $variables['block'];
  $block_module = $block->module;
  $elements = $variables['elements'];
  // Add Bean Type to Theme Hook Suggestions
  // enable bean blocks to be themed by bean-type: i.e. block__bean__BEAN-TYPE.tpl
  // select Bean Blocks and ignore other Blocks
  if (!empty($block_module) && ($block_module == 'bean')) {
    // the location of the Bean array within $variables is a moving target
    // e.g. use of the Context Module will change it's location to within $elements['content']
    // try the likely locations first before recursively iterating through $elements
    if (array_key_exists('bean', $elements)) {
      $bean_array = $elements['bean'];
    } else if (array_key_exists('bean', $elements['content'])) {
      $bean_array = $elements['content']['bean'];
    } else {
      $bean_array = array_find_first_value('bean', $elements);
    }
    
    // test that the Bean array has been found
    if ($bean_array) {
      $mystery_key_array = element_children($bean_array);
      if ($mystery_key_array) {
        $bean = $bean_array[$mystery_key_array[0]];
        if (!empty($bean['#bundle'])) {
          $variables['theme_hook_suggestions'][] = $block_module . '__' . $bean['#bundle'];
        }
      }
    }
  }
}
/*  C U S T O M   F U N C T I O N S  */
/*
 * search an array recursively to find
 * the first instance of a key and return its value
 *
 * useful when you do not know the location of a key nested (only once) in a multidimensional array
 *
 */
function array_find_first_value($needle_key, array $haystack) {
  if (array_key_exists($needle_key, $haystack)) {
    return $haystack[$needle_key];
  }
  foreach ($haystack as $key => $value) {
    if (is_array($value)) {
      $result = array_find_first_value($needle_key, $value);
      if ($result) {
        return $result;
      }
    }
  }
  return false;
}
function asian_theme_preprocess_calendar_mini(&$vars,$name){
	//format header day names
	foreach($vars["day_names"] as $k => $v){
		$_v = explode(" ", $v["class"]);
		$vars["day_names"][$k]["data"] = $_v[1];
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
	if(drupal_is_front_page()){
		$vars['items'] = array_slice($vars['items'], -3);
	}
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

/**
 * Replacement for theme_form_element().
 */
function asian_theme_webform_element($variables) {
  $element = $variables['element'];

  $output = '<div ' . drupal_attributes($element['#wrapper_attributes']) . '>' . "\n";
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . webform_filter_xss($element['#field_prefix']) . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . webform_filter_xss($element['#field_suffix']) . '</span>' : '';

  // Generate description for above or below the field.
  $above = !empty($element['#webform_component']['extra']['description_above']);
  $description = array(
    FALSE => '',
    TRUE => !empty($element['#description']) ? ' <div class="description">' . $element['#description'] . "</div>\n" : '',
  );

  switch ($element['#title_display']) {
    case 'inline':
      $output .= $description[$above];
      $description[$above] = '';
      // FALL THRU.
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      if($element['#type'] === "managed_file"){
			$output .= '<div class="labelExtra">'.$element['#webform_component']['extra']['description'].'</div>';
		}
      $output .= ' ' . $prefix . $description[$above] . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $description[$above] . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $description[$above] . $element['#children'] . $suffix . "\n";
      break;
  }

  $output .= $description[!$above];
  $output .= "</div>\n";

  return $output;
}
function asian_theme_preprocess_page(&$variables) {
    
    if (isset($variables['node']->type) && $variables['node']->type == "conferences") {
        $nodetype = $variables['node']->type;
        $variables['theme_hook_suggestions'][] = 'page__' . $nodetype;
        
        $d = $variables['page']['content']['system_main']['nodes'];
        //~ dpm(array_shift($d));
        $vm = array_shift($d);
	$vm = $vm['#view_mode'];
        $variables['theme_hook_suggestions'][] = 'page__' . $nodetype.'__'.$vm;
    }
    
}
function asian_theme_preprocess_node(&$variables, $hook) {
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  } 
  if($variables['view_mode'] == "teaser"){
        $nodetype = $variables['node']->type;
        $variables['theme_hook_suggestions'][] = 'node__' . $nodetype . '__teaser';
}

}
function asian_theme_preprocess_block__views__stuff_view_block(&$variables) {

dpm($variables);
//~ return $variables;
}

function asian_theme_preprocess_node_conferences(&$variables) {
//~ dpm($variables);	

$start_day_num = format_date(strtotime($variables["event_calendar_date"][0]['value']), 'custom', 'j');
$end_day_date = format_date(strtotime($variables["event_calendar_date"][0]['value2']), 'custom', 'j M Y');			
			
$variables["_date"] = $start_day_num.'-'.$end_day_date;
$variables["_start_time"] = format_date(strtotime($variables["event_calendar_date"][0]['value']), 'custom', 'g:i A');			

}


/*
 * Get the first sanitized value of the field.
*
* @param string $type
* This should be the string representation of the entity type.
* Example: 'node', 'taxonomy'
* @param mixed $entity
* The entity that owns the field
* @param string $field
* The field name as a string
* @param string $default
* The string to return if no value is found for the field. DEFAULT empty string
* @return string $ind
* Returns the sanitized value of the field, minus the markup
**/
 

function _getBasicValue($type, $entity, $field, $default = '', $ind = ''){
	$result = field_get_items($type, $entity, $field);
	if(!empty($result)) {
		$result = array_shift($result);
		if(empty($ind)){
			$ind = !empty($result['safe_value']) ? 'safe_value' : 'value';
		}
		if(!empty($result[$ind])) {
			return $result[$ind];
		}
	}
	return $default;
}

?>
