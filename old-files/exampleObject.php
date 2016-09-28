<?php
update_option('siteurl', 'http://graffitigroup.co.uk');
update_option('home', 'http://graffitigroup.co.uk');

function add_scripts()
{
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAFnK7oJrPtBfAq5kF1Mm-1XHCHygZDISk', array(), false, true);
}

add_action('wp_enqueue_scripts', 'add_scripts', 12);

function tm_polygon_child_enqueue_scripts()
{
    wp_register_style('tm-polygon-child-style', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_style('tm-polygon-child-style');
}

add_action('wp_enqueue_scripts', 'tm_polygon_child_enqueue_scripts', 11);

