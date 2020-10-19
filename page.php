<?php get_header(); ?>
<div class="o-container u-margin-bottom-40">
  <div class="o-row">
    <!-- Add o-row__column--span-8@medium in div below if sidebar is used -->
    <div class="o-row__column o-row__column--span-12">
      <?php get_template_part('page', 'loop') ?>
    </div>
    <!-- <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
      <?php get_sidebar() ?>
    </div> -->
  </div>
</div>
<?php get_footer(); ?>