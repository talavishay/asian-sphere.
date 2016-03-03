<?php
/**
 * @file 
 * Template to display the date box in a calendar.
 *
 * - $view: The view.
 * - $granularity: The type of calendar this box is in -- year, month, day, or week.
 * - $mini: Whether or not this is a mini calendar.
 * - $class: The class for this box -- mini-on, mini-off, or day.
 * - $day:  The day of the month.
 * - $date: The current date, in the form YYYY-MM-DD.
 * - $link: A formatted link to the calendar day view for this day.
 * - $url:  The url to the calendar day view for this day.
 * - $selected: Whether or not this day has any items.
 * - $items: An array of items for this day.
 *
<div class="<?php print $granularity ?> <?php print $class; ?>"> <?php print !empty($selected) ? $link : $day; ?> </div>

*/
  // If day has items.
  if (!empty($selected)) {
    $items = reset($items[$date]);
    // Only get the first item.
    $entity = $items[0];
    //~ dpm($entity->calendar_start);
    //~ $timestamp = ;
    //dpm();
    
    
 //~ $title = ;
    //~ dpm($entity->rendered_fields["event_calendar_date"]);
    //~ dpm($entity->entity->field_place_event['und'][0]['value']);
    //~ 
    //~ dpm($entity->title);
    //~ dpm($entity->rendered_fields["event_calendar_date"]);
    //~ dpm($entity->entity->field_place_event['und'][0]['value']);
    //~ 
    //dpm($entity->entity);
$_place = $entity->entity->field_place_event;

if(isset($_place["und"])){
	$place =  $_place["und"][0]["value"] ;
} else {
	$place =   "No location yet..";
}

    $link = l($day, '', array('attributes' => array(
		'data-title' => $entity->title,
		'data-field_place_event' => $place,
		'data-href' => '/node/'.$entity->id,
		'data-nid' => $entity->id,
		'data-date' => $entity->rendered_fields["event_calendar_date"],
		'data-day' => format_date( strtotime($entity->calendar_start), $type = 'custom', $format = 'l' ),
		'title' => $entity->title),'fragment' => $entity->id, 'external' => TRUE));
  }

?>
<?php print !empty($selected) ? $link : $day; ?>
