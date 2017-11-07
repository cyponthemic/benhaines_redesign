<?php
 /*
 Template Name: coming
 */
get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>
    <div class="section">
        <div class="video-container" id="heroVideoJs">
            <div class="hero-header after-video-loaded">
                <h1>Coming soon</h1>
                <a class="large button" href="#get-notified">Get notified</a>
            </div>
        </div>
        <script>
            var initVideoBackground = true;
        </script>
    </div>
    <div id="get-notified" class="section section-padded section-not-padded-mobile after-video-loaded">
        <div class="row row-margin-bottom">
            <div class="large-6 large-offset-3 columns">
                <h2 class="center">Ben Haines Wine</h2>
                <p class="center">Learning from the past, being in the present and fostering excitement for the future to create expressive wines with balance, harmony and longevity.</p>
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
              <?php get_template_part('template-parts/form'); ?>
            </div>
        </div>
    </div>
    <div class="full-width instagram">
        <?php echo do_shortcode('[instagram-feed]'); ?>
    </div>

<?php get_footer();
