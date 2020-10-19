<?php get_header(); ?>
<!-- <div class="o-container-full c-header-hero">
  <div style="background: url('<?php the_field('savoury_hero_image'); ?>') center center; background-size: cover;" class="c-header-hero c-blog-page u-flex u-align-middle u-justify-left">
    <div class="c-header-hero__text u-flex">
      <h1 class="c-header-hero__header-title"><?php the_field('savoury_hero_title') ?></h1>
    </div>
  </div>
</div> -->

<div class="o-container">
  <div class="yoast__breadcrumbs">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
  </div>
</div>

<div class="o-container c-food-page">
  <div class="o-row c-food-page__intro">
    <div class="o-row__column o-row__column-span--12 o-row__column--span-12@small o-row__column--span-7@medium o-row__column--span-6@large c-food-page__intro--text">
      <h2><?php the_field('savoury_intro_title'); ?></h2>
      <div><?php the_field('savoury_intro_text'); ?></div>
    </div>
    <div class="o-row__column o-row__column-span--12 o-row__column--span-12@small o-row__column--span-5@medium o-row__column--span-6@large c-food-page__intro--image">
      <?php
      $image = get_field('savoury_intro_image');
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      if ($image) {
        echo wp_get_attachment_image($image, $size);
      }
      ?>
    </div>
  </div>

  <div class="o-row">
    <div class="o-row__column c-food-page__price">
      <h3><?php the_field('savoury_price_list_title'); ?></h3>
      <div class="price-table--salgados">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

  <div class="c-food-page__blog-posts">
    <h3><?php the_field('savoury_articles_list_title'); ?></h3>
    <div class="u-flex u-flex-wrap u-justify-evenly">
      <?php get_template_part('loop', 'savoury') ?>
      <div class="c-food-page__blog-link">
        <a href="index.php?page_id=15"><?php the_field('blog_page_link_text'); ?></a>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>