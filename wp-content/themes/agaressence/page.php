<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="area-page py-4 py-md-5 bg-efefef">
	<div class="container-xxl">	
		<h2 class="title-page text-center fw-sim-bold fs-25 text-uppercase mb-4 mb-lg-5"><?php echo the_title(); ?></h2>		
		<?php if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.			
		endif; ?>	
	</div>
</div>
<?php get_footer();
