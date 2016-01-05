<?php

function asian_theme_preprocess_calendar_mini(&$vars,$name){
	//~ dpm($vars);
	
	
	$vars["test"] = "ZZZZZ";
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
?>
