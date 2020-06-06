<?php // User Submitted Posts - Shortcodes misc.

/*
	Shortcode: Reset form button
	Returns the markup for a reset-form button
	Syntax: [usp-reset-button class="aaa,bbb,ccc" value="Reset form" url="https://example.com/usp-pro/submit/"]
	Attributes:
		class  = classes for the parent element (optional, default: none)
		value  = link text (optional, default: "Reset form")
		url    = the URL where your form is displayed (can use %%current%% for current URL)
		custom = any attributes or custom code for the link element
	
*/
function usp_reset_button_shortcode($args) {
	
	extract(shortcode_atts(array(
		'class'  => '',
		'value'  => __('Reset form', 'usp'),
		'url'    => '#please-check-shortcode',
		'custom' => '',
	), $args));
	
	$protocol = is_ssl() ? 'https://' : 'http://';
	
	$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
	
	$current = isset($_SERVER['REQUEST_URI']) ? $protocol . $host . $_SERVER['REQUEST_URI'] : '';
	
	$url = preg_replace('/%%current%%/', $current, $url);
	
	$url = remove_query_arg(array('usp_reset_form', 'post_id', 'success', 'usp-error'), $url);
	
	$href = get_option('permalink_structure') ? $url .'?usp_reset_form=true"' : $url .'&usp_reset_form=true';
	
	$class = empty($class) ? '' : ' class="'. esc_attr($class) .'"';
	
	$output = '<p'. $class .'><a href="'. esc_url($href) .'"'. $custom .'>'. esc_html($value) .'</a></p>';
	
	return $output;
	
}
add_shortcode('usp-reset-button', 'usp_reset_button_shortcode');



/*
	Displays a list of all user submitted posts
	Bonus: includes any posts submitted by the Pro version of USP :)
	Shortcode: 
		[usp_display_posts userid="current"]          : displays all submitted posts by current logged-in user
		[usp_display_posts userid="1"]                : displays all submitted posts by registered user with ID = 1
		[usp_display_posts userid="Pat Smith"]        : displays all submitted posts by author name "Pat Smith"
		[usp_display_posts userid="all"]              : displays all submitted posts by all users/authors
		[usp_display_posts userid="all" numposts="5"] : limit to 5 posts
		
	Note that the Pro version of USP provides many more options for the display-posts shortcode:
		
		https://plugin-planet.com/usp-pro-display-list-submitted-posts/
	
*/
function usp_display_posts($attr, $content = null) {
	
	global $post;
	
	extract(shortcode_atts(array(
		
		'userid'   => 'all',
		'numposts' => -1
		
	), $attr));
	
	if (ctype_digit($userid)) {
		
		$args = array(
			'author'         => $userid,
			'posts_per_page' => $numposts,
			'meta_key'       => 'is_submission',
			'meta_value'     => '1'
		);
		
	} elseif ($userid === 'all') {
		
		$args = array(
			'posts_per_page' => $numposts,
			'meta_key'       => 'is_submission',
			'meta_value'     => '1'
		);
		
	} elseif ($userid === 'current') {
		
		$args = array(
			'author'         => get_current_user_id(),
			'posts_per_page' => $numposts,
			'meta_key'       => 'is_submission',
			'meta_value'     => '1'
		);
		
	} else {
		
		$args = array(
			'posts_per_page' => $numposts,
			
			'meta_query' => array(
				
				'relation' => 'AND',
				
				array(
					'key'    => 'is_submission',
					'value'  => '1'
				),
				array(
					'key'    => 'user_submit_name',
					'value'  => $userid
				)
			)
		);
		
	}
	
	$submitted_posts = get_posts($args);
	$lastBlog = new WP_Query( $args );

	if( $lastBlog->have_posts() ):
    while( $lastBlog->have_posts() ): $lastBlog->the_post();
        if ( has_post_thumbnail() ) {  
    echo '<div class="post_wrapper row">';
    echo '<a href="'.esc_url(get_permalink()).'" rel="lightbox">'; the_post_thumbnail(); echo '</a>';
   the_title( sprintf('<h4 class="entry-title post"><a href="'. get_permalink() .'">', esc_url( get_permalink() ) ),'</a></h4>' );
   echo '<div class="post_expert row">';the_excerpt();
  /* '<a href="'.esc_url(get_permalink()).'" class="read_more_button" title="'.esc_html__('Read more...', 'theme_slug').'">'.esc_html__('Read more...', 'theme_slug').'</a>';*/ echo '</div>';
    echo '</div>';
        }
    endwhile;
endif;

	wp_reset_postdata();
	
	return $display_posts;
	
}
add_shortcode('usp_display_posts', 'usp_display_posts');



/* 
	Shortcode: [usp_gallery]
	Displays a gallery of submitted images for the current post
	Syntax: [usp_gallery size="" before="" after="" number="" id=""]
	Notes: 
		Use curly brackets to output angle brackets
		Use single quotes in before/after attributes
		See usp_get_images() for inline notes and more infos
*/
if (!function_exists('usp_gallery')) :

function usp_gallery($attr, $content = null) {
	
	extract(shortcode_atts(array(
		
		'size'   => 'thumbnail',
		'before' => '{a href="%%url%%"}{img src="',
		'after'  => '" /}{/a}',
		'number' => false,
		'id'     => false,
		
	), $attr));
	
	$images = usp_get_images($size, $before, $after, $number, $id);
	
	$gallery = '';
	
	foreach ($images as $image) $gallery .= $image;
	
	$gallery = $gallery ? '<div class="usp-image-gallery">'. $gallery .'</div>' : '';
	
	return $gallery;
	
}
add_shortcode('usp_gallery', 'usp_gallery');

endif;