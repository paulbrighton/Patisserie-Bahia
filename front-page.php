<?php get_header(); ?>
<div class="o-container-full c-hero">
  <div style="background: url('<?php the_field('hero_image_desktop'); ?>') center center; background-size: cover;" class="c-hero c-front-page u-flex u-align-middle u-justify-left">
    <div class="c-hero__text u-flex">
      <div class="c-hero__text-container">
        <p class="c-hero__text--top">
          <?php the_field('hero_text_top'); ?>
        </p>

        <div class="c-hero__text--middle">
          <?php
          $image = get_field('hero_text_middle');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if ($image) {
            echo wp_get_attachment_image($image, $size);
          }
          ?>
        </div>

        <p class="c-hero__text--bottom">
          <?php the_field('hero_text_bottom'); ?>
        </p>
      </div>
    </div>
  </div>
</div>
<!-- End: hero -->

<div class="o-container c-who-we-are c-front-page">
  <div class="o-row c-who-we-are__container">
    <div class="o-row__column o-row__column--span-12 o-row__column--span-6@large c-who-we-are__text">
      <h1><?php the_field('who_we_are_title'); ?></h1>
      <div class="c-who-we-are__text-body">
        <?php the_field('who_we_are_text'); ?>
      </div>
      <div class="c-button__container">
        <a href="<?php the_field('who_we_are_link'); ?>" class="c-button c-button--customize"><?php the_field('who_we_are_link_text'); ?></a>
      </div>
    </div>

    <!-- <div class="o-row__column o-row__column--span-12 o-row__column--span-1@large"></div> -->

    <div class="o-row__column o-row__column--span-12 o-row__column--span-6@large c-who-we-are__image">
      <?php
        if (wp_is_mobile()) {
          $image = get_field('who_we_are_image');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if ($image) {
            echo wp_get_attachment_image($image, $size);
          }
        } else {
          $video_mp4 =  get_field('home_page_video'); // MP4 Field Name
          $video_poster  = get_field('poster_image');

          $attr =  array(
            'mp4'      => $video_mp4,
            'src'      => '',
            'poster'   => $video_poster,
            'loop'     => '1',
            'autoplay' => 'on',
            'preload'  => 'metadata',
            'width'    => 960,
            'height'   => 640,
            'class'    => 'wp-video-shortcode',
            'muted'    => '1'
          );

          echo wp_video_shortcode($attr);
        }
      ?>
    </div>
  </div>
</div>
<!-- End: who we are -->
<div class="o-container--full c-our-food c-front-page">
  <div class="o-container">
    <div class="o-row c-our-food__container">
      <div class="o-row__column o-row__column--span-12 o-row__column--span-6@large c-our-food__image">
        <?php
        $image = get_field('our_food_image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($image) {
          echo wp_get_attachment_image($image, $size);
        }
        ?>
      </div>

      <!-- <div class="o-row__column o-row__column--span-12 o-row__column--span-1@medium"></div> -->

      <div class="o-row__column o-row__column--span-12 o-row__column--span-6@large c-our-food__text">
        <h2><?php the_field('our_food_title'); ?></h2>
        <div class="c-our-food__text-body">
          <?php the_field('our_food_text'); ?>
        </div>
        <div class="c-button__container c-our-food__link">
          <a href="<?php the_field('who_we_are_link'); ?>" class="c-button c-button--customize"><?php the_field('who_we_are_link_text'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End: our food -->

<div class="o-container c-customize c-front-page">
  <div class="o-row c-customize__container">
    <div class="o-row__column o-row__column--span-12 o-row__column--span-6@large c-customize__text">
      <h2><?php the_field('customize_cake_title'); ?></h2>
      <div class="c-customize__text-body">
        <?php the_field('customize_cake_text'); ?>
      </div>
      <div class="c-button__container">
        <a href="<?php the_field('customize_cake_button_link'); ?>" class="c-button c-button--customize"><?php the_field('customize_cake_button_text'); ?></a>
      </div>
    </div>

    <!-- <div class="o-row__column o-row__column--span-12 o-row__column--span-1@medium"></div> -->

    <div class="o-row__column o-row__column--span-12 o-row__column--span-6@large c-customize__image">
      <?php
      $image = get_field('customize_cake_image');
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      if ($image) {
        echo wp_get_attachment_image($image, $size);
      }
      ?>
    </div>
  </div>
</div>
<!-- End: customize -->

<div class="c-selection">
  <div class="o-container c-selection__container c-front-page">
    <div class="o-row">

      <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium c-selection__card">
        <h3 class="c-selection__card-title"><?php the_field('savoury_snacks_card_title'); ?></h3>
        <div class="c-selection__card-icon u-margin-bottom-25">
          <?php
          $image = get_field('savoury_snacks_card_image');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if ($image) {
            echo wp_get_attachment_image($image, $size);
          }
          ?>
        </div>

        <div class="c-selection__card-text">
          <p><?php the_field('savoury_snacks_card_text'); ?></p>
        </div>

        <div class="c-button__container u-flex u-justify-center">
          <a href="<?php the_field('savoury_snacks_card_button_link'); ?>" class="c-button c-button--selection-card"><?php the_field('savoury_snacks_card_button_text'); ?></a>
        </div>
      </div>

      <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium c-selection__card">
        <h3 class="c-selection__card-title"><?php the_field('sweet_treats_card_title'); ?></h3>
        <div class="c-selection__card-icon u-margin-bottom-25">
          <?php
          $image = get_field('sweet_treats_card_image');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if ($image) {
            echo wp_get_attachment_image($image, $size);
          }
          ?>
        </div>

        <div class="c-selection__card-text">
          <p><?php the_field('sweet_treats_card_text'); ?></p>
        </div>

        <div class="c-button__container u-flex u-justify-center">
          <a href="<?php the_field('sweet_treats_card_button_link'); ?>" class="c-button c-button--selection-card"><?php the_field('sweet_treats_card_button_text'); ?></a>
        </div>
      </div>

      <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium c-selection__card">
        <h3 class="c-selection__card-title"><?php the_field('cake_selection_title'); ?></h3>
        <div class="c-selection__card-icon u-margin-bottom-25">
          <?php
          $image = get_field('cake_selection_image');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if ($image) {
            echo wp_get_attachment_image($image, $size);
          }
          ?>
        </div>

        <div class="c-selection__card-text">
          <p><?php the_field('cake_selection_text'); ?></p>
        </div>

        <div class="c-button__container u-flex u-justify-center">
          <a href="<?php the_field('cake_selection_button_link'); ?>" class="c-button c-button--selection-card"><?php the_field('cake_selection_button_text'); ?></a>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- End: selection -->

<div class="c-sweet-treats c-front-page">
  <div class="c-sweet-treats__text">
    <div class="c-sweet-treats__text-container">
      <h3 class="c-sweet-treats__title"><?php the_field('sweet_treats_title'); ?></h3>
      <p class="c-sweet-treats__text-body"><?php the_field('sweet_treats_text'); ?></p>
      <a href="<?php the_field('sweet_treats_button_link'); ?>" class="c-button c-button--sweet-treats"><?php the_field('sweet_treats_button_text'); ?></a>
    </div>
  </div>

  <div class="c-sweet-treats__image">
    <?php
    $image = get_field('sweet_treats_image');
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    if ($image) {
      echo wp_get_attachment_image($image, $size);
    }
    ?>
  </div>
</div>
<!-- End: sweet treats -->

<div class="c-savoury-snacks c-front-page">
  <div class="c-savoury-snacks__image">
    <?php
    $image = get_field('savoury_snacks_image');
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    if ($image) {
      echo wp_get_attachment_image($image, $size);
    }
    ?>
  </div>

  <div class="c-savoury-snacks__text">
    <div class="c-savoury-snacks__text-container">
      <h3 class="c-savoury-snacks__title"><?php the_field('savoury_snacks_title'); ?></h3>
      <p class="c-savoury-snacks__text-body"><?php the_field('savoury_snacks_text'); ?></p>
      <a href="<?php the_field('savoury_snacks_button_link'); ?>" class="c-button c-button--savoury-snacks"><?php the_field('savoury_snacks_button_text'); ?></a>
    </div>
  </div>
</div>
<!-- End: savoury snacks -->

<div class="o-container-full c-front-page c-social-container">
  <div class="o-container c-social">
    <div class="o-row">
      <div class="o-row__column o-row__column--span-12">
        <h3><?php the_field('social_media_title'); ?></h3>
        <?php echo do_shortcode('[custom-facebook-feed class="slideshow"]'); ?>
      </div>
    </div>
  </div>
</div>
<!-- End: social -->
<?php get_footer(); ?>