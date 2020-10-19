</main>
<?php if (!is_page(array('contact'))) { ?>
  <div class="c-brand c-front-page">
    <div class="o-container c-brand-info">
      <div class="o-row c-brand-info__container">
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium c-brand-info__social">
          <h4><?php the_field('brand_info_social_media_title', 9); ?></h4>
          <div class="o-row c-brand-info__social-icons">
            <a href="<?php the_field('brand_info_social_media_link_1', 9) ?>" target="_blank" rel="noreferrer">
              <div class="o-row__column o-row__column--span-6 c-brand-info__social-logo c-brand-info__social-icons--instagram">
                <?php
                $image = get_field('brand_info_social_media_icon_1', 9);
                $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
                if ($image) {
                  echo wp_get_attachment_image($image, $size);
                }
                ?>
              </div>
            </a>
            <a href="<?php the_field('brand_info_social_media_link_2', 9) ?>" target="_blank" rel="noreferrer">
              <div class="o-row__column o-row__column--span-6 c-brand-info__social-logo c-brand-info__social-icons--facebook">
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

        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium c-brand-info__logo">
          
          <?php
          $image = get_field('hero_text_middle', 9);
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if ($image) {
            echo wp_get_attachment_image($image, $size);
          }
          ?>
        <p class="c-brand-info__logo-text-bottom">
          <?php the_field('hero_text_bottom'); ?>
        </p>
        </div>

        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium c-brand-info__contact">
          <div class="c-brand-info__contact-text">
            <h4><?php the_field('brand_info_contact_title', 9); ?></h4>
            <p><?php the_field('brand_info_contact_text_top', 9); ?> <span><a href=""><?php the_field('contact_email', 17); ?></a></span></p>
            <p><?php the_field('brand_info_contact_text_bottom', 9); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
<footer class="c-footer" id="footer" role="contentinfo">
  <div class="c-footer__top">
    <?php get_template_part('template-parts/footer/widgets') ?>
  </div>
  <div class="c-footer__bottom">
    <?php get_template_part('template-parts/footer/site-info') ?>
  </div>

</footer>

<?php wp_footer(); ?>
</body>

</html>