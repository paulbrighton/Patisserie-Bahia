<?php
/* Template Name: Blog Page */
?>

<?php get_header(); ?>

<?php
$args = array(
  'post_type'         => 'post',
  'posts_per_page'    => 3,
  'paged'             => $paged
);
$the_query = new WP_Query($args); ?>

<div class="c-header-hero">
  <div style="background: url('<?php the_field('blog_header_image_desktop'); ?>') center center; background-size: cover;" class="c-header-hero c-blog-page u-flex u-align-middle u-justify-left"></div>
</div>

<div class="o-container c-blog u-margin-bottom-40">
  <div class="yoast__breadcrumbs">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
  </div>

  <div class="c-blog__header">
    <div class="c-blog__header--top u-flex u-align-middle">
      <h1 class="c-blog__header-title"><?php the_field('blog_page_header_title') ?></h1>
      <div class="cat__form">
        <p><?php esc_html_e('Select a category:', '_themename'); ?> </p>
        <form id="category-select" class="custom-select category-select u-flex u-flex-direction-row-reverse" action="<?php echo esc_url(home_url('/')); ?>" method="get">

          <?php wp_dropdown_categories(); ?>

          <input type="submit" value="<?php esc_html_e('View', '_themename'); ?>" />

        </form>
      </div>
    </div>
  </div>

  <div class="u-flex u-flex-wrap u-justify-spaced c-blog-posts">
    <?php get_template_part('loop', 'blog') ?>
  </div>

  <div class="c-blog__pagination">
    <p class="c-blog__pagination--previous button"><?php previous_posts_link(__('Previous Articles', '_themename'), $the_query->max_num_pages); ?></p>
    <p class="c-blog__pagination--next button"><?php next_posts_link(__('More Articles', '_themename'), $the_query->max_num_pages); ?></p>
  </div>

  <div class="c-blog__social">
    <h2><?php the_field('social_header_title') ?></h2>
    <?php echo do_shortcode('[custom-facebook-feed]'); ?>

  </div>
</div>
<?php get_footer(); ?>