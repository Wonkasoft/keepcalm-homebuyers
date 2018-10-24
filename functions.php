<?php
/**
 * Keep Calm Home Buyers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since  1.0.0 [<init>]
 * @package Keep_Calm_Home_Buyers
 */

if ( ! function_exists( 'keepcalm_homebuyers_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function keepcalm_homebuyers_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Keep Calm Home Buyers, use a find and replace
		 * to change 'keepcalm-homebuyers' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'keepcalm-homebuyers', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'keepcalm-homebuyers' ),
			'footer-menu1' => esc_html__( 'Footer_Menu_1', 'keepcalm-homebuyers' ),
			'footer-menu2' => esc_html__( 'Foot_Menu_2', 'keepcalm-homebuyers' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'keepcalm_homebuyers_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 156,
			'width'       => 500,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add Gravity form support
		 * Hide gform field labels
		 * @since  1.0.0 [<init>]
		 */
		add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
	}
endif;
add_action( 'after_setup_theme', 'keepcalm_homebuyers_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function keepcalm_homebuyers_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'keepcalm_homebuyers_content_width', 640 );
}
add_action( 'after_setup_theme', 'keepcalm_homebuyers_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function keepcalm_homebuyers_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'keepcalm-homebuyers' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'keepcalm-homebuyers' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'keepcalm_homebuyers_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function keepcalm_homebuyers_scripts() {
	/**
	 * For enqueues of stylesheets
	 */
	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );

	wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'keepcalm-homebuyers-style', get_stylesheet_uri() );

	/**
	 * For enqueues of scripts
	 */
	wp_enqueue_script( 'bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ), 'all', true );
	
	wp_enqueue_script( 'keepcalm-homebuyers-navigation', str_replace( array( 'http:', 'https:' ), '', get_template_directory_uri() . '/js/navigation.js' ), array(), '20151215', true );

	wp_enqueue_script( 'keepcalm-homebuyers-skip-link-focus-fix', str_replace( array( 'http:', 'https:' ), '', get_template_directory_uri() . '/js/skip-link-focus-fix.js' ), array(), '20151215', true );

	wp_enqueue_script( 'keepcalm-homebuyers-js', str_replace( array( 'http:', 'https:' ), '', get_template_directory_uri() . '/assets/js/keepcalm-homebuyers.min.js' ), array(), 'all', true );

	wp_enqueue_script( 'googleapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDsc039BlVZZfUB5eD1NCR9SJkhhBOw-mU&libraries=places&callback=initAutocomplete', array( 'keepcalm-homebuyers-js' ), null, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'keepcalm_homebuyers_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
   
/**
 * Register Testimonial Post Type
 * @since 1.0.0
 */
require get_template_directory() . '/inc/register-testimonials.php';

/**
 * fixing body classes for each post
 * @since 1.0.0
 */
require get_template_directory() . '/inc/wonkasoft-custom-functions.php';