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
 * @package WooCommerce\Templates
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
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
$gallery_image_ids = $product->get_gallery_image_ids();
if ( $post_thumbnail_id ) {
	if( count($gallery_image_ids) == 0 ){
		echo '<div class="single-img mb-4">
			<div class="border p-1"><img loading="lazy" alt="'.$product->name.'" class="img-fluid mx-auto d-block" src="'.wp_get_attachment_url( $post_thumbnail_id ).'"></div>
		</div>';
			// $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
			// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); 

			// do_action( 'woocommerce_product_thumbnails' );
		?>
		
	<?php } else { ?>
		<div class="gallary-product mb-4 <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>"> 
			<div class="slider-for mb-3"><?php do_action( 'woocommerce_product_thumbnails' ); ?></div>
			<div class="slider-nav px-5"><?php do_action( 'woocommerce_product_thumbnails' ); ?></div>
		</div>
	<?php
	}
} else {
	$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
	$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image img-fluid" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
	$html .= '</div>';
	echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
}

?> 

<!-- <div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="woocommerce-product-gallery__wrapper gallary-product"> -->
		<?php
		// if ( $post_thumbnail_id ) { 
		// 	if( count($gallery_image_ids) == 0 ){
		// 		echo '<div class="single-img">
		// 			<div class="border p-1"><img loading="lazy" alt="'.$product->name.'" class="img-fluid mx-auto d-block" src="'.wp_get_attachment_url( $post_thumbnail_id ).'"></div>
		// 		</div>';
		// 	} else {
		// 		echo 'gal';
		// 	}

		// 	$html = '<div class="slider-for">';
		// 	$html .= wc_get_gallery_image_html( $post_thumbnail_id, true );
		// 	$html .='</div>';
		// } else {
			
		// 	$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
		// 	$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
		// 	$html .= '</div>';
		// }

		// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		// do_action( 'woocommerce_product_thumbnails' );
		?>
	<!-- </div>
</div> -->
