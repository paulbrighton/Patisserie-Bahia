<?php

function _themename_sidebar_widgets() {
  register_sidebar( array(
    'id'                => 'primary-sidebar',
    'name'              => esc_html( 'Primary Sidebar' ),
    'desc'              => esc_html( 'This sidebar appears in main blog post page', '_themename' ),
    'before_widget'     => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
    'after_widget'      => '</section>',
    'before_title'      =>  '<h5>',
    'after_title'       =>  '</h5>'
    )
  );
}

$footer_layout = sanitize_text_field(get_theme_mod('_themename_footer_layout', '3,3,3,3'));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
$columns = explode(',', $footer_layout);
$footer_bg = _themename_sanitize_footer_bg(get_theme_mod('_themename_footer_bg', 'dark'));
$widget_theme = '';

if($footer_bg == 'light') {
  $widget_theme = 'c-footer-widget--dark';
} else {
  $widget_theme = 'c-footer-widget--light';
}

foreach ($columns as $i => $column) {
  register_sidebar( array(
    'id'                => 'footer-sidebar-' . ($i + 1),
    'name'              => sprintf(esc_html( 'Footer Widget Columns %s', '_themename' ), $i +1),
    'desc'              => esc_html( 'Footer widgets', '_themename' ),
    'before_widget'     => '<section id="%1$s" class="c-footer-widget ' . $widget_theme . ' %2$s">',
    'after_widget'      => '</section>',
    'before_title'      =>  '<h5>',
    'after_title'       =>  '</h5>'
    )
  );
}

add_action( 'widgets_init', '_themename_sidebar_widgets' );