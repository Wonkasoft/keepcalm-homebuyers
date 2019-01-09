<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since  1.0.0 [<init>]
 * @package Keep_Calm_Home_Buyers
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="row entry-header">
		<div class="col">
			<?php if ( is_archive() ) :
			the_title( '<h1 class="entry-title"><a class="entry-title-link" href="' . get_the_permalink() . '">', '</a></h1>' );
			else : ?>
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			endif; ?>
			<hr />
		</div> <!-- /col -->
	</header><!-- .entry-header -->


		<div class="row entry-content">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'keepcalm-homebuyers' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .row.entry-content -->
	
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
	<?php endif;

	 ?>
</article><!-- #post-<?php the_ID(); ?> -->