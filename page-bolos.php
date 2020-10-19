<?php get_header(); ?>
<!-- <div class="o-container-full c-header-hero">
  <div style="background: url('<?php the_field('cake_hero_image'); ?>') center center; background-size: cover;" class="c-header-hero c-blog-page u-flex u-align-middle u-justify-left">
    <div class="c-header-hero__text u-flex">
      <h1 class="c-header-hero__header-title"><?php the_field('cake_hero_text') ?></h1>
    </div>
  </div>
</div> -->

<div class="o-container c-food-page">
  <div class="yoast__breadcrumbs">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
  </div>
  <div class="o-row c-food-page__intro">
    <div class="o-row__column o-row__column-span--12 o-row__column--span-12@small o-row__column--span-7@large c-food-page__intro--text">
      <h1><?php the_field('cake_intro_title'); ?></h1>
      <div><?php the_field('cake_intro_text'); ?></div>
    </div>
    <div class="o-row__column o-row__column-span--12 o-row__column--span-12@small o-row__column--span-5@large c-food-page__intro--image">
      <?php
      $image = get_field('cake_intro_image');
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      if ($image) {
        echo wp_get_attachment_image($image, $size);
      }
      ?>
    </div>
  </div>
</div>

<div class="c-food-page c-food-page__how-it-works__container">
  <div class="c-food-page__how-it-works">
    <h2><?php the_field('custom_cake_title'); ?></h2>
    <ol>
      <li><?php the_field('custom_cake_list_item_1'); ?></li>
      <li><?php the_field('custom_cake_list_item_2'); ?></li>
      <li><?php the_field('custom_cake_list_item_3'); ?></li>
      <li><?php the_field('custom_cake_list_item_4'); ?></li>
      <li><?php the_field('custom_cake_list_item_5'); ?></li>
      <li><?php the_field('custom_cake_list_item_6'); ?></li>
      <li><?php the_field('custom_cake_list_item_7'); ?></li>
    </ol>
  </div>
</div>

<div class="c-food-page c-food-page__price-list">
  <div class="c-food-page__price-list-description">
    <h3><?php the_field('price_list_title'); ?></h3>
    <?php the_field('price_list_description'); ?>
  </div>
  <div class="price-table">
    <?php the_content(); ?>
  </div>
</div>

<div class="c-food-page c-food-page__blog-posts__container">
  <div class="c-food-page__blog-posts">
    <h3><?php the_field('articles_header_title', 930); ?></h3>
    <div class="u-flex u-flex-wrap u-justify-evenly">
      <?php get_template_part('loop', 'sweet-savoury') ?>
      <div class="c-food-page__blog-link">
        <a href="index.php?page_id=15"><?php the_field('blog_page_link_text'); ?></a>
      </div>
    </div>
  </div>
</div>



<?php get_footer(); ?>