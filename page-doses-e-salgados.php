<?php get_header(); ?>
<div class="o-container">
  <div class="yoast__breadcrumbs">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
  </div>
</div>

<div class="o-container c-sweet-savoury">
  <div class="o-row c-sweet-savoury__intro c-sweet-savoury__intro-sweet">
    <div class="o-row__column o-row__column--span-12 o-row__column--span-7@large c-sweet-savoury__intro-sweet-text">
      <h1><?php the_field('sweet_intro_title', 438); ?></h1>
      <div><?php the_field('sweet_intro_text', 438); ?></div>
    </div>
    <div class="o-row__column o-row__column--span-12 o-row__column--span-5@large c-sweet-savoury__intro-sweet-image">
      <?php
      $image = get_field('sweet_intro_image', 438);
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      if ($image) {
        echo wp_get_attachment_image($image, $size);
      }
      ?>
    </div>
  </div>
</div>

<div class="c-sweet-savoury c-sweet-savoury__savoury">
  <div class="o-container">
    <div class="o-row c-sweet-savoury__intro c-sweet-savoury__intro-savoury">
      <div class="o-row__column o-row__column-span--12 o-row__column--span-12@small o-row__column--span-7@large c-sweet-savoury__intro-savoury-text">
        <h2><?php the_field('savoury_intro_title', 440); ?></h2>
        <div><?php the_field('savoury_intro_text', 440); ?></div>
      </div>
      <div class="o-row__column o-row__column-span--12 o-row__column--span-12@small o-row__column--span-5@large c-sweet-savoury__intro-savoury-image">
        <?php
        $image = get_field('savoury_intro_image', 440);
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($image) {
          echo wp_get_attachment_image($image, $size);
        }
        ?>
      </div>
    </div>
  </div>
</div>
</div>


<div class="c-sweet-savoury c-sweet-savoury__price">
  <div class="c-sweet-savoury__price-description">
    <h3><?php the_field('savoury_price_list_title', 440); ?></h3>
    <?php the_field('price_list_description'); ?>
  </div>
  
  <div class="price-table">
    <?php the_content(); ?>
  </div>
</div>

<div class="c-sweet-savoury__blog-posts-container">
  <div class="c-sweet-savoury c-sweet-savoury__blog-posts">
    <h3><?php the_field('articles_header_title'); ?></h3>
    <div class="u-flex u-flex-wrap u-justify-evenly">
      <?php get_template_part('loop', 'sweet-savoury') ?>
      <div class="c-sweet-savoury__blog-link">
        <a href="index.php?page_id=15"><?php the_field('blog_page_link_text', 440); ?></a>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>