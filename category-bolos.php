<?php get_header(); ?>

<div class="o-container">
  <div class="yoast__breadcrumbs">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
  </div>

  <div class="c-blog__header c-blog__header-cat">
    <div class="c-blog__header--top c-blog__header--top-cat u-flex u-flex-wrap u-justify-justify u-align-middle">
      <h1><?php the_field('latest_cake_articles_title', 433); ?></h1>
      <div class="c-blog-page__blog-link">
        <a href="index.php?page_id=15"><?php the_field('blog_page_link_text', 438); ?></a>
      </div>
    </div>
  </div>
</div>

<div class="c-blog__articles u-flex u-flex-wrap u-justify-evenly">
  <?php
  $args = array(
    // get which post types that are to be used
    'post_type'         => 'post',
    'posts_per_page'    => 9,
    'category_name'  => 'bolos',
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

  wp_reset_postdata(); ?>
  <div class="c-food-page__blog-link">
    <a href="index.php?page_id=15"><?php the_field('blog_page_link_text', 433); ?></a>
  </div>
</div>



<?php get_footer(); ?>