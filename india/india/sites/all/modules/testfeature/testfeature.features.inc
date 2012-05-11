<?php
/**
 * @file
 * testfeature.features.inc
 */

/**
 * Implements hook_node_info().
 */
function testfeature_node_info() {
  $items = array(
    'feedii' => array(
      'name' => t('India feed item'),
      'base' => 'node_content',
      'description' => t('This content type is being used for automatically aggregated content from India rss feeds'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
