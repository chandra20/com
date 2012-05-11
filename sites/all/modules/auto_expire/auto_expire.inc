<?php
// $Id: auto_expire.inc,v 1.4 2009/06/28 22:55:18 marcvangend Exp $
/**
 * @file
 * Auto Expire automatically expires nodes after a node has been published for a certain time.
 * The module can also send out warnings before expiry and purge expired nodes afterwards.
 */
/**
 * @file
 * Define constants for the Auto Expire module
 */

// Content types that auto expire
define('AUTO_EXPIRE_NODE_TYPE', 'auto_expire_');
define('AUTO_EXPIRE_EMAIL', 'auto_expire_email_');

// Permissions
define('ADMINISTER_AUTO_EXPIRE', 'administer auto expire');
define('EXTEND_AUTO_EXPIRE_OWN', 'extend expiring own content');
define('EXTEND_AUTO_EXPIRE_ALL', 'extend expiring all content');

define('AUTO_EXPIRE_DAYS', 30);
define('AUTO_EXPIRE_WARN', 5);
define('AUTO_EXPIRE_PURGE', 60);
