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
		<img class="img-fluid mx-auto d-block position-absolute end-0 start-0 top-0 bottom-0 w-100 h-100 object-fit" src="<?php echo get_template_directory_uri();?>/assets/images/banner.jpg" loading="lazy" alt="">
	</div>
	<div class="bg-f2f2f2">
		<div class="container-xxl py-5">
			<h2 class="text-left fs-25 fw-smi-bold mb-3">Featured Products</h2>
			<!-- <div class="line-2 my-3 my-md-3"></div> -->
			<?php 
				$tax_featured[] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
					'operator' => 'IN',
				);
				$args_featured = array( 'post_type' => 'product','posts_per_page' => 20,'ignore_sticky_posts' => 1, 'tax_query' => $tax_featured);
				$product_featured = new WP_query( $args_featured);
			if($product_featured->have_posts()) {
				global $product,$post;
				$stt = 1;
				echo '<div class="row gy-4 pt-3">';					
					while ($product_featured->have_posts()) {
						$product_featured->the_post(); 
						// $product = wc_get_product(get_the_id());
						$sale = '';
						if ( $product->is_on_sale() ) {
							$sale = apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( '-', 'woocommerce' ) . '</span>', $post, $product );
						}
						echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3c prod-num-'. $stt .'"><a href="'.get_the_permalink().'" title="'. get_the_title().'" class="d-block text-decoration-none text-black text-left item-product bg-white pb-3">
						<div class="position-relative mb-3 img-format-1">'.get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid d-block', 'alt' => '', 'loading' => 'lazy')).'
						'.$sale.'
						</div>
						<h3 class="mb-2 fs-15 fw-smi-bold color-333 text-capitalize px-3">'. get_the_title().'</h3>
						<div class="wrap-price px-3">'. $product->get_price_html().'</div>
						</a></div>';
						$stt ++;                                            
					}
				echo '</div>';
				// echo '<div class="col-12 text-center my-3"><a class="btn btn-1 text-capitalize px-2 px-sm-3 py-2" href="' . get_term_link( $category_id, $taxonomy ) . '" title="'. $term->name .'">Xem tất cả '.$cat->name.'</a></div>';
				// echo '</div></div>';					
			}   
		?>
	</div>
	<div class="container-xxl py-5">
		<?php 
			$all_categories = get_categories( $args_tax );
			if ( $all_categories && !is_wp_error( $all_categories ) ) {   
				foreach ($all_categories as $cat) {
					$category_id = $cat->term_id;  
					$thumbnail_id = get_term_meta( $category_id, 'thumbnail_id', true );
					$cat_img = wp_get_attachment_url( $thumbnail_id );					
					echo '<h2 class="text-center fs-25 fw-smi-bold mb-2 mb-md-2 mb-xl-2">'.$cat->name.'</h2>
					<div class="row justify-content-center"><div class="col-12 col-md-10 col-lg-9 col-xl-8 text-center mb-3 color-838383">'.$cat->description.'</div></div>
					<img loading="lazy" class="img-fluid mx-auto d-block mb-4 mb-xl-5 img-line" src="'.get_template_directory_uri().'/assets/images/line.png" alt="'.$cat->name.'">';
					if($cat_img) {
						echo '<div class="position-relative effect-2"><img loading="lazy" class="img-fluid mx-auto d-block w-100 mb-4 mb-xl-5" src="'.$cat_img.'" alt="'.$cat->name.'"><a class="position-absolute bottom-0 end-0 px-2 py-1 text-decoration-none view-all mb-2 me-2" href="'. get_term_link($cat->slug, $taxonomy) .'" title="'.$cat->name.'">View All</a></div>';
					}
					$q_Post = new WP_Query(array(
						'post_type' => 'product','no_found_rows' => true,'cache_results' => false,'include_children' => false,
						'posts_per_page' => 8,'tax_query' => array(array('taxonomy' => $taxonomy,'field' => 'id','terms' => array($category_id)))                           
					));
					if($q_Post->have_posts()) {
						global $product,$post;
						$stt = 1;
						echo '<div class="row gy-4 mb-4 mb-xl-5">';					
							while ($q_Post->have_posts()) {
								$q_Post->the_post(); 
								$sale = '';
								// $price = $product->get_price_html();
								// $product = wc_get_product(get_the_id());
								if ( $product->is_on_sale() ) {
									$sale = apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( '-', 'woocommerce' ) . '</span>', $post, $product );
								}
								echo '<div class="col-12 col-sm-6 col-lg-4 col-xl-3 prod-num-'. $stt .'"><a href="'.get_the_permalink().'" title="'. get_the_title().'" class="d-block text-decoration-none text-black text-left item-product bg-white pb-3">
								<div class="position-relative mb-3 img-format-1">'.get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto', 'alt' => '', 'loading' => 'lazy')).''.$sale.'	</div>
								<h3 class="mb-2 fs-15 fw-smi-bold color-333 text-capitalize px-3">'. get_the_title().'</h3>
								<div class="wrap-price px-3">'. $product->get_price_html().'</div>
								</a></div>';
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
	</div>
	<div class="container-xxl py-5">
		<h2 class="text-left fs-25 fw-smi-bold mb-0">From The Blog</h2>
		<div class="line-2 my-3 my-md-3"></div>
		<div class="row pt-3 mx-0 arrow-2" data-slide>
			<div class="col-12 col-md-6">
				<div class="row gy-4 align-items-center">
					<div class="col-12 col-sm-4 col-md-5"><a href="" title="" class="d-block text-decoration-none img-format-2 effect-3">
						<img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/blog_1.jpg" class="img-fluid" alt=""></a>
					</div>
					<div class="col-12 col-sm-8 col-md-7">
						<a href="" title="" class="post-title text-capitalize mb-1 d-block text-decoration-none">Alone With My Thoughts</a>
						<div class="post-date mb-3">15th April, 2018</div>
						<div class="post-description mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</div>
						<a href="" title="" class="text-decoration-none px-3 py-2 btn-red-more d-inline-block">Read more</a>
					</div>					
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="row gy-4 align-items-center">
					<div class="col-12 col-sm-4 col-md-5"><a href="" title="" class="d-block text-decoration-none img-format-2 effect-2">
						<img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/blog_1.jpg" class="img-fluid" alt=""></a>
					</div>
					<div class="col-12 col-sm-8 col-md-7">
						<a href="" title="" class="post-title text-capitalize mb-1 d-block text-decoration-none">Alone With My Thoughts</a>
						<div class="post-date mb-3">15th April, 2018</div>
						<div class="post-description mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</div>
						<a href="" title="" class="text-decoration-none px-3 py-2 btn-red-more d-inline-block">Read more</a>
					</div>					
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="row gy-4 align-items-center">
					<div class="col-12 col-sm-4 col-md-5"><a href="" title="" class="d-block text-decoration-none img-format-2 effect-2">
						<img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/blog_1.jpg" class="img-fluid" alt=""></a>
					</div>
					<div class="col-12 col-sm-8 col-md-7">
						<a href="" title="" class="post-title text-capitalize mb-1 d-block text-decoration-none">Alone With My Thoughts</a>
						<div class="post-date mb-3">15th April, 2018</div>
						<div class="post-description mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</div>
						<a href="" title="" class="text-decoration-none px-3 py-2 btn-red-more d-inline-block">Read more</a>
					</div>					
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="row gy-4 align-items-center">
					<div class="col-12 col-sm-4 col-md-5"><a href="" title="" class="d-block text-decoration-none img-format-2 effect-2">
						<img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/blog_1.jpg" class="img-fluid" alt=""></a>
					</div>
					<div class="col-12 col-sm-8 col-md-7">
						<a href="" title="" class="post-title text-capitalize mb-1 d-block text-decoration-none">Alone With My Thoughts</a>
						<div class="post-date mb-3">15th April, 2018</div>
						<div class="post-description mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</div>
						<a href="" title="" class="text-decoration-none px-3 py-2 btn-red-more d-inline-block">Read more</a>
					</div>					
				</div>
			</div>

		</div>
	</div>
	<div class="bg-f2f2f2 py-5">
		<div class="container-xxl">
			<h2 class="text-center fs-25 fw-smi-bold mb-3 mb-md-3">Subscribe to newsletter</h2>
			<div class="text-center mb-4 mb-lg-4">Check out our Weekly Newsletter to catch up with the latest news and promotions!</div>
			<div class="row justify-content-center">
				<div class="col-10 col-sm-12 col-md-10 col-lg-8 col-xl-6"><?php echo newsLetter(); ?></div>
			</div>
		</div>
	</div>
</main><!-- #site-content -->

<?php
get_footer();
