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

add_filter( 'wp_video_shortcode', function( $output ) {
    if ( false !== strpos( $output, 'autoplay="1"' ) ) {
        $output = str_replace( '<video', '<video muted', $output );
    }
    return $output;
} );

add_shortcode( 'video', function ( $atts, $content ) 
{
    $output = wp_video_shortcode( $atts, $content );

    if( ! isset( $atts['muted'] ) || ! wp_validate_boolean( $atts['muted'] ) ) 
        return $output;

    if( false !== stripos( $output, ' muted="1"' ) )
        return $output;

    return str_ireplace( '<video ', '<video muted="1" ', $output ); 
} );