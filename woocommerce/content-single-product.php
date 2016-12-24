<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
?>
<section class="section section-white section-padded">
    <div class="row">
        <div class="small-12 large-12 columns" role="main">
            <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>"
                 id="product-<?php the_ID(); ?>" <?php post_class('row'); ?>>
                <div class="large-4 large-offset-2  medium-5 medium-offset-0 small-12 small-offset-0 columns">
                <?php
                /**
                 * woocommerce_before_single_product_summary hook.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action('woocommerce_before_single_product_summary');
                ?>
                </div>
                <div class="bh-single-summary columns summary entry-summary">

                    <?php
                    /**
                     * woocommerce_single_product_summary hook.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                    do_action('woocommerce_single_product_summary');
                    ?>
                </div>

                <meta itemprop="url" content="<?php the_permalink(); ?>"/>

            </div>
            <!-- #product-<?php the_ID(); ?> -->
        </div>
    </div>
</section>
<section class="section section-grey section-padded--bottom">
    <div class="row">
        <div class="small-12 large-12 columns" role="main">
            <?php
            /**
             * woocommerce_after_single_product_summary hook.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            //do_action('woocommerce_after_single_product_summary');
            ?>
            <div class="entry-content rich-text-editor">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 medium-3 columns" data-sticky-container role="main">
            <nav class="production-description-sticky columns sticky" data-sticky data-margin-top="3" data-top-anchor="production-description-content:top">
                <ul class="vertical menu production-description-nav" data-magellan>
                    <li><a class="production-description-nav__link" href="#first">About the wine</a></li>
                    <?php if( get_field('about_vineyard')): ?>
                    <li><a class="production-description-nav__link" href="#second">About the vineyard</a></li>
                    <?php endif; ?>
                    <?php if( get_field('technical_stuffs')): ?>
                    <li><a class="production-description-nav__link" href="#third">Technical stuffs</a></li>
                    <?php endif; ?>
                </ul>
            </nav>

        </div>
        <div class="small-12 medium-6 columns" role="main" id="production-description-content">
            <div class="sections">

                <section id="first" data-magellan-target="first" class="entry-content section section-padded--bottom">
                    <h3>About the wine</h3>
                    <?php the_content(); ?>
                </section>

                <?php if( get_field('about_vineyard')): ?>
                <section id="second" data-magellan-target="second" class="entry-content  section section-padded">
                    <h3>About the vineyard</h3>
                    <?php the_field('about_vineyard'); ?>
                </section>
                <?php endif; ?>
                <?php if( get_field('technical_stuffs')): ?>
                <section id="third" data-magellan-target="third" class="entry-content section section-padded">
                    <h3>Technical stuffs</h3>
                    <?php the_field('technical_stuffs'); ?>
                </section>
                <?php endif; ?>
            </div>
        </div>
        <div class="small-12 medium-3 columns" role="main">
            <br>
        </div>
    </div>
</section>
<?php do_action('woocommerce_after_single_product'); ?>
