<?php // $Id$ ?>

  <?php if (!$in_overlay): // hide in overlay ?>

    <?php if ($page['leaderboard']): ?>
      <div id="leaderboard" class="width-48-950 last nofloat">
       <?php print render($page['leaderboard']); ?>
      </div> <!-- /leaderboard -->
    <?php endif; ?>

    <?php if ($logo || $site_name || $site_slogan || $header_box): ?>
      <div id="header" class="width-48-950 last nofloat clearfix">
        <?php if ($logo || $site_name || $site_slogan): ?>
          <div class="branding width-30-590">

            <?php if ($logo): ?>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
            <?php endif; ?>

            <?php if ($site_name): ?>
              <?php if ($title): ?>
                <div id="site-name"><strong>
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                </strong></div>
              <?php else: /* Use h1 when the content title is empty */ ?>
                <h1 id="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                </h1>
              <?php endif; ?>
            <?php endif; ?>

            <?php if ($site_slogan): ?>
              <em><?php print $site_slogan; ?></em>
            <?php endif; ?>

          </div> <!-- /branding -->
        <?php endif; ?>

        <?php if ($page['header']): ?>
          <div id="header-box" class="width-18-350 last">
           <?php print render($page['header']); ?>
          </div> <!-- /header -->
        <?php endif; ?>

      </div> <!-- /header -->
    <?php endif; ?>

    <div id="main-navigation" class="width-48-950 last nofloat clearfix">
      <?php if ($main_menu || $page['suckerfish']): ?>
        <div id="<?php print $page['suckerfish'] ? 'suckerfish' : 'primary-menu' ; ?>" class="width-45-890">
          <?php
            if ($page['suckerfish']) {
              print render($page['suckerfish']);
            }
            elseif ($main_menu) {
              print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('primary-links', 'clearfix'))));
            }
          ?>
        </div>
      <?php endif; ?>
      <div class="feed-icons clearfix">
        <a href="<?php print $base_path; ?>rss.xml" class="feed-icon">
          <img src="<?php print $base_path . $directory; ?>/images/feed.png" alt="Syndicate content" title="RSS Feed" width="16" height="16" />
        </a>
      </div> <!-- /rss icon -->
    </div> <!-- /main nav -->

    <?php if ($secondary_menu): ?>
      <div id="secondary-menu" class="width-48-950 last nofloat">
        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('secondary-links', 'clearfix')))); ?>
      </div>
    <?php endif; ?>

  <?php endif; // end hide in overlay ?>

  <?php print $breadcrumb; ?>
  <?php print $messages; ?>
  <?php print render($page['help']); ?>

  <?php if (!$in_overlay): // hide in overlay ?>

    <?php if ($page['content_top_full_width'] || $page['content_top_left'] || $page['content_top_right']): ?>
      <div id="content-top" class="width-48-950 last nofloat">
        <?php if ($page['content_top_full_width']): ?>
          <div id="content-top-full-width" class="width-48-950 last nofloat">
            <?php print render($page['content_top_full_width']); ?>
          </div> <!-- /full-width -->
        <?php endif; ?>
        <?php if ($page['content_top_left']): ?>
          <div class="content-top-col-1 width-24-470">
            <?php print render($page['content_top_left']); ?>
          </div> <!-- /top-left -->
        <?php endif; ?>
        <?php if ($page['content_top_right']): ?>
          <div class="content-top-col-2 width-24-470 last">
            <?php print render($page['content_top_right']); ?>
          </div> <!-- /top-right -->
        <?php endif; ?>
      </div> <!-- /content-top -->
    <?php endif; ?>

  <?php endif; // end hide in overlay ?>

    <div id="col_wrapper" class="width-960">

      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="width-10-190">
          <?php print render($page['sidebar_first']); ?>
        </div> <!-- /sidebar one -->
      <?php endif; ?>

      <div id="content" class="<?php print $width; ?>">

        <?php if ($page['highlight']): ?>
          <div id="highlight">
            <?php print render($page['highlight']); ?>
          </div> <!-- /highlight -->
        <?php endif; ?>

        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>

        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

        <?php print render($page['content']); ?>

        <?php if ($page['content_bottom']): ?>
          <div id="content-bottom">
            <?php print render($page['content_bottom']); ?>
          </div>
        <?php endif; ?>

      </div> <!-- /content -->

      <?php if (($page['right_top_box'] || $page['right_bottom_box']) && ($page['sidebar_second'] && $page['sidebar_third'])): ?>
        <div id="right-col-wrapper" class="width-20-390 last">

          <?php if (($page['right_top_box']) && ($page['sidebar_second'] && $page['sidebar_third'])): ?>
            <div id="right-top-box" class="width-20-390 last nofloat">
              <?php print render($page['right_top_box']); ?>
            </div> <!-- /right top box -->
          <?php endif; ?>

        <?php endif; ?>

          <?php if ($page['sidebar_second']): ?>
            <div id="sidebar-second" class="width-10-190">
              <?php print render($page['sidebar_second']); ?>
            </div> <!-- /sidebar two -->
          <?php endif; ?>

          <?php if ($page['sidebar_third']): ?>
            <div id="sidebar-third" class="width-10-190 last">
              <?php print render($page['sidebar_third']); ?>
            </div> <!-- /sidebar three -->
          <?php endif; ?>

          <?php if (($page['right_bottom_box']) && ($page['sidebar_second'] && $page['sidebar_third'])): ?>
            <div id="right-bottom-box" class="width-20-390 last nofloat">
              <?php print render($page['right_bottom_box']); ?>
            </div> <!-- /right bottom box -->
          <?php endif; ?>

        <?php if (($page['right_top_box'] || $page['right_bottom_box']) && ($page['sidebar_second'] && $page['sidebar_third'])): ?>
          </div> <!-- /right col wrapper -->
        <?php endif; ?>

    </div> <!-- /col_wrapper-->

  <?php if (!$in_overlay): // hide in overlay ?>

    <?php if ($page['content_bottom_full_width'] || $page['content_bottom_left'] || $page['content_bottom_right']): ?>
      <div id="content-bottom" class="width-48-950 last nofloat">
        <?php if ($page['content_bottom_left']): ?>
          <div class="content-bottom-col-1 width-24-470">
            <?php print render($page['content_bottom_left']); ?>
          </div> <!-- /bottom-left -->
        <?php endif; ?>
        <?php if ($page['content_bottom_right']): ?>
          <div class="content-bottom-col-2 width-24-470 last">
            <?php print render($page['content_bottom_right']); ?>
          </div> <!-- /bottom-right -->
        <?php endif; ?>
        <?php if ($page['content_bottom_full_width']): ?>
          <div id="content-bottom-full-width" class="width-48-950 last nofloat">
            <?php print render($page['content_bottom_full_width']); ?>
          </div> <!-- /bottom-full-width -->
        <?php endif; ?>
      </div> <!-- /content-bottom -->
    <?php endif; ?>

  <?php endif; // end hide in overlay ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="width-48-950 last nofloat">
        <?php print render($page['footer']); ?>
      </div>  <!-- /footer -->
    <?php endif; ?>

    <?php // You are free to remove the attribution, this is hidden by default with CSS so it won't disturb your theme. ?>
    <div class="element-invisible"><a href="http://adaptivethemes.com">Premium Drupal Themes by Adaptivethemes</a></div>
