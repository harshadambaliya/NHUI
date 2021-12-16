<?php 
/*
* Template Name: Thank You Page
*/

get_header(); ?>
<section class="landing-section error-landing-section thank-you-landing-section" style="background-image: url('<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/thank-you-landing.png');">
    <div class="container">
        <div class="error-landing-content text-center">
            <h1 class="section-title">Thank You!</h1>
			<p class="section-description">Your payment is successful! Your images will start downloading imemdiately. The downlaod link witll be sent your email id as well.  </p>
			<p class="section-description">If your download does nto start automatically please Contact Us</p>
			<a href="#" class="btn btn-light">Go to Homepage</a>
        </div>
    </div>
</section>
<!-- Landing Section End -->

<?php
    get_footer();
?>