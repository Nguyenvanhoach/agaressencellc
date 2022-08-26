<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$entry_header_classes = '';

if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
}

?>

<div class="entry-header has-text-align-center<?php echo esc_attr( $entry_header_classes ); ?>">

	<div class="entry-header-inner section-inner medium">

		<?php
		/**
		 * Allow child themes and plugins to filter the display of the categories in the entry header.
		 *
		 * @since Twenty Twenty 1.0
		 *
		 * @param bool Whether to show the categories in header. Default true.
		 */
		$show_categories = apply_filters( 'twentytwenty_show_categories_in_entry_header', true );

		if ( true === $show_categories && has_category() ) {
			?>

			<div class="entry-categories">
				<span class="screen-reader-text"><?php _e( 'Categories', 'twentytwenty' ); ?></span>
				<div class="entry-categories-inner">
					<?php the_category( ' ' ); ?>
				</div><!-- .entry-categories-inner -->
			</div><!-- .entry-categories -->

			<?php
		}
		if ( is_page( 'cart' ) || is_cart() ) {
			echo '<div class="container-xxl"><div class="position-relative my-5">
				<div class="progress progress-c1" style="height: 2px;">
					<div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="position-absolute top-0 translate-middle dot active rounded-circle step-bar" style="left:20%"><div class="position-absolute bottom-100 translate-middle color fs-18">Cart</div></div>
				<div class="position-absolute top-0 translate-middle dot rounded-circle step-bar" style="left:50%"><div class="position-absolute bottom-100 translate-middle color fs-18">Checkout</div></div>
				<div class="position-absolute top-0 translate-middle dot rounded-circle step-bar" style="left:80%"><div class="position-absolute bottom-100 translate-middle color fs-18">Confirmation</div></div>
			</div></div>';
		} else if(is_checkout()) {
			echo '<div class="container-xxl"><div class="position-relative my-5">
				<div class="progress progress-c1" style="height: 2px;">
					<div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="position-absolute top-0 translate-middle dot active rounded-circle step-bar" style="left:20%"><div class="position-absolute bottom-100 translate-middle color fs-18">Cart</div></div>
				<div class="position-absolute top-0 translate-middle dot active rounded-circle step-bar" style="left:50%"><div class="position-absolute bottom-100 translate-middle color fs-18">Checkout</div></div>
				<div class="position-absolute top-0 translate-middle dot rounded-circle step-bar" style="left:80%"><div class="position-absolute bottom-100 translate-middle color fs-18">Confirmation</div></div>
			</div></div>';
		}
		 else {
			if ( is_singular() ) {
				the_title( '<h2 class="entry-title text-center fw-sim-bold fs-25 text-uppercase mb-4 mb-lg-5">', '</h2>' );
			} else {
				the_title( '<h2 class="entry-title text-center fw-sim-bold fs-25 text-uppercase mb-4 mb-lg-5 heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			}
		}

		$intro_text_width = '';

		if ( is_singular() ) {
			$intro_text_width = ' small';
		} else {
			$intro_text_width = ' thin';
		}

		if ( has_excerpt() && is_singular() ) {
			?>

			<div class="intro-text section-inner max-percentage<?php echo $intro_text_width; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
				<?php the_excerpt(); ?>
			</div>

			<?php
		}

		// Default to displaying the post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-top' );
		?>

	</div><!-- .entry-header-inner -->

</div><!-- .entry-header -->
