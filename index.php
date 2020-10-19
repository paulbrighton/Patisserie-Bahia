<?php get_header(); ?>
<div class="o-container u-margin-bottom-40">
  <div class="o-row">
    <div class="o-row__column o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?>@small">
        <?php get_template_part('loop', 'index') ?>
    </div>
    <?php if (is_active_sidebar('primary-sidebar')) { ?>
      <div class="o-row__column o-row__column--span-4@small">
        <?php get_sidebar() ?>
      </div>
    <?php } ?>
  </div>
</div>
<?php get_footer(); ?>