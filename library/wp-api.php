<?php
//Ajax email checker
add_action( 'wp_ajax_bh_check_email_address', 'bh_check_email_address_callback' );
add_action( 'wp_ajax_nopriv_bh_check_email_address', 'bh_check_email_address_callback' );

function bh_check_email_address_callback() {
    global $wpdb; // this is how you get access to the database

    $email = $_REQUEST['email'];

    if(email_exists($email) || username_exists($email)){
        echo 'true';
    }
    else{
        echo 'false';
    }

    wp_die(); // this is required to terminate immediately and return a proper response
}

//Load custom form
if ( ! function_exists( 'woocommerce_login_form_custom' ) ) {

    /**
     * Output the WooCommerce Login Form.
     *
     * @subpackage  Forms
     * @param array $args
     */
    function woocommerce_login_form_custom( $args = array() ) {

        $defaults = array(
            'message'  => '',
            'redirect' => '',
            'hidden'   => false
        );

        $args = wp_parse_args( $args, $defaults  );

        wc_get_template( 'global/form-login-custom.php', $args );
    }
}

//ajax loading
add_action( 'wp_ajax_nopriv_form-submission', 'submit_form' );
add_action( 'wp_ajax_form-submission', 'submit_form' );

function submit_form(){
    echo $_REQUEST['extras'];
    wp_die();
}