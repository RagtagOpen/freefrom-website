<?php
/**
 * FreeFrom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FreeFrom
 */

if ( ! defined( 'FREEFROM_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'FREEFROM_VERSION', '1.0.0' );
}

if ( ! function_exists( 'freefrom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function freefrom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on FreeFrom, use a find and replace
		 * to change 'freefrom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'freefrom', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'freefrom' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Theme support for full-width blocks.
		add_theme_support( 'align-wide' );

		// Theme support for custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 170,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'freefrom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function freefrom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'freefrom_content_width', 640 );
}
add_action( 'after_setup_theme', 'freefrom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function freefrom_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'freefrom' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Left column of the footer.', 'freefrom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'freefrom' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Middle column of the footer.', 'freefrom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'freefrom' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Right column of the footer.', 'freefrom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'freefrom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function freefrom_scripts() {
	wp_enqueue_style( 'freefrom-style', get_stylesheet_uri(), array(), FREEFROM_VERSION );
	wp_style_add_data( 'freefrom-style', 'rtl', 'replace' );

	wp_enqueue_script( 'freefrom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), FREEFROM_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'freefrom_scripts' );

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

/** Initialize block patterns */
function freefrom_register_block_patterns() {

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

		register_block_pattern(
			'freefrom/small-image-cta',
			array(
				'title'       => __( 'Small Image with Call to Action', 'textdomain' ),
				'content'     => "<!-- wp:columns --> <div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"33.33%\"} --> <div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:image {\"id\":7,\"width\":236,\"height\":133,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} --> <figure class=\"wp-block-image size-large is-resized\"><img src=\"http://localhost/wordpress/wp-content/uploads/2021/05/background-1024x576.jpg\" alt=\"\" class=\"wp-image-7\" width=\"236\" height=\"133\"/></figure> <!-- /wp:image --></div> <!-- /wp:column --> <!-- wp:column {\"width\":\"98.66%\"} --> <div class=\"wp-block-column\" style=\"flex-basis:98.66%\"><!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":22},\"color\":{\"background\":\"#febd00\"}},\"textColor\":\"white\"} --> <p class=\"has-white-color has-text-color has-background\" style=\"background-color:#febd00;font-size:22px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non mattis lacus, vel hendrerit nisi.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --></div> <!-- /wp:columns -->"
			)
		);

	}

}
add_action( 'init', 'freefrom_register_block_patterns' );
