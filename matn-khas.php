<?php
/**
 * Plugin Name: Matn Khas
 * Plugin URI: https://arefweb.ir
 * Description: This is a simple plugin for educational purposes
 * Version: 1.0.0
 * Author: Aref Movahedzadeh
 * Author URI: https://arefweb.ir
 * Requires PHP: 5.6
 * Licence: GPLv2 or later
 * @package matn-khas
 * Text Domain: matn-khas
 */


if (! defined('ABSPATH')){
  die();
}


class MatnKhas{
  function activate(){
    $this->custom_post_type();
    flush_rewrite_rules();
  }

  function deactivate(){
    unregister_post_type( 'matn' );
    flush_rewrite_rules();
  }

  function custom_post_type(){
    register_post_type('matn',
      array(
        'labels'      => array(
          'name'          => __( 'Matns', 'matn-khas' ),
          'singular_name' => __( 'Matn', 'matn-khas' ),
        ),
        'public'      => true,
        'rewrite'     => array( 'slug' => 'matn' ), // my custom slug
      )
    );
  }
}

if (class_exists('MatnKhas')){
  $matnKhas = new MatnKhas();
}

register_activation_hook( __FILE__, array($matnKhas, 'activate'));

register_deactivation_hook( __FILE__, array($matnKhas, 'deactivate') );

add_action('init', array($matnKhas, 'custom_post_type'));