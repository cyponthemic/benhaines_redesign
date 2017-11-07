<?php
/*
Template Name: About
*/
get_header(); ?>
    </section>
    <?php while (have_posts()) : the_post(); ?>
      <?php
        if (has_post_thumbnail()):
        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
        else :
        $featured_image = array();
        endif;
      ?>
      <div class="hero hero-background-image" data-parallax="scroll"
           data-image-src="<?php echo $featured_image[0]; ?>"
           data-z-index="9"
           data-speed="1.1"
          >
          <div class="container">
          <div class=" row">
              <div class="large-4 medium-6 small-10 float-right columns square">
                <h1>About Ben</h1>
              </div>
          </div>
        </div>
      </div>
    <section class="container">
    <div id="page-full-width" class="contact-page" role="main">
        <?php do_action('foundationpress_before_content'); ?>
        <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
          <div class="row row-margin-bottom">
              <div class="large-6 large-offset-3 columns">
                  <h2 class="center">Yesterdays Yeahs.</br>Tomorrows Truths.</h2>
                  <?php the_content(); ?>
                  <footer>
                      <div style="height: 100px;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/signature.png"/>
                      </div>
                  </footer>
              </div>
          </div>
          <div class="row">
            <div class="full-width instagram">
                <?php echo do_shortcode('[instagram-feed]'); ?>
            </div>
          </div>
        </article>
        <?php do_action('foundationpress_after_content'); ?>
    </div>
    <?php endwhile; ?>
<?php get_footer();
