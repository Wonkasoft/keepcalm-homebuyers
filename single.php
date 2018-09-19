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

	<div id="primary" class="content-area">
		<main id="main" class="site-main container-fluid">
			<?php $blog_bg_image = get_template_directory_uri() . '/assets/img/default-subpage-header-image.jpg'; ?>
			<div class="row" style="background: url('<?php echo $blog_bg_image; ?>') no-repeat;background-position: center center;background-size: cover;">
				<div class="col col-md-6 content-panel text-center">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
				</div> <!-- /content-panel -->
			</div> <!-- /row -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
