<?php
/*
Template Name: About
*/
get_header(); ?>

    <div id="page-full-width" class="contact-page" role="main">

        <?php do_action('foundationpress_before_content'); ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="row">
            <div class="medium-4 columns widget_text">
              <?php
                if (has_post_thumbnail()):
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
              ?>
              <img src="<?php echo $featured_image[0]; ?>"/>
              <?php endif; ?>
            </div>
            <div class="medium-8 columns">
            <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
                <header>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                  <?php the_content(); ?>
                </div>
                <footer>
                    <div style="height: 100px;">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/signature.png"/>
                    </div>
                </footer>
            </article>
            </div>
            <div class="full-width instagram">
                <?php echo do_shortcode('[instagram-feed]'); ?>
            </div>
          </div>
        <?php endwhile; ?>

        <?php do_action('foundationpress_after_content'); ?>

    </div>

<?php get_footer();
