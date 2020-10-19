<article <?php post_class('c-post') ?>>
  <div class="c-post__inner">
    <?php if (!is_single()) { ?>
      <?php if (get_the_post_thumbnail() !== '') { ?>
        <div class="c-post__thumbnnail">
          <?php the_post_thumbnail('large') ?>
        </div>
      <?php } ?>
    <?php } ?>

    <?php get_template_part('template-parts/post/header', '_themename') ?>

    <?php if (is_single()) { ?>
      <div class="c-post__content">
        <?php the_content();
        wp_link_pages();
        ?>
      </div>
    <?php } else { ?>
      <div class="c-post__excerpt">
        <?php the_excerpt() ?>
      </div>
    <?php } ?>

    <?php if (is_single()) { ?>
      <?php get_template_part('template-parts/post/footer', '_themename') ?>
      <?php get_template_part('template-parts/single/navigation-single'); ?>
    <?php } ?>

    <?php if (!is_single()) { ?>
      <?php _themename_readmore_link() ?>
    <?php } ?>
  </div>
  <div class="c-food-page__blog-link c-food-page__blog-link--single">
    <a href="index.php?page_id=15"><?php the_field('blog_page_link_text', 438); ?></a>
  </div>
</article>