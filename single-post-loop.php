<?php if (have_posts()) { ?>
  <?php while (have_posts()) { ?>
    <?php the_post() ?>
    <?php get_template_part('template-parts/post/content-single', get_post_format()); ?>

    <!-- <?php get_template_part('template-parts/single/navigation-single'); ?> -->

    <!-- Get comments block from single-loop.php if needed -->

  <?php } ?>

<?php } else { ?>
  <?php get_template_part('template-parts/post/content', 'none'); ?>
  </p>
<?php } ?>