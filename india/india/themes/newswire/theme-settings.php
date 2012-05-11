<?php // $Id$
function newswire_form_system_theme_settings_alter(&$form, $form_state) {
  $form['newswire_color_global'] = array(
    '#type' => 'select',
    '#title' => t('Page Colors'),
    '#default_value' => theme_get_setting('newswire_color_global'),
    '#description' => t('Select the default color for blocks, borders and other page colors and backgrounds.'),
    '#options' => array(
      'newswire_p-gray' => t('Gray'),
      'newswire_p-tan'  => t('Tan'),
    ),
  );
  $form['newswire_color_highlight'] = array(
    '#type' => 'select',
    '#title' => t('Highlight Colors'),
    '#default_value' => theme_get_setting('newswire_color_highlight'),
    '#description' => t('Select the default color for the header nav, search box and drop down menus.'),
    '#options' => array(
      'newswire_red'    => t('Ruby Red'),
      'newswire_blue'   => t('Saphire Blue'),
      'newswire_green'  => t('Emerald Green'),
      'newswire_orange' => t('Sunset Orange'),
      'newswire_gray' => t('Cloudy Gray'),
      'newswire_brown'  => t('Chocolate Brown'),
    ),
  );
}