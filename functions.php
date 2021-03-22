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
	wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/swiper.min.css');
	wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap');

	//Main stylesheet
	wp_enqueue_style( 'vku', get_stylesheet_directory_uri() . '/vku.css', array(), '1.3.1');

	if ( is_page(312) ) {
		wp_enqueue_style( 'quickstart', get_stylesheet_directory_uri() . '/quickstart/style.css' );
		wp_enqueue_script( 'quickstart', get_template_directory_uri() . '/quickstart/script.js', array(), false, true);
	}

	if ( is_shop() ) {
		wp_enqueue_script( 'shop', get_template_directory_uri() . '/js/shop.js', array(), false, true);
	}

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
	<img src="/wp-content/themes/vkonnektu/img/new/cart.svg" alt="Cart">
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



// add wrapper to item on start page

if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_open() {

		echo '<div class="uk-card uk-card-hover uk-card-default uk-card-body">';
	}
}

if ( ! function_exists( 'woocommerce_template_loop_product_link_close' ) ) {
	/**
	 * Insert the closing anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_close() {
		echo '';
	}
}


function woocommerce_link_open_loop_product(){
	global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="product_link">';
}
function woocommerce_link_close_loop_product(){
	echo '</a>';
}

add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_link_open_loop_product', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_link_close_loop_product', 10 );

// add to cart button

function woocommerce_template_loop_add_to_cart( $args = array() ) {
	global $product;

	if ( $product ) {
		$defaults = array(
			'quantity'   => 1,
			'class'      => implode(
				' ',
				array_filter(
					array(
						'uk-button uk-button-primary',
						'product_type_' . $product->get_type(),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
					)
				)
			),
			'attributes' => array(
				'data-product_id'  => $product->get_id(),
				'data-product_sku' => $product->get_sku(),
				'aria-label'       => $product->add_to_cart_description(),
				'rel'              => 'nofollow',
			),
		);

		$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

		if ( isset( $args['attributes']['aria-label'] ) ) {
			$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
		}

		wc_get_template( 'loop/add-to-cart.php', $args );
	}
}

// size head of name product

function woocommerce_template_loop_product_title() {
	echo '<h4 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h4>';
	echo '</>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}


// replace places header on card product
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_title', 30 );


//Show first image in products
add_action( 'woocommerce_before_single_product_summary', 'custom_show_product_images', 20);
function custom_show_product_images($attachment_id, $main_image = false ) {


		$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
		$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
		$image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
		$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
		$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
		$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
		$alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
		$image             = wp_get_attachment_image(
			$attachment_id,
			$image_size,
			false,
			apply_filters(
				'woocommerce_gallery_image_html_attachment_image_params',
				array(
					'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
					'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
					'data-src'                => esc_url( $full_src[0] ),
					'data-large_image'        => esc_url( $full_src[0] ),
					'data-large_image_width'  => esc_attr( $full_src[1] ),
					'data-large_image_height' => esc_attr( $full_src[2] ),
					'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
				),
				$attachment_id,
				$image_size,
				$main_image
			)
		);
	
		if ($main_image === false) {
			return '<a class="uk-inline" href="' . esc_url( $full_src[0] ) . '"><img src=' . esc_url( $full_src[0] ) . ' alt="" attr_index="0"></a>';
		} else if (($main_image === true)) {
			return '<img src=' . esc_url( $full_src[0] ) . ' alt="" attr_index="0">';
		}

}


// stylize field form

/** Forms */

if ( ! function_exists( 'woocommerce_form_field' ) ) {

	/**
	 * Outputs a checkout/address form field.
	 *
	 * @param string $key Key.
	 * @param mixed  $args Arguments.
	 * @param string $value (default: null).
	 * @return string
	 */
	function woocommerce_form_field( $key, $args, $value = null ) {
		$defaults = array(
			'type'              => 'text',
			'label'             => '',
			'description'       => '',
			'placeholder'       => '',
			'maxlength'         => false,
			'required'          => false,
			'autocomplete'      => false,
			'id'                => $key,
			'class'             => array(),
			'label_class'       => array(),
			'input_class'       => array(),
			'return'            => false,
			'options'           => array(),
			'custom_attributes' => array(),
			'validate'          => array(),
			'default'           => '',
			'autofocus'         => '',
			'priority'          => '',
		);

		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value );

		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required        = '&nbsp;<abbr class="required" title="' . esc_attr__( 'required', 'woocommerce' ) . '">*</abbr>';
		} else {
			$required = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
		}

		if ( is_string( $args['label_class'] ) ) {
			$args['label_class'] = array( $args['label_class'] );
		}

		if ( is_null( $value ) ) {
			$value = $args['default'];
		}

		// Custom attribute handling.
		$custom_attributes         = array();
		$args['custom_attributes'] = array_filter( (array) $args['custom_attributes'], 'strlen' );

		if ( $args['maxlength'] ) {
			$args['custom_attributes']['maxlength'] = absint( $args['maxlength'] );
		}

		if ( ! empty( $args['autocomplete'] ) ) {
			$args['custom_attributes']['autocomplete'] = $args['autocomplete'];
		}

		if ( true === $args['autofocus'] ) {
			$args['custom_attributes']['autofocus'] = 'autofocus';
		}

		if ( $args['description'] ) {
			$args['custom_attributes']['aria-describedby'] = $args['id'] . '-description';
		}

		if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
			foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
				$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
			}
		}

		if ( ! empty( $args['validate'] ) ) {
			foreach ( $args['validate'] as $validate ) {
				$args['class'][] = 'validate-' . $validate;
			}
		}

		$field           = '';
		$label_id        = $args['id'];
		$sort            = $args['priority'] ? $args['priority'] : '';
		$field_container = '<p class="form-row %1$s" id="%2$s" data-priority="' . esc_attr( $sort ) . '">%3$s</p>';

		switch ( $args['type'] ) {
			case 'country':
				$countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

				if ( 1 === count( $countries ) ) {

					$field .= '<strong>' . current( array_values( $countries ) ) . '</strong>';

					$field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys( $countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state" readonly="readonly" />';

				} else {

					$field = '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="uk-select country_to_state country_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . '><option value="">' . esc_html__( 'Select a country / region&hellip;', 'woocommerce' ) . '</option>';

					foreach ( $countries as $ckey => $cvalue ) {
						$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
					}

					$field .= '</select>';

					$field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__( 'Update country / region', 'woocommerce' ) . '">' . esc_html__( 'Update country / region', 'woocommerce' ) . '</button></noscript>';

				}

				break;
			case 'state':
				/* Get country this state field is representing */
				$for_country = isset( $args['country'] ) ? $args['country'] : WC()->checkout->get_value( 'billing_state' === $key ? 'billing_country' : 'shipping_country' );
				$states      = WC()->countries->get_states( $for_country );

				if ( is_array( $states ) && empty( $states ) ) {

					$field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';

					$field .= '<input type="hidden" class="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="" ' . implode( ' ', $custom_attributes ) . ' placeholder="' . esc_attr( $args['placeholder'] ) . '" readonly="readonly" data-input-classes="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '"/>';

				} elseif ( ! is_null( $for_country ) && is_array( $states ) ) {

					$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="uk-select state_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ? $args['placeholder'] : esc_html__( 'Select an option&hellip;', 'woocommerce' ) ) . '"  data-input-classes="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '">
						<option value="">' . esc_html__( 'Select an option&hellip;', 'woocommerce' ) . '</option>';

					foreach ( $states as $ckey => $cvalue ) {
						$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
					}

					$field .= '</select>';

				} else {

					$field .= '<input type="text" class="uk-input input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $value ) . '"  placeholder="' . esc_attr( $args['placeholder'] ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode( ' ', $custom_attributes ) . ' data-input-classes="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '"/>';

				}

				break;
			case 'textarea':
				$field .= '<textarea name="' . esc_attr( $key ) . '" class="uk-textarea input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="2"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>';

				break;
			case 'checkbox':
				$field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '>
						<input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" ' . checked( $value, 1, false ) . ' /> ' . $args['label'] . $required . '</label>';

				break;
			case 'text':
			case 'password':
			case 'datetime':
			case 'datetime-local':
			case 'date':
			case 'month':
			case 'time':
			case 'week':
			case 'number':
			case 'email':
			case 'url':
			case 'tel':
				$field .= '<input type="' . esc_attr( $args['type'] ) . '" class="uk-input input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '"  value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

				break;
			case 'select':
				$field   = '';
				$options = '';

				if ( ! empty( $args['options'] ) ) {
					foreach ( $args['options'] as $option_key => $option_text ) {
						if ( '' === $option_key ) {
							// If we have a blank option, select2 needs a placeholder.
							if ( empty( $args['placeholder'] ) ) {
								$args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'woocommerce' );
							}
							$custom_attributes[] = 'data-allow_clear="true"';
						}
						$options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) . '</option>';
					}

					$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="uk-select select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
							' . $options . '
						</select>';
				}

				break;
			case 'radio':
				$label_id .= '_' . current( array_keys( $args['options'] ) );

				if ( ! empty( $args['options'] ) ) {
					foreach ( $args['options'] as $option_key => $option_text ) {
						$field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" ' . implode( ' ', $custom_attributes ) . ' id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
						$field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="uk-form-label radio ' . implode( ' ', $args['label_class'] ) . '">' . $option_text . '</label>';
					}
				}

				break;
		}

		if ( ! empty( $field ) ) {
			$field_html = '';

			if ( $args['label'] && 'checkbox' !== $args['type'] ) {
				$field_html .= '<label for="' . esc_attr( $label_id ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">' . $args['label'] . $required . '</label>';
			}

			$field_html .= '<span class="woocommerce-input-wrapper">' . $field;

			if ( $args['description'] ) {
				$field_html .= '<span class="description" id="' . esc_attr( $args['id'] ) . '-description" aria-hidden="true">' . wp_kses_post( $args['description'] ) . '</span>';
			}

			$field_html .= '</span>';

			$container_class = esc_attr( implode( ' ', $args['class'] ) );
			$container_id    = esc_attr( $args['id'] ) . '_field';
			$field           = sprintf( $field_container, $container_class, $container_id, $field_html );
		}

		/**
		 * Filter by type.
		 */
		$field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

		/**
		 * General filter on form fields.
		 *
		 * @since 3.4.0
		 */
		$field = apply_filters( 'woocommerce_form_field', $field, $key, $args, $value );

		if ( $args['return'] ) {
			return $field;
		} else {
			echo $field; // WPCS: XSS ok.
		}
	}
}

/**
 * Hide shipping rates when free shipping is available, but keep "Local pickup" 
 * Updated to support WooCommerce 2.6 Shipping Zones
 */
add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2 );

function hide_shipping_when_free_is_available( $rates, $package ) {
	$new_rates = array();
	foreach ( $rates as $rate_id => $rate ) {
		// Only modify rates if free_shipping is present.
		if ( 'free_shipping' === $rate->method_id ) {
			$new_rates[ $rate_id ] = $rate;
			break;
		}
	}

	if ( ! empty( $new_rates ) ) {
		//Save local pickup if it's present.
		foreach ( $rates as $rate_id => $rate ) {
			if ('local_pickup' === $rate->method_id ) {
				$new_rates[ $rate_id ] = $rate;
				break;
			}
		}
		return $new_rates;
	}

	return $rates;
}


//Shop page widget
add_filter( 'woocommerce_product_categories_widget_args', function($list_args) {
	$list_args['show_option_all'] = 'Все товары';
	return $list_args;
});


//Change price in catalog
add_filter('woocommerce_format_sale_price', 'fomat_cat_price', 100, 3);

function fomat_cat_price( $price, $regular_price, $sale_price ) {
	$price = '<span class="discount-price">' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</span> <span class="full-price">' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</span>';
    return $price;
}


//Hide Shipping Fields for Local Pickup
add_action( 'woocommerce_after_checkout_form', 'bbloomer_disable_shipping_local_pickup' );
  
function bbloomer_disable_shipping_local_pickup( $available_gateways ) {
   $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
   $chosen_shipping = $chosen_methods[0];
   if ( 0 === strpos( $chosen_shipping, 'local_pickup' ) ) {
   ?>
      <script type="text/javascript">
		 jQuery('#customer_details .delivery-wrapper').fadeOut();
      </script>
   <?php  
   } 

   ?>
      <script type="text/javascript">
         jQuery('form.checkout').on('change','input[name^="shipping_method"]',function() {
            var val = jQuery( this ).val();
            if (val.match("^local_pickup")) {
                     jQuery('#customer_details .delivery-wrapper').fadeOut();
               } else {
               jQuery('#customer_details .delivery-wrapper').fadeIn();
            }
		 });
      </script>
   <?php
  
}


//Make checkout fields not required
add_filter( 'woocommerce_billing_fields' , 'custom_override_checkout_fields', 100, 1 );

function custom_override_checkout_fields( $fields ) {
	$fields['billing_postcode']['required'] = false;
	$fields['billing_state']['required'] = false;
	return $fields;
}


//Add explanation of local pickup
add_action( 'woocommerce_after_shipping_rate', 'checkout_shipping_additional_field', 20, 2 );

function checkout_shipping_additional_field( $method, $index )
{
    if( $method->get_id() == 'local_pickup:3' ){
		echo '
		<span id="local_pickup_info" uk-icon="question"></span>
		<div uk-drop="mode: click; pos: bottom-justify; boundary: .woocommerce-shipping-totals; boundary-align: true">
			<div id="local_pickup_description" uk-alert>
				<a class="uk-drop-close" uk-close></a>
				<p>Вы можете самостоятельно забрать заказ <a href="/delivery">в рабочие дни</a> в любом из офисов VKU по адресам:</p>
				<ul>
					<li><a href="https://goo.gl/maps/NhqZCAeAzUUidQGi8" target="_blank" rel="noopener">г. Москва, Ленинградский проспект 63, офис 702</a></li>
					<li><a href="https://goo.gl/maps/JEGdihkg86dZGs2j9" target="_blank" rel="noopener">г. Владивосток, Шилкинская 10</a></li>
				</ul>
			</div>
		</div>
		';
	}
}


//Allow UIkit attributes in woocommerce notices
add_filter('wp_kses_allowed_html', 'my_filter_allowed_html', 10, 2);

function my_filter_allowed_html($allowed, $context){
    if (is_array($context)) {
        return $allowed;
    }

    if ($context === 'post') { 
        $allowed['div']['uk-alert'] = true;
        $allowed['a']['uk-close'] = true;
    }

    return $allowed;
}

// New order notification only for "Pending" Order status
add_action( 'woocommerce_checkout_order_processed', 'pending_new_order_notification', 20, 1 );
function pending_new_order_notification( $order_id ) {
    // Get an instance of the WC_Order object
    $order = wc_get_order( $order_id );

    // Only for "pending" order status
    if( ! $order->has_status( 'pending' ) ) return;

    // Get an instance of the WC_Email_New_Order object
    $wc_email = WC()->mailer()->get_emails()['WC_Email_New_Order'];

    ## -- Customizing Heading, subject (and optionally add recipients)  -- ##
    // Change Subject
    $wc_email->settings['subject'] = __('{site_title} - Сформирован новый заказ, ожидается оплата, № ({order_number}) - {order_date}');
    // Change Heading
    $wc_email->settings['heading'] = __('Это уведомление приходит, когда клиент нажал "Подтвердить заказ" и перешел на страницу оплаты'); 
    // $wc_email->settings['recipient'] .= ',name@email.com'; // Add email recipients (coma separated)

    // Send "New Email" notification (to admin)
    $wc_email->trigger( $order_id );
}
