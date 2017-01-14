<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
/*
Template Name: Cart one page
*/

get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>

    <div id="page" role="main">
        <div class="row">
            <div id="cart" role="main" class="columns large-4">
                <h2>Cart</h2>
                <?php echo do_shortcode('[woocommerce_cart]') ?>
            </div>
            <div id="checkout" role="main" class="columns large-8">
                <h2>Delivery</h2>
                <?php echo do_shortcode('[woocommerce_checkout]') ?>
            </div>
        </div>
    </div>=

<?php get_footer();?>