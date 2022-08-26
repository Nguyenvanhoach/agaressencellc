<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
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
echo '<div class="container-xxl"><div class="row justify-content-center gx-lg-4 gx-xl-5">';
/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
	echo '<div class="col-12 col-sm-4">';
		do_action( 'woocommerce_account_navigation' ); ?>
	</div>
	<div class="col-12 col-sm-8">
		<div class="woocommerce-MyAccount-content bg-white p-4 w-100 h-100 mt-4 mt-sm-0">
			<?php
				/**
				 * My Account content.
				 *
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_content' );
			?>
		</div>
	</div>
	</div>
</div>