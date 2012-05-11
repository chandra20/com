<?php

/**
 * @file
 *
 * Script to generate ab tests for logged in users using sessions from database.
 * This script is based on an older script by 2bits for load testing Drupal 5,
 * located at: http://goo.gl/4pfku
 *
 * Place this script into the webroot of your Drupal site.
 *
 * Usage (from command line):
 *   # [PATH_TO_SCRIPT] [HTTP_HOST] [URL_TO_TEST] [#_SESSIONS] [#_REQUESTS]
 *   $ php /path/to/drupal/root/ab-testing-cli.php example.com http://www.example.com/ 2 200
 *
 * After the script runs, it will output a list of commands for you to use to
 * test your website as a logged-in user.
 */

// Set the variable below to your Drupal root (on the server).
$drupal_root = '/path/to/drupal/root/';

// If arguments not supplied properly, warn user.
if ($argc != 5) {
  $prog = basename($argv[0]);
  print "Usage: $prog host url concurrency num_requests\n";
  exit(1);
}

// Get the arguments for ab.
$url = $argv[2];
$number_concurrency = $argv[3];
$number_requests = $argv[4];

// Set this directory to your drupal root directory.
chdir($drupal_root);

// Set up required variables to help Drupal bootstrap the correct site.
$_SERVER['HTTP_HOST'] = $argv[1];
$_SERVER['PHP_SELF'] = basename(__file__);
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
define('DRUPAL_ROOT', getcwd());

// Boostrap Drupal.
require_once('./includes/bootstrap.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// Get as many sessions as the user calls for.
$results = db_query_range("SELECT sid FROM {sessions} WHERE uid > 1", 0, $number_concurrency)->fetchAll();

// Loop through the results and print the proper ab command for each session.
foreach ($results as $result) {
  $cookie = session_name() . '=' . $result->sid;
  print "ab -c 1 -n $number_requests -C $cookie $url\n";
}

