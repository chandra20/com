<?php
// $Id: auto_expire.views.inc,v 1.1 2009/06/28 22:55:18 marcvangend Exp $

/**
 * @file
 * Auto Expire automatically expires nodes after a node has been published for a certain time.
 * The module can also send out warnings before expiry and purge expired nodes afterwards.
 */

/*
 * Implementation of hook_views_data().
 */
/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function auto_expire_views_data() {
  $data['auto_expire']['table']['group'] = t('Auto Expire');

  $data['auto_expire']['table']['join'] = array(
    'node' => array(
      'left_field' => 'nid',
      'field' => 'nid',
    ),
  );

  // Node ID field.
  $data['auto_expire']['nid'] = array(
    'title' => t('Node ID'),
    'help' => t('The node the expiration date applies to.'),
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Example node'),
    ),
  );

  // Warned field.
  $data['auto_expire']['warned'] = array(
    'title' => t('Warned'),
    'help' => t('Whether the author has been warned for expiration since the last extension.'),
    'field' => array(
      'handler' => 'views_handler_field_boolean',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_boolean_operator',
      'label' => t('Warned'),
      'type' => 'yes-no',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );

  // Extended field.
  $data['auto_expire']['extended'] = array(
    'title' => t('Extended'),
    'help' => t('Number of times the node has been extended.'),
    'field' => array(
      'handler' => 'views_handler_field_numeric',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );

  // Expiration date field.
  $data['auto_expire']['expire'] = array(
    'title' => t('Expiration date'),
    'help' => t('Date and time of expiration for this node.'),
    'field' => array(
      'handler' => 'views_handler_field_date',
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort_date',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_date',
    ),
  );

  // Extend link field.
  $data['auto_expire']['extend_node'] = array(
    'field' => array(
      'title' => t('Extend link'),
      'help' => t('Provide a simple link to extend the node.'),
      'handler' => 'views_handler_field_auto_expire_link_extend',
    ),
  );
  return $data;
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function auto_expire_views_handlers() {
  return array(
    'handlers' => array(
      'views_handler_field_auto_expire_link_extend' => array(
        'parent' => 'views_handler_field_node_link',
      ),
    ),
  );
}
