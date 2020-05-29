<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );

$attachment_ids = $product->get_gallery_image_ids();


function wp_get_attachment_medium_url( $id ){
	$medium_array = image_downsize( $id, 'medium' );
	$medium_path = $medium_array[0];

	return $medium_path;
}
function wp_get_attachment_large_url( $id ){
	$medium_array = image_downsize( $id, 'large' );
	$medium_path = $medium_array[0];

	return $medium_path;
}
         
// add the filter 
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'filter_woocommerce_single_product_image_thumbnail_html', 10, 2 ); 

?>

<!-- Grid start 1 -->
<div uk-grid >

<div class="uk-width-1-2@s uk-width-2-3@m <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" >

	
	
		<?php
		if ( $product->get_image_id() ) {
			$html  = '<li>';
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
			$html .= '</li>';
		} else {
			$html  = '<li>';
			$html .= sprintf( '<img src="%s" alt="%s" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</li>';
		}

		
		?>
		
	<div uk-slider="finite: true" id="single-product-slider">
		<div class="uk-slider-container uk-position-relative">
			<ul  uk-lightbox class="uk-slider-items uk-child-width-1-1">
			<?php
			
			foreach ( $attachment_ids as $attachment_id ) {	?>
				
				<li>
				<a class="uk-inline"  href="<?php echo $image_link = wp_get_attachment_large_url( $attachment_id ); ?>">
				   <img  src="<?php echo $image_link = wp_get_attachment_large_url( $attachment_id ); ?>" alt="">
				</a>
				</li>
		   
			<?php  } ?>
			
			</ul>
			<a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
			<a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
		</div>
	</div>

	<div id="thumbnail_block" class="thumbnail">
		
	<ul>
		 <?php  

		 $attr_index = 0;

		 foreach ( $attachment_ids as $attachment_id ) { 

			
			

			 ?>
			
			<li>
			<img src="<?php echo $image_link = wp_get_attachment_medium_url( $attachment_id ); ?>" attr_index="<?php echo $attr_index ?>" alt="">
			</li>
			
 
		<?php  
		$attr_index++; 
		} ?>
		 
		 </ul>	 
		 
	</div>
	
</div>
