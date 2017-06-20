<?php
/**
 * The sidebar containing the main widget area
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php if (is_archive() OR is_home() OR is_page()): ?>
    <aside class="sidebar sticky-sidebar" style="">
        <?php get_template_part('template-parts/sidebar/sidebar-title-copy'); ?>
    </aside>
<?php else: ?>
    <aside class="sidebar">
        <?php do_action('foundationpress_before_sidebar'); ?>
        <?php dynamic_sidebar('sidebar-widgets'); ?>
        <?php do_action('foundationpress_after_sidebar'); ?>
    </aside>
<?php endif; ?>
