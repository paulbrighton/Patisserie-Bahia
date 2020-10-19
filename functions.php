<?php

// Import php files from lib folder
require_once('lib/customize.php');
require_once('lib/helpers.php');
require_once('lib/enqueue-assets.php');
require_once('lib/sidebars.php');
require_once('lib/theme-support.php');
require_once('lib/navigation.php');
require_once('lib/delete-post.php');
require_once('lib/comment-callback.php');
require_once('lib/images.php');
require_once('lib/portfolio.php');
require_once('lib/most-recent-widget.php');
require_once('lib/translations.php');
require_once('lib/metaboxes.php');
require_once('lib/woocommerce.php');
require_once('lib/blog.php');
require_once('lib/contact-form.php');

// add_filter('widget_posts_args', 'widget_posts_args_add_custom_type'); 
// function widget_posts_args_add_custom_type($params) {
//    $params['post_type'] = array('post','custom_type');
//    return $params;
// }

// add_action( 'gdpr_enqueue_lity_nojs', '__return_false' );

// add_action( 'wp_head', 'se343581_add_preload_tag', 5);
// function se343581_add_preload_tag()
// {
//     echo '<link rel="preload" href="'. 
//          plugins_url('/gdpr-cookie-compliance/dist/styles/lity.css') .
//          '" as="style">';
    //
    // -- if added in plugin file --
//     // echo '<link rel="preload" href="' . plugin_dir_url( __FILE__ ) . 'some_subdir/file_name.css" as="style">';
// }

// add_filter('autoptimize_filter_noptimize','noptimize_contact',10,0);
// function noptimize_contact() {
// 	if (strpos($_SERVER['REQUEST_URI'],'test-2')!==false) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// }