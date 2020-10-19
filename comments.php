<?php

if( post_password_required() ) {
  return;
}
?>

<div id="comments" class="c-comments">
  <?php if(have_comments()) { ?>
    <h2 class="c-comments__title">
      <?php
      /* translators: 1 is the number of comments and 2 is the title of the post */
        printf(
          esc_html( _n(
            // Output of below: 1 Reply to "Hello world!" or 2 Replies to "Hello world!"
            '%1$s Reply to "%2$s"',
            '%1$s Replies to "%2$s"',
            get_comments_number(),
            '_themename' 
          )),
          number_format_i18n( get_comments_number() ),
          get_the_title()
        )
        ?>
    </h2>
    <ul class="c-comments__list">
      <?php wp_list_comments(array(
        'short_ping'    =>  false,
        'avatar_size'   => 50,
        'reply_text'    => 'Reply to this message',
        'callback'      =>  '_themename_comment_callback'
      )) ?>
    </ul>
    <?php the_comments_pagination() ?>
  <?php } ?>

  <?php if(!comments_open() && get_comments_number()) { ?>
    <p class="c-comments__closed"><?php esc_html_e('Comments are closed for this post.', '_themename') ?></p>
  <?php } ?>

  <?php comment_form() ?>
</div>