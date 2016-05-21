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

 <?php get_template_part( 'template-parts/featured-image' ); ?>
    <div class="section">
        <div class="video-container" id="heroVideoJs">
            <div class="hero-header">
                <h1>Expressing places through wine</h1>
                <a class="large button" href="#">Explore wines</a>
            </div>

            <div class="hero-footer">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/scroll-down.svg" alt="scroll down">
                <span>Scroll down</span>
            </div>
        </div>
    </div>
    <div class="section section-padded">
        <div class="row row-margin-bottom">
            <div class="large-6 large-offset-3 columns">
                <h2 class="center">Exploring unique wine</h2>
                <p class="center">Collaborating with different vineyards year to year to explore new and interesting aspects of already discovered sites.  </p>
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <div class="small-inner">
                <div id="feature-a" class="image-crop image-crop_feature parallax-window" dataf-parallax="scroll" dataf-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/sample/feature-a.jpg">
                    <img class="image-crop--image" style="display: none"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/sample/feature-a.jpg" >

                    <div class="image-crop--description">
                        <h2 class="center color-white">Exploring unique wine</h2>
                        <p class="center">Collaborating with different vineyards year to year to explore new and interesting aspects of already discovered sites.  </p>
                    </div>

                </div>
                </div>
            </div>
            <div class="large-6 columns">
                <div class="small-inner">
                <div id="feature-b" class="image-crop image-crop_feature parallax-window" dataf-parallax="scroll" dataf-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/sample/feature-a.jpg">
                    <img class="image-crop--image" style="display: none"
                         src="<?php echo get_template_directory_uri(); ?>/assets/images/sample/feature-b.jpg" >

                    <div class="image-crop--description">
                        <h2 class="center color-white">Exploring unique wine</h2>
                        <p class="center">Collaborating with different vineyards year to year to explore new and interesting aspects of already discovered sites.  </p>
                    </div>

                </div>
                </div>

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
                    'posts_per_page' => 6
                );

                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) : $loop->the_post();
                        echo '<div class="large-4 medium-6 columns" >';
                        wc_get_template_part( 'template-parts/sample-content-product' );
                        echo "</div>";
                    endwhile;
                } else {
                    echo __( 'No products found' );
                }

                wp_reset_postdata();
                ?>
        </div>
        <?php else: ?>
        <div class="row carousel-container">

            <div class="carousel" style="position: static">


                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 6
                    );


                    $loop = new WP_Query( $args );
                    if ( $loop->have_posts()  ) {
                        while ( $loop->have_posts() ) : $loop->the_post();
                            echo '<div class="slick-slide columns" >';
                            wc_get_template_part( 'template-parts/sample-content-product' );
                            echo "</div>";
                        endwhile;
                    } else {
                        echo __( 'No products found' );
                    }

                    wp_reset_postdata();

                    ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="large-12 colums center">
                <a class="large button hollow" href="#">see the shop</a>
            </div>
        </div>
    </div>
    <div class="section section-padded">
        <div class="row row-margin-bottom">
            <div class="large-6 large-offset-3 columns">
                <h2 class="center">Latest news</h2>
            </div>
        </div>
        <div class="row" data-equalizer>

            <?php $my_query = new WP_Query( 'posts_per_page=3' ); ?>

            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                <div class="large-4 columns" >
                    <?php get_template_part( 'template-parts/sample-content-news' );  ?>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="row">
            <div class="large-12 colums center">
                <a class="large button" href="#">More news</a>
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

                <p class="center">Collaborating with different vineyards year to year to explore new and interesting aspects of already discovered sites.  </p>
            </div>
        </div>
        <div class="row row-margin-bottom">
            <div class="medium-8 medium-offset-2 columns">
                <?php echo do_shortcode('[mc4wp_form id="1427"]');?>
            </div>
        </div>



    </div>
    <div class="full-width instagram">
        <?php echo do_shortcode('[instagram-feed]');?>
    </div>
 <div id="page" role="main" style="display: none">

 <?php do_action( 'foundationpress_before_content' ); ?>
 <?php while ( have_posts() ) : the_post(); ?>
   <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
       <header>
           <h1 class="entry-title"><?php the_title(); ?></h1>
       </header>
       <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
       <div class="entry-content">
           <?php the_content(); ?>
       </div>
       <footer>
           <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
           <p><?php the_tags(); ?></p>
       </footer>
       <?php do_action( 'foundationpress_page_before_comments' ); ?>
       <?php comments_template(); ?>
       <?php do_action( 'foundationpress_page_after_comments' ); ?>
   </article>
 <?php endwhile;?>

 <?php do_action( 'foundationpress_after_content' ); ?>
 <?php get_sidebar(); ?>

 </div>

 <?php get_footer();
