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
    $link = l($day, '', array('attributes' => array('data-nid' => $entity->id,'title' => $entity->title),'fragment' => $entity->id, 'external' => TRUE));
  }
?>
<div class="<?php print $granularity ?> <?php print $class; ?>"> <?php print !empty($selected) ? $link : $day; ?> </div>
