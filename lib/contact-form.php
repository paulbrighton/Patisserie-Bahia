<?php
/**
 * Removes the CF7 scripts if the shortcode is not on the page
 */
function mm_deregister_cf7_scripts() {
  if (class_exists('WPCF7')) {
      global $wp_query;
      $content = '';

      if ($wp_query->post) :
          $content = $wp_query->post->post_content;
      endif;

      if (!has_shortcode($content, 'contact-form-7')) {
        //   wp_deregister_script('google-recaptcha');
          wp_deregister_script('contact-form-7');
      }
  }
}

add_action('wp_enqueue_scripts', 'mm_deregister_cf7_scripts');
