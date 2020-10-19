<?php if (have_posts()) { ?>
  <?php while (have_posts()) { ?>
    <?php the_post() ?>
    <?php get_template_part('template-parts/post/content', get_post_format()); ?>
    <?php if (get_theme_mod('_themename_display_author_info', true)) {
      get_template_part('template-parts/single/author');
    }
    $categories = get_categories( array(
      'orderby' => 'name',
      'parent'  => 0
  ) );
   
  foreach ( $categories as $category ) {
      printf( '<a href="%1$s">%2$s</a><br />',
          esc_url( get_category_link( $category->term_id ) ),
          esc_html( $category->name )
      );
  }
    ?>

    <?php get_template_part('template-parts/single/navigation'); ?>

    <?php if( comments_open() || get_comments_number()) { ?>
      <?php comments_template(); ?>
    <?php } ?>

  <?php } ?>

<?php } else { ?>
  <?php get_template_part('template-parts/post/content', 'none'); ?>
  </p>
<?php } ?>