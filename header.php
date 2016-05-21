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
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon.png">

        <script>
            //            Global variables
            var templateUrl = '<?php echo get_template_directory_uri(); ?>';
            var foundationMobileBreakpoint = 640;
            var wordpressMobile = '<?php echo wp_is_mobile(); ?>';
        </script>
<!--		TODO: enaue the fonts -->


		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header contain-to-grid" role="banner" style="padding: 5px 0px 7px;">
		<div class="title-bar" data-responsive-toggle="site-navigation">


			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img class="bh-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo-desktop.png">
                </a>
			</div>
            <button class="menu-icon" type="button" data-toggle="mobile-menu">
                <span>Menu</span>
            </button>
		</div>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
                <img class="bh-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo-desktop.png">
                <ul class="menu">
                    <?php foundationpress_top_bar_l();?>
                </ul>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
