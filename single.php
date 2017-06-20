<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>






<?php do_action('foundationpress_before_content'); ?>
<?php while (have_posts()) : the_post(); ?>
    <script>
        var isBlogBH = true;
    </script>
    <div class="section">
        <?php


        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fp-hero');
        ?>
        <div class="hero hero-background-image hero_single-page" data-parallax="scroll"
             data-image-src="<?php echo $featured_image[0]; ?>"
             data-z-index="9"
             data-speed="1.5"
            >
            <div class=" row news">
                <?php $template_post_type = get_post_type($post); ?>
                <?php if ($template_post_type !== 'review'): ?>
                    <div class="large-2 large-offset-0 columns medium-4 medium-offset-4">
                        <div class="hover-mirror rounded-50 news-avatar">
                            <?php
                            $avatargs = array(
                                'width' => 159,
                                'height' => 159,
                                'class' => 'rounded-50'
                            );
                            $alt = $current_user->user_firstname . '\'s Avatar';
                            echo get_avatar(get_the_author_meta('ID'), 159, null, $alt, $avatargs);

                            ?>
                        </div>

                    </div>
                <?php endif; ?>
                <div class="large-8 medium-8 small-10 large-offset-0 medium-offset-2 small-offset-1 columns">

                    <div
                        class="news--description-holder news--description-holder_hero news--description-holder_hero_single"
                        data-equalizer-watch>

                        <div class="news--title news--title_hero news--title_hero_single">
                            <h1>
                                <?php the_title(); ?>
                            </h1>
                        </div>
                        <div class="news--category">
                            <?php do_action('bhr_category_name'); ?>
                        </div>
                    </div>

                </div>
                <div class="large-2 columns">
                </div>

            </div>
        </div>

    </div>




    <article <?php post_class('main-content row ') ?> id="post-<?php the_ID(); ?>">

        <?php do_action('foundationpress_post_before_entry_content'); ?>
        <div class="entry-content rich-text-editor">
            <?php the_content(); ?>
        </div>
        <footer style="padding-top: 30px">
            <?php $template_post_type = get_post_type($post); ?>
            <?php if ($template_post_type !== 'review'): ?>

                <div class=" row news">
                    <div class="large-2 large-offset-1 medium-4 medium-offset-0 small-6 small-offset-3 columns ">
                        <div class="hover-mirror rounded-50 news-avatar">
                            <?php
                            $avatargs = array(
                                'width' => 159,
                                'height' => 159,
                                'class' => 'rounded-50'
                            );
                            $alt = $current_user->user_firstname . '\'s Avatar';
                            echo get_avatar(get_the_author_meta('ID'), 159, null, $alt, $avatargs);

                            ?>
                        </div>

                    </div>
                    <div class="large-5 medium-6 small-12 small-offset-0  columns">

                        <div class="" data-equalizer-watch>

                            <div class="align-center-mobile">
                                <h3>
                                    <?php the_author(); ?>
                                </h3>
                            </div>
                            <div class="news--category align-center-mobile">
                                <?php $authorDesc = the_author_meta('description');
                                echo $authorDesc; ?>
                            </div>
                        </div>

                    </div>
                    <div
                        class="large-4 large-offset-0 medium-8 medium-offset-4 columns small-12 small-offset-0 show-for-large show-for-medium ">

                        <div class="" data-equalizer-watch>

                            <div class="align-center-mobile">
                                <h3>
                                    Share
                                </h3>
                            </div>
                            <div id="addthisTarget">

                            </div>
                        </div>

                    </div>

                </div>
            <?php endif; ?>
            <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'foundationpress'), 'after' => '</p></nav>')); ?>
        </footer>
        <?php do_action('foundationpress_post_before_comments'); ?>
        <?php comments_template(); ?>
        <?php do_action('foundationpress_post_after_comments'); ?>
    </article>

    <div class="section section-padded section-grey">
        <div class="row">
            <div class="large-6 large-offset-3 columns">
                <h2 class="center">Join the club</h2>
            </div>
        </div>
        <div class="row row-margin-bottom">
            <div class="large-10 large-offset-1 columns">

                <p class="center">Collaborating with different vineyards year to year to explore new and interesting
                    aspects of already discovered sites. </p>
            </div>
        </div>
        <div class="row row-margin-bottom">
            <div class="medium-8 medium-offset-2 columns">
                <?php echo do_shortcode('[mc4wp_form id="1427"]'); ?>
            </div>
        </div>


    </div>

    <div class="section section-padded feature-news-homepage">
        <div class="row row-margin-bottom">
            <div class="large-6 large-offset-3 columns">
                <h2 class="center">Latest news</h2>
            </div>
        </div>
        <?php if (!wp_is_mobile()): ?>
            <div class="row" data-equalizer>

                <?php
                $Postargs = array(
                    'posts_per_page' => 3,
                    'post_type' => array('post', 'review', 'news'),
                    'post__in' => get_option('sticky_posts'),
                    'ignore_sticky_posts' => 1
                );
                $my_query = new WP_Query($Postargs);
                ?>

                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <div class="large-4 columns">
                        <?php get_template_part('template-parts/sample-content-news_front-page'); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="row carousel-container" data-equalizer>
                <div class="carousel carousel-no-arrows carousel-with-dots" style="position: static">
                    <?php
                    $Postargs = array(
                        'posts_per_page' => 3,
                        'post_type' => array('post', 'review', 'news'),
                        'post__in' => get_option('sticky_posts'),
                        'ignore_sticky_posts' => 1
                    );
                    $my_query = new WP_Query($Postargs); ?>

                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <div class="large-4 columns">
                            <?php get_template_part('template-parts/sample-content-news_front-page'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="large-12 colums center">
                <a class="large button" href="<?php echo home_url( '/news-reviews/' );?>">More news</a>
            </div>
        </div>


    </div>

    <div class="section section-padded section-grey">
        <div class="row row-margin-bottom">
            <div class="large-6 large-offset-3 columns">
                <h2 class="center">Featured wines</h2>
            </div>
        </div>
        <?php if (!wp_is_mobile()): ?>
            <div class="row">


                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3
                );

                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        echo '<div class="large-4 medium-6 columns" >';
                        wc_get_template_part('template-parts/sample-content-product');
                        echo "</div>";
                    endwhile;
                } else {
                    echo __('No products found');
                }

                wp_reset_postdata();
                ?>
            </div>
        <?php else: ?>
            <div class="row carousel-container">

                <div class="carousel " style="position: static">


                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 3
                    );


                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                        while ($loop->have_posts()) : $loop->the_post();
                            echo '<div class="slick-slide columns" >';
                            wc_get_template_part('template-parts/sample-content-product');
                            echo "</div>";
                        endwhile;
                    } else {
                        echo __('No products found');
                    }

                    wp_reset_postdata();

                    ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="large-12 colums center">
                <a class="large button hollow" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) );?>">see the shop</a>
            </div>
        </div>
    </div>



<?php endwhile; ?>

<?php do_action('foundationpress_after_content'); ?>


<?php get_footer();
