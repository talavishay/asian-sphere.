<?php if ($messages): ?>
<div id="messages">
		<?php print $messages; ?>
</div> <!-- #messages -->
<?php endif; ?>

<header id="top" >
	<?php if ($logo): ?>
		<a href="<?php print $front_page; ?>" id="logo">
			<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
		</a>
	<?php endif; ?>
	<?php if ($page['top_menu_box']): ?>
		<?php print render($page['top_menu_box']); ?>
	<?php endif; ?>
</header> 

<?php if ($main_menu): ?>
	<nav id="main-menu" class="navigation top">
		<?php print theme('links__system_main_menu', array(
		  'links' => $main_menu,
		  'attributes' => array(
			'id' => 'main-menu-links','class' => array('links'),
	))); ?>
	</nav> <!-- /#main-menu -->
<?php endif; ?>

<?php if ($page['header']): ?>
<header id="headerRegion" class="fixedPosition" >
	<div class="section clearfix">		
		<?php print render($page['header']); ?>
	</div>		
</header> <!-- /.section, /#header -->
<?php endif; ?>

      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_first']); ?>
        </div></div> <!-- /.section, /#sidebar-first -->
      <?php endif; ?>


<?php if ($page['content']): ?>
<div id="content" >
  <?php
  
  if(isset($node) && ($node->type == "students" || $node->type == "stuff") ){
	$title = $node->type;
	} 
		
  print render($title_prefix); ?>
  <?php if ($title && !$is_front): ?>
	<h1 class="title" id="page-title">
	  <?php print $title; ?>
	</h1>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($tabs): ?>
	<div class="tabs">
	  <?php print render($tabs); ?>
	</div>
  <?php endif; ?>


  <?php if ($action_links): ?>
	<ul class="action-links">
	  <?php print render($action_links); ?>
	</ul>
  <?php endif; ?>

	<?php print render($page['content']); ?>
	<?php print $feed_icons; ?>
</div>  
<?php endif; ?>
<?php if ($page['sidebar_second']): ?>
<div id="sidebar-second" class="column sidebar"><div class="section">
  <?php print render($page['sidebar_second']); ?>
</div></div> <!-- /.section, /#sidebar-second -->
<?php endif; ?>
<?php if ($main_menu): ?>
	<nav id="main-menu" class="navigation bottom">
		<?php print theme('links__system_main_menu', array(
		  'links' => $main_menu,
		  'attributes' => array(
			'id' => 'main-menu-links','class' => array('links'),
	))); ?>
	</nav> <!-- /#main-menu -->
<?php endif; ?>

<?php if ($page['footer']): ?>
  <footer id="footer" >
	<?php print render($page['footer']); ?>
  </footer> <!-- /#footer -->
<?php endif; ?>


<?php if ($page['footer_under_menu']): ?>
	<footer id="bottom" >
		<?php print render($page['footer_under_menu']); ?>
	<?php 
	$date = preg_replace('/\//i', '.', variable_get("last_modified", date('d/m/Y')));
	print '<span id="last_mod" style="margin-left:1em">  Last Modified '.$date.'</span>';
	?>	    
	</footer> <!-- /#footer -->
<?php endif; ?>
