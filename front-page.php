<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Keep_Calm_Home_Buyers
 */

get_header();
?>

<section id="primary" class="container-fluid">
	<main id="main" class="site-main">


		<?php 
		$main_image = ( !get_theme_mod( 'main_image' ) ) ? get_template_directory_uri() . '/assets/img/default-header-image.jpg': get_theme_mod( 'main_image' );
		?>
		<img src="<?php echo $main_image; ?>">
	</main><!-- #main -->
</section><!-- #primary -->
<section class="container-fluid content-section">
	<h1 class="section-title"> Do you have a problem house?</h1>
	<p class=""><span>keep calm home buyers</span>can purchase your home fast to help in situations such 
		back taxes, divorce, vacancies, bad tenants, relocation, foreclosure,probate or just looking for
	hassle-free sale of your home. Let us help you!</p>
</section> <!-- .container-fluid contemt-section -->
<section class="container-fluid content-section">
	<h1 class="section-title"> Keep calm Testimonials</h1>
</section> <!-- .container-fluid content-section -->
<section class="container-fluid content-section">
	<div class="row">
		<?php 
		for ($i = 1; $i < 7; $i++) :
			$grid_image = ( !get_theme_mod( 'grid_image_' . $i ) ) ? get_template_directory_uri() . '/assets/img/default-grid-image-' . $i . '.jpg': get_theme_mod( 'grid_image_' . $i );
			$grid_image_id = attachment_url_to_postid( $grid_image );
			$grid_image_alt = ( !get_post_meta( $grid_image_id, '_wp_attachment_image_alt', true ) ) ? 'grid image ' . $i : get_post_meta( $grid_image_id, '_wp_attachment_image_alt', true );
			// This is getting the image / url $feature1 = get_theme_mod('feature_image_1'); // This is getting the post id $feature1_id = attachment_url_to_postid($feature1); // This is getting the alt text from the image that is set in the media area $image1_alt = get_post_meta( $feature1_id, '_wp_attachment_image_alt', true );
		if ( $i == 1 || $i == 5 ) :
		?>
		<div class="col col-md-6">
			<img src="<?php echo $grid_image; ?>" alt="<?php echo $grid_image_alt; ?>">
		</div> <!-- .col -->
		
		<?php
		else :
			?>
			<div class="col col-md-3">
				<img src="<?php echo $grid_image; ?>" alt="<?php echo $grid_image_alt; ?>">
			</div> <!-- .col -->
			
			<?php
	    endif;
		endfor;
		?>
	</div> <!-- .row -->
</section> <!-- .container-fluid content-section -->
<section class="container-fluid content-section">
	<h3 class="section-title">Contact Us</h3>
	<p class="">Please fill out this form and we will be in contact with you. Thanks for your interest in us!</p>
</section> <!-- .container-fluid content-section -->
<section class="container-fluid content-section ">
	
</section>

<?php
get_footer();
