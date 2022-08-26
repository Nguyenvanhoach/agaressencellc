<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
?>
<div class="woocommerce-product-rating d-flex align-items-center mb-3">
	<?php if(wc_get_rating_html( $average, $rating_count )){
		echo wc_get_rating_html( $average, $rating_count ); 
	} else {
		echo '<div class="star-rating m-0" role="img"></div>';
	}
	// WPCS: XSS ok. ?>
	<?php if ( comments_open() ) : ?>
		<?php //phpcs:disable ?>
		<a href="#reviews" class="woocommerce-review-link text-decoration-none link-hover-1" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer review', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a>
		<?php // phpcs:enable ?>
	<?php endif ?>
</div>
