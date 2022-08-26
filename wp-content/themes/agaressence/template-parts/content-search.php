<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('col-12 col-sm-6 col-md-4 col-lg-4'); ?>>
	<div class="bg-white h-100">
		<div class="">
			<?php
			if ( has_post_thumbnail() ) { 
				echo '<div class="img-search img-bg position-relative">'. get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid w-100 mx-auto d-block')) .'</div>';
			} ?>
		</div>
		<div class=" p-4">
			<div class="entry-header">
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
						// echo twentyseventeen_time_link();
						// twentyseventeen_edit_link();
						?>
					</div><!-- .entry-meta -->
				<?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
					<div class="entry-meta">
						<?php //twentyseventeen_edit_link(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>

				<?php
				if ( is_front_page() && ! is_home() ) {

					// The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
					the_title( sprintf( '<h3 class="entry-title fw-bold fs-18"><a class="text-decoration-none" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				} else {
					the_title( sprintf( '<h3 class="entry-title fw-bold fs-18"><a class="text-decoration-none" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				}
				?>
			</div><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</div>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->
