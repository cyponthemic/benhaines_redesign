<?php
/**
 * Created by PhpStorm.
 * User: alexchavet
 * Date: 16/07/2016
 * Time: 2:41 PM
 */
/**
 *Remove the woocommerce style || it's all in the scss
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Override the thumbnail function
 */
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail_custom', 10);

if (!function_exists('woocommerce_template_loop_product_thumbnail_custom')) {

    /**
     * Get the product thumbnail, or the placeholder if not set.
     *
     * @subpackage    Loop
     * @param string $size (default: 'shop_catalog')
     * @param int $deprecated1 Deprecated since WooCommerce 2.0 (default: 0)
     * @param int $deprecated2 Deprecated since WooCommerce 2.0 (default: 0)
     * @return string
     */
    function woocommerce_template_loop_product_thumbnail_custom()
    {
        global $post;
        echo '<div class="image-crop image-crop_bottle" >';
        if (has_post_thumbnail()) {
            echo '<a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '">';
            echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'image-crop--bottle-shot'));
            echo '</a>';
        } elseif (wc_placeholder_img_src()) {
            return wc_placeholder_img($size);
        }
        echo '</div>';
    }
}

/**
 * Override the title function
 */
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title_custom', 10);

if (!function_exists('woocommerce_template_loop_product_title_custom')) {

    /**
     * Display title
     */
    function woocommerce_template_loop_product_title_custom()
    {
        global $post;
        echo '<h3>';
        echo '<a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '">';
        echo get_the_title();
        echo '</a>';
        echo '</h3>';
    }
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 10 );
//add_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 20 );

if (!function_exists('bh_hide_if_not_logged_in')) {

    /**
     * Display title
     */
    function bh_hide_if_not_logged_in()
    {
        if (! is_user_logged_in() ):
            echo 'hide  ';
        endif;
    }
}

