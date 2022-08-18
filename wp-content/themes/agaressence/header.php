<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="Shortcut Icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon.ico" type="image/x-icon">
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.min.js"></script>

		<?php wp_head();
			if (is_home() || is_front_page()) {
				echo '
				<meta property="og:image" content="'.get_template_directory_uri().'/assets/images/thumbnail.jpg">
				<meta itemprop="image" content="'.get_template_directory_uri().'/assets/images/thumbnail.jpg">
				<meta name="twitter:image" content="'.get_template_directory_uri().'/assets/images/thumbnail.jpg">';
			} 
		 ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
		<header id="header" class="header py-3">
			<div class="container-xxl">     
				<div class="d-flex justify-content-between align-items-center">
					<div class="d-flex align-items-center">
						<div class="d-flex color-8f8e8e cursor-pointer" data-bs-toggle="offcanvas" data-bs-target="#menuPrimary" aria-controls="menuPrimary">
							<div class="navbar-toggler btn-m p-0 rounded-0" ><span></span><span></span><span></span></div>
							<span class="ps-2">Menu</span>
						</div>
						<div class="color-8f8e8e ms-3 ms-lg-5 d-flex align-items-center cursor-pointer" data-bs-toggle="offcanvas" data-bs-target="#canvassearch" aria-controls="canvassearch">
							<div class="icon-search"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16" style="font-size: 14px;"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path></svg></div>
							<span class="ps-2">Search</span>
						</div>
						<!-- <div class="search-autocomplete position-relative ms-3 ms-lg-5 d-flex align-items-center">
							<div class="position-absolute start-0 ">
								<form action="<?php bloginfo('url'); ?>/" method="GET" role="form" id="searchform">
									<button type="submit" class="icon-search position-absolute top-50 start-10 p-0 border-0 bg-transparent translate-middle-y"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16" style="font-size: 14px;"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path></svg></button>
									<input type="text" autocomplete="off" class="form-control search-ajax py-2 rounded-0" name="s" placeholder="Search">
									<button type="button" class="btn-close text-reset position-absolute top-50 end-0 translate-middle-y me-1 d-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
								</form>
							</div>
							
						</div> -->

					</div>
					<h1 class="logo my-0"><span class="text-logo"><?php bloginfo('description'); ?></span><a class="d-block wrap-logo" href="<?php bloginfo('url'); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/logo.svg" class="img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>"></a></h1>
					<div class="d-flex align-items-center color-8f8e8e">
						<a href="<?php bloginfo('url'); ?>/my-account/" class="d-flex color-8f8e8e text-decoration-none" title="Account">							
							<svg class="color-svg icon-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
							<span class="ps-2">Account</span>
						</a>
						<a href="<?php bloginfo('url'); ?>/cart/" class="d-flex color-8f8e8e ms-3 ms-lg-5 text-decoration-none" title="Cart">					
							<svg class="color-svg icon-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/></svg>		
							<span class="ps-2">Cart</span>
						</a>
					</div>
				</div> 
				<div class="offcanvas offcanvas-start pt-lg-5" tabindex="-1" id="menuPrimary" aria-labelledby="menu">
					<div class="offcanvas-body px-0 pb-0">
						<div class="d-flex flex-column h-100 ">
						<div class="px-4"> 
							<div class="d-inline-flex align-items-center">
								<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
								<h5 class="offcanvas-title text-uppercase fs-30 color-8f8e8e fw-normal ms-2" id="menu">Menu</h5>
							</div>
							<?php if ( has_nav_menu( 'top' ) ) : 
								wp_nav_menu( array(
									'theme_location' => 'top',
									'menu_id'        => 'top-menu',
									'menu_class' => 'navbar-nav justify-content-center mb-0',
									// 'walker' => new WPSE_78121_Sublevel_Walker
								) );
							endif; ?> 
							</div>
							<div class="mt-auto bg-f2f2f2 w-100 px-4 pt-2">
								<div class="m-3">
									<a class="d-block color-383838 fs-15 text-decoration-none" href="" title=""><svg class="color-svg icon-g-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path></svg><span class="ps-3">Account</span></a>
								</div>
								<div class="m-3">
									<a class="d-block color-383838 fs-15 text-decoration-none" href="" title="">
<svg class="color-svg icon-g-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M144 208C126.3 208 112 222.2 112 239.1C112 257.7 126.3 272 144 272s31.1-14.25 31.1-32S161.8 208 144 208zM256 207.1c-17.75 0-31.1 14.25-31.1 32s14.25 31.1 31.1 31.1s31.1-14.25 31.1-31.1S273.8 207.1 256 207.1zM368 208c-17.75 0-31.1 14.25-31.1 32s14.25 32 31.1 32c17.75 0 31.99-14.25 31.99-32C400 222.2 385.8 208 368 208zM256 31.1c-141.4 0-255.1 93.12-255.1 208c0 47.62 19.91 91.25 52.91 126.3c-14.87 39.5-45.87 72.88-46.37 73.25c-6.624 7-8.373 17.25-4.624 26C5.818 474.2 14.38 480 24 480c61.49 0 109.1-25.75 139.1-46.25c28.87 9 60.16 14.25 92.9 14.25c141.4 0 255.1-93.13 255.1-207.1S397.4 31.1 256 31.1zM256 400c-26.75 0-53.12-4.125-78.36-12.12l-22.75-7.125L135.4 394.5c-14.25 10.12-33.87 21.38-57.49 29c7.374-12.12 14.37-25.75 19.87-40.25l10.62-28l-20.62-21.87C69.81 314.1 48.06 282.2 48.06 240c0-88.25 93.24-160 207.1-160s207.1 71.75 207.1 160S370.8 400 256 400z"/></svg><span class="ps-3">Contact Us</span></a>
								</div>
							</div>	
						</div>					
					</div>
				</div>
				
			</div>
			<div class="offcanvas canvas-search offcanvas-top h-100" tabindex="-1" id="canvassearch" aria-labelledby="canvassearchLabel">
				<div class="offcanvas-header">
					<form action="<?php bloginfo('url'); ?>/" method="GET" role="form" id="searchform" class="w-100 position-relative">
						<button type="submit" class="icon-search position-absolute top-50 start-10 p-0 border-0 bg-transparent translate-middle-y"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16" style="font-size: 14px;"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path></svg></button>
						<input type="text" autocomplete="off" id="search-ajax" class="form-control search-ajax py-2 rounded-0 border-0 ps-4 ps-lg-5" name="s" placeholder="Search...">
					</form>
					<button type="button" class="btn-close text-reset me-0 index-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<div id="load-data-search"></div>					
				</div>
			</div>
		</header><!-- /header -->
		<?php
		// Output the menu modal.
		//get_template_part( 'template-parts/modal-menu' );
