<?php
$args = array(
  // get which post types that are to be used
  'post_type'         => 'post',
  'posts_per_page'    => 3,
  'category_name'  => 'savoury',
  'order'         => 'asc'
);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) {
  while ($the_query->have_posts()) {
    $the_query->the_post();
    get_template_part('template-parts/post/content-blog', get_post_format());
  }
} else {
  get_template_part('template-parts/post/content', 'none');
}

wp_reset_postdata();
