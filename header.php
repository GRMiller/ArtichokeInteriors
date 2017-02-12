<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fotografo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">

			<div class="navbar">
				<div class="row">
					<div class="site-branding">
						<div class="logo">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						if (!$image[0]):?>
							<h1 class="site-title"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else :?>
							<h1><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $image[0] ); ?>"></a></h1>
						<?php endif;?>
						</div>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div>

					<a class="toggle" gumby-trigger="#nav-panel" href="#"><i class="icon-menu"></i></a>
				</div>
			</div>

	</header><!-- #masthead -->
	<div id="nav-panel" class="navbar nav-panel">
			<div class="site-branding">
				<div class="logo">
					<p class="site-title"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
				</div>
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>


			</div>
			<nav id="nav">
				<?php
				$menu_name = 'primary';

				if( has_nav_menu('primary') ){
					wp_nav_menu( array( 'theme_location' => 'primary', 'container'=>'', 'fallback_cb' =>'', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'walker' => new fotografo_walker) );
				}
				else
					echo '<ul class="no-menu"><li><a href="' . esc_url( home_url('/') ) . 'wp-admin/nav-menus.php">'. __('Go to "Appearance - Menus" to set-up menu', 'fotografo') . '</a></li></ul>';
				?>
		</nav>
		<?php get_sidebar();?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fotografo' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'fotografo' ), 'WordPress' ); ?></a><br>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'fotografo' ), 'Fotografo', '<a href="http://awothemes.pro" rel="designer">Awothemes</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div>
