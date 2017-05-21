<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if (!function_exists('foundationpress_scripts')) :
    function foundationpress_scripts()
    {

        // Enqueue Google Fonts.

        wp_enqueue_style('google-fonts-gara-2', 'https://fonts.googleapis.com/css?family=Cormorant+Garamond');
        wp_enqueue_style('google-fonts-lato', 'https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900');
        //wp_enqueue_style('google-fonts-gara', 'https://fonts.googleapis.com/css?family=EB+Garamond:400,100,300,700,900');

        // Enqueue the main Stylesheet.
        //wp_enqueue_style( 'slick-stylesheet', get_template_directory_uri() . '/assets/components/slick/slick.min.css', array(), '2.6.1', 'all' );

        wp_enqueue_style('main-stylesheet', get_template_directory_uri() . '/assets/stylesheets/foundation.css', array(), '2.6.1', 'all');

        // Deregister the jquery version bundled with WordPress.
        wp_deregister_script('jquery');

        // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
        wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false);
        // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
        //wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/components/jquery/dist/jquery.min.js', array(), '2.2.3', false );

        //wp_enqueue_script( 'parralax', get_template_directory_uri() . '/assets/components/parralax/parralax.min.js', array(), '', false );
        //wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/components/slick/slick.min.js', array(), '', false );
        // If you'd like to cherry-pick the foundation components you need in your project, head over to gulpfile.js and see lines 35-54.
        // It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
        wp_enqueue_script('foundation', get_template_directory_uri() . '/assets/javascript/foundation.js', array('jquery'), '2.6.1', true);

        // Add the comment-reply library on pages where it is necessary
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        wp_register_script('googleplace', '//maps.googleapis.com/maps/api/js?key=AIzaSyCuMSEEhbxrve6SREN_OwPHVpZBPcEQyjQ&libraries=places', array('jquery'), 'places', true );
        wp_enqueue_script('googleplace');

        if(!is_account_page()) {
            wp_register_script('angular', get_template_directory_uri() . '/assets/angular/angular.min.js', array('jquery'), '1.6.1', true);
            wp_enqueue_script('angular');

            wp_register_script('app', get_template_directory_uri() . '/assets/angular/app.js', array('angular'), '1.6.1', true);
            wp_enqueue_script('app');


            wp_register_script('ng-login', get_template_directory_uri() . '/assets/angular/ng-login.js', array('app'));
            wp_enqueue_script('ng-login');

            wp_register_script('ng-googleplace-factory', get_template_directory_uri() . '/assets/angular/ng-googleplace-factory.js', array('app'));
            wp_enqueue_script('ng-googleplace-factory');

            wp_register_script('ng-googleplace', get_template_directory_uri() . '/assets/angular/ng-googleplace.js', array('app'));
            wp_enqueue_script('ng-googleplace');

            wp_register_script('ng-billing', get_template_directory_uri() . '/assets/angular/ng-billing.js', array('app'));
            wp_enqueue_script('ng-billing');

            wp_register_script('ng-notice', get_template_directory_uri() . '/assets/angular/ng-notice.js', array('app'));
            wp_enqueue_script('ng-notice');
        }


    }

    add_action('wp_enqueue_scripts', 'foundationpress_scripts');
endif;
