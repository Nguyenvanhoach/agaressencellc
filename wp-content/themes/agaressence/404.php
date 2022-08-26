<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<div class="py-5 bg-efefef">
	<div class="container-xxl ">
		<div class="section-inner thin error404-content">
			<div class="row gx-lg-4 gx-xl-5 gy-3">				
				<div class="col-12 col-md-8 col-lg-9 order-md-1">
					<h2 class="entry-title fw-sim-bold fs-25 mb-3 mb-lg-4"><?php _e( 'Page Not Found', 'twentytwenty' ); ?></h2>

					<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'twentytwenty' ); ?></p></div>

					<?php
					get_search_form(
						array(
							'aria_label' => __( '404 not found', 'twentytwenty' ),
						)
					);
					?>
				</div>
				<?php echo '<div class="col-12 col-md-4 col-lg-3"><div class="cus-slide-bar">';
					/**
					 * Hook: woocommerce_sidebar.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );

				echo '</div></div>'; ?>
			</div>
		</div>
		<?php //get_template_part( 'template-parts/footer-menus-widgets' ); ?>
	</div>
</div>
<?php
get_footer();
