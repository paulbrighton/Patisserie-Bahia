<?php

function _themename_assets() {
  wp_enqueue_style( '_themename_stylesheet', get_template_directory_uri() . '/dist/assets/css/main.css', array(), '1.0.0', 'all' );

  // Include jQuery as a dependancy if using
  wp_enqueue_script( '_themename_scripts', get_template_directory_uri() . '/dist/assets/js/main.js', array('jquery'), '1.0.0', true );

  if( is_singular() && comments_open() && get_option( 'thread_comments' )) {
    wp_enqueue_script( 'comment-reply' );
  }
}

add_action( 'wp_enqueue_scripts', '_themename_assets' );

function _themename_admin_assets() {
  wp_enqueue_style( '_themename_admin_stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), '1.0.0', 'all' );

  wp_enqueue_script( '_themename_admin_scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array(), '1.0.0', true );
}

add_action( 'admin_enqueue_scripts', '_themename_admin_assets' );

function _themename_customize_preview_js () {
  wp_enqueue_script( '_themename-cutomize-preview', get_template_directory_uri() . '/dist/assets/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0' , true );
}

add_action( 'customize_preview_init', '_themename_customize_preview_js' );

// function enqueue_load_fa() {
// wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.13.1/css/all.css' );
// }

// add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );