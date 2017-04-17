<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


get_header();
?>
    <div class="section">
        <?php

        $args = array(
            'post_type' => array('post', 'review', 'news'),
            'posts_per_page' => 1,
            'post__in' => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1
        );
        $my_query_featured = new WP_Query($args);
        if (has_post_thumbnail()):
            while ($my_query_featured->have_posts()) : $my_query_featured->the_post();

                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fp-hero');
                ?>
                <div class="hero hero-background-image" data-parallax="scroll"
                     data-image-src="<?php echo $featured_image[0]; ?>"
                     data-z-index="9"
                     data-speed="0.8"
                    >
                    <div class=" row">
                        <?php

                        ?>

                        <?php ?>
                        <div class="large-4 medium-6 small-12 float-right columns">
                            <?php get_template_part('template-parts/sample-content-news_featured'); ?>
                        </div>


                    </div>
                </div>
            <?php endwhile; endif; ?>
    </div>
    <div id="page" role="main">
        <header class="main-content">
            <div class="row row-margin-bottom">

                <h2 class="align-center-mobile">Latest news from the vineyard </h2>
                <button class="hide-for-large button medium expanded secondary dropdown blog-filter-button"
                        type="button" data-open="mobile-menu-2">Filter
                </button>


            </div>
        </header>


        <div class="main-content">

            <?php if (have_posts()) :

                $Postargs = array(
                    'post_type' => array('post', 'review', 'news'),
                    'post__not_in' => get_option('sticky_posts'),
                    'ignore_sticky_posts' => 1,
                    'post_per_page' => 5,
                    'paged' => get_query_var( 'paged' )
                );
                $my_query_posts = new WP_Query($Postargs); ?>

                <?php /* Start the Loop */ ?>
                <?php while ($my_query_posts->have_posts()) : $my_query_posts->the_post(); ?>

                <?php get_template_part('template-parts/sample-content-news_archived', get_post_format()); ?>
            <?php endwhile; ?>

            <?php else : ?>

                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; // End have_posts() check. ?>

            <?php /* Display navigation to next/previous pages when applicable */ ?>
            <?php if (function_exists('foundationpress_pagination')) {
                foundationpress_pagination();

            } else if (is_paged()) { ?>
                <nav id="post-nav">
                    <div
                        class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'foundationpress')); ?></div>
                    <div
                        class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'foundationpress')); ?></div>
                </nav>
            <?php } ?>

        </div>
        <div class="show-for-large">
            <?php
            get_sidebar('blog');
            ?>
        </div>
    </div>

<?php get_footer();
