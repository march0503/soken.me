<?php

// theme setup
if (!function_exists('perkins_setup')):
	function perkins_setup() {	
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'perkins'),			
			'secondary' => __('Secondary Menu', 'perkins'),
			'footer' => __('Footer Menu', 'perkins'),	
		));
		add_theme_support('post-thumbnails');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('search-form'));
		$custom_bg = array(
			'default-color' => '014d5b',
			'default-repeat' => 'no-repeat',
			'default-position-x' => 'center',
			'default-attachment' => 'fixed',
			'default-image' => get_template_directory_uri() . '/assets/img/bg.jpg'
		);
		add_theme_support('custom-background', $custom_bg);			
		add_image_size('featured', 768);		
		add_image_size('teaser-lg', 730, 290, true);	
		add_image_size('teaser-md', 350, 230, true);			
		add_editor_style(get_template_directory_uri() . '/assets/css/editor-style.css');		
		global $content_width;  
		if (!isset($content_width)) {$content_width = 750;}				
	}
endif; 
add_action('after_setup_theme', 'perkins_setup');

// load css 
function perkins_css() {	
	wp_enqueue_style('perkins_teko', '//fonts.googleapis.com/css?family=Teko:300');
	wp_enqueue_style('perkins_noto_sans', '//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic');
	wp_enqueue_style('perkins_fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css ');
	wp_enqueue_style('perkins_bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');	
	wp_enqueue_style('perkins_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'perkins_css');

// load javascript
function perkins_javascript() {	
	wp_enqueue_script('perkins_script', get_template_directory_uri() . '/assets/js/perkins.js', array('jquery'), '1.0', true);	
	if (is_singular() && comments_open()) {wp_enqueue_script('comment-reply');}
}
add_action('wp_enqueue_scripts', 'perkins_javascript');

// html5 shiv
function perkins_html5_shiv() {
    echo '<!--[if lt IE 9]>';
    echo '<script src="'. get_template_directory_uri() .'/assets/js/html5shiv.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'perkins_html5_shiv');

// page titles
function perkins_title($title, $sep) {
	global $paged, $page;
	if (is_feed()) { return $title;	}
	$title .= get_bloginfo('name');	
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) { $title = "$title $sep $site_description"; }	
	if ($paged >= 2 || $page >= 2) { $title = "$title $sep " . sprintf( __('Page %s', 'perkins'), max($paged, $page)); }
	return $title;
}
add_filter('wp_title', 'perkins_title', 10, 2);

// pagination
if (!function_exists('perkins_pagination')):
	function perkins_pagination() {
		global $wp_query;
		$big = 999999999;	
		echo '<div class="pager">';	
		echo paginate_links( array(
			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages,
			'prev_next' => False,
		));
		echo '</div>';
	}
endif;

// widgets
function perkins_widgets_init() {
	register_sidebar(array(
		'name' => __('Primary Sidebar', 'perkins'),
		'id' => 'primary-sidebar',
		'description' => __('Widgets in this area will appear in the right sidebar on all posts and pages.', 'perkins'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	));	
	register_sidebar(array(
		'name' => __('Footer - Left', 'perkins'),
		'id' => 'footer-left',
		'description' => __('Widgets in this area will appear in the left column of the footer', 'perkins'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	));	
	register_sidebar(array(
		'name' => __('Footer - Middle', 'perkins'),
		'id' => 'footer-middle',
		'description' => __('Widgets in this area will appear in the middle column of the footer', 'perkins'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	));	
	register_sidebar(array(
		'name' => __('Footer - Right', 'perkins'),
		'id' => 'footer-right',
		'description' => __('Widgets in this area will appear in the right column of the footer', 'perkins'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	));	
}
add_action('widgets_init', 'perkins_widgets_init');

// custom excerpts
function perkins_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'perkins_excerpt_length', 999);
function perkins_excerpt_more($more) {
	return '&period;&period;&period;';
}
add_filter('excerpt_more', 'perkins_excerpt_more');

// theme customizer
function perkins_customize_register($wp_customize) {
	// logo
	$wp_customize->add_section('perkins_logo_section', array(
		'title' => __('Logo', 'perkins'),
		'priority' => 35,
		'type' => 'option'		
	));
	$wp_customize->add_setting('perkins_logo_setting', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(		
		'section' => 'perkins_logo_section',
		'settings' => 'perkins_logo_setting'
	)));
	// colors	
	$wp_customize->add_setting('perkins_links_setting', array(	
		'default' => '#2a8ea5',	
		'sanitize_callback' => 'sanitize_hex_color'
	));	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'links', array(
		'label' => __('Links', 'perkins'),
		'section' => 'colors',
		'settings' => 'perkins_links_setting'
	)));
	$wp_customize->add_setting('perkins_site_title_setting', array(	
		'default' => '#fff',	
		'sanitize_callback' => 'sanitize_hex_color'
	));	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site_title', array(
		'label' => __('Site Title &amp; Tagline', 'perkins'),
		'section' => 'colors',
		'settings' => 'perkins_site_title_setting'
	)));
	// social links
	$wp_customize->add_section('perkins_social_section', array(
		'title' => __('Social Links', 'perkins'),
		'priority' => 65				
	));
	$wp_customize->add_setting('perkins_twitter_setting', array(		
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('perkins_twitter', array(
		'label' => __('Twitter', 'perkins'),			
		'section' => 'perkins_social_section',
		'settings' => 'perkins_twitter_setting'
	));
	$wp_customize->add_setting('perkins_facebook_setting', array(		
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('perkins_facebook', array(
		'label' => __('Facebook', 'perkins'),			
		'section' => 'perkins_social_section',
		'settings' => 'perkins_facebook_setting'
	));	
	$wp_customize->add_setting('perkins_gplus_setting', array(		
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('perkins_gplus', array(
		'label' => __('Google+', 'perkins'),			
		'section' => 'perkins_social_section',
		'settings' => 'perkins_gplus_setting'
	));	
	$wp_customize->add_setting('perkins_youtube_setting', array(		
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('perkins_youtube', array(
		'label' => __('YouTube', 'perkins'),			
		'section' => 'perkins_social_section',
		'settings' => 'perkins_youtube_setting'
	));	
	$wp_customize->add_setting('perkins_instagram_setting', array(		
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('perkins_instagram', array(
		'label' => __('Instagram', 'perkins'),			
		'section' => 'perkins_social_section',
		'settings' => 'perkins_instagram_setting'
	));
	$wp_customize->add_setting('perkins_pinterest_setting', array(		
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('perkins_pinterest', array(
		'label' => __('Pinterest', 'perkins'),			
		'section' => 'perkins_social_section',
		'settings' => 'perkins_pinterest_setting'
	));		
	$wp_customize->add_setting('perkins_linkedin_setting', array(		
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('perkins_linkedin', array(
		'label' => __('LinkedIn', 'perkins'),			
		'section' => 'perkins_social_section',
		'settings' => 'perkins_linkedin_setting'
	));	
	$wp_customize->add_setting('perkins_rss_setting', array(		
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('perkins_rss', array(
		'label' => __('RSS', 'perkins'),			
		'section' => 'perkins_social_section',
		'settings' => 'perkins_rss_setting'
	));	
}
add_action('customize_register', 'perkins_customize_register');

// custom css
function perkins_custom_css() {
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css');
	$links = esc_attr(get_theme_mod('perkins_links_setting'));
	$site_title = esc_attr(get_theme_mod('perkins_site_title_setting'));	
    $custom_css = "
    			a, a:hover, #primary-menu li a, .teaser .teaser-title a:hover, .teaser-top .teaser-title a:hover, .sticky .teaser-title a:hover {color:{$links};} 
    			#primary-menu .sub-menu {background-color:{$links};} 
    			.sticky .teaser-title, .teaser-title {border-color:{$links};}
    			#site-title, #site-desc {color:{$site_title};}
    			";
    wp_add_inline_style('custom-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'perkins_custom_css');

// comments
if (!function_exists('perkins_comment')) :
	function perkins_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		?>	
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"> 	
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-header">	
				<div class="comment-author">
					<?php echo get_avatar($comment, 32); ?> 
					<p class="comment-author-name"><span><?php comment_author_link(); ?></span><br /><?php echo get_comment_date() . ' - ' . get_comment_time() ?></p>
				</div>				
			</div>
			<div class="comment-body">			
				<?php comment_text(); ?>
				<?php if ('0' == $comment->comment_approved) : ?>				
					<p class="comment-awaiting-moderation"><?php _e('Comment is awaiting moderation!', 'perkins'); ?></p>					
				<?php endif; ?>				
			</div>			
		</div>
	<?php 
	}
endif;

?>