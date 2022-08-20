<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
/*
 * @hooked wc_empty_cart_message - 10
 */
echo '<div class="container-xxl"><div class="row"><div class="col-12 col-md-8"><div class="bg-white h-100 p-4 px-sm-3 px-lg-4 py-lg-5 d-flex align-items-center justify-content-center"><div>';
			do_action( 'woocommerce_cart_is_empty' );
			if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
				<p class="return-to-shop text-center mb-0">
					<a class="button wc-backward btn-primary rounded-0 text-uppercase px-4 py-3 d-inline-block text-decoration-none" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
						<?php
							/**
							 * Filter "Return To Shop" text.
							 *
							 * @since 4.6.0
							 * @param string $default_text Default text.
							 */
							echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
						?>
					</a>
				</p>
			<?php endif; ?>
			</div>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="bg-white h-100 p-4 p-sm-3 p-lg-4">
				<div class="fw-smi-bold fs-18">Customer Service</div>
				<hr>
				<div class="d-flex mb-3 mb-lg-4 link-hover-1 mb-4 mb-lg-5">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 476 476" style="enable-background:new 0 0 476 476;" xml:space="preserve" fill="#8f8e8e" width="45px" height="35px"><g><path d="M400.85,181v-18.3c0-43.8-15.5-84.5-43.6-114.7c-28.8-31-68.4-48-111.6-48h-15.1c-43.2,0-82.8,17-111.6,48c-28.1,30.2-43.6,70.9-43.6,114.7V181c-34.1,2.3-61.2,30.7-61.2,65.4V275c0,36.1,29.4,65.5,65.5,65.5h36.9c6.6,0,12-5.4,12-12V192.8c0-6.6-5.4-12-12-12h-17.2v-18.1c0-79.1,56.4-138.7,131.1-138.7h15.1c74.8,0,131.1,59.6,131.1,138.7v18.1h-17.2c-6.6,0-12,5.4-12,12v135.6c0,6.6,5.4,12,12,12h16.8c-4.9,62.6-48,77.1-68,80.4c-5.5-16.9-21.4-29.1-40.1-29.1h-30c-23.2,0-42.1,18.9-42.1,42.1s18.9,42.2,42.1,42.2h30.1c19.4,0,35.7-13.2,40.6-31c9.8-1.4,25.3-4.9,40.7-13.9c21.7-12.7,47.4-38.6,50.8-90.8c34.3-2.1,61.5-30.6,61.5-65.4v-28.6C461.95,211.7,434.95,183.2,400.85,181z M104.75,316.4h-24.9c-22.9,0-41.5-18.6-41.5-41.5v-28.6c0-22.9,18.6-41.5,41.5-41.5h24.9V316.4z M268.25,452h-30.1c-10,0-18.1-8.1-18.1-18.1s8.1-18.1,18.1-18.1h30.1c10,0,18.1,8.1,18.1,18.1S278.25,452,268.25,452z M437.95,274.9c0,22.9-18.6,41.5-41.5,41.5h-24.9V204.8h24.9c22.9,0,41.5,18.6,41.5,41.5V274.9z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
					<div class="ms-3">
						<a class="color-8f8e8e text-decoration-none fw-smi-bold d-block mb-2 fs-16" href="tel:0333 050 8269" title="0333 050 8269">0333 050 8269</a>
						<div class="mb-2 color-8f8e8e fw-smi-bold">Monday to Friday: 9am - 6pm EST</div>
						<div class="color-8f8e8e fw-smi-bold">Saturday: 10am - 6pm EST</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col fs-13 text-center">
					<img loading="lazy" style="max-height: 22px;" src="<?php echo get_template_directory_uri();?>/assets/images/truck-solid.svg" class="img-fluid d-block mx-auto mb-2" alt="Free standard delivery">
						Free standard delivery</div>
					<div class="col fs-13 text-center">
						<img loading="lazy" style="max-height: 22px;" src="<?php echo get_template_directory_uri();?>/assets/images/right-left-solid.svg" class="img-fluid d-block mx-auto mb-2" alt="Free standard delivery">
						Returns & exchanges</div>
					<div class="col fs-13 text-center">
						<img loading="lazy" style="max-height: 22px;" src="<?php echo get_template_directory_uri();?>/assets/images/shield-halved-solid.svg" class="img-fluid d-block mx-auto mb-2" alt="Free standard delivery">
						Shop securely</div>
				</div>
			</div>
		</div>
	</div>
</div>
