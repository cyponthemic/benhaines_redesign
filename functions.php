<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once('library/cleanup.php');

/** Various clean up functions */
require_once('library/helpers.php');

/** Required for Foundation to work properly */
require_once('library/foundation.php');

/** Register all navigation menus */
require_once('library/navigation.php');

/** Add menu walkers for top-bar and off-canvas */
require_once('library/menu-walkers.php');

/** Create widget areas in sidebar and footer */
require_once('library/widget-areas.php');

/** Return entry meta information for posts */
require_once('library/entry-meta.php');

/** Enqueue scripts */
require_once('library/enqueue-scripts.php');

/** Add theme support */
require_once('library/theme-support.php');

/** Add Nav Options to Customer */
require_once('library/custom-nav.php');

/** Change WP's sticky post class */
require_once('library/sticky-posts.php');

/** Configure responsive image sizes */
require_once('library/responsive-images.php');

/** Configure category displaying */
require_once('library/categories.php');

/** Configure woocommerce displaying */
require_once('library/woocommerce.php');

/** Configure woocommerce loops */
require_once('library/wc/custom_loop.php');

/** Configure Cart Ajax  */
require_once('library/wp-api.php');

/** Configure Cart fields  */
require_once('library/custom-fields-cart.php');

require_once('library/meta.php');
/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{

    if (is_front_page()) {
        return 30;
    } else {
        return 30;
    }
}

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);
