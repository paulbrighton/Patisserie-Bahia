<?php

// if statement allows the funtion to be overwritten in the child theme
if(!function_exists('_themename_post_meta_date')) {
  function _themename_post_meta_date() {
    /* translators: %s: Post Date */
    printf(
      esc_html__('Posted on %s', '_themename'),
      '<span>' . '<a href="' . esc_url(get_permalink()) . '">' . '<time datetime="' . esc_attr(get_the_date("c")) . '">' .  esc_html(get_the_date()) . '</time>' . '</a>' . '</span>'
    );
  }
}

// if statement allows the funtion to be overwritten in the child theme
if(!function_exists('_themename_post_meta_author')) {
  function _themename_post_meta_author() {
    
   /* translators: %s: Post Author */
    printf(
      esc_html__(' By %s', '_themename'),
      '<span>' . '<a href="' . esc_url(get_author_posts_url(get_the_author_meta("ID"))) . '">' . esc_html(get_the_author()) . '</a>' . '</span>'
    );
  }
}

function _themename_readmore_link() {
  echo '<a class="c-post__readmore" href="' . esc_url(get_permalink()) . '" title="' . the_title_attribute(['echo' => false]) . '">';
  printf(
    wp_kses(
       /* translators: %s: Post Title */
    __('Read More... <span class="u-screen-reader-text">About %s</span>', '_themename'),
      [
        'span' => [
          'class' => []
        ]
      ]
    ),
    get_the_title()
  );
  echo '</a>';
}

function _themename_delete_post() {
  $url = add_query_arg([
      'action' => '_themename_delete_post',
      'post' => get_the_ID(),
      'nonce' => wp_create_nonce( '_themename_delete_post_' . get_the_ID() )
  ], home_url());
  if(current_user_can( 'delete_post', get_the_ID() )) {
      return "<a href='" . esc_url($url) . "'>" . esc_html__( 'Delete Post', '_themename' ) . "</a>";
  }
}

function _themename_meta($id, $key, $default) {
  $value = get_post_meta( $id, $key, true);
  if(!$value && $default) {
    return $default;
  }
  return $value;
 }