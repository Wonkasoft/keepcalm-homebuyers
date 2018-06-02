<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Keep_Calm_Home_Buyers
 * @since  1.0.0 [<init>]
 */

$name = get_the_title();
$excerpt = get_the_excerpt();
$link = get_the_permalink();
?>

<div class="row justify-content-center">
	<div class="col col-md-4">
		<div class="testimonial-module" id="module-<?php echo $counter; ?>">
			<a href="<?php echo $link; ?>"><?php echo $name. ' ' .$excerpt; ?></a>
		</div>
	</div> <!-- /col -->
</div> <!-- /row -->