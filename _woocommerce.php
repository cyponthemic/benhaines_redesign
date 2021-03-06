<?php
/**
 * Basic WooCommerce support
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
    <section class="section section-padded section-not-padded-mobile    ">
        <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
    </section>


<?php endif; ?>
    <div class="row">
        <div class="small-12 large-12 columns" role="main">

            <?php do_action('foundationpress_before_content'); ?>

            <?php while (woocommerce_content()) : the_post(); ?>
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <header>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>
                    <?php do_action('foundationpress_page_before_entry_content'); ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <footer>
                        <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'foundationpress'), 'after' => '</p></nav>')); ?>
                        <p><?php the_tags(); ?></p>
                    </footer>
                    <?php do_action('foundationpress_page_before_comments'); ?>
                    <?php comments_template(); ?>
                    <?php do_action('foundationpress_page_after_comments'); ?>
                </article>
            <?php endwhile; ?>

            <?php do_action('foundationpress_after_content'); ?>

        </div>

    </div>
<?php get_footer();
