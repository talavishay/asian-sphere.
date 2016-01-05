<?php ?>
<?php if ($messages): ?>
    <div id="messages">
		<div class="section clearfix">
      <?php print $messages; ?>
		</div>
    </div> <!-- #messages -->
  <?php endif; ?>
  <header id="menu" role="banner" >
		<div class="section clearfix">
			<?php if ($logo): ?>
			<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
				<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			</a>
			<?php endif; ?>
			
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
	<header id="header" role="banner" >
		<div class="section clearfix">		
			<?php		 print render($page['header']); ?>
		</div>		
	</header> <!-- /.section, /#header -->
<div id="page-wrapper"><div id="page">
	


	
		
  


  <div id="main-wrapper" class="clearfix"><div id="main" role="main" class="clearfix">

    

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
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
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>

    </div></div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>
    
    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

  </div></div> <!-- /#main, /#main-wrapper -->


  <div id="footer-wrapper"><div class="section">


    <?php if ($page['footer']): ?>
      <footer id="footer" role="contentinfo" class="clearfix">
        <?php print render($page['footer']); ?>
      </footer> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
