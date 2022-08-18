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
?>

<main id="site-content">
	<div class="banner position-relative bg-padding">
		<img class="img-fluid mx-auto d-block position-absolute end-0 start-0 top-0 bottom-0 w-100 h-100" src="<?php echo get_template_directory_uri();?>/assets/images/banner.jpg" loading="lazy" alt="">
	</div>
	<div class="container py-5">
		<h2 class="text-center fs-35 fw-bold mb-4 mb-md-4 mb-xl-5">Products</h2>
		<div class="row justify-content-center gy-4">
			<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
				<a href="" title="" class="d-block text-decoration-none text-black">
					<img class="img-fluid mx-auto d-block mb-3" src="<?php echo get_template_directory_uri();?>/assets/images/product_1.jpg" loading="lazy" alt="">
					<h3 class="mb-0 text-center fs-20 fw-normal text-capitalize">Products name 1</h3>
				</a>
			</div>
			<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
				<a href="" title="" class="d-block text-decoration-none text-black">
					<img class="img-fluid mx-auto d-block mb-3" src="<?php echo get_template_directory_uri();?>/assets/images/product_2.jpg" loading="lazy" alt="">
					<h3 class="mb-0 text-center fs-20 fw-normal text-capitalize">Products name 2</h3>
				</a>
			</div>
		</div>
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
