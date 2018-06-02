<?php
/**
 * Keep Calm Home Buyers Register Testimonal Post Type
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since  1.0.0 [<init>]
 * @package Keep_Calm_Home_Buyers
 */

$labels = array(
	'name'                  => _x( 'Testimonials', 'Post Type General Name', 'keepcalm-homebuyers' ),
	'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'keepcalm-homebuyers' ),
	'menu_name'             => __( 'Testimonials', 'keepcalm-homebuyers' ),
	'name_admin_bar'        => __( 'Testimonial', 'keepcalm-homebuyers' ),
	'archives'              => __( 'Testimonial Archives', 'keepcalm-homebuyers' ),
	'attributes'            => __( 'Item Attributes', 'keepcalm-homebuyers' ),
	'parent_item_colon'     => __( 'Parent Item: Name', 'keepcalm-homebuyers' ),
	'all_items'             => __( 'All Items', 'keepcalm-homebuyers' ),
	'add_new_item'          => __( 'Add New Testimonial', 'keepcalm-homebuyers' ),
	'add_new'               => __( 'Add New', 'keepcalm-homebuyers' ),
	'new_item'              => __( 'New Testimonial', 'keepcalm-homebuyers' ),
	'edit_item'             => __( 'Edit Testimonial', 'keepcalm-homebuyers' ),
	'update_item'           => __( 'Update Testimonial', 'keepcalm-homebuyers' ),
	'view_item'             => __( 'View Testimonial', 'keepcalm-homebuyers' ),
	'view_items'            => __( 'View Testimonials', 'keepcalm-homebuyers' ),
	'search_items'          => __( 'Search Item', 'keepcalm-homebuyers' ),
	'not_found'             => __( 'Not found', 'keepcalm-homebuyers' ),
	'not_found_in_trash'    => __( 'Not found in Trash', 'keepcalm-homebuyers' ),
	'featured_image'        => __( 'Featured Avatar', 'keepcalm-homebuyers' ),
	'set_featured_image'    => __( 'Set featured avatar', 'keepcalm-homebuyers' ),
	'remove_featured_image' => __( 'Remove featured avatar', 'keepcalm-homebuyers' ),
	'use_featured_image'    => __( 'Use as featured avatar', 'keepcalm-homebuyers' ),
	'insert_into_item'      => __( 'Insert into Testimonial', 'keepcalm-homebuyers' ),
	'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'keepcalm-homebuyers' ),
	'items_list'            => __( 'Items list', 'keepcalm-homebuyers' ),
	'items_list_navigation' => __( 'Items list navigation', 'keepcalm-homebuyers' ),
	'filter_items_list'     => __( 'Filter items list', 'keepcalm-homebuyers' ),
);
$args = array(
	'label'                 => __( 'Testimonial', 'keepcalm-homebuyers' ),
	'description'           => __( 'Testimonials', 'keepcalm-homebuyers' ),
	'labels'                => $labels,
	'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	'taxonomies'            => array( 'testimonial_tag' ),
	'hierarchical'          => false,
	'public'                => true,
	'show_ui'               => true,
	'show_in_menu'          => true,
	'menu_position'         => 5,
	'menu_icon'             => 'dashicons-format-quote',
	'show_in_admin_bar'     => true,
	'show_in_nav_menus'     => true,
	'can_export'            => true,
	'has_archive'           => true,
	'exclude_from_search'   => false,
	'publicly_queryable'    => true,
	'capability_type'       => 'post',
	'show_in_rest'          => true,
);
register_post_type( 'testimonial_post', $args );

/**
 * Filter for title placeholder
 * @param  [title] $input [title input for name]
 * @return [string]        [New placeholder for title]
 * @since  1.0.0 [<init>]
 */
function custom_enter_title( $input ) {
    global $post_type;
    /**
     * Change Title to name on Testimonial Post Type
     * @since  1.0.0 [<init>]
     */
    if( is_admin() && 'Enter title here' == $input && 'testimonial_post' == $post_type )
        $input = 'Enter Full Name Here';
    return $input;
}
add_filter('gettext','custom_enter_title');