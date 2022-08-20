<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
$taxonomy = 'product_cat';
$args_tax = array('taxonomy' => $taxonomy,'hide_empty' => 1,'parent' => 0,);//'exclude' => 15
?>

<main id="site-content">
	<div class="banner position-relative bg-padding">
		<img class="img-fluid mx-auto d-block position-absolute end-0 start-0 top-0 bottom-0 w-100 h-100" src="<?php echo get_template_directory_uri();?>/assets/images/banner.jpg" loading="lazy" alt="">
	</div>
	<div class="container py-5">
		<?php 
			$all_categories = get_categories( $args_tax );
			if ( $all_categories && !is_wp_error( $all_categories ) ) {   
				foreach ($all_categories as $cat) {
					$category_id = $cat->term_id;  
					$thumbnail_id = get_term_meta( $category_id, 'thumbnail_id', true );
					$cat_img = wp_get_attachment_url( $thumbnail_id );
					echo '<h2 class="text-center fs-35 fw-bold mb-2 mb-md-2 mb-xl-2">'.$cat->name.'</h2><img loading="lazy" class="img-fluid mx-auto d-block mb-4 mb-xl-5" src="'.get_template_directory_uri().'/assets/images/line.png" alt="'.$cat->name.'">';
					if($cat_img) {
						echo '<img loading="lazy" class="img-fluid mx-auto d-block w-100 mb-4 mb-xl-5" src="'.$cat_img.'" alt="'.$cat->name.'">';
					}
					$q_Post = new WP_Query(array(
						'post_type' => 'product','no_found_rows' => true,'cache_results' => false,'include_children' => false,
						'posts_per_page' => 8,'tax_query' => array(array('taxonomy' => $taxonomy,'field' => 'id','terms' => array($category_id)))                           
					));
					if($q_Post->have_posts()) {
						global $product,$post;
						$stt = 1;
						echo '<div class="row justify-content-center gy-4 mb-4 mb-xl-5">';					
							while ($q_Post->have_posts()) {
								$q_Post->the_post(); 
								// $price = $product->get_price_html();
								// $product = wc_get_product(get_the_id());
								// if ( $product->is_on_sale() ) {
								// 	$sale = apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( '-', 'woocommerce' ) . '</span>', $post, $product );
								// }
								echo '<div class="col-12 col-sm-6 col-lg-4 col-xl-3 prod-num-'. $stt .'"><a href="'.get_the_permalink().'" title="'. get_the_title().'" class="d-block text-decoration-none text-black">'.get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block mb-3', 'alt' => '', 'loading' => 'lazy')).'
								<h3 class="mb-0 text-center fs-20 fw-normal text-capitalize">'. get_the_title().'</h3></a></div>';
								$stt ++;                                            
							}
						echo '</div>';
						// echo '<div class="col-12 text-center my-3"><a class="btn btn-1 text-capitalize px-2 px-sm-3 py-2" href="' . get_term_link( $category_id, $taxonomy ) . '" title="'. $term->name .'">Xem tất cả '.$cat->name.'</a></div>';
						// echo '</div></div>';					
					}   
				}
			}
		?>	
	</div>
	<div class="bg-f2f2f2 py-5">
		<div class="container">
			<h2 class="text-center fs-35 fw-bold mb-3 mb-md-3">Subscribe to newsletter</h2>
			<div class="text-center mb-4 mb-lg-4">Check out our Weekly Newsletter to catch up with the latest news and promotions!</div>
			<div class="row justify-content-center">
				<div class="col-10 col-sm-12 col-md-10 col-lg-8 col-xl-6"><?php echo newsLetter(); ?></div>
			</div>
		</div>
	</div>
</main><!-- #site-content -->

<?php
get_footer();
