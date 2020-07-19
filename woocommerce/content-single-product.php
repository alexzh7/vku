<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

    <?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

    <div class="uk-width-1-3@m uk-width-1-2@s">
        <?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
    </div>
    <!-- Grid end -->
</div>
<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' );?>
<h2 class="cat-title">Товары категории <?php echo mb_strtolower( wc_get_product_category_list($product->get_id())) ?></h2>
<div class="category-slider">
    <div class="swiper-prod-container">
        <div class="swiper-wrapper">
            <?php
				$prod_cat = array_shift(array_values($product->get_category_ids()));
				$prod_id = get_the_ID();
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => 4,
					'tax_query' => array( array(
						'taxonomy'  => 'product_cat',
						'field'     => 'id', 
						'terms'     => $prod_cat
					)), 
					'post__not_in' => [$prod_id]);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

            <div class="swiper-slide">
                <a href="<?php echo get_permalink( $loop->post->ID ) ?>"
                    title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                    <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
					<div class="cat-img"> 
						<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
							else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
					</div>
                    <h4><?php the_title(); ?></h4>

                    <span class="price"><?php echo $product->get_price_html(); ?></span>

				</a>
			</div>

            <?php endwhile; ?>
			<?php wp_reset_query(); ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

<script src="/wp-content/themes/vkonnektu/js/swiper.min.js"></script>
<script>
let mySwiper = new Swiper('.swiper-prod-container', {
	slidesPerView: 1,
	spaceBetween: 70,
	breakpoints: {
    500: {
      slidesPerView: 2,
	  spaceBetween: 20,
    },
	900: {
      slidesPerView: 3
    }
  },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
})
</script>