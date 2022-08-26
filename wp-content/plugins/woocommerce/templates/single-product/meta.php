<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta mb-4">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<div class="sku_wrapper fw-bold mb-2"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="ps-2 sku color-838383 fw-normal"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></div>

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="posted_in mb-2 text-capitalize">' . _n( '<strong class="pe-2">Category:</strong>', '<strong class="pe-2">Categories:</strong>', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</div>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<div class="tagged_as fw-bold mb-2 text-capitalize">' . _n( '<strong class="pe-2">Tag:</strong>', '<strong class="pe-2">Tags:</strong>', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</div>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
