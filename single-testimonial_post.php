<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Keep_Calm_Home_Buyers
 */

get_header();
$featured_image = ( ! get_the_post_thumbnail_url() ) ? get_template_directory_uri() . '/assets/img/default-subpage-header-image.jpg' : get_the_post_thumbnail_url(); 
?>

	<div id="primary" class="container-fluid content-area">
		<main id="main" class="row site-main">
			<div class="col">

		<?php
		while ( have_posts() ) :
			the_post(); ?>
			<div class="row" style="background: url('<?php echo $featured_image; ?>') no-repeat;background-position: center center;background-size: cover;">
				<div class="col col-md-6 content-panel text-center">
			<?php
			get_template_part( 'template-parts/content', get_post_type() );
			?>
			</div>  <!-- .col-lg-6 text-center -->
			</div> <!-- /.row -->
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

			</div> <!-- /col -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
