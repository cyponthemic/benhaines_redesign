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

    $whatever = $_POST['whatever'];
    if(username_exists($whatever)){
        echo $whatever;
    }
    else{
        echo 'Nope sorry';
    }
    wp_die(); // this is required to terminate immediately and return a proper response
}