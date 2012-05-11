<?php // $Id$

function newswire_process(&$vars) {
  if (module_exists('overlay')) {
    $vars['in_overlay'] = (overlay_get_mode() == 'child');
  }
  else {
    $vars['in_overlay'] = FALSE;
  }
}

function newswire_preprocess_html(&$vars) {
  foreach($vars['classes_array'] as $i =>$class) {
   if(preg_match('/.*sidebar.*/', $class)) {
      unset($vars['classes_array'][$i]);
    }
  }
  $color_global = theme_get_setting('newswire_color_global');
  $color_highlight = theme_get_setting('newswire_color_highlight');
  drupal_add_css(drupal_get_path('theme', 'newswire') .'/css/'. $color_global .'.css', array('weight' => CSS_THEME, 'type' => 'file'));
  drupal_add_css(drupal_get_path('theme', 'newswire') .'/css/'. $color_highlight .'.css', array('weight' => CSS_THEME, 'type' => 'file'));
  if (isset($vars['page']['content'])) {
    $content = $vars['page']['content'];
  }
  if (isset($vars['page']['sidebar_first'])) {
    $sidebar_first = $vars['page']['sidebar_first'];
  }
  if (isset($vars['page']['sidebar_second'])) {
    $sidebar_second = $vars['page']['sidebar_second'];
  }
  if (isset($vars['page']['sidebar_third'])) {
    $sidebar_third = $vars['page']['sidebar_third'];
  }
  if (isset($content) && isset($sidebar_first) && isset($sidebar_second) && isset($sidebar_third)) {
    $vars['classes_array'][] = 'four-column';
  }
  else {
    if ((isset($content) && isset($sidebar_first) && isset($sidebar_second)) or (isset($content) && isset($sidebar_first) && isset($sidebar_third)) or (isset($content) && isset($sidebar_second) && isset($sidebar_third))) {
      $vars['classes_array'][] = 'three-column';
    }
    else {
      if ((isset($content) && isset($sidebar_first)) or (isset($content) && isset($sidebar_second)) or (isset($content) && isset($sidebar_third))) {
        $vars['classes_array'][] = 'two-column';
      }
      else {
        if (!empty($content)) {
          $vars['classes_array'][] = 'one-column no-sidebars';
        }
      }
    }
  }
}

function newswire_preprocess_page(&$vars) {
  $vars['width'] = '';
  $content = $vars['page']['content'];
  $sidebar_first = $vars['page']['sidebar_first'];
  $sidebar_second = $vars['page']['sidebar_second'];
  $sidebar_third = $vars['page']['sidebar_third'];
  if ($content && $sidebar_first && $sidebar_second && $sidebar_third) {
    $vars['width'] = 'width-18-350'; //if 4 col, content will be 350px
  }
  else {
    if (($content && $sidebar_first && $sidebar_second) || ($content && $sidebar_second && $sidebar_third) || ($content && $sidebar_first && $sidebar_third)) {
      $vars['width'] = 'width-28-550'; //if 3 col content will be 550px
    }
    else {
      if (($content && $sidebar_first) || ($content && $sidebar_third) || ($content && $sidebar_second)) {
        $vars['width'] = 'width-38-750'; //if 2 col content will be 750px
      }
      else {
        if ($content != '') {
          $vars['width'] = 'width-48-950'; //if 1 col content will be 950px
        }
      }
    }
  }
}

function newswire_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
}

function newswire_preprocess_field(&$vars) {
  array_unshift($vars['theme_hook_suggestions'], 'field__' . $vars['element']['#field_type']);
}
