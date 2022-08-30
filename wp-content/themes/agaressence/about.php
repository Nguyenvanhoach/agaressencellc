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
/*
 * Template Name: Template Center
 * Template Post Type:  page
 */

get_header(); ?>
<div class="area-page py-4 py-md-5 bg-efefef">
	<div class="container-xxl">	
		<h2 class="title-page text-center fw-sim-bold fs-25 text-uppercase mb-4 mb-lg-5"><?php echo the_title(); ?></h2>	
		<div class="mb-3 fw-smi-bold fs-18">SHIPPING</div>	
		<div class="accordion accordion-faqs" id="faq1">
			<div class="accordion-item rounded-0 overflow-hidden mb-3 mb-md-4">
				<h4 class="accordion-header" id="shipping-1">
					<div class="accordion-button overflow-hidden" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-shipping-1" aria-expanded="true" aria-controls="collapse-shipping-1">
						How long will it take to get my order?
					</div>
				</h4>
				<div id="collapse-shipping-1" class="accordion-collapse collapse show" aria-labelledby="shipping-1" data-bs-parent="#faq1">
					<div class="accordion-body">
						<p>Orders can take up to 24 hours to be processed from the time of purchase.</p>
						<p>Orders placed on working days will usually be dispatched within 24 hours of purchase.</p>
						<p>UK Orders will be delivered within 1-3 working days from the day after purchase.</p>
						<p>EU Orders will be delivered within 10 days working days from the day after purchase.</p>
						<p>Orders outside the UK and EU will be delivered up to 15 working days from purchase.</p>
						<p>For more detailed information about delivery, please visit our T&Cs page.</p>
					</div>
				</div>
			</div>
			<div class="accordion-item rounded-0 overflow-hidden mb-3 mb-md-4">
				<h4 class="accordion-header" id="shipping-2">
					<div class="accordion-button overflow-hidden collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-shipping-2" aria-expanded="false" aria-controls="collapse-shipping-2">
						Do you ship overseas?
					</div>
				</h4>
				<div id="collapse-shipping-2" class="accordion-collapse collapse" aria-labelledby="shipping-2" data-bs-parent="#faq1">
					<div class="accordion-body">
						<p>Yes, we ship all over the world. Shipping costs will apply, and will be added to your total bill at checkout. We run discounts and promotions all year round, so do check the website for exclusive deals.</p>
					</div>
				</div>
			</div>
			<div class="accordion-item rounded-0 overflow-hidden mb-3 mb-md-4">
				<h4 class="accordion-header" id="shipping-3">
					<div class="accordion-button overflow-hidden collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseshipping-3" aria-expanded="false" aria-controls="collapseshipping-3">
					What shipping carriers do you use?
					</div>
				</h4>
				<div id="collapseshipping-3" class="accordion-collapse collapse" aria-labelledby="shipping-3" data-bs-parent="#faq1">
					<div class="accordion-body">
						<p>We use all major carriers, and local courier partners. You’ll be asked to select a suitable delivery method during checkout.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="mb-3 fw-smi-bold fs-18">PRODUCT</div>	
		<div class="accordion accordion-faqs" id="faq-product">
			<div class="accordion-item rounded-0 overflow-hidden mb-3 mb-md-4">
				<h4 class="accordion-header" id="product-1">
					<div class="accordion-button overflow-hidden collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-product-1" aria-expanded="true" aria-controls="collapse-product-1">
						Can I return my product?
					</div>
				</h4>
				<div id="collapse-product-1" class="accordion-collapse collapse" aria-labelledby="product-1" data-bs-parent="#faq-product">
					<div class="accordion-body">
						<p>At Lux Oud, we always strive to ensure that the fragrance you receive is of the highest quality and is as described. However, in the event that you are unhappy with your purchase, we would be more than happy to provide you with a FULL refund. Just email us directly and we’ll take you through the process.</p>
					</div>
				</div>
			</div>
			<div class="accordion-item rounded-0 overflow-hidden mb-3 mb-md-4">
				<h4 class="accordion-header" id="product-2">
					<div class="accordion-button overflow-hidden collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-product-2" aria-expanded="false" aria-controls="collapse-product-2">
					Can I get my product personalized?
					</div>
				</h4>
				<div id="collapse-product-2" class="accordion-collapse collapse" aria-labelledby="product-2" data-bs-parent="#faq-product">
					<div class="accordion-body">
						<p>This will depend on the type of fragrance that you want and your requirements. As I’m sure you can appreciate, some pure oils and fragrances are easier to blend than others. All options are however, outlined on the product page, so do look out for customization options there.</p>
					</div>
				</div>
			</div>			
		</div>
		
		<div class="mb-3 fw-smi-bold fs-18">OTHER</div>	
		<div class="accordion accordion-faqs" id="faq-other">
			<div class="accordion-item rounded-0 overflow-hidden mb-3 mb-md-4">
				<h4 class="accordion-header" id="other-1">
					<div class="accordion-button overflow-hidden collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-other-1" aria-expanded="true" aria-controls="collapse-other-1">
					Question not answered?
					</div>
				</h4>
				<div id="collapse-other-1" class="accordion-collapse collapse" aria-labelledby="other-1" data-bs-parent="#faq-other">
					<div class="accordion-body">
						<p>Don’t worry - you can contact us through our contact page. We will be happy to assist you.</p>
					</div>
				</div>
			</div>
			
		</div>

		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-lg-8">
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
	</div>
</div>
<?php get_footer();
