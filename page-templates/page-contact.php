<?php
/*
Template Name: Contact
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
                  <div class="row">
                    <div class="large-6 columns">
                      <p class="p-upper">BEN HAINES WINE</p>
                      <p class="">
                        <address>
                        5 Parker Street</br>
                        Ballarat, Victoria 3350</br>
                        Australia
                        </address>
                      </p>
                    </div>
                    <div class="large-6 columns">
                      <p class="p-upper">&nbsp;</p>
                      <b>
                      <a href="mailto:&#105;&#110;&#102;&#111;&#064;&#098;&#101;&#110;&#104;&#097;&#105;&#110;&#101;&#115;&#119;&#105;&#110;&#101;&#046;&#099;&#111;&#109;;">
                        &#105;&#110;&#102;&#111;&#064;&#098;&#101;&#110;&#104;&#097;&#105;&#110;&#101;&#115;&#119;&#105;&#110;&#101;&#046;&#099;&#111;&#109;
                      </a><br>
                      <a href="tel:+&#054;&#049;&#052;&#049;&#055;&#048;&#056;&#051;&#054;&#052;&#053;">+&#054;&#049;&#052;&#049;&#055;&#048;&#056;&#051;&#054;&#052;&#053;</a>
                      </b>
                    </div>
                  </div>
                    <hr>
                    <div class="row">
                      <div class="large-6 columns">
                        <h2>Distributors</h2>
                          <p class="p-upper">VICTORIA & TASMANIA</p>
                          <p class="">
                            Moor Street Wines</br>
                            Contact: Tony Nowell</br>
                            <a href="tel:+&#054;&#049;&#048;&#052;&#051;&#056;&#051;&#051;&#053;&#048;&#048;&#048;">
                              +&#054;&#049;&#048;&#052;&#051;&#056;&#051;&#051;&#053;&#048;&#048;&#048;
                            </a>
                          </p>
                          <br>
                          <p class="p-upper">New South Wales</p>
                          <p class="">
                            Vigorous Brothers</br>
                            Contact: Daniel Jacobson</br>
                            0430071720
                          </p>
                          <br>
                          <p class="p-upper">REST OF AUSTRALIA</p>
                          <p class="">
                            Contact Ben Haines
                          </p>
                      </div>
                      <div class="large-6 columns">
                        <h2>&nbsp;</h2>
                          <p class="p-upper">USA</p>
                          <p class="">
                            Little Peacock</br>
                            Contact: Gordon Little</br>
                            <a href="mailto:&#103;&#111;&#114;&#100;&#111;&#110;&#064;&#108;&#105;&#116;&#116;&#108;&#101;&#045;&#112;&#101;&#097;&#099;&#111;&#099;&#107;&#046;&#099;&#111;">
                              &#103;&#111;&#114;&#100;&#111;&#110;&#064;&#108;&#105;&#116;&#116;&#108;&#101;&#045;&#112;&#101;&#097;&#099;&#111;&#099;&#107;&#046;&#099;&#111;
                            </a>
                          </p>
                      </div>
                    </div>
                    <hr>
                    <h2>Store locator</h2>
                    <p>Where to enjoy and buy Ben Haines Wine. Please note that this list is subject to change.</p>
                    <a class="button hollow" href="../stockists">Find store</a>
                    <br><br><br><br>
                </div>
                <footer>

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
