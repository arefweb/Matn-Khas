<?php
/**
 * @package matn-khas
 */

if(!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')){
  die();
}

global $wpdb;
$wpdb->query(
  $wpdb->prepare(
    "DELETE FROM $wpdb->posts WHERE post_type = %s",
    'matn'
  )
);
if ($wpdb->show_errors()){
  $wpdb->print_error();
}