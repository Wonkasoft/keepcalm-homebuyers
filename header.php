<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Keep_Calm_Home_Buyers
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
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'keepcalm-homebuyers' ); ?></a>

		<header id="masthead" class="container-fluid site-header">
			<div class="row">
				<div class="col-5">
					<div class="custom-logo">
						<?php the_custom_logo(); ?>
					</div> <!-- .custom-logo -->
					<?php
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$keepcalm_homebuyers_description = get_bloginfo( 'description', 'display' );
					if ( $keepcalm_homebuyers_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $keepcalm_homebuyers_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div> <!-- .col-5 -->
				<div class="col-7">
					<div class="row">
						<div class="col">
							<nav class="account-row">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'submenu-1',
									'menu_id'        => 'sub-menu-top',
								) );
								?>
							</nav> <!-- .account-row -->
						</div> <!-- .col -->
					</div> <!-- .row -->
					<div class="row">
						<div class="col">
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'keepcalm-homebuyers' ); ?></button>
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								) );
								?>
							</nav><!-- #site-navigation -->
						</div> <!-- .col -->
					</div> <!-- .row -->
				</div><!-- .col-7 -->
			</div><!-- .row -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">
