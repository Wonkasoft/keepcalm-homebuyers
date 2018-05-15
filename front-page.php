<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since  1.0.0 [<init>]
 * @package Keep_Calm_Home_Buyers
 */

get_header();
?>

<section id="primary" class="container-fluid">
	<main id="main" class="row site-main">
		<div class="col">
		<?php 
		$main_image = ( !get_theme_mod( 'main_image' ) ) ? get_template_directory_uri() . '/assets/img/default-header-image.jpg': get_theme_mod( 'main_image' );
		?>
	</div> <!-- /col -->
	</main><!-- #main -->
</section><!-- #primary -->
<section class="container-fluid content-section">
	<h1 class="section-title">Do you have a problem house?</h1>
	<p class=""><span>keep calm home buyers</span>can purchase your home fast to help in situations such 
		back taxes, divorce, vacancies, bad tenants, relocation, foreclosure,probate or just looking for
	hassle-free sale of your home. Let us help you!</p>
</section> <!-- .container-fluid contemt-section -->
<section class="container-fluid content-section">
	<h1 class="section-title">Keep calm Testimonials</h1>
</section> <!-- .container-fluid content-section -->
<section class="content-section">
	<div class="row no-gutters">
		<?php 
		for ($i = 1; $i < 7; $i++) :
			$grid_image = ( !get_theme_mod( 'grid_image_' . $i ) ) ? get_template_directory_uri() . '/assets/img/default-grid-image-' . $i . '.jpg': get_theme_mod( 'grid_image_' . $i );
			$grid_image_id = attachment_url_to_postid( $grid_image );
			$grid_image_alt = ( !get_post_meta( $grid_image_id, '_wp_attachment_image_alt', true ) ) ? 'grid image ' . $i : get_post_meta( $grid_image_id, '_wp_attachment_image_alt', true );
			if ( $i == 1 || $i == 5 ) :
				?>
				<div class="col col-md-6 masonary-grid-img photo-masonary-grid-<?php echo $i ?>" style="background: url(<?php echo $grid_image; ?>);background-position: center center;background-size: cover;">
					<div>
						<span><?php echo $grid_image_alt; ?></span>
					</div>
				</div> <!-- .col -->

				<?php
			else :
				?>
				<div class="col col-md-3 masonary-grid-img photo-masonary-grid-<?php echo $i ?>" style="background: url(<?php echo $grid_image; ?>);background-position: center center;background-size: cover;">
					<div>
						<span><?php echo $grid_image_alt; ?></span>
					</div>
				</div> <!-- .col -->
				<?php
			endif;
		endfor;
		?>
	</div> <!-- .row -->
</section> <!-- .container-fluid content-section -->
<?php if ( get_theme_mod( 'contact' ) != '' ) :
$contact = get_theme_mod( 'contact' ); ?>
<section class="container-fluid content-section">
	<?php echo do_shortcode( $contact, true ); ?>
</section> <!-- .container-fluid content-section -->
<?php 
endif; 
get_footer();