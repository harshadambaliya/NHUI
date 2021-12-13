<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	</div><!-- #content -->
    <?php// get_template_part( 'footer-widget' ); ?>
	<footer class="site-footer " role="contentinfo">
		<div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col col-12 col-md-3 col-lg-3">
                        <div class="footer-menu">
                            <h3 class="footer-menu-title">ABOUT US</h3>
                            <ul class="footer-menu-list">
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Nalla S</a>
                                </li>
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Our Services</a>
                                </li>
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Blogs</a>
                                </li>
                            </ul>
                            <div class="social-media">
                                <h3 class="footer-menu-title">Follow us</h3>
                                <ul class="social-media-list">
                                    <li class="social-media-item">
                                        <a href="#" class="social-media-link">
                                            <img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/insta-dark.png" alt="Instagram" class="img-fluid">
                                        </a>
                                    </li>
                                    <li class="social-media-item">
                                        <a href="#" class="social-media-link">
                                            <img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/facebook-dark.png" alt="Facebook" class="img-fluid">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-md-3 col-lg-2">
                        <div class="footer-menu">
                            <h3 class="footer-menu-title">CATEGORIES</h3>
                            <ul class="footer-menu-list">
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Lions</a>
                                </li>
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Tigers</a>
                                </li>
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Birds</a>
                                </li>
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Reptiles</a>
                                </li>
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Other Animals</a>
                                </li>
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Videos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-12 col-md-3 col-lg-3">
                        <div class="footer-logo-content">
                            <img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/logo-dark.png" alt="" class="img-fluid">
                            <ul class="footer-menu-list">
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Terms of Service</a>
                                </li>
                                <li class="footer-menu-item">
                                    <a href="#" class="footer-menu-link">Payment Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-12 col-md-3 col-lg-4">
                        <div class="footer-menu">
                            <h3 class="footer-menu-title">CONTACT US</h3>
                            <p class="footer-menu-link">69, Duttas Lane, Sandeswartala, <br/>Chinsurah - 712101 <br/>West bengal</p>
                            
                            <div class="contact-menu">
                                <ul class="footer-menu-list">
                                    <li class="footer-menu-item">
                                        <span>Call:</span> <a href="tel:+919876543210" class="footer-menu-link">+91 9876543210</a>
                                    </li>
                                    <li class="footer-menu-item">
                                        <span>Email:</span> <a href="mailto:abcd@abcd.com" class="footer-menu-link">abcd@abcd.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-info">
                <p class="site-info-text">All Copyrites Reserved</p>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>