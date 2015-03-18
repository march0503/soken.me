<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" /> 
	<title><?php wp_title( '|', true, 'right' ); ?></title>              
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="profile" href="http://gmpg.org/xfn/11" />        
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
	<div id="secondary-menu">
		<div class="container">
			<div class="row">
			<div class="col-sm-8">				
				<?php wp_nav_menu(array('theme_location' => 'secondary','depth' => 1,'container' => false,'fallback_cb' => false)); ?>
			</div>
			<div class="col-sm-4">
				<div id="social-icons">
					<?php if (get_theme_mod('perkins_rss_setting')): ?><a href="<?php echo esc_url(get_theme_mod('perkins_rss_setting')); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
					<?php if (get_theme_mod('perkins_linkedin_setting')): ?><a href="<?php echo esc_url(get_theme_mod('perkins_linkedin_setting')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
					<?php if (get_theme_mod('perkins_pinterest_setting')): ?><a href="<?php echo esc_url(get_theme_mod('perkins_pinterest_setting')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
					<?php if (get_theme_mod('perkins_instagram_setting')): ?><a href="<?php echo esc_url(get_theme_mod('perkins_instagram_setting')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
					<?php if (get_theme_mod('perkins_youtube_setting')): ?><a href="<?php echo esc_url(get_theme_mod('perkins_youtube_setting')); ?>" target="_blank"><i class="fa fa-youtube"></i></a><?php endif; ?>	
					<?php if (get_theme_mod('perkins_gplus_setting')): ?><a href="<?php echo esc_url(get_theme_mod('perkins_gplus_setting')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>						
					<?php if (get_theme_mod('perkins_facebook_setting')): ?><a href="<?php echo esc_url(get_theme_mod('perkins_facebook_setting')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>					
					<?php if (get_theme_mod('perkins_twitter_setting')): ?><a href="<?php echo esc_url(get_theme_mod('perkins_twitter_setting')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>								
				</div>
			</div>
			</div>
		</div>
	</div>
	<?php if (has_nav_menu('primary')) : ?>
		<div id="primary-menu">
			<div class="container">
				<nav>			
					<?php wp_nav_menu(array('theme_location' => 'primary','depth' => 2,'container' => false)); ?>										
				</nav>			
			</div>
		</div>
		<i id="mobile-menu" class="fa fa-bars"></i>
	<?php endif; ?>
	<div id="logo-holder">
		<div class="container">
			<?php if (get_theme_mod('perkins_logo_setting')): ?>
		        <a id="logo" href="<?php echo esc_url(home_url('/')); ?>"><img src='<?php echo esc_url(get_theme_mod('perkins_logo_setting')); ?>' alt="<?php bloginfo('name'); ?>" /></a>
		    <?php else: ?>
		        <a id="site-title" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
		    <?php endif; ?>			
			<p id="site-desc"><span><?php bloginfo('description'); ?></span></p>
		</div>
	</div>
</header>