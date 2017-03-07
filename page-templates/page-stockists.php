<?php
/*
Template Name: stockist
*/
get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>
<section class="section section-padded section-grey">
    <div id="page-sidebar-right" role="main" class="my-acc">
        <div class="row">
            <div class="large-3
            columns">
                <div class="my-acc__right-sidebar">
                    <?php do_action( 'woocommerce_account_navigation' ); ?>
                </div>
            </div>
            <div class="large-6 columns ">

                    <?php while (have_posts()) : the_post(); ?>
                        <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
                            <header>
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>
                            <?php do_action('foundationpress_page_before_entry_content'); ?>
                            <div class="entry-content ">
                                <div class="my-acc__inner">
                                    <?php the_content(); ?>
                                </div>
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

            </div>
            <div class="large-3 columns">
                <div class="my-acc__right-sidebar">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();
