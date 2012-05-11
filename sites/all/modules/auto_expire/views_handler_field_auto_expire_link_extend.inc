<?php
// $Id: views_handler_field_auto_expire_link_extend.inc,v 1.1 2009/06/28 22:55:18 marcvangend Exp $
/**
 * @file
 * Auto Expire automatically expires nodes after a node has been published for a certain time.
 * The module can also send out warnings before expiry and purge expired nodes afterwards.
 */
/**
 * Field handler to present an extend node link.
 */
class views_handler_field_auto_expire_link_extend extends views_handler_field_node_link {
  function construct() {
    parent::construct();
  }

  function render($values) {

    $nid = $values->{$this->aliases['nid']};

    // check if user has rights to extend
    if (_auto_expire_can_user_extend($nid)) {
      // check if node is 'extendable' at this moment
      $expire = _auto_expire_get_expire($nid);
      $code = auto_expire_NODE_TYPE . $node->type;
      $warn = variable_get($code . '_w', AUTO_EXPIRE_WARN);
      if (REQUEST_TIME > $expire - ($warn * 24 * 60 * 60)) {
        $text = !empty($this->options['text']) ? $this->options['text'] : t('extend');
        return l($text, "node/$nid/expiry", array('query' => drupal_get_destination()));
      }
    }
    return;

  }
}
