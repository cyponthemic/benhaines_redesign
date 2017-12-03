<?php

add_action( 'woocommerce_product_options_stock_status', 'bh_is_museum_wine' );

function bh_is_museum_wine(){
    woocommerce_wp_checkbox( array( 'id' => 'bh_is_museum_wine', 'wrapper_class' => 'show_if_simple show_if_variable', 'label' => __( 'Is this product part of the museum stock?', 'your-plugin-domain' ) ) );
}

add_action( 'woocommerce_process_product_meta', 'so_27971630_save_product_meta' );

function so_27971630_save_product_meta( $post_id ){
    if( isset( $_POST['bh_is_museum_wine'] ) ) {
        update_post_meta( $post_id, 'bh_is_museum_wine', 'yes' );
    } else {
        delete_post_meta( $post_id, 'bh_is_museum_wine' );
    }
}

add_action( 'woocommerce_product_options_general_product_data', 'bh_is_big_wine' );

function bh_is_big_wine(){
    woocommerce_wp_checkbox( array( 'id' => 'bh_is_big_wine', 'wrapper_class' => 'show_if_simple show_if_variable', 'label' => __( 'Is this product in big on the category page?', 'your-plugin-domain' ) ) );
}

add_action( 'woocommerce_process_product_meta', 'bh_big_save_product_meta' );

function bh_big_save_product_meta( $post_id ){
    if( isset( $_POST['bh_is_big_wine'] ) ) {
        update_post_meta( $post_id, 'bh_is_big_wine', 'yes' );
    } else {
        delete_post_meta( $post_id, 'bh_is_big_wine' );
    }
}

if (!function_exists('wc_bh_first_loop')) {

    /**
    Display title
     */
    function wc_bh_first_loop()
    {
        wp_reset_postdata();
        // Products per page
        $per_page = 3;
        $meta_query_stock_not_museum = array(
            'relation' => 'AND',
            array(
                'relation' => 'OR',
                array( // new and edited posts
                    'key' => 'bh_is_museum_wine',
                    'compare' => '!=',
                    'value' => 'yes'
                ),

                array( // get old posts w/out custom field
                    'key' => 'bh_is_museum_wine',
                    'value' => 'yes',
                    'compare' => 'NOT EXISTS'
                )
            ),
            array(
                'relation' => 'OR',
                array( // new and edited posts
                    'key' => 'bh_is_big_wine',
                    'compare' => '!=',
                    'value' => 'yes'
                ),

                array( // get old posts w/out custom field
                    'key' => 'bh_is_big_wine',
                    'value' => 'yes',
                    'compare' => 'NOT EXISTS'
                )
            ),
            array(
                'key' => '_stock_status',
                'value' => 'instock',
                'compare' => '='
            )
        );
        $wc_bh_first_loop_args = array(
            'post_type' => 'product',
            'posts_per_page' => $per_page,
            'has_password' => false,
            'meta_query' => $meta_query_stock_not_museum


        );

        // Set the query
        $products = new WP_Query( $wc_bh_first_loop_args );
        // Standard loop
        if ( $products->have_posts() ) :
            while ( $products->have_posts() ) : $products->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            wp_reset_postdata();
        endif;
    }
}
if (!function_exists('wc_bh_feature_loop')) {

    /**
    Display title
     */
    function wc_bh_feature_loop()
    {
        wp_reset_postdata();
        // Products per page

        $wc_bh_first_loop_args = array(
            'post_type' => 'product',
            'has_password' => false,
            'posts_per_page' => 1,
            'meta_key' => 'bh_is_big_wine',
            'meta_value' => 'yes',
            'meta_compare' => '='
        );

        // Set the query
        $products = new WP_Query( $wc_bh_first_loop_args );
        // Standard loop
        if ( $products->have_posts() ) :
            while ( $products->have_posts() ) : $products->the_post();
                wc_get_template_part('content', 'single-product-featured');
            endwhile;
            wp_reset_postdata();
        endif;
    }
}
if (!function_exists('wc_bh_second_loop')) {

    /**
    Display title
     */
    function wc_bh_second_loop()
    {
        wp_reset_postdata();
        $meta_query_stock_not_museum = array(
            'relation' => 'AND',
            array(
                'relation' => 'OR',
                array( // new and edited posts
                    'key' => 'bh_is_museum_wine',
                    'compare' => '!=',
                    'value' => 'yes'
                ),

                array( // get old posts w/out custom field
                    'key' => 'bh_is_museum_wine',
                    'value' => 'yes',
                    'compare' => 'NOT EXISTS'
                )
            ),
            array(
                'relation' => 'OR',
                array( // new and edited posts
                    'key' => 'bh_is_big_wine',
                    'compare' => '!=',
                    'value' => 'yes'
                ),

                array( // get old posts w/out custom field
                    'key' => 'bh_is_big_wine',
                    'value' => 'yes',
                    'compare' => 'NOT EXISTS'
                )
            ),
            array(
                'key' => '_stock_status',
                'value' => 'instock',
                'compare' => '='
            )
        );
        $wc_bh_second_loop_args = array(
            'post_type' => 'product',
            'has_password' => false,
            'per_page' => -1,
            'offset' => 3,
            'meta_query' => $meta_query_stock_not_museum

        );

        // Set the query
        $products = new WP_Query( $wc_bh_second_loop_args );
        // Standard loop
        if ( $products->have_posts() ) :
            while ( $products->have_posts() ) : $products->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            wp_reset_postdata();
        else:
            echo "No posts";
        endif;

    }
}
if (!function_exists('wc_bh_museum_loop')) {

    /**
    Display title
     */
    function wc_bh_museum_loop()
    {
        wp_reset_postdata();
        $args = array(
            'post_type' => 'product',
            'has_password' => false,
      	    'per_page' => 24,
      	    'nopaging' => true,
            'meta_key' => 'bh_is_museum_wine',
            'meta_value' => 'yes',
            'meta_compare' => '='

        );
        // Set the query
        $products = new WP_Query( $args );
        // Standard loop
        if ( $products->have_posts() ) :
            while ( $products->have_posts() ) : $products->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            wp_reset_postdata();
        endif;
    }
}
if (!function_exists('wc_bh_members_loop')) {

    /**
    Display title
     */
    function wc_bh_members_loop()
    {
        wp_reset_postdata();
        $args = array(
            'post_type' => 'product',
            'has_password' => true,
      	    'per_page' => 24,

        );
        // Set the query
        $products = new WP_Query( $args );
        // Standard loop
        if ( $products->have_posts() ) :
            while ( $products->have_posts() ) : $products->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            wp_reset_postdata();
        endif;
    }
}

//$args = array( 'post_type' => 'product', 'posts_per_page' => 30, 'orderby' => 'date', 'order' => 'DESC',
//    'meta_query' => array(
//        array(
//            'key' => '_stock_status',
//            'value' => 'outofstock',
//            'compare' => '='
//        )
//    )
//);

if (!function_exists('wc_bh_category_loop')) {

    /**
    Display title
     */
    function wc_bh_category_loop()
    {
        wp_reset_postdata();

        $cate = get_queried_object();
        $cateID = $cate->slug;

        // Products per page
        $per_page = 24;

        $args = array(
            'post_type' => 'product',
            'product_cat' => $cateID,
            'has_password' => false

        );


        // Set the query
        $products = new WP_Query( $args );
        // Standard loop
        if ( $products->have_posts() ) :
            while ( $products->have_posts() ) : $products->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            wp_reset_postdata();
        endif;
    }
}
