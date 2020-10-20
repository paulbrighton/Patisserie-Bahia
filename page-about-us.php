<?php get_header(); ?>

<div class="c-about">
  <div class="yoast__breadcrumbs">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
  </div>
  <div class="c-about__container o-container">

    <div class="o-row c-about__intro">
      <div class="o-row__column o-row__column-span--12 o-row__column--span-12@small o-row__column--span-5@large c-about__intro-image">
        <?php
        $image = get_field('about_image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($image) {
          echo wp_get_attachment_image($image, $size);
        }
        ?>
      </div>
      <div class="o-row__column o-row__column-span--12 o-row__column--span-12@small o-row__column--span-7@large c-about__intro-text u-flex u-justify-justify u-align-middle">
        <div class="c-about__intro-quote">
          <h1><?php the_field('about_title'); ?></h1>
          <p><q><?php the_field('about_quote'); ?></q></p>
        </div>
      </div>
    </div>
    <div class="c-about__body-text u-flex u-flex-direction-column u-justify-justify u-align-middle">
      <?php the_field('about_text') ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>