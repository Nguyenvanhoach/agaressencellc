<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="py-5 bg-efefef">
	<div class="container-xxl">
		<div class="row gx-lg-4 gx-xl-5 gy-3">				
			<div class="col-12 col-md-8 col-lg-9 order-md-1">
				<div class="page-header">
					<?php if ( have_posts() ) : ?>
						<h2 class="page-title fw-sim-bold fs-25 mb-3"><?php printf( __( 'Search Results for: <span class="color-e09654">%s</span>', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					<?php else : ?>
						<h2 class="page-title fw-sim-bold fs-25 mb-3"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h2>
					<?php endif; ?>
					<hr class="mb-4">
				</div><!-- .page-header -->
				<div id="primary" class="content-area row gy-4 gx-3 gx-lg-4">
					<?php
					if ( have_posts() ) :
						
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content-search');

						endwhile; // End of the loop.

						echo '<div class="col-12">'.get_template_part( 'template-parts/pagination' ).'</div>';

					else :
						?>
						<div class="col-12">
							<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
							<?php
								get_search_form();
						echo '</div>';

					endif;
					?>
				</div><!-- #primary -->
			</div>
			<div class="col-12 col-md-4 col-lg-3">
				<div class="cus-slide-bar">
					<?php 
						/**
						 * Hook: woocommerce_sidebar.
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action( 'woocommerce_sidebar' );

					?>
					<?php //get_sidebar(); ?>
				</div>
			</div>
		</div>	
	</div>	
</div><!-- .wrap -->

<?php
get_footer();
