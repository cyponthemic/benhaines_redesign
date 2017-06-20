<?php
if (!function_exists('bh_register_theme_customizer')) :
    function bh_register_theme_customizer($wp_customize)
    {

        // Create custom panels
        $wp_customize->add_panel('footer_settings', array(
            'priority' => 2000,
            'theme_supports' => '',
            'title' => __('Footer Settings', 'foundationpress'),
            'description' => __('Controls the mobile menu', 'foundationpress'),
        ));

        // Create custom field for mobile navigation layout
        $wp_customize->add_section('footer_links', array(
            'title' => __('Footer links', 'foundationpress'),
            'panel' => 'footer_settings',
            'priority' => 2000,
        ));

        // Set default navigation layout
        $wp_customize->add_setting(
            'bh_footer_links',
            array(
                'default' => __('Terms and Conditions', 'foundationpress'),
            )
        );

        // Add options for navigation layout
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'bh_terms-and-conditions',
                array(
                    'type' => 'dropdown-pages',
                    'label' => 'Terms and conditions',
                    'section' => 'footer_links',
                    'settings' => 'bh_footer_links'
                )
            )
        );

    }

    add_action('customize_register', 'bh_register_theme_customizer');
endif;
