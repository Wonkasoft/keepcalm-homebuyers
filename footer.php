<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Keep_Calm_Home_Buyers
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="col-3">
		<?php the_custom_logo(); ?>
	</div> <!-- .col-3 -->
	<div class="col">
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="footer-menu-1" aria-expanded="false"><?php esc_html_e( 'Footer_Menu_1', 'keepcalm-homebuyers' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu1',
				'menu_id'        => 'footer-1',
			) );
			?>
		</nav><!-- #site-navigation -->
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="footer-menu-2" aria-expanded="false"><?php esc_html_e( 'Footer_Menu_2', 'keepcalm-homebuyers' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu2',
				'menu_id'        => 'footer-2',
			) );
			?>
		</nav><!-- #site-navigation -->
	</div> <!-- .col -->
	<div class="site-info">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'keepcalm-homebuyers' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'keepcalm-homebuyers' ), 'WordPress' );
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf( esc_html__( 'Theme: %1$s by %2$s.', 'keepcalm-homebuyers' ), 'keepcalm-homebuyers', '<a href="https://wonkasoft.com">Wonkasoft</a>' );
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
