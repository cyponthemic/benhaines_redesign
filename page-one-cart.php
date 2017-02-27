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

    <div id="page" role="main" ng-app="BH" ng-checkout-login>
        <div class="row show-for-large-only">
            <div class="columns large-4 center">
                <h2 class="checkout-step">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Cart</h2>
            </div>
            <div class="columns large-4 center">
                <h2 class="checkout-step">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    Delivery</h2>
            </div>
            <div class="columns large-4 center">
                <h2 class="checkout-step">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    Payement</h2>
            </div>
        </div>
        <section class="checkout-notice">
            <div class="row">
                <div class="columns small-12 center">
                    <h3>Store notice</h3>
                    <p>$15,00 shipping for orders less than 12</p>
                </div>
            </div>
        </section>
        <div class="row">
            <div id="cart" role="main" class="columns large-4">
                <div class="checkout-section">
                    <h2 class="checkout-step">Cart</h2>

                    <?php echo do_shortcode('[woocommerce_cart]') ?>
                </div>
            </div>
            <div id="checkout" role="main" class="columns large-8">
                <?php echo do_shortcode('[woocommerce_checkout]') ?>
            </div>
        </div>
    </div>=

<?php get_footer();?>