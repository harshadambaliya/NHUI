<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
<section class="landing-section error-landing-section" style="background-image: url('<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/error-background-img.png');">
    <div class="container">
        <div class="error-landing-content text-center">
            <h1 class="section-title">Oh Ho!</h1>
			<p class="section-description">Your payment has failed! Any amount debited from your ccount will be refunded automatically. For more info contact your bank. </p>
			<a href="#" class="btn btn-light">Try Again</a>
        </div>
    </div>
</section>
<!-- Landing Section End -->

<?php
// get_sidebar();
get_footer();
