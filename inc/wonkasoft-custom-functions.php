<?php
/**
 * Wonkasoft custom functions.
 *
 * @since 1.0.0
 * 
 */

function wonkasoft_post_class( $classes ) {
	global $post;

	if ( $post->post_name !== '') :

		array_unshift( $classes, $post->post_name );

	endif;

	return $classes;
}

add_filter( 'body_class', 'wonkasoft_post_class' );