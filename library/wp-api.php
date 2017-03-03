<?php
add_action( 'admin_footer', 'bh_check_email_address_javascript' ); // Write our JS below here

function bh_check_email_address_javascript() { ?>
    <script type="text/javascript" >
        jQuery(document).ready(function($) {

            var data = {
                'action': 'bh_check_email_address',
                'whatever': 'alexchavet'
            };

            // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
            jQuery.post(ajaxurl, data, function(response) {
                console.log('Got this from the server: ' + response);
            });
        });
    </script> <?php
}

add_action( 'wp_ajax_bh_check_email_address', 'bh_check_email_address_callback' );
add_action( 'wp_ajax_nopriv_bh_check_email_address', 'bh_check_email_address_callback' );

function bh_check_email_address_callback() {
    global $wpdb; // this is how you get access to the database

    $email = $_REQUEST['email'];

    if(email_exists($email)){
        echo 'true';
    }
    else{
        echo 'false';
    }

    wp_die(); // this is required to terminate immediately and return a proper response
}


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

function ajax_login_init(){

//    wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js', array('jquery') );
//    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ng-login', 'ajax_login_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
    add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}
function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    auth_user_login($_REQUEST['username'], $_REQUEST['password'], 'Login');

    die();
}
function ajax_register(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_email'] = $info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = sanitize_email($_REQUEST['username']) ;
    $info['user_pass'] = sanitize_text_field($_REQUEST['password']);

    // Register the user
    $user_register = wp_insert_user( $info );
    if ( is_wp_error($user_register) ){
        $error  = $user_register->get_error_codes()	;

        if(in_array('empty_user_login', $error))
            echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('empty_user_login'))));
        elseif(in_array('existing_user_login',$error))
            echo json_encode(array('loggedin'=>false, 'message'=>__('This email is already registered.')));
        elseif(in_array('existing_user_email',$error))
            echo json_encode(array('loggedin'=>false, 'message'=>__('This email address is already registered.')));
    } else {
        auth_user_login($info['user_email'], $info['user_pass'], 'Registration');
    }

    die();
}
function auth_user_login($user_login, $password, $login)
{
    $info = array();
    $info['user_login'] = $user_login;
    $info['user_password'] = $password;
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('info'=>$info,'loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}
