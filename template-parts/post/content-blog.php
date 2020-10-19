<div class="c-blog-card">
  <?php if (get_the_post_thumbnail() !== '') { ?>
    <div class="c-blog-card__thumbnnail">
      <?php the_post_thumbnail('large') ?>
    </div>
  <?php } ?>
  <div class="c-blog-card__content">
    <h4 class="c-blog-card__title">
      <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a>
    </h4>
    <div class="c-blog-card__meta">
      <div class="c-blog-card__meta--date">
        <?php _themename_post_meta_date() ?>
      </div>
      <div class="c-blog-card__meta--author">
        <?php _themename_post_meta_author() ?>
      </div>
    </div>

    <div class="c-blog-card__excerpt">
      <?php echo '<p class="">' . get_the_excerpt() . '</p>' ?>
    </div>
      

    <footer class="c-blog-card__footer">
      <?php if (has_category()) {
        echo '<div class="c-blog__cats">';
        /* translators: , is used between categories */
        $cats_list = get_the_category_list(esc_html__(', ', '_themename'));
        /* translators: , %s is the categories list */
        printf(esc_html__('Categories: %s', '_themename'), $cats_list);
        echo '</div>';
      }

      // if (has_tag()) {
      //   echo '<div class="c-blog__tags">';
      //   $tag_list = get_the_tag_list();
      //   // echo esc_html($tag_list);
      //   printf(esc_html__('Tags: %s', '_themename'), $tag_list);
      //   echo '</div>';
      // }
      // ?>
      
    </footer>
    <div class="c-blog-card__read-more">
      <?php _themename_readmore_link() ?>
    </div>
  </div>
</div>