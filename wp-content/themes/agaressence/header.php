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
						<div class="d-flex color-8f8e8e cursor-pointer link-hover-1" data-bs-toggle="offcanvas" data-bs-target="#menuPrimary" aria-controls="menuPrimary">
							<div class="navbar-toggler btn-m p-0 rounded-0" ><span></span><span></span><span></span></div>
							<span class="ps-2 text-white link-hover-1 d-none d-sm-inline-block">Menu</span>
						</div>
						<div class="color-8f8e8e ms-3 ms-lg-5 d-flex align-items-center cursor-pointer link-hover-1" data-bs-toggle="offcanvas" data-bs-target="#canvassearch" aria-controls="canvassearch">
							<div class="icon-search link-hover-1"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16" style="font-size: 14px;"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path></svg></div>
							<span class="ps-2 text-white link-hover-1 d-none d-sm-inline-block">Search</span>
						</div>
					</div>
					<h1 class="logo my-0"><span class="text-logo"><?php bloginfo('description'); ?></span><a class="d-block wrap-logo" href="<?php bloginfo('url'); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/logo_white.svg" class="img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>"></a></h1>
					<div class="d-flex align-items-center color-8f8e8e">
						<a href="<?php bloginfo('url'); ?>/my-account/" class="d-flex color-8f8e8e text-decoration-none link-hover-1" title="Account">							
							<svg class="color-svg icon-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
							<span class="ps-2 text-white link-hover-1 d-none d-sm-inline-block">Account</span>
						</a>
						<a href="<?php bloginfo('url'); ?>/cart/" class="d-flex color-8f8e8e link-hover-1 ms-3 ms-lg-5 text-decoration-none position-relative" title="Cart">					
							<svg class="color-svg icon-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/></svg>		
							<span class="ps-sm-2 text-white link-hover-1 number-cart"><span class="d-none d-sm-inline-block">Cart</span> <?php if ( !(WC()->cart->is_empty()) ) {
								echo '(<strong>'. WC()->cart->get_cart_contents_count() .'</strong>)';
							}?> </span>
						</a>
					</div>
				</div> 
				<div class="offcanvas offcanvas-start pt-lg-4" tabindex="-1" id="menuPrimary" aria-labelledby="menu">
					<div class="offcanvas-body px-0 pb-0">
						<div class="d-flex flex-column h-100 ">
						<div class="px-4"> 
							<div class="d-flex align-items-center justify-content-between mb-3 mb-lg-4">
								<h5 class="offcanvas-title text-uppercase fs-menu text-black fw-normal" id="menu">Menu</h5>
								<button type="button" class="btn-close text-reset opacity-100" data-bs-dismiss="offcanvas" aria-label="Close"></button>
							</div>
							<?php if ( has_nav_menu( 'primary' ) ) : 
								wp_nav_menu( array(
									'theme_location' => 'primary',
									// 'theme_location' => 'top',
									'menu_id'        => 'top-menu',
									'menu_class' => 'navbar-nav justify-content-center mb-0 d-block',
									// 'walker' => new WPSE_78121_Sublevel_Walker
								) );
							endif; ?> 
							</div>
							<div class="mt-auto bg-f2f2f2 w-100 px-4 pt-2 menu-page-bottom">
								<div class="m-3">
									<a class="d-block color-383838 fs-15 text-decoration-none" href="<?php bloginfo('url'); ?>/my-account/" title="Account"><svg class="color-svg icon-g-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path></svg><span class="ps-3">Account</span></a>
								</div>
								<div class="m-3">
									<a class="d-block color-383838 fs-15 text-decoration-none" href="<?php bloginfo('url'); ?>/about-us" title="About Us"><svg class="color-svg icon-g-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M336 0C362.5 0 384 21.49 384 48V367.8C345.8 389.2 320 430 320 476.9C320 489.8 323.6 501.8 329.9 512H240V432C240 405.5 218.5 384 192 384C165.5 384 144 405.5 144 432V512H48C21.49 512 0 490.5 0 464V48C0 21.49 21.49 0 48 0H336zM64 272C64 280.8 71.16 288 80 288H112C120.8 288 128 280.8 128 272V240C128 231.2 120.8 224 112 224H80C71.16 224 64 231.2 64 240V272zM176 224C167.2 224 160 231.2 160 240V272C160 280.8 167.2 288 176 288H208C216.8 288 224 280.8 224 272V240C224 231.2 216.8 224 208 224H176zM256 272C256 280.8 263.2 288 272 288H304C312.8 288 320 280.8 320 272V240C320 231.2 312.8 224 304 224H272C263.2 224 256 231.2 256 240V272zM80 96C71.16 96 64 103.2 64 112V144C64 152.8 71.16 160 80 160H112C120.8 160 128 152.8 128 144V112C128 103.2 120.8 96 112 96H80zM160 144C160 152.8 167.2 160 176 160H208C216.8 160 224 152.8 224 144V112C224 103.2 216.8 96 208 96H176C167.2 96 160 103.2 160 112V144zM272 96C263.2 96 256 103.2 256 112V144C256 152.8 263.2 160 272 160H304C312.8 160 320 152.8 320 144V112C320 103.2 312.8 96 304 96H272zM576 272C576 316.2 540.2 352 496 352C451.8 352 416 316.2 416 272C416 227.8 451.8 192 496 192C540.2 192 576 227.8 576 272zM352 477.1C352 425.7 393.7 384 445.1 384H546.9C598.3 384 640 425.7 640 477.1C640 496.4 624.4 512 605.1 512H386.9C367.6 512 352 496.4 352 477.1V477.1z"/></svg><span class="ps-3">About Us</span></a>
								</div>
								<div class="m-3">
									<a class="d-block color-383838 fs-15 text-decoration-none" href="<?php bloginfo('url'); ?>/contact-us" title="Contact Us"><svg class="color-svg icon-g-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M144 208C126.3 208 112 222.2 112 239.1C112 257.7 126.3 272 144 272s31.1-14.25 31.1-32S161.8 208 144 208zM256 207.1c-17.75 0-31.1 14.25-31.1 32s14.25 31.1 31.1 31.1s31.1-14.25 31.1-31.1S273.8 207.1 256 207.1zM368 208c-17.75 0-31.1 14.25-31.1 32s14.25 32 31.1 32c17.75 0 31.99-14.25 31.99-32C400 222.2 385.8 208 368 208zM256 31.1c-141.4 0-255.1 93.12-255.1 208c0 47.62 19.91 91.25 52.91 126.3c-14.87 39.5-45.87 72.88-46.37 73.25c-6.624 7-8.373 17.25-4.624 26C5.818 474.2 14.38 480 24 480c61.49 0 109.1-25.75 139.1-46.25c28.87 9 60.16 14.25 92.9 14.25c141.4 0 255.1-93.13 255.1-207.1S397.4 31.1 256 31.1zM256 400c-26.75 0-53.12-4.125-78.36-12.12l-22.75-7.125L135.4 394.5c-14.25 10.12-33.87 21.38-57.49 29c7.374-12.12 14.37-25.75 19.87-40.25l10.62-28l-20.62-21.87C69.81 314.1 48.06 282.2 48.06 240c0-88.25 93.24-160 207.1-160s207.1 71.75 207.1 160S370.8 400 256 400z"/></svg><span class="ps-3">Contact Us</span></a>
								</div>
							</div>	
						</div>					
					</div>
				</div>
				
			</div>
			<div class="offcanvas canvas-search offcanvas-top h-100" tabindex="-1" id="canvassearch" aria-labelledby="canvassearchLabel">
				<div class="offcanvas-header">
					<form action="<?php bloginfo('url'); ?>/" method="GET" role="form" id="searchform" class="w-100 position-relative">
						<button type="submit" class="icon-search position-absolute top-50 start-0 p-0 border-0 bg-transparent translate-middle-y"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16" style="font-size: 14px;"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path></svg></button>
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
