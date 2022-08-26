<?php
	get_header();   
	$big = 999999999;
  if ( get_query_var('paged') ) {
    $paged = get_query_var('paged'); 
  } elseif ( get_query_var('page') ) { 
    $paged = get_query_var('page');
  } else {
    $paged = 1;
  }

	$catalog = get_category( get_query_var( 'cat' ) );
  // $cat = get_query_var( 'cat' );
  $cat_slug = $catalog->slug;
	$catID_now = $catalog->cat_ID;
  $catID = 1;
?>

<div class="bg-efefef py-5">
	<div class="container-xxl mb-5 pb-lg-4">
		<h2 class="title-page text-left fw-bold fs-25 text-uppercase mb-4 mb-lg-5"><?php echo $catalog->name;?></h2>
		<?php 
			$get_post = new WP_Query(array(
				'cat' => $catID_now,
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => '12', 
				'paged'          => $paged, 
			));
			if($get_post->have_posts()) {
				echo '<div class="row gx-3 gx-xl-4 gy-3 gy-lg-4">';
					while ($get_post->have_posts()) { 
						$get_post->the_post(); 
						$number_comment = get_comments_number(get_the_ID());
						$text_comment = '';
						if($number_comment>0) {
							$text_comment = '<a class="d-block text-black text-decoration-none" href="' . get_the_permalink() . '#comments" title="' . get_the_title() .'">'. $number_comment . ' Comment' . '</a>';
							
						} else {
							$text_comment = '<a class="d-block text-black text-decoration-none" href="' . get_the_permalink() . '#respond" title="' . get_the_title() .'">' . 'Leave a Comment' . '</a>';
							
						}

						echo '<div class="col-12 col-sm-6 col-md-6 col-lg-4"><div class="bg-white h-100 overflow-hidden d-block text-decoration-none border">
							<a class="position-relative overflow-hidden effect-2 img-bg-2 d-block" href="' . get_the_permalink() . '" title="' . get_the_title() .'">'. get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' => 'img-fluid object-fit w-100 h-100','loading' => 'lazy','alt' => get_the_title() )) .'	</a>
							<div class="p-4 p-sm-4">
								<div class="d-flex">
									<div class="fw-medium fs-13 text-black mb-3 border-end border-2 me-2 pe-2 d-inline-flex"><svg class="icon-svg-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"/></svg><span class="ps-2">'.get_the_date().'</span></div>	
									<div class="fw-medium fs-13 text-black  mb-3 d-inline-flex"><svg class="icon-svg-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z"/></svg><span class="ps-2">'.$text_comment.'</span></div>	
								</div>
								<div class="fw-bold fs-18 mb-3 text-capitalize text-black link-hover-1">' . get_the_title() .'</div>
								<div class="fs-15 color-828282 mb-3">'.wp_strip_all_tags( get_the_excerpt(), true ).'</div>
								<a class="text-black link-hover-1 fw-medium" href="' . get_the_permalink() . '" title="' . get_the_title() .'">Read More</a>
							</div>
						</div></div>';
					}
				echo '</div>';
			}            
			echo "<div class='paginations d-flex'>";	
				echo paginate_links( array(
					'base' => str_replace($big, '%#%', esc_url( get_pagenum_link($big ) ) ),
					'format' => '?paged=%#%',
					'prev_text'    => __('<span class=""><</span>'),
					'next_text'    => __('<span class="">></span>'),
					'current' => max( 1, get_query_var('paged') ),
					'total' => $get_post->max_num_pages, //12 là post page $postNo /12
					) );
					
			echo "</div>";
		?>
	</div>
</div>
	
<?php get_footer();
