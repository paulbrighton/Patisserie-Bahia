<?php if (have_posts()) { ?>
  <?php while (have_posts()) { ?>
    <?php the_post() ?>
    <?php get_template_part('template-parts/page/content', get_post_format()); ?>

    <?php if (comments_open() || get_comments_number()) { ?>
      <?php comments_template(); ?>
    <?php } ?>

  <?php } ?>

<?php } else { ?>
  <?php get_template_part('template-parts/page/content', 'none'); ?>
<?php } ?>