<?php
	drupal_add_css(drupal_get_path("theme", "asian_theme").'/css/front.css', array('group' => CSS_THEME, 'every_page' => FALSE));
	drupal_add_js(drupal_get_path("theme", "asian_theme").'/js/front.js');
?>
<?php if ($messages): ?>
<div id="messages">
		<?php print $messages; ?>
</div> <!-- #messages -->
<?php endif; ?>

<header id="menu" >
	<?php if ($logo): ?>
		<a href="<?php print $front_page; ?>" id="logo">
			<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
		</a>
	<?php endif; ?>
	<?php if ($page['top_menu_box']): ?>
		<?php print render($page['top_menu_box']); ?>
	<?php endif; ?>
	<?php if ($main_menu): ?>
		<nav id="main-menu" class="navigation">
			<?php print theme('links__system_main_menu', array(
			  'links' => $main_menu,
			  'attributes' => array(
				'id' => 'main-menu-links','class' => array('links'),
		))); ?>
		</nav> <!-- /#main-menu -->
	<?php endif; ?>
</header> 

<?php if ($page['header']): ?>
	<header id="headerRegion"  >
			<?php print render($page['header']); ?>
	</header> <!-- /.section, /#header -->
<?php endif; ?>

<?php if ($page['content']): ?>
	<div id="content" >
	  <?php print render($title_prefix); ?>
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
<?php if ($page['footer']): ?>
	<footer id="footer" role="contentinfo" class="clearfix">
		<?php print render($page['footer']); ?>
	</footer> <!-- /#footer -->
<?php endif; ?>
