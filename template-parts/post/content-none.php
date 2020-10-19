<div class="o-container u-margin-bottom-40 o-single-post-<?php echo $layout; ?>">
  <div class="o-row">
    <div class="o-row__column o-row__column--span-12">
      <main role="main">
        <h2><?php echo apply_filters('_themename_no_posts_text', esc_html__('Whoops, something went wrong. Why not try searching for some interesting content.', '_themename')) ?></h2>
        <?php get_search_form( true ); ?>
      </main>
    </div>
  </div>
</div>
