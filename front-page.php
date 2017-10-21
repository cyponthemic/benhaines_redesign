<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>
    <div class="section">
        <div class="video-container" id="heroVideoJs">
            <div class="hero-header after-video-loaded">
                <h1>Winemaker</h1>
                <a class="large button" href="shop">Explore range</a>
            </div>

            <div class="hero-footer after-video-loaded">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/scroll-down.svg"
                     alt="scroll down">
                <span>Scroll down</span>
            </div>
        </div>
        <script>
            var initVideoBackground = true;
        </script>
    </div>
    <div class="section section-padded section-not-padded-mobile after-video-loaded">
        <div class="row row-margin-bottom">
            <div class="large-6 large-offset-3 columns">
                <h2 class="center">Ben Haines Wine</h2>
                <p class="center">Collaborating with different vineyards year to year to explore unique aspects of new or already discovered sites.</p>
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <div class="small-inner">
                    <?php displayHPFeatureImage('feature-a','hp_left_image','hp_left_image_link') ?>
                </div>
            </div>
            <div class="large-6 columns">
                <div class="small-inner">
                    <?php displayHPFeatureImage('feature-b','hp_right_image','hp_right_image_link') ?>
                </div>

            </div>
        </div>
    </div>
    <div class="section section-padded section-grey after-video-loaded">
        <div class="row row-margin-bottom">
            <div class="large-6 large-offset-3 columns">
                <h2 class="center">Featured wines</h2>
            </div>
        </div>
        <?php if (!wp_is_mobile()): ?>
            <div class="row row-feature-wine">


                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 2
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
                <a class="large button" href="<?php echo home_url( '/news-reviews/' );?> ">More news</a>
            </div>
        </div>


    </div>
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
              <!-- Begin MailChimp Signup Form -->
              <div id="mc_embed_signup">
                <form action="https://benhaineswine.us16.list-manage.com/subscribe/post?u=aa2a6f5f9fea47c162125ece0&amp;id=3f6c9d20d3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll">
                    <div class="row">
                      <div class="medium-5 columns">
                        <label>
                          <input type="text" placeholder="Your name" name="MMERGE4" data-com.agilebits.onepassword.user-edited="yes">
                        </label>
                      </div>

                      <div class="medium-5 columns">
                        <label>
                          <input type="email" name="EMAIL" placeholder="Your email address" required="" data-com.agilebits.onepassword.user-edited="yes">
                        </label>
                      </div>

                      <div class="medium-2 columns">
                        <label>
                          <input type="submit" value="Sign me up" name="subscribe" id="mc-embedded-subscribe" class="button">
                        </label>
                      </div>
                    </div>
                    <div id="mce-responses" class="clear">
                      <div class="response" id="mce-error-response" style="display:none"></div>
                      <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_aa2a6f5f9fea47c162125ece0_3f6c9d20d3" tabindex="-1" value=""></div>
                    <div class="clear"></div>
                  </div>
                </form>
              </div>
            </div>
        </div>


    </div>
    <div class="full-width instagram">
        <?php echo do_shortcode('[instagram-feed]'); ?>
    </div>
    <div id="page" role="main" style="display: none">

        <?php do_action('foundationpress_before_content'); ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
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
        <?php get_sidebar(); ?>

    </div>

<?php get_footer();
