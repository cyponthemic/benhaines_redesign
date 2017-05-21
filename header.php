<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


?>
    <!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico"
              type="image/x-icon">
        <link rel="apple-touch-icon" sizes="144x144"
              href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="114x114"
              href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72"
              href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon"
              href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon.png">

        <script>
            //            Global variables
            var templateUrl = '<?php echo get_template_directory_uri(); ?>';
            var foundationMobileBreakpoint = 640;
            var foundationTabletBreakpoint = 768;
            var wordpressMobile = '<?php echo wp_is_mobile(); ?>';

        </script>


        <?php wp_head(); ?>

    </head>
<body <?php body_class(); ?> ng-app="BH">
<?php do_action('foundationpress_after_body'); ?>

<?php if (get_theme_mod('wpt_mobile_menu_layout') == 'offcanvas') : ?>
<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
    <?php get_template_part('template-parts/mobile-off-canvas'); ?>
<?php endif; ?>

<?php do_action('foundationpress_layout_start'); ?>

    <header id="masthead" class="site-header contain-to-grid" role="banner" style="padding: 5px 0px 7px;">
        <div class="title-bar" data-responsive-toggle="site-navigation" data-hide-for="large">
            <div class="title-bar-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">

                    <svg style="width: 115px; margin-top: -20px; margin-bottom: -35px;" id="Layer_1" data-name="Layer 1"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 218.04 146.96">
                        <defs>
                            <style>.cls-1 {
                                    fill: none;
                                }

                                .cls-2 {
                                    fill: #231f20;
                                }

                                .cls-3 {
                                    fill: #948f8d;
                                }</style>
                        </defs>
                        <title>BHW_Logo_CMYK</title>
                        <rect class="cls-1" width="218.04" height="146.96"/>
                        <path class="cls-2"
                              d="M79.74,0.67H95.49V1c-2,0-3.11,1.26-3.11,3.89V57.4h0c0,3.86,1.84,3.89,3.4,3.89v0.29H80c-4.18,0-7.39-2.34-7.39-7.11V7.77A7.27,7.27,0,0,1,79.74.67Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2"
                              d="M64.27,0.67H48.52V1c2,0,3.11,1.26,3.11,3.89V57.4h0c0,3.86-1.84,3.89-3.4,3.89v0.29H64c4.18,0,7.39-2.34,7.39-7.11V7.77A7.27,7.27,0,0,0,64.27.67Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-3"
                              d="M76.38,30.3A10.11,10.11,0,0,0,86.5,20.19,10.48,10.48,0,0,0,76.25,9.83c-1.39,0-2.64,0-3.56,0V30.3h3.7Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-3"
                              d="M66.81,9.83H58.59V10c1.26,0,2.15.82,2.15,2.53V49.66c0,1.71-.89,2.53-2.15,2.53v0.19h8.21a4.53,4.53,0,0,0,4.62-4.62V14.45A4.52,4.52,0,0,0,66.81,9.83Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-3"
                              d="M76.51,31.15H72.69V52.42c1.26,0,2.49,0,3.82,0A10.65,10.65,0,0,0,76.51,31.15Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2"
                              d="M6.66,92.63H1V79.53H6.77c2.18,0,4.38,1.1,4.38,3.54a3,3,0,0,1-1.62,2.59,3.24,3.24,0,0,1,2.41,3.16C11.94,91.17,9.92,92.63,6.66,92.63ZM3.15,90.91H6.49c3,0,3.34-1.14,3.34-2.14,0-1.9-2.41-2.1-3.45-2.1H3.15v4.24Zm0-5.92H6.54C7.29,85,9,84.81,9,83.14c0-1.19-.93-1.9-2.48-1.9H3.15V85Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2"
                              d="M27.34,92.63H17.76V79.53h9.16V81.3H19.86V85h6.41v1.74H19.86v4.13h7.48v1.78Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2"
                              d="M45.4,92.8H43.84L35.33,83v9.61H33.27V79.36h1.54l8.53,9.83V79.53H45.4V92.8Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2" d="M69.09,92.63H67V86.72h-7.9v5.91H57V79.53h2.11v5.42H67V79.53h2.11V92.63Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2"
                              d="M87.74,92.63H85.4l-1.75-3.85H77.72L76,92.63H73.67l6.22-13.29h1.68ZM78.5,87.06h4.37l-2.19-4.81Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2" d="M94.43,92.63H92.32V79.53h2.11V92.63Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2"
                              d="M113.24,92.8h-1.56L103.17,83v9.61H101.1V79.36h1.54l8.53,9.83V79.53h2.06V92.8Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2" d="M129.49,92.63h-9.59V79.53h9.16V81.3H122V85h6.41v1.74H122v4.13h7.48v1.78Z"
                              transform="translate(36.92 20.42)"/>
                        <path class="cls-2"
                              d="M139.56,92.87a7.1,7.1,0,0,1-5.4-2.09l-0.23-.23,1.6-1.29,0.19,0.21a4.87,4.87,0,0,0,3.88,1.67c2,0,3.15-.68,3.15-1.82,0-1.53-1.63-2-3.52-2.56-2.1-.62-4.47-1.31-4.47-3.81,0-1.77,1.29-3.66,4.93-3.66a6.5,6.5,0,0,1,5,2l0.22,0.23-1.54,1.26-0.19-.22A4.35,4.35,0,0,0,139.73,81c-1.81,0-2.8.61-2.8,1.71,0,1.31,1.55,1.79,3.36,2.33,2.18,0.66,4.64,1.41,4.64,4C144.92,91.38,142.82,92.87,139.56,92.87Z"
                              transform="translate(36.92 20.42)"/>
                    </svg>
                </a>
            </div>
            <button class="menu-icon" type="button" data-toggle="mobile-menu">
                <span>Menu</span>
            </button>
        </div>

        <nav id="site-navigation" class="main-navigation top-bar" role="navigation">
            <div class="top-bar-left">
                <svg style="width: 175px; margin-top: -20px; margin-bottom: -35px;" id="Layer_1" data-name="Layer 1"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 218.04 146.96">
                    <defs>
                        <style>.cls-1 {
                                fill: none;
                            }

                            .cls-2 {
                                fill: #231f20;
                            }

                            .cls-3 {
                                fill: #948f8d;
                            }</style>
                    </defs>
                    <title>BHW_Logo_CMYK</title>
                    <rect class="cls-1" width="218.04" height="146.96"/>
                    <path class="cls-2"
                          d="M79.74,0.67H95.49V1c-2,0-3.11,1.26-3.11,3.89V57.4h0c0,3.86,1.84,3.89,3.4,3.89v0.29H80c-4.18,0-7.39-2.34-7.39-7.11V7.77A7.27,7.27,0,0,1,79.74.67Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-2"
                          d="M64.27,0.67H48.52V1c2,0,3.11,1.26,3.11,3.89V57.4h0c0,3.86-1.84,3.89-3.4,3.89v0.29H64c4.18,0,7.39-2.34,7.39-7.11V7.77A7.27,7.27,0,0,0,64.27.67Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-3"
                          d="M76.38,30.3A10.11,10.11,0,0,0,86.5,20.19,10.48,10.48,0,0,0,76.25,9.83c-1.39,0-2.64,0-3.56,0V30.3h3.7Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-3"
                          d="M66.81,9.83H58.59V10c1.26,0,2.15.82,2.15,2.53V49.66c0,1.71-.89,2.53-2.15,2.53v0.19h8.21a4.53,4.53,0,0,0,4.62-4.62V14.45A4.52,4.52,0,0,0,66.81,9.83Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-3" d="M76.51,31.15H72.69V52.42c1.26,0,2.49,0,3.82,0A10.65,10.65,0,0,0,76.51,31.15Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-2"
                          d="M6.66,92.63H1V79.53H6.77c2.18,0,4.38,1.1,4.38,3.54a3,3,0,0,1-1.62,2.59,3.24,3.24,0,0,1,2.41,3.16C11.94,91.17,9.92,92.63,6.66,92.63ZM3.15,90.91H6.49c3,0,3.34-1.14,3.34-2.14,0-1.9-2.41-2.1-3.45-2.1H3.15v4.24Zm0-5.92H6.54C7.29,85,9,84.81,9,83.14c0-1.19-.93-1.9-2.48-1.9H3.15V85Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-2" d="M27.34,92.63H17.76V79.53h9.16V81.3H19.86V85h6.41v1.74H19.86v4.13h7.48v1.78Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-2" d="M45.4,92.8H43.84L35.33,83v9.61H33.27V79.36h1.54l8.53,9.83V79.53H45.4V92.8Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-2" d="M69.09,92.63H67V86.72h-7.9v5.91H57V79.53h2.11v5.42H67V79.53h2.11V92.63Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-2"
                          d="M87.74,92.63H85.4l-1.75-3.85H77.72L76,92.63H73.67l6.22-13.29h1.68ZM78.5,87.06h4.37l-2.19-4.81Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-2" d="M94.43,92.63H92.32V79.53h2.11V92.63Z" transform="translate(36.92 20.42)"/>
                    <path class="cls-2"
                          d="M113.24,92.8h-1.56L103.17,83v9.61H101.1V79.36h1.54l8.53,9.83V79.53h2.06V92.8Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-2" d="M129.49,92.63h-9.59V79.53h9.16V81.3H122V85h6.41v1.74H122v4.13h7.48v1.78Z"
                          transform="translate(36.92 20.42)"/>
                    <path class="cls-2"
                          d="M139.56,92.87a7.1,7.1,0,0,1-5.4-2.09l-0.23-.23,1.6-1.29,0.19,0.21a4.87,4.87,0,0,0,3.88,1.67c2,0,3.15-.68,3.15-1.82,0-1.53-1.63-2-3.52-2.56-2.1-.62-4.47-1.31-4.47-3.81,0-1.77,1.29-3.66,4.93-3.66a6.5,6.5,0,0,1,5,2l0.22,0.23-1.54,1.26-0.19-.22A4.35,4.35,0,0,0,139.73,81c-1.81,0-2.8.61-2.8,1.71,0,1.31,1.55,1.79,3.36,2.33,2.18,0.66,4.64,1.41,4.64,4C144.92,91.38,142.82,92.87,139.56,92.87Z"
                          transform="translate(36.92 20.42)"/>
                </svg>
                <ul class="menu">
                    <?php foundationpress_top_bar_l(); ?>
                </ul>
            </div>
            <div class="top-bar-right">
                <?php foundationpress_top_bar_r(); ?>

                <?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') == 'topbar') : ?>
                    <?php get_template_part('template-parts/mobile-top-bar'); ?>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <section class="container">
		<?php do_action('foundationpress_after_header');
