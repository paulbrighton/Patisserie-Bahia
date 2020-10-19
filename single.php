<?php get_header(); ?>
<?php
$layout = _themename_meta(get_the_ID(), '__themename_post_layout', 'full');
$sidebar = is_active_sidebar('primary-sidebar');
if ($layout === 'sidebar' && !$sidebar) {
  $layout = 'full';
}
?>

<div class="o-container">
  <div class="yoast__breadcrumbs">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
  </div>
</div>

<div class="o-container o-single-post o-single-post-<?php echo $layout; ?>">
  <div class="o-row">
    <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $layout === 'sidebar' ? '8' : '12' ?>@medium">
      <?php get_template_part('single-post', 'loop'); ?>
    </div>
    <?php if ($layout === 'sidebar') { ?>
      <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium c-post-sidebar">
        <?php get_sidebar(); ?>
      </div>
    <?php } ?>
  </div>
</div>
<?php get_footer(); ?>