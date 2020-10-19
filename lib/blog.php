<?php
add_post_type_support( 'page', 'excerpt' );

function new_excerpt_more() {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function prefix_category_title( $title ) {
	if ( is_category() ) {
			$title = single_cat_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );

add_filter('get_the_archive_title' , 'my_cat_title');
function my_cat_title($title) {
	return 'Artigos de blog para ' . $title;
}

function mytheme_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

function example_cats_related_post() {

	$post_id = get_the_ID();
	$cat_ids = array();
	$categories = get_the_category( $post_id );

	if(!empty($categories) && is_wp_error($categories)):
			foreach ($categories as $category):
					array_push($cat_ids, $category->term_id);
			endforeach;
	endif;

	$current_post_type = get_post_type($post_id);
	$query_args = array( 

			'category__in'   => $cat_ids,
			'post_type'      => $current_post_type,
			'post__not_in'    => array($post_id),
			'posts_per_page'  => '3'


	 );

	$related_cats_post = new WP_Query( $query_args );

	if($related_cats_post->have_posts()):
			 while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
					<ul>
							<li>
									<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
									</a>
									<?php the_content(); ?>
							</li>
					</ul>
			<?php endwhile;

			// Restore original Post Data
			wp_reset_postdata();
	 endif;

}

add_filter( 'wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail' );

function wpse_100012_override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_single(array('doces', 'bolos', 'salgadinhos')) || is_archive() || is_single() ) {
        $breadcrumb[] = array(
            'url' => '/patisserie-bahia/blog/',
            'text' => 'Blog',
            'allow_html' => 1
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}