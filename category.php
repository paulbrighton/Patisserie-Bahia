<?php get_header(); ?>
<?php
$args = array(
  'post_type'         => 'post',
  'posts_per_page'    => 9,
);
$the_query = new WP_Query($args); ?>

<div class="o-container">
  <div class="yoast__breadcrumbs">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
  </div>
  <div class="o-row">
    <div class="o-row-column c-category">
      <h2 class="c-blog__header-title">Artigos Mais Recentes</h2>
    </div>

    <div class="o-row__column o-row__column--span-12@small u-flex u-flex-wrap u-justify-spaced">
      <?php get_template_part('loop', 'blog') ?>
    </div>

    <div class="c-food-page__blog-link">
      <a href="index.php?page_id=15"><?php the_field('blog_page_link_text', 438); ?></a>
    </div>
  </div>
</div>
<?php get_footer(); ?>