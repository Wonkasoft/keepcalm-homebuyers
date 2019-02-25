<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Keep_Calm_Home_Buyers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<?php if ( get_the_post_thumbnail_url() ) : ?>
		<div class="col-12 col-md-6">
			<div class="blog-featured-img-wrap">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="blog-featured-img">
			</div> <!-- .blog-featured-img-wrap -->
		</div> <!-- /col -->
	<?php endif;
		$set_class = ( ! get_the_post_thumbnail_url() ) ? 'col-12': 'col-12 col-md-6';
	?>
		<div class="<?php echo $set_class; ?>">
			<?php if ( is_home() ) :
			the_title( '<h1 class="entry-title"><a class="entry-title-link" href="' . get_the_permalink() . '">', '</a></h1>' );
			else : ?>
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			endif; ?>
			<div class="col-12 entry-content">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'keepcalm-homebuyers' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
		</div> <!-- /col -->
	</div><!-- .row -->
	
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'keepcalm-homebuyers' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->