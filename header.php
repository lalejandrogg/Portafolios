<?php
/**
 *
 * @package AlexGarcia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>	
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alexgarcia' ); ?></a>

	<header id="masthead" class="site-header">
				<nav id="site-navigation" class="main-navigation">
				<div class="social">
					<a href="mailto:garciagilluisalejandro@gmail.com" rel="nofollow"><span class="dashicons dashicons-email-alt"></span></a>
					<a href="https://www.facebook.com/lalejandrogg" rel="nofollow"><span class="dashicons dashicons-facebook"></span></a>
					<a href="https://twitter.com/LAlejandroGG" rel="nofollow"><span class="dashicons dashicons-twitter"></span></a>
				</div>
				<button style="display: none;" class="menu-toggle dashicons dashicons-menu" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '', 'alexgarcia' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->

		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
