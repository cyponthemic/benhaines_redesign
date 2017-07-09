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

    <div id="page" role="main" ng-checkout-login>

        <section class="checkout-notice">
            <div class="row expanded">
                <div class="columns small-12 center flex-notice">
                    <a class="button hollow white cart-header-button" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>">
                      <span><i class="fa fa-chevron-left"></i></span>
                      <span class="hide-for-small-only">&nbsp; Back to shop</span>
                    </a>
                    <div>
                      <img class="cart-logo" height="40px" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo/logo_invert-small.png"/>
                    </div>
                    <div style="display: none;">
                      <h3>Store notice</h3>
                      <p>$15,00 shipping for orders less than 12</p>
                    </div>
                    <a class="button hollow white cart-header-button" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>">
                      <span><i class="fa fa-info"></i></span>
                      <span class="hide-for-small-only">&nbsp; Need help ?</span>
                    </a>
                </div>
            </div>
        </section>
        <div class="row expanded hide-for-small-only hide-for-medium-only" style="margin-bottom: 20px;">
            <div class="columns large-4 center">
                <h2 class="checkout-step">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    1. Cart</h2>
            </div>
            <div class="columns large-4 center">
                <h2 class="checkout-step">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    2. Delivery</h2>
            </div>
            <div class="columns large-4 center">
                <h2 class="checkout-step">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    3. Payment</h2>
            </div>
        </div>
        <div class="row expanded">
            <div id="cart" role="main" class="columns large-4">
                <div class="checkout-section checkout-column">
                    <h2 class="checkout-step">Cart</h2>
                    <?php echo do_shortcode('[woocommerce_cart]') ?>
                </div>
            </div>
            <div id="checkout" role="main" class="columns large-8">
                <?php echo do_shortcode('[woocommerce_checkout]') ?>
            </div>
        </div>
    </div>

<?php get_footer();?>
