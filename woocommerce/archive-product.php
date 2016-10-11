<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>

<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
    <section class="section section-white section-padded section-not-padded-mobile">
        <div class="row">
            <div class="small-12 large-12 columns" role="main">
                <h1 class="page-title color-black align-center"><?php woocommerce_page_title(); ?></h1>
            </div>
            <div class="small-12 large-6 large-offset-3 columns end" role="main">
                <p class="nocta-bene">
                    NB. Minimum order is three bottles. Free freight for orders of 12 bottles or more.
                    Orders of less than 12 bottles will incur a flat rate delivery charge of $15.00.
                    See all Terms & Conditions
                </p>
            </div>
        </div>
    </section>
<?php endif; ?>


<section class="section section-padded">
    <div class="row">
        <?php wc_bh_first_loop(); ?>
    </div>
</section>
<section class="section section-white section-padded section-not-padded-mobile" id="bh-featured-product">
            <?php wc_bh_feature_loop(); ?>
</section>
<section class="section section-padded">
    <div class="row">
        <?php wc_bh_second_loop(); ?>
    </div>

</section>

<section class="section section-white section-padded section-not-padded-mobile">
    <div class="row">
        <div class="small-12 large-12 columns" role="main">
            <h1 class="page-title color-black align-center">Museum Wines</h1>
        </div>
        <div class="small-12 large-6 large-offset-3 columns end" role="main">
            <p class="nocta-bene">
                NB. These wines are not avaible on the website. Order on request only.</br>
                Please contact ben@ben.com.au
            </p>
        </div>
    </div>
</section>
<section class="section section-padded">
    <div class="row">
        <?php wc_bh_museum_loop(); ?>
    </div>

</section>

<?php get_footer('shop'); ?>
