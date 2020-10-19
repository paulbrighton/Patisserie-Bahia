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

<div class="o-container c-contact__container">
  <h1><?php the_field('contact_hero_text'); ?></h1>
  <div class="c-contact u-flex">
    <div class="c-contact__info">
      <h2><?php the_field('contact_info_title'); ?></h2>
      <!-- <div class="c-contact__info-address">
        <h4><?php the_field('address_title') ?></h4>
        <p><?php the_field('address_line_1'); ?></p>
        <p><?php the_field('address_line_2'); ?></p>
        <p><?php the_field('address_line_3'); ?></p>
        <p><?php the_field('address_line_4'); ?></p>
        <p><?php the_field('address_line_5'); ?></p>
        <p><?php the_field('address_line_6'); ?></p>
      </div> -->

      <div class="c-contact__info-email">
        <h4><?php the_field('email_title') ?></h4>
        <p><a href="mailto:<?php the_field('contact_email_link') ?>"><?php the_field('contact_email') ?></a></p>
      </div>

      <div class="c-contact__info-phone">
        <h4><?php the_field('phone_number_title') ?></h4>
        <a href="tel:<?php the_field('contact_phone_number_link') ?>"><?php the_field('contact_phone_number') ?></a>
      </div>

      <div class="c-contact__info-social-media">
        <h4><?php the_field('brand_info_social_media_title', 9); ?></h4>
        <div class="c-contact__info-social-icons">

          <a href="<?php the_field('brand_info_social_media_link_1', 9) ?>" target="_blank">
            <div class="c-contact__info__social-logo c-brand-info__social-icons--instagram">
              <?php
              $image = get_field('brand_info_social_media_icon_1', 9);
              $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
              if ($image) {
                echo wp_get_attachment_image($image, $size);
              }
              ?>
            </div>
          </a>
          <a href="<?php the_field('brand_info_social_media_link_2', 9) ?>" target="_blank">
            <div class="c-contact__info__social-logo c-brand-info__social-icons--facebook">
              <?php
              $image = get_field('brand_info_social_media_icon_2', 9);
              $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
              if ($image) {
                echo wp_get_attachment_image($image, $size);
              }
              ?>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="c-contact__form">
      <h2><?php the_field('contact_form_title') ?></h2>
      <p><?php the_field('contact_form_description') ?></p>
      <?php echo do_shortcode('[contact-form-7 id="30" title="Contact form 1" html_class="c-contact-form"]'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>