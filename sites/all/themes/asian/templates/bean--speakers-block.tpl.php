<?php
/**
 * @file
 * Default theme implementation for beans.
 *
 * Available variables:
 * - $content: An array of comment items. Use print render($content) to print them all, or
 *   print a subset such as print render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
drupal_add_css(drupal_get_path("theme", "asian_theme").'/css/bean--speakers-block.css');
$img = file_create_url($content['field_testimonials_image'][0]['#item']['uri']);
 //~ dpm($content);

?>
<div class="speaker">

  <!-- This is 'image' -->
<div class="speakerImage"  >
	<img src="<?php print $img?>" width="190" height="186" alt="image" class="pngimg" /></div>  

<div class="name text editable"  ><?php print render($content["field_name"]);?></div>
<div  class="department text editable"  ><?php print render($content["field_staff_department"]);?></div>
<div  class="body text editable"  ><?php print render($content["field_speakers"]);?></div>

<div  class="whenIcon"  >
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABmJLR0QA/gD+AP7rGNSCAAAACW9GRnMAAAAGAAABnwD7aKkxAAAACXBIWXMAAABIAAAASABGyWs+AAAAiHpUWHRSYXcgcHJvZmlsZSB0eXBlIGlwdGMAAHjaXY4xDgMhDAR7v4InjI0x8B4gUroU+b/SHDkSN/ZaO9LI8/UeklJKSdUkNzfvPslrcc9kFK8WGqvmSmi1KLEi1w5fxmkbENDHdSsA5vxsyAA6NqPdd3cXmptcNvN+K+DtCPqfDyMOIwwo8gEwgTFdrI3bQgAAAAl2cEFnAAAAGQAAABkAqgtHQgAAASpJREFUSMfdVTFOxDAQnEVXQMtXrgVRUCMk2t13QHlHx9Hxh6wrJAQVEgUV3yElXYbGiYKViw1HgsRKkZzRzI53vbIFSajqKYB7ACB5EUJ4RSZymkUqEJFjAHdxfQIga5LTiJk9kTxLRNdxV6ucQYHmUVSV7i4tYmbrPqOqqnXOYEyjqlwMaN5IPsT1eWEh4xpVZWlLfhKqyr0pDdqQqSvpypk6/yzt+jJdqnopIoe7JiX57u637X9ayaZpmrr9SC5JLhPsKscBsNlaCQCEEDqCmR0AgLt3mKrelHD6Oec/k7iLbtpIttjqu5xRk6F7LL2LSjh/3y4z6w6N5FHE9vvtKeGMmsQRBACIyMcAVsQZNfk3I1z/0gjXW03cfed7ayjmaRfJl4nflOdP1/oCuqTw5C8AAAAOdEVYdGxhYmVsAHdoZW5JY29u5DBIZAAAAABJRU5ErkJggg==" width="25" height="25" alt="whenIcon" class="pngimg" /></div>
<div  class="when text editable"  ><?php print render($content["field_time"]);?></div>
<a href="<?php print $url?>">
  <!-- This is 'readMore' -->
  <div  class="readMore"  >
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEQAAAALCAYAAADGHSsLAAAABmJLR0QA/gD+AP7rGNSCAAAACW9GRnMAAAAgAAAB1AA5ENnUAAAACXBIWXMAAABIAAAASABGyWs+AAAAiHpUWHRSYXcgcHJvZmlsZSB0eXBlIGlwdGMAAHjaXY4xDgMhDAR7v4InjI0x8B4gUroU+b/SHDkSN/ZaO9LI8/UeklJKSdUkNzfvPslrcc9kFK8WGqvmSmi1KLEi1w5fxmkbENDHdSsA5vxsyAA6NqPdd3cXmptcNvN+K+DtCPqfDyMOIwwo8gEwgTFdrI3bQgAAAAl2cEFnAAAARAAAAAsAYu8suAAAAjFJREFUSMe1lt2V0zAQhT/27HtcgjpYd7CmA1MBLiEdYCogHSA6cAeECvB24FSAU0F40Ex0LexNHsico+NI83d1RxoF4LIyZiACgcdIY3ne01028rei/+/yZN8fwEcZEfgM7B9EyL3SbRDyMPlAYvor0Be6kVShyuaVgQmmO5JOkoIP4juITn0nGz8tfymN6U42D0WcP8AZ2BX+tZA1GAb3qW1eW7wo5Lruup/LChmIkYMazVa/TtZga75ZjRlkzX1nbl+Z3r5NQfrFNqT+B4k7iY3G89xHw63zxX58sZcxWnBnPNrcq1UL6LBCqpLp4GupmIN+j5DG7GIRdxCy1F7tosRwve7H/R1TMH18lgWvRAW8kI7sZGut/e4k6cl8DqS+MwuAQD6yLalH+Xw2n2/clkjqY5XgOrC8Ro57L2t7Ug9spDA9+Ro3hr8VkiagdUIiywrXwG8L3JHua8Xy+E7kHtIDr0LiLHY7IdZl5D6JwBfyXT+vYHWZi99n83FCNGddkOk+4zPrMgJv5EqcLHAnNp18X4FP5Aocxe6tSAz3vxQT8Mty1CwbdSmBTHxFKsS4YTvyb4FboH5iW2Zy04wsn+EW+C7J3V4J8vXB5nvya6PE3pJo/jvSdVnTe55gYyh0az4vBaar7dYrE8l/jiryS+LDkwbyq+HNa5C4lcTyceS+puqEzyyvXV/4tysYuo14LocC00gu4t0SLHDpWJEbqm4srPgGHiclhlviuK/7+QuZ5NX1zNgqdQAAAA50RVh0bGFiZWwAcmVhZE1vcmXy4KbQAAAAAElFTkSuQmCC" width="68" height="11" alt="readMore" class="pngimg" /></div>
	<div  class="readMoreIcon"  >
		<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAYCAYAAAAPtVbGAAAABmJLR0QA/gD+AP7rGNSCAAAACW9GRnMAAAADAAAByABeX/MRAAAACXBIWXMAAABIAAAASABGyWs+AAAAiHpUWHRSYXcgcHJvZmlsZSB0eXBlIGlwdGMAAHjaXY4xDgMhDAR7v4InjI0x8B4gUroU+b/SHDkSN/ZaO9LI8/UeklJKSdUkNzfvPslrcc9kFK8WGqvmSmi1KLEi1w5fxmkbENDHdSsA5vxsyAA6NqPdd3cXmptcNvN+K+DtCPqfDyMOIwwo8gEwgTFdrI3bQgAAAAl2cEFnAAAAGQAAABgAsxB2AwAAAxBJREFUSMe1lU1oXFUUx///8zIT6ELrpoNRssksdFNRyBQhpUGFUhAlmIHee19gVlMxrSSrQl3k2V1XLmxNUBoCmfdG+nChmwhuUnWTNnQjNBJwEzXQKqUos3mTecfNTJkOb+oMJGf3zsf9nY973gWGlHK5nB82RoZxDoJA8vn81wB4ZJDd3d23AMxYa98+MoiILAL4keTCkUCMMSdV9fXR0dF3AbxhjDl56BDP8z4muby6uvovgBWSlw4VYowpqOoHrVZrGQCSJFkmOWuMKRwaREQukLxVr9f/BoA4jv8CEHueVx0kfuRZxkqlcrzZbI4BuEDybI/5c1XdcM59k8vl9tfW1h73O4fGmDc9z3snTdMTJF8CUAAwBuAEgH8APFDVn6IougQAvu8HtVotAADn3HUAU+2Y5wA8BLDfjvlTRB6q6g8jBwcHv4jIEsmSqn5E8jfP8/b39vYebG5uHvRmpapLAAIACMPwYkc/PT09Mj4+Xmi1WmOqOkHyC1XdSpLkMwJAuVz28vl8J6tzYRj+0a9055yGYchn2F8GsAHg5yRJLsZx3HrK2Vp7meSHaZqeq9frv3b0vu8H3ZWQ/LTz3WkdABhjXhGRDVVdiaLo2pOL0w2JougayasictsYMzXIzekCTInIbZJXuwF9xVr7vnPukXNuNqtdGbpZ59wj3/ffyzovc0+iKPoWwCLJKwMW8gnJhVqt9l2Wse+eqOrzALZ69d3z6JKttn+m9N14ESmRvNOr7x50l9wBUBoakqbpJMm73bpqtXrMOWer1eqxHve7ACaHglhrXyBZmJiYuN/pkrX2fKPR2AGw0Gg0dqy159F+IZMkuQ/gxUqlcnxgiIicArAdBEHq+/5p59y2iMyTnAnDsERyRkTmnXPbvu+fjuO4parbSZKcGqZdkwB+d87dVNVbJJeLxeKZWq12rz2Xe8Vi8QyAFVWNnXM3Se71a1nm7VLVEoCzAG7kcrlXs/6wQRCkAL6qVCpxs9lcAjAvIt8PDAHwWEReW19f38H/SDuBxbm5uS/TNM3cq/8A4G40kQ7MG+QAAAASdEVYdGxhYmVsAHJlYWRNb3JlSWNvbjPKfnIAAAAASUVORK5CYII=" width="25" height="24" alt="readMoreIcon" class="pngimg" />
	</div>
</a>


</div>
