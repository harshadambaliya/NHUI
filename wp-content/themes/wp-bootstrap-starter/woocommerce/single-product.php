<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$options = _WSH()->option();
$meta = _WSH()->get_meta('_bunch_layout_settings');
$meta1 = _WSH()->get_meta('_bunch_header_settings');

$layout = kingstrox_set( $meta, 'layout');
$sidebar = kingstrox_set( $meta, 'sidebar');

$layout = ($layout) ? $layout : kingstrox_set($options, 'woocommerce_single_page_layout');
$sidebar = ($sidebar) ? $sidebar : kingstrox_set($options, 'woocommerce_single_page_sidebar');

$classes = ( !$layout || $layout == 'full' || kingstrox_set($_GET, 'layout_style')=='full' ) ? 'col-lg-12 col-md-12 col-sm-12 col-xs-12' : 'col-lg-9 col-md-9 col-sm-12 col-xs-12';

$title = kingstrox_set($meta1, 'header_title');

$title = ($title) ? $title : kingstrox_set($options, 'woocommerce_page_header_title');
$meta2 = _WSH()->get_meta('_bunch_header_settings');
$bg = kingstrox_set($meta2, 'header_img');

get_header( 'shop' ); ?>

<section class="page-title" style="background-image:url(<?php if($bg): echo esc_attr($bg); else : echo esc_url(get_template_directory_uri().'/images/pagetitlebg.jpg'); endif;?>)">
        <div class="container">
            <h1><?php if($title) echo wp_kses_post($title); else wp_title(''); ?></h1>
            <ul class="bread-crumb">
               <?php echo wp_kses_post(kingstrox_get_the_breadcrumb()); ?>
            </ul>
        </div>
</section>
<section class="shop-single-section">
    <div class="auto-container">
    	<div class="shop-page product-details">
        	<div class="basic-details">
    			<div class="row clearfix">
			
                    <!-- sidebar area -->
                    <?php if( $layout == 'left' ): ?>
                    <?php if ( is_active_sidebar( $sidebar ) ) { ?>
                    <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">        
                        <aside class="sidebar default-sidebar">
                            <?php dynamic_sidebar( $sidebar ); ?>
                            <?php
                                    /**
                                     * woocommerce_sidebar hook
                                     *
                                     * @hooked woocommerce_get_sidebar - 10
                                     */
                                    do_action( 'woocommerce_sidebar' );
                                ?>
                        </aside>
                    </div>
                    <?php } ?>
                    <?php endif; ?>
                    
                    <section class="<?php echo esc_attr($classes);?> sp-product-details">
                    <?php
                        /**
                         * woocommerce_before_main_content hook
                         *
                         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                         * @hooked woocommerce_breadcrumb - 20
                         */
                        do_action( 'woocommerce_before_main_content' );
                    ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php wc_get_template_part( 'content', 'single-product' ); ?>
                        <?php endwhile; // end of the loop. ?>
                    <?php
                        /**
                         * woocommerce_after_main_content hook
                         *
                         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                         */
                        do_action( 'woocommerce_after_main_content' );
                    ?>
                    
                    </section>
                
                    <!-- sidebar area -->
                    <?php if( $layout == 'right' ): ?>
                    <?php if ( is_active_sidebar( $sidebar ) ) { ?>
                    <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">        
                        <aside class="sidebar default-sidebar">
                            <?php dynamic_sidebar( $sidebar ); ?>
                            <?php
                                /**
                                 * woocommerce_sidebar hook
                                 *
                                 * @hooked woocommerce_get_sidebar - 10
                                 */
                                do_action( 'woocommerce_sidebar' );
                            ?>
                        </aside>
                    </div>
                    <?php } ?>
                    <?php endif; ?>
                </div>
                
        	</div>
        </div>
	</div>
</section>
<?php get_footer( 'shop' ); ?>
