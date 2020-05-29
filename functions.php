<?php
/**
 * Vkonnektu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vkonnektu
 */

if ( ! function_exists( 'vkonnektu_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vkonnektu_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Vkonnektu, use a find and replace
		 * to change 'vkonnektu' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vkonnektu', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'vkonnektu' ),
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
		add_theme_support( 'custom-background', apply_filters( 'vkonnektu_custom_background_args', array(
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'vkonnektu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vkonnektu_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'vkonnektu_content_width', 640 );
}
add_action( 'after_setup_theme', 'vkonnektu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vkonnektu_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vkonnektu' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vkonnektu' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vkonnektu_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vkonnektu_scripts() {
	wp_enqueue_style( 'vkonnektu-style', get_stylesheet_uri() );
	wp_enqueue_style( 'uikit', get_stylesheet_directory_uri() . '/uikit.min.css' );
	wp_enqueue_style( 'font-helvetica', get_stylesheet_directory_uri() . '/font/stylesheet.css' );
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.4.1/css/all.css');
	wp_enqueue_style( 'vku', get_stylesheet_directory_uri() . '/vku.css' );

	wp_enqueue_script( 'vkonnektu-navigation', get_template_directory_uri() . '/js/navigation.js', array(), false, true);

	wp_enqueue_script( 'vkonnektu-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), false, true);

	/* UIkit */
	wp_enqueue_script( 'uikit-js', get_template_directory_uri() . '/js/uikit.min.js', array(), false, true);
	wp_enqueue_script( 'uikit-js-icons', get_template_directory_uri() . '/js/uikit-icons.min.js', array(), false, true);

	/* GSAP & ScrollMagic */
	wp_enqueue_script( 'scrollmagic', get_template_directory_uri() . '/js/scrollmagic/ScrollMagic.min.js', array(), false, true);
	wp_enqueue_script( 'scrollmagic-anim', get_template_directory_uri() . '/js/scrollmagic/animation.gsap.min.js', array(), false, true);
	wp_enqueue_script( 'scrollmagic-debug', get_template_directory_uri() . '/js/scrollmagic/debug.addIndicators.min.js', array(), false, true);
	wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/gsap.min.js', array(), false, true);

	wp_enqueue_script( 'vku-script', get_template_directory_uri() . '/js/vku.js', array(), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vkonnektu_scripts' );

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
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_filter( 'woocommerce_single_product_carousel_options', 'sf_update_woo_flexslider_options' );

/** 
 * Filer WooCommerce Flexslider options - Add Navigation Arrows
 */
function sf_update_woo_flexslider_options( $options ) {

    $options['directionNav'] = true;
	$options['prevText'] = "";
	$options['nextText'] = "";

    return $options;
}

/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/**
* Change product page content display order
*/

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating ', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);
//add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating ', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {

	ob_start();
	$count = WC()->cart->cart_contents_count;
	?>
	<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"> 
		<img src="/wp-content/themes/vkonnektu/img/cart.svg" alt="Cart">
		<span class="cart-count">
			<?php
				if ( $count > 0 ) {
					?>
					<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
					<?php			
				}
			?>
		</span>
	</a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );