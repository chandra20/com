<?php // $Id$ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>" <?php print $rdf_namespaces; ?>>
<head profile="<?php print $grddl_profile; ?>">
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
</head>
<script type="text/javascript">
    jQuery(document).ready(function() {
            if (jQuery('#cycleimages').length > 0) {
                jQuery('#cycleimages').cycle({ 
                    effect:"random",
                    speed: 750,
                    timeout: 4000, 
                    randomizeEffects: false, 
                    easing: 'easeOutCubic',
                    next:   '.cyclenext', 
                    prev:   '.cycleprev',
                    pager:  '#cyclewrapnav',
                    cleartypeNoBg: true
                });
            }
        });

</script>
<body class="<?php print $classes; ?>">
  <div id="container">
    <?php if (!$in_overlay): // Hide skip nav in overlay ?>
    <div id="accessiblity" class="width-48-950 last nofloat">
      <!--<a href="#content"><?php /*?><?php print t('Skip to main content'); ?><?php */?></a>-->
    </div>
    <?php endif; ?>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </div>
</body>
</html>