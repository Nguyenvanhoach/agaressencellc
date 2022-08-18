<?php

/*Template Name: Contact Layout*/
get_header();  
?>
<div class="area-page contact-form bg-efefef py-5">
  <div class="container-xxl mb-lg-5">
    <div class="title-page text-center fw-sim-bold fs-25 text-uppercase mb-4 mb-lg-5"><?php echo get_the_title();?></div>
    <div class="row gy-4 justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-5">
        <div class="wrap-form-contact">
          <?php echo contactForm(); ?>                  
        </div>
      </div>
    </div>    
  </div>
</div>
<?php 
  get_footer();
  echo "<script src='https://www.google.com/recaptcha/api.js' async defer></script>";
?>

