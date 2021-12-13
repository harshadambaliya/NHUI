<?php
/*
* Template Name: Home
*/

get_header(); ?>

<!-- Landing Section Start -->
<section class="landing-section home-landing-section" style="background-image: url('<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/home-landing-img.png');">
    <div class="container">
        <div class="home-landing-content">
            <h1 class="section-title">10,000 + Royalty free images</h1>
            <div class="landing-search-form">
                <div class="landing-search__inner">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn" type="submit">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18Z" stroke="#1C1A1D" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22 22L16 16" stroke="#1C1A1D" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected>Categories</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="landing-section-link">
                <a href="#">
                    <span>VIEW ALL CATEGORIES</span>
                    <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.5 6.63397C12.1667 7.01888 12.1667 7.98112 11.5 8.36602L1.75 13.9952C1.08333 14.3801 0.249999 13.899 0.249999 13.1292L0.25 1.87083C0.25 1.10103 1.08333 0.619909 1.75 1.00481L11.5 6.63397Z" fill="white"/>
                    </svg>
                </a>
                <a href="/about-us/">
                    <span>ABOUT US</span>
                    <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.5 6.63397C12.1667 7.01888 12.1667 7.98112 11.5 8.36602L1.75 13.9952C1.08333 14.3801 0.249999 13.899 0.249999 13.1292L0.25 1.87083C0.25 1.10103 1.08333 0.619909 1.75 1.00481L11.5 6.63397Z" fill="white"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Landing Section End -->

<!-- Site Images Section Start -->
<section class="site-image-section">
    <div class="container">
        <div class="site-image-filter">
            <div class="filter">
                <a class="all current" href="#">Top Categories</a>
                <?php

                    $taxonomy     = 'product_cat';
                    $orderby      = 'name';  
                    $show_count   = 0;      // 1 for yes, 0 for no
                    $pad_counts   = 0;      // 1 for yes, 0 for no
                    $hierarchical = 1;      // 1 for yes, 0 for no  
                    $title        = '';  
                    $empty        = 0;

                    $args = array(
                        'taxonomy'     => $taxonomy,
                        'orderby'      => $orderby,
                        'show_count'   => $show_count,
                        'pad_counts'   => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li'     => $title,
                        'hide_empty'   => $empty
                    );
                    $all_categories = get_categories( $args );
                    foreach ($all_categories as $cat) {
                    if($cat->category_parent == 0) {
                        $category_id = $cat->term_id;       
                        echo '<br /><a href="#" class="'. $cat->name .'">'. $cat->name .'</a>';

                        $args2 = array(
                                'taxonomy'     => $taxonomy,
                                'child_of'     => 0,
                                'parent'       => $category_id,
                                'orderby'      => $orderby,
                                'show_count'   => $show_count,
                                'pad_counts'   => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li'     => $title,
                                'hide_empty'   => $empty
                        );
                        $sub_cats = get_categories( $args2 );
                        if($sub_cats) {
                            foreach($sub_cats as $sub_category) {
                                echo  $sub_category->name ;
                            }   
                        }
                    }       
                    }
                ?>
                <!-- <a class="tigers" href="#">Tigers</a>
                <a class="lions" href="#">Lions</a>
                <a class="nature" href="#">Nature</a>
                <a class="birds" href="#">Birds</a> -->
            </div>

            <div class="row all-images-content">
                <?php  
                    $args = array(
                        'post_type'      => 'product',
                        // 'posts_per_page' => 10,
                        // 'product_cat'    => 'hoodies'
                    );
                    
                    $loop = new WP_Query( $args );
                    
                    while ( $loop->have_posts() ) : $loop->the_post();
                        global $product;
                        // '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
                        ?>
                            <?php
                                $terms = get_the_terms( $post->name, 'product_cat' );
                            ?>
                        
                            <div class="col col-12 col-md-4 col-lg-4 image-card Tigers <?php echo $terms ?>">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                                <div class="image-card-body">
                                    <h3 class="image-card-title"><?php echo get_the_title(); ?></h3>
                                    <div class="image-card-purchase">
                                        <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                            <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                    <rect width="33" height="35" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="image-card-purchase-text">Download Sample</span>
                                        </a>
                                        <div class="image-card-purchase-icon image-card-cart-icon">
                                            <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                            </svg>
                                            <div class="image-card-cart">
                                                <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                                <ul class="image-card-cart-list">
                                                    <li>
                                                        <p>Small</p>
                                                        <span>INR 4,000</span>
                                                    </li>
                                                    <li>
                                                        <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                                        <span>INR 6,000</span>
                                                    </li>
                                                    <li>
                                                        <p>Large</p>
                                                        <span>INR 9,000</span>
                                                    </li>
                                                    <li>
                                                        <p>HD</p>
                                                        <span>INR 12,000</span>
                                                    </li>
                                                </ul>
                                                <div class="text-center">
                                                    <a href="#" class="btn btn-success">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    endwhile;

                    wp_reset_query();
                ?>

                








                    

                <div class="col col-12 col-md-4 col-lg-4 image-card Lions">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/cat.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Nature">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/cat.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Birds">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/elephant.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Lions">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/lion.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Tigers">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/elephant.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Birds">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/elephant.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Nature">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/lion.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Tigers">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/elephant.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Birds">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/cat.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Nature">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/lion.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-4 col-lg-4 image-card Birds">
                    <img src="<?php echo Site_URL(); ?>/wp-content/uploads/2021/12/cat.png" alt="" class="img-fluid">
                    <div class="image-card-body">
                        <h3 class="image-card-title">The name of the Photograph by Name Surname</h3>
                        <div class="image-card-purchase">
                            <a href="#"  class="image-card-purchase-icon image-card-download-icon">
                                <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M31.5855 16.5361V29.8029C31.5855 31.8912 29.8978 33.5826 27.8141 33.5826H5.18549C3.10178 33.5826 1.41406 31.8912 1.41406 29.8029V16.5361" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9L16 24" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49512 17.415L15.8305 24.7665C16.1983 25.1351 16.7923 25.1351 17.16 24.7665L24.4954 17.415" stroke="white" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                        <rect width="33" height="35" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="image-card-purchase-text">Download Sample</span>
                            </a>
                            <div class="image-card-purchase-icon image-card-cart-icon">
                                <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.78802 5.37419H27.2837C27.7263 5.37419 28.0618 5.77301 27.9904 6.21534L26.2843 16.6064C26.113 17.6578 25.2207 18.4265 24.1713 18.4265H9.23774C8.1884 18.4265 7.29609 17.6578 7.12477 16.6064L4.66915 1.63254C4.61204 1.27723 4.31223 1.02344 3.96245 1.02344H1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.7503 22.8502C17.9569 22.8502 18.9351 21.86 18.9351 20.6385C18.9351 19.417 17.9569 18.4268 16.7503 18.4268C15.5436 18.4268 14.5654 19.417 14.5654 20.6385C14.5654 21.86 15.5436 22.8502 16.7503 22.8502Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                                <div class="image-card-cart">
                                    <h3 class="image-card-cart-title">The Title of the photograph</h3>
                                    <ul class="image-card-cart-list">
                                        <li>
                                            <p>Small</p>
                                            <span>INR 4,000</span>
                                        </li>
                                        <li>
                                            <p>Medium <span>2125 x 1417 px (17.99 x 12.00 cm) 300 dpi | 3.0 MP</span></p>
                                            <span>INR 6,000</span>
                                        </li>
                                        <li>
                                            <p>Large</p>
                                            <span>INR 9,000</span>
                                        </li>
                                        <li>
                                            <p>HD</p>
                                            <span>INR 12,000</span>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Site Images Section End -->

<!-- Best Royalty Free Videos Section Start -->
<section class="royalty-video-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Best Royalty Free Videos</h2>
        </div>
        <div class="row">
            <div class="col col-12 col-md-12 col-lg-6">
                <div class="video">
                    <span class="video-icon"><img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/video-play-icon.png" alt="" class="img-fluid"></span>
                    <video class="w-100" src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/mov_bbb.mp4" poster="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/news-updates-video.png" ></video>
                </div>
            </div>
            <div class="col col-12 col-md-12 col-lg-6">
                <div class="video">
                    <span class="video-icon"><img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/video-play-icon.png" alt="" class="img-fluid"></span>
                    <video class="w-100" src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/mov_bbb.mp4" poster="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/news-updates-video.png" ></video>
                </div>
            </div>
            <div class="col col-12 col-md-12 col-lg-6">
                <div class="video">
                    <span class="video-icon"><img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/video-play-icon.png" alt="" class="img-fluid"></span>
                    <video class="w-100" src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/mov_bbb.mp4" poster="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/news-updates-video.png" ></video>
                </div>
            </div>
            <div class="col col-12 col-md-12 col-lg-6">
                <div class="video">
                    <span class="video-icon"><img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/video-play-icon.png" alt="" class="img-fluid"></span>
                    <video class="w-100" src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/mov_bbb.mp4" poster="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/news-updates-video.png" ></video>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Best Royalty Free Videos Section End -->

<!-- Who are we Section Start -->
<section class="who-are-section">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-6 col-lg-6">
                <div class="who-are-content">
                    <h2 class="section-title">Who are <br/>we?</h2>
                </div>
            </div>
            <div class="col col-12 col-md-6 col-lg-6">
                <div class="who-are-content">
                    <p class="section-description">Natural History Unit India or NHUI brings the vibrant world of wildlife into your homes through documentaries and prime quality stock footage. Our documentaries have been telecast worldwide. We now offer our impressive digital library of India’s diverse wildlife stock footage that will enrich and complete your story!</p>
                    <div class="section-btn">
                        <a href="#" class="btn btn-success">Read More About us</a>
                        <a href="#" class="btn btn-success">News & Updates</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Who are we Section End -->

<!-- The Nalla’s Arc Model Section Start -->
<section class="arc-model-section">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-6 col-lg-6">
                <div class="arc-model-content">
                    <h2 class="section-title">The <br/>Nalla’s Arc <br/>Model</h2>
                </div>
            </div>
            <div class="col col-12 col-md-6 col-lg-6">
                <div class="arc-model-content">
                    <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque tortor vitae scelerisque elit vitae varius et pulvinar. Hendrerit dignissim nunc nibh lectus elementum adipiscing ut. Scelerisque fringilla turpis ut felis porta nulla risus. Viverra dignissim dolor suscipit diam. Nulla et senectus magna orci tincidunt proin. Enim quis pretium vulputate dis vitae adipiscing vel sem tempus. Cursus nulla nisl, ullamcorper sagittis. Nunc orci, neque, et libero, eget sodales platea mi facilisi. Convallis imperdiet imperdiet feugiat turpis nunc tincidunt donec nibh. Neque pretium proin quis in.</p>
                    <a href="#" class="btn btn-success">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- The Nalla’s Arc Model Section End -->

<!-- Our Contributors Section Start -->
<section class="our-contributors-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Our Contributors</h2>
        </div>
        <div class="row">
            <div class="col col-12 col-md-12 col-lg-12 text-center">
                <div class="our-contributor-profile">
                    <div class="our-contributor-img">
                        <img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/our-contributor-img1.png" alt="" class="img-fluid">
                    </div>
                    <div class="our-contributorr-profile-body">
                        <h4 class="our-contributor-title">The Photographer</h4>
                        <p class="our-contributor-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras.</p>
                        <a href="#" class="our-contributor-link">+ Read More</a>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-4 col-lg-4">
                <div class="our-contributor-profile">
                    <div class="our-contributor-img">
                        <img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/our-contributor-img2.png" alt="" class="img-fluid">
                    </div>
                    <div class="our-contributorr-profile-body">
                        <h4 class="our-contributor-title">The Photographer</h4>
                        <p class="our-contributor-description">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque tortor vitae scelerisque elit vitae varius et pulvinar. Hendrerit dignissim nunc nibh lectus elementum adipiscing ut. Scelerisque fringilla turpis ut felis porta nulla risus. Viverra dignissim dolor suscipit diam. “</p>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-4 col-lg-4">
                <div class="our-contributor-profile">
                    <div class="our-contributor-img">
                        <img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/our-contributor-img3.png" alt="" class="img-fluid">
                    </div>
                    <div class="our-contributorr-profile-body">
                        <h4 class="our-contributor-title">The Photographer</h4>
                        <p class="our-contributor-description">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque tortor vitae scelerisque elit vitae varius et pulvinar. Hendrerit dignissim nunc nibh lectus elementum adipiscing ut. Scelerisque fringilla turpis ut felis porta nulla risus. Viverra dignissim dolor suscipit diam. “</p>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-4 col-lg-4">
                <div class="our-contributor-profile">
                    <div class="our-contributor-img">
                        <img src="<?php echo SITE_URL(); ?>/wp-content/uploads/2021/12/our-contributor-img4.png" alt="" class="img-fluid">
                    </div>
                    <div class="our-contributorr-profile-body">
                        <h4 class="our-contributor-title">The Photographer</h4>
                        <p class="our-contributor-description">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque tortor vitae scelerisque elit vitae varius et pulvinar. Hendrerit dignissim nunc nibh lectus elementum adipiscing ut. Scelerisque fringilla turpis ut felis porta nulla risus. Viverra dignissim dolor suscipit diam. “</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center our-contributors-btn">
            <a href="#" class="btn btn-success">News & Updates</a>
        </div>
    </div>
</section>
<!-- Our Contributors Section End -->


<?php get_footer(); ?>
