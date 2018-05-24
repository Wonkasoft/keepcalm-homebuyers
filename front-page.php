<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since  1.0.0 [<init>]
 * @package Keep_Calm_Home_Buyers
 */

get_header();

$main_image = ( !get_theme_mod( 'main_image' ) ) ? get_template_directory_uri() . '/assets/img/default-header-image.jpg': get_theme_mod( 'main_image' );
?>
<section id="backdrop" class="container-fluid" style="background: url('<?php echo $main_image; ?>') no-repeat;background-position: center center;background-size: cover;"></section>
<section id="primary" class="container-fluid">
	<main id="main" class="site-main">
		
		<h1 class="arrow-message">
			<span class="top-row-message"><span class="bold-message">Keep</span><span class="upper-message calm-message"> Calm</span>
			we can help</span><span class="bottom-row-message">buy your house <span class="upper-message">fast</span></span>
		</h1> <!-- .arrow-message -->
		
		</main><!-- #main -->
</section><!-- #primary -->
<section class="container-fluid content-section">
	<div class="row">
		<div class="col text-center">
			<h1 class="problem-section-title">Do you have a problem house?</h1>
		</div> <!-- /col -->
	</div> <!-- /row -->
	<div class="row justify-content-center">
		<div class="col-6 text-center">
			<p class=""><span>keep calm home buyers</span>can purchase your home fast to help in situations such 
				back taxes, divorce, vacancies, bad tenants, relocation, foreclosure,probate or just looking for
				hassle-free sale of your home. Let us help you!
			</p>
		</div> <!-- /col -->
	</div> <!-- /row -->
</section> <!-- .container-fluid contemt-section -->
<?php
	$testimonial_image = ( !get_theme_mod( 'testimonial_image' ) ) ? '' : get_theme_mod( 'testimonial_image' );
	if ( $testimonial_image == '' ) :

	else :
?>
<section id="testimonials" class="container-fluid content-section" style="background:url( '<?php echo $testimonial_image; ?>' ) no-repeat;background-position: center center;background-size: cover;">
	<div class="row justify-content-center">
		<div class="col-6 text-center">
			<h1 class="section-title">Keep calm Testimonials</h1>
		</div> <!-- /col -->
	</div> <!-- /row -->
</section> <!-- .container-fluid content-section -->
<?php
endif;
?>
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
						<h2><?php echo $grid_image_alt; ?></h2>
					</div>
				</div> <!-- .col -->

				<?php
			else :
				?>
				<div class="col col-md-3 masonary-grid-img photo-masonary-grid-<?php echo $i ?>" style="background: url(<?php echo $grid_image; ?>);background-position: center center;background-size: cover;">
					<div>
						<h2><?php echo $grid_image_alt; ?></h2>
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