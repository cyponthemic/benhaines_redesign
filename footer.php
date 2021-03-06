<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

</section>
<div id="footer-container">
    <footer id="footer">
        <?php do_action('foundationpress_before_footer'); ?>
        <?php if (!wp_is_mobile()): ?>
            <?php dynamic_sidebar('footer-widgets'); ?>
        <?php else: ?>
            <ul class="accordion" data-accordion data-multi-expand="true">
                <?php //require_once( 'template-parts/accfooter.php' ); ?>
                <?php dynamic_sidebar('footer-widgets-mobile'); ?>
            </ul>
        <?php endif; ?>
        <?php do_action('foundationpress_after_footer'); ?>
    </footer>
    <footer id="legal" class="row" style="text-align: center">

        <p>
            <a href="<?php echo get_permalink( get_theme_mod('bh_footer_links') ); ?>">
              Terms & Conditions
            </a>
              &nbsp;&#124;&nbsp;
            <a>
              Copyright 2017 Ben Haines
            </a>
        </p>

        <p>
            LIQUOR LICENCE NUMBER: 36121309
        </p>
    </footer>
</div>

<?php do_action('foundationpress_layout_end'); ?>

<?php if (get_theme_mod('wpt_mobile_menu_layout') == 'offcanvas') : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>




<?php wp_footer(); ?>

<?php do_action('foundationpress_before_closing_body'); ?>



<script id="__bs_script__">

    //document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.2.12.3.js'><\/script>".replace("HOST", location.hostname));
</script>

</body>
</html>
