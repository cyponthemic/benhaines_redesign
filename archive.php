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
$template_post_type = get_post_type_object('review');
$template_post_type = get_post_type_object(get_post_type($post));
?>
    <div class="section">
        <?php

        $args = array(
            'post_type' => $template_post_type->name,
            'posts_per_page' => 1,
            'post__in' => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
        );
        $my_query = new WP_Query($args);

        while ($my_query->have_posts()) : $my_query->the_post();
            if (has_post_thumbnail()):
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
            else:
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
            endif;
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
                    <div class="large-4 medium-6 small-12  columns">
                        <?php get_template_part('template-parts/sample-content-news_featured'); ?>
                    </div>


                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <div id="page" role="main">
        <article class="main-content">
            <div class="row row-margin-bottom">

                <h2 class="align-center-mobile">Latest <?php echo $template_post_type->labels->name ?> </h2>
                <button class="hide-for-large button medium expanded secondary dropdown blog-filter-button"
                        type="button" data-open="mobile-menu-2">Filter
                </button>


            </div>
        </article>

        <article class="main-content">

            <?php
            $Postargs = array(
                'post_type' => $template_post_type->name,
                'ignore_sticky_posts' => 1,
                'post__not_in' => get_option('sticky_posts'),
                'nopaging' => true

            );
            $my_query = new WP_Query($Postargs);
            ?>
            <?php if (have_posts()) : ?>

                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                    <?php get_template_part('template-parts/sample-content-news_archived', get_post_format()); ?>
                <?php endwhile; ?>

            <?php else : ?>

                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; // End have_posts() check. ?>

            <?php /* Display navigation to next/previous pages when applicable */ ?>
            <?php if (function_exists('foundationpress_pagination')) {
                //foundationpress_pagination();
            } else {
                if (is_paged()) { ?>
                    <nav id="post-nav">
                        <div class="post-previous"><?php next_posts_link(
                                __('&larr; Older posts', 'foundationpress')
                            ); ?></div>
                        <div class="post-next"><?php previous_posts_link(
                                __('Newer posts &rarr;', 'foundationpress')
                            ); ?></div>
                    </nav>
                <?php }
            } ?>

        </article>
        <div class="show-for-large">
            <?php
            get_sidebar('blog');
            ?>
        </div>

    </div>

<?php get_footer();
