<?php
	drupal_add_css(drupal_get_path("theme", "asian_theme").'/css/front.css', array('group' => CSS_THEME, 'every_page' => FALSE));
	drupal_add_js(drupal_get_path("theme", "asian_theme").'/js/front.js');
?>

  <header id="menu" role="banner" >
		<div class="section clearfix">
			<?php if ($logo): ?>
			<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
				<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			</a>
			<?php endif; ?>
			
			<?php	print render($page['top_menu_box']); ?>
			
			<?php if ($main_menu): ?>
			<nav id="main-menu" role="navigation" class="navigation">
			<?php print theme('links__system_main_menu', array(
			  'links' => $main_menu,
			  'attributes' => array(
				'id' => 'main-menu-links',
				'class' => array('links', 'clearfix'),
			  ),
			  'heading' => array(
				'text' => t('Main menu'),
				'level' => 'h2',
				'class' => array('element-invisible'),
			  ),
			)); ?>
			</nav> <!-- /#main-menu -->
			<?php endif; ?>
			
		</div>		
	</header> 
	<header id="headerRegion" class="fixedPosition" role="banner" >
		<div class="section clearfix">		
			<?php		 print render($page['header']); ?>
		</div>		
	</header> <!-- /.section, /#header -->
<div id="page-wrapper"><div id="page">
  <div id="main-wrapper" class="clearfix"><div id="main" role="main" class="clearfix">
    <div id="content" class="column"><div class="section">
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
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

    </div></div> <!-- /.section, /#content -->

  </div></div> <!-- /#main, /#main-wrapper -->


  <div id="footer-wrapper"><div class="section">


    <?php if ($page['footer']): ?>
      <footer id="footer" role="contentinfo" class="clearfix">
        <?php print render($page['footer']); ?>
      </footer> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
<?php if ($messages): ?>
    <div id="messages">
			<?php print $messages; ?>
	</div> <!-- #messages -->
<?php endif; ?>
