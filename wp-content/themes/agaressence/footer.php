<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
    </main>
    <footer class="footer pt-5">
      <div class="pt-md-3">
        <div class="container-xxl">
          <div class="row justify-content-center">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
              <h1 class="logo mx-auto mb-4 mb-lg-4"><span class="text-logo"><?php bloginfo('description'); ?></span><a class="d-block wrap-logo" href="<?php bloginfo('url'); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/logo_white.svg" class="img-fluid d-block" alt="<?php echo get_bloginfo( 'name' ); ?>"></a></h1>
              <div class="mb-3 mb-md-4">Agar Essence Ltd.</div>
              <div class="d-flex mb-3 mb-md-4 link-hover-1"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" class="w-35" xml:space="preserve" fill="#ffffff" width="35px" height="25px"><g><g><path d="M446.812,493.966l-67.499-142.781c-1.347-2.849-3.681-5.032-6.48-6.223l-33.58-14.949l58.185-97.518c0.139-0.234,0.27-0.471,0.395-0.713c11.568-22.579,17.434-46.978,17.434-72.515c0-42.959-16.846-83.233-47.435-113.402C337.248,15.703,296.73-0.588,253.745,0.016c-41.748,0.579-81.056,17.348-110.685,47.22c-29.626,29.87-46.078,69.313-46.326,111.066c-0.152,25.515,5.877,50.923,17.431,73.479c0.124,0.241,0.255,0.479,0.394,0.713l58.184,97.517l-33.774,15.031c-2.763,1.229-4.993,3.408-6.285,6.142L65.187,493.966c-2.259,4.775-1.306,10.453,2.388,14.23c3.693,3.777,9.345,4.859,14.172,2.711l84.558-37.646l84.558,37.646c3.271,1.455,7.006,1.455,10.277,0l84.558-37.646l84.558,37.646c1.652,0.735,3.401,1.093,5.135,1.093c3.331,0,6.608-1.318,9.037-3.803C448.119,504.419,449.071,498.743,446.812,493.966z M136.473,219.906c-9.73-19.132-14.599-39.805-14.47-61.453c0.428-72.429,59.686-132.17,132.094-133.173c36.166-0.486,70.263,13.199,95.993,38.576c25.738,25.383,39.911,59.267,39.911,95.412c0,21.359-4.869,41.757-14.473,60.638L266.85,402.054c-3.318,5.56-8.692,6.16-10.849,6.16c-2.158,0-7.532-0.6-10.849-6.16L136.473,219.906z M350.834,447.891c-3.271-1.455-7.006-1.455-10.277,0l-84.558,37.646l-84.558-37.646c-3.271-1.455-7.006-1.455-10.277,0l-58.578,26.08l50.938-107.749l32.258-14.356l37.668,63.133c6.904,11.572,19.072,18.481,32.547,18.481c13.475,0,25.643-6.909,32.547-18.48l37.668-63.133l32.261,14.361l50.935,107.744L350.834,447.891z"/></g></g><g><g><path d="M256.004,101.607c-31.794,0-57.659,25.865-57.659,57.658s25.865,57.658,57.659,57.658c31.793,0.001,57.658-25.865,57.658-57.658S287.797,101.607,256.004,101.607z M256.004,191.657c-17.861,0.001-32.393-14.529-32.393-32.392c0-17.861,14.531-32.392,32.393-32.392c17.861,0,32.392,14.531,32.392,32.392S273.865,191.657,256.004,191.657z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                <span class="ps-2">The Landing Media City UK M50 2ST</span>
              </div>
              <div class="d-flex mb-3 mb-md-4 link-hover-1">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" class="w-35" style="enable-background:new 0 0 512 512;" xml:space="preserve" fill="#ffffff" width="35px" height="25px"><g><g><path d="M511.609,197.601c-0.001-0.77-0.173-1.933-0.472-2.603c-0.787-2.854-2.536-5.461-5.154-7.281l-73.292-50.948V82.153c0-7.24-5.872-13.112-13.112-13.112H335.26l-71.743-49.878c-4.484-3.121-10.437-3.134-14.935-0.026l-72.206,49.904H92.426c-7.242,0-13.112,5.872-13.112,13.112v53.973L5.666,187.027c-3.623,2.504-5.583,6.507-5.645,10.6C0.017,197.704,0,197.777,0,197.857l0.391,284.235c0.005,3.477,1.391,6.81,3.852,9.266c2.458,2.451,5.788,3.827,9.26,3.827c0.007,0,0.012,0,0.018,0l485.385-0.667c7.24-0.01,13.104-5.889,13.094-13.13L511.609,197.601z M432.69,168.708l41.898,29.118l-41.898,29.128V168.708z M256.015,45.884l33.31,23.156h-66.812L256.015,45.884z M105.538,95.265h300.928v149.921L305.43,315.428l-41.194-31.954c-0.064-0.05-0.119-0.081-0.181-0.126c-4.604-3.454-11.116-3.581-15.894,0.126l-41.493,32.185l-101.13-69.893V95.265z M79.314,168.003v59.64l-43.146-29.819L79.314,168.003z M26.258,222.867l158.669,109.655L26.578,455.346L26.258,222.867z M51.875,468.909l204.324-158.484l203.591,157.923L51.875,468.909z M327.144,332.271l158.276-110.036l0.32,233.059L327.144,332.271z"/></g></g><g><g><path d="M344.77,147.713H167.234c-7.24,0-13.112,5.872-13.112,13.112s5.872,13.112,13.112,13.112H344.77c7.242,0,13.112-5.872,13.112-13.112S352.012,147.713,344.77,147.713z"/></g></g><g><g><path d="M344.77,215.895H167.234c-7.24,0-13.112,5.872-13.112,13.112c0,7.24,5.872,13.112,13.112,13.112H344.77c7.242,0,13.112-5.872,13.112-13.112C357.882,221.767,352.012,215.895,344.77,215.895z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                <a class="color-ebebeb text-decoration-none ms-2" href="mailto:agaressencellc@gmail.com" title="agaressencellc@gmail.com">agaressencellc@gmail.com</a>
              </div>
              <div class="d-flex mb-3 mb-md-4 link-hover-1">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 476 476" class="w-35" style="enable-background:new 0 0 476 476;" xml:space="preserve" fill="#ffffff" width="35px" height="25px"><g><path d="M400.85,181v-18.3c0-43.8-15.5-84.5-43.6-114.7c-28.8-31-68.4-48-111.6-48h-15.1c-43.2,0-82.8,17-111.6,48c-28.1,30.2-43.6,70.9-43.6,114.7V181c-34.1,2.3-61.2,30.7-61.2,65.4V275c0,36.1,29.4,65.5,65.5,65.5h36.9c6.6,0,12-5.4,12-12V192.8c0-6.6-5.4-12-12-12h-17.2v-18.1c0-79.1,56.4-138.7,131.1-138.7h15.1c74.8,0,131.1,59.6,131.1,138.7v18.1h-17.2c-6.6,0-12,5.4-12,12v135.6c0,6.6,5.4,12,12,12h16.8c-4.9,62.6-48,77.1-68,80.4c-5.5-16.9-21.4-29.1-40.1-29.1h-30c-23.2,0-42.1,18.9-42.1,42.1s18.9,42.2,42.1,42.2h30.1c19.4,0,35.7-13.2,40.6-31c9.8-1.4,25.3-4.9,40.7-13.9c21.7-12.7,47.4-38.6,50.8-90.8c34.3-2.1,61.5-30.6,61.5-65.4v-28.6C461.95,211.7,434.95,183.2,400.85,181z M104.75,316.4h-24.9c-22.9,0-41.5-18.6-41.5-41.5v-28.6c0-22.9,18.6-41.5,41.5-41.5h24.9V316.4z M268.25,452h-30.1c-10,0-18.1-8.1-18.1-18.1s8.1-18.1,18.1-18.1h30.1c10,0,18.1,8.1,18.1,18.1S278.25,452,268.25,452z M437.95,274.9c0,22.9-18.6,41.5-41.5,41.5h-24.9V204.8h24.9c22.9,0,41.5,18.6,41.5,41.5V274.9z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                <a class="color-ebebeb text-decoration-none ms-2" href="tel:0333 050 8269" title="0333 050 8269">0333 050 8269</a>
              </div>
            </div> 
            <div class="col-12 col-md-8">
              <div class="row gx-3 gx-sm-3 gx-xl-4 gy-4 gy-sm-4 gy-md-0">
                <div class="col-6 col-sm">
                  <div class="fw-medium fs-16 color-e09654 mb-4">Legal Protection</div>
                  <ul class="list-unstyled">
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="<?php bloginfo('url'); ?>/" title="Privacy Policy">Privacy Policy</a></li>
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="<?php bloginfo('url'); ?>/" title="Terms and Conditions">Terms and Conditions</a></li>
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="<?php bloginfo('url'); ?>/" title="Terms of Sales">Terms of Sales</a></li>
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="<?php bloginfo('url'); ?>/" title="Legal Disclaimers">Legal Disclaimers</a></li>
                  </ul>
                </div>
                <div class="col-6 col-sm">
                  <div class="fw-medium fs-16 color-e09654 text-opacity-87 mb-4">Customer Service Information</div>
                  <ul class="list-unstyled">
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="<?php bloginfo('url'); ?>/contact-us" title="Contact us">Contact us</a></li>
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="" title="About us">About us</a></li>
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="" title="Site map">Site map</a></li>
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="" title="Blogs">Blogs</a></li>
                  </ul>
                </div>
                <div class="col-6 col-sm">
                  <div class="fw-medium fs-16 color-e09654 text-opacity-87 mb-3">Shop</div>
                  <ul class="list-unstyled">
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="<?php bloginfo('url'); ?>/" title="Product 1">Product 1</a></li>
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="" title="">Product 2</a></li>
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="" title="Training">Training</a></li>
                    <li><a class="text-decoration-none mb-3 color-ebebeb d-block" href="" title="Blogs">Blogs</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="fw-bold text-center mb-2">Follow The Agaressence</div>
          <ul class="list-inline d-flex flex-wrap list-social justify-content-center mb-4">
            <li class="list-inline-item px-2 px-md-2 px-xl-2 py-2"><a class="d-block" href="" title="telegram"><svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.8" d="M12.7759 0C5.81696 0 0.178711 5.59476 0.178711 12.5C0.178711 19.4052 5.81696 25 12.7759 25C19.7348 25 25.3731 19.4052 25.3731 12.5C25.3731 5.59476 19.7348 0 12.7759 0ZM18.9221 8.56855L16.8903 18.246C16.7379 18.9516 16.3315 19.1028 15.722 18.8004L12.5727 16.4819L11.0489 17.9435C10.8965 18.0948 10.7441 18.246 10.4393 18.246L10.6425 15.0706L16.4839 9.82863C16.7379 9.62702 16.4331 9.47581 16.0776 9.67742L8.86467 14.2137L5.76617 13.256C5.10583 13.0544 5.10583 12.5504 5.91855 12.248L18.0586 7.61089C18.6173 7.40927 19.1253 7.7621 18.9221 8.56855Z" fill="white"/></svg></a></li>
            <li class="list-inline-item px-2 px-md-2 px-xl-2 py-2"><a class="d-block" href="" title="facebook"><svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.8" d="M25.5674 12.5752C25.5674 5.66995 19.9291 0.0751953 12.9702 0.0751953C6.0113 0.0751953 0.373047 5.66995 0.373047 12.5752C0.373047 18.8252 4.9446 24.0167 10.9892 24.924V16.2042H7.78913V12.5752H10.9892V9.85342C10.9892 6.72842 12.8686 4.96431 15.7132 4.96431C17.1354 4.96431 18.5577 5.21632 18.5577 5.21632V8.29092H16.983C15.4084 8.29092 14.9004 9.24858 14.9004 10.2566V12.5752H18.4053L17.8465 16.2042H14.9004V24.924C20.945 24.0167 25.5674 18.8252 25.5674 12.5752Z" fill="white"/></svg></a></li>
            <li class="list-inline-item px-2 px-md-2 px-xl-2 py-2"><a class="d-block" href="" title="twitter"><svg width="27" height="21" viewBox="0 0 27 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.8" d="M23.8823 5.23255C24.8982 4.4765 25.8125 3.56924 26.5237 2.51077C25.6094 2.914 24.5427 3.21642 23.476 3.31723C24.5934 2.66198 25.4062 1.65392 25.8125 0.393838C24.7966 0.998677 23.6283 1.45231 22.4601 1.70432C21.4442 0.645854 20.0727 0.0410156 18.5488 0.0410156C15.6027 0.0410156 13.2154 2.40997 13.2154 5.33335C13.2154 5.73658 13.2661 6.13981 13.3677 6.54303C8.94857 6.29102 4.98655 4.17408 2.34521 0.998677C1.88805 1.75473 1.63408 2.66198 1.63408 3.67005C1.63408 5.48456 2.54839 7.09747 4.02145 8.05513C3.15793 8.00473 2.29441 7.80311 1.58328 7.39989V7.45029C1.58328 10.0209 3.41191 12.1378 5.85007 12.6418C5.44371 12.7426 4.93576 12.8434 4.4786 12.8434C4.12304 12.8434 3.81827 12.793 3.4627 12.7426C4.12304 14.8596 6.10404 16.3717 8.44062 16.4221C6.612 17.8334 4.32622 18.6902 1.83726 18.6902C1.3801 18.6902 0.973743 18.6398 0.567383 18.5894C2.90396 20.1015 5.69768 20.9584 8.74539 20.9584C18.5488 20.9584 23.8823 12.9442 23.8823 5.93819C23.8823 5.68618 23.8823 5.48456 23.8823 5.23255Z" fill="white"/></svg></a></li>
            <li class="list-inline-item px-2 px-md-2 px-xl-2 py-2"><a class="d-block" href="" title="youtube"><svg width="29" height="21" viewBox="0 0 29 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.8" d="M27.6993 3.89686C27.3945 2.68719 26.4294 1.72952 25.2611 1.4271C23.0769 0.822266 14.4418 0.822266 14.4418 0.822266C14.4418 0.822266 5.75582 0.822266 3.57163 1.4271C2.40334 1.72952 1.43824 2.68719 1.13347 3.89686C0.523926 6.0138 0.523926 10.5501 0.523926 10.5501C0.523926 10.5501 0.523926 15.036 1.13347 17.2033C1.43824 18.413 2.40334 19.3202 3.57163 19.6227C5.75582 20.1771 14.4418 20.1771 14.4418 20.1771C14.4418 20.1771 23.0769 20.1771 25.2611 19.6227C26.4294 19.3202 27.3945 18.413 27.6993 17.2033C28.3088 15.036 28.3088 10.5501 28.3088 10.5501C28.3088 10.5501 28.3088 6.0138 27.6993 3.89686ZM11.5972 14.6327V6.46743L18.8101 10.5501L11.5972 14.6327Z" fill="white"/></svg></a></li>
            <li class="list-inline-item px-2 px-md-2 px-xl-2 py-2"><a class="d-block" href="" title="medium"><svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.8" d="M0.308594 0.209961V22.7906H23.0648V0.209961H0.308594ZM19.2044 5.60311L17.9853 6.76238C17.8837 6.81278 17.8329 6.96399 17.8329 7.0648V15.6333C17.8329 15.7342 17.8837 15.8854 17.9853 15.9358L19.1536 17.095V17.3471H13.1597V17.095L14.4296 15.9358C14.5312 15.7846 14.5312 15.7846 14.5312 15.5829V8.6777L11.0771 17.3471H10.62L6.65798 8.6777V14.4741C6.60718 14.7261 6.70877 14.9781 6.86116 15.1293L8.4866 17.095V17.3471H3.91504V17.095L5.48969 15.1293C5.69287 14.9781 5.74367 14.7261 5.69287 14.4741V7.77044C5.74367 7.61924 5.64208 7.41762 5.54049 7.26641L4.11822 5.60311V5.30069H8.53739L11.9407 12.7604L14.9884 5.35109H19.2044V5.60311Z" fill="white"/></svg></a></li>
            <li class="list-inline-item px-2 px-md-2 px-xl-2 py-2"><a class="d-block" href="" title="linkedin"><svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.8" d="M21.1957 0.209961H1.63959C0.776072 0.209961 0.0649414 0.966009 0.0649414 1.87327V21.1777C0.0649414 22.085 0.776072 22.7906 1.63959 22.7906H21.1957C22.0592 22.7906 22.8211 22.085 22.8211 21.1777V1.87327C22.8211 0.966009 22.0592 0.209961 21.1957 0.209961ZM6.92228 19.5648H3.5698V8.82891H6.92228V19.5648ZM5.24604 7.31682C4.12855 7.31682 3.26503 6.45996 3.26503 5.40149C3.26503 4.34303 4.12855 3.43577 5.24604 3.43577C6.31273 3.43577 7.17625 4.34303 7.17625 5.40149C7.17625 6.45996 6.31273 7.31682 5.24604 7.31682ZM19.5702 19.5648H16.167V14.3229C16.167 13.1132 16.167 11.5003 14.4399 11.5003C12.6621 11.5003 12.4081 12.8612 12.4081 14.2725V19.5648H9.05567V8.82891H12.2558V10.2906H12.3066C12.7637 9.43375 13.8812 8.52649 15.5066 8.52649C18.9099 8.52649 19.5702 10.7946 19.5702 13.6676V19.5648Z" fill="white"/></svg></a></li>
          </ul>
          
        </div> 
      </div>
      <div class="line-1"></div>
      <div class="py-4">
        <div class="container-xxl">
          <div class="row align-items-center gy-3">
            <div class="col-12 col-sm-6 text-center text-sm-start">Copyright © 2022 Agaressence. All Rights Reserved.</div>
            <div class="col-12 col-sm-6"><div class="text-center text-sm-end"><img style="max-height: 40px;" loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/img_credit-cards.png" class="img-fluid" alt="Payment method"></div></div>
          </div>
        </div>
      </div>
    </footer>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/script.js"></script>
    <?php wp_footer(); ?>
    <script>
      $("#subscribe-form").on("click","#btn-subscribe",function(){
        var email_sub = $('#subscribe-form .email_subscribe').val();
        $(".new-letter .error-sub-mail").text('');
        $(".new-letter .success-sub-mail").remove();    
        if(email_sub != 0){
          if(isValidEmailAddress(email_sub)){
            $.ajax({
                type : "post", //Phương thức truyền post hoặc get
                dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
                url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data : {
                    action: "thongbao", //Tên action
                    email_sub : email_sub,//Biến truyền vào xử lý. $_POST['website']
                },
                context: this,
                success: function(response) {
                  if(response.success) {
                      window.alert('Thank you for subscribing.');
                    }                   
                    else {
                      $(".new-letter .error-sub-mail").text('Email existed!');
                    }
                },
                error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            })
          } else {
            $(".new-letter .error-sub-mail").text('Email is invalid!');
          }
        } else {
          $(".new-letter .error-sub-mail").text('Email is invalid!');
        }    
        return false;  
      });
      function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
      }
    </script>
    <script>
    var timeout = null; // khai báo biến timeout
    $("#search-ajax").keyup(function(){ // bắt sự kiện khi gõ từ khóa tìm kiếm
        clearTimeout(timeout); // clear time out
        timeout = setTimeout(function (){
           call_ajax(); // gọi hàm ajax
        }, 500);
    });
    function call_ajax() { // khởi tạo hàm ajax
        var data = $('#search-ajax').val(); // get dữ liệu khi đang nhập từ khóa vào ô
        $.ajax({
            type: 'POST',
            async: true,
            url: '<?php echo admin_url('admin-ajax.php');?>',
            data: {
                'action' : 'Post_filters', 
                'data': data
            },
            beforeSend: function () {
            },
            success: function (data) {
                $('#load-data-search').html(data); // show dữ liệu khi trả về
            }
        });
    }
</script>
  </body>
</html>
