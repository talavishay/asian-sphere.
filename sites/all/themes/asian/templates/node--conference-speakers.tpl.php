<?php
drupal_add_css(drupal_get_path("theme", "asian_theme").'/css/node--conference-speakers.css');
$img = file_create_url($content['field_testimonials_image'][0]['#item']['uri']);
$where = _getBasicValue("node"	, $node, "field_where");
$when = _getBasicValue("node"	, $node, "field_time");
$field_staff_department = _getBasicValue("node"	, $node, "field_staff_department");

 
 //dpm($title_suffix);
?>
<div class="speaker contextual-links-region " <?php print $attributes; ?>>
<?php 
print render($title_prefix);
print render($title_suffix);
?>
  <!-- This is 'image' -->
<div class="speakerImage"  >
	<img src="<?php print $img?>" width="190" height="186" alt="image" class="pngimg" /></div>  

<div class="name text editable"  ><a href="<?php print $node_url?>"><?php print $title;?></a></div>
<div  class="department text editable"  ><?php print $field_staff_department;?></div>
<div  class="body text editable"  ><?php print render($content["body"]);?></div>

<div  class="whenIcon when text"  >
	<?php print $when;?><br><?php print $where;?>
</div>


<a class="more" href="<?php print $node_url?>">
  <div  class="readMore"  ><span>Read More</span></div>
  
 </a>


</div>
