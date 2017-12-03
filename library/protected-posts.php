<?php

if (!function_exists('bh_register_theme_customizer_protected')) :
    function bh_register_theme_customizer_protected($wp_customize)
    {
			$intro_label = 'This section is for subscribers only, please enter your email address';
			$success_title = 'Verification successful';
			$success_paragraph = 'Thank you, enjoy the exclusive content';
			$not_sub_title = "You are not currently a subscriber";
			$not_sub_button_yes = "I want to subscribe";
			$not_sub_button_no = "Not interested";
			$conf_title = "Check your email";
			$conf_paragraph = "Thank you for subscribing, confim your subscription to access content";
			$conf_error = "We can't find your address in the list, are you sure have confirm with you email ?";
			$conf_button = "Confirm";
			$settings = [
				'intro_label' => 'This section is for subscribers only, please enter your email address',
				'success_title' => 'Verification successful',
				'success_paragraph' => 'Thank you, enjoy the exclusive content',
				'not_sub_title' => 'You are not currently a subscriber',
				'not_sub_button_yes' => 'I want to subscribe',
				'not_sub_button_no' => 'Not interested',
				'conf_title' => 'Check your email',
				'conf_paragraph' => 'Thank you for subscribing, confim your subscription to access content',
				'conf_error' => 'We can\'t find your address in the list, are you sure have confirm with you email ?',
				'conf_button' => 'Confirm',
			];
        // Create custom panels
        $wp_customize->add_panel('protected_content', array(
            'priority' => 2000,
            'theme_supports' => '',
            'title' => __('Protected Content', 'foundationpress'),
            'description' => __('Update text for the protected content form', 'foundationpress'),
        ));

        // Create custom field for form labels
        $wp_customize->add_section('protected_content_labels', array(
            'title' => __('Form labels', 'foundationpress'),
            'panel' => 'protected_content',
            'priority' => 2000,
        ));

				foreach ($settings as $key => $value) {
					$setting_name = 'protected_content_'.$key;
					// Set default navigation layout
	        $wp_customize->add_setting(
	            $setting_name,
	            array(
	                'default' => __($value, 'foundationpress'),
	            )
	        );

	        // Add options for navigation layout
	        $wp_customize->add_control(
	            new WP_Customize_Control(
	                $wp_customize,
	                $setting_name.'_test',
	                array(
	                    'type' => 'textarea',
	                    'label' => $key,
	                    'section' => 'protected_content_labels',
	                    'settings' => $setting_name
	                )
	            )
	        );

				}

				// Create custom field for form labels
				$wp_customize->add_section('protected_content_archive', array(
						'title' => __('Shop page details', 'foundationpress'),
						'panel' => 'protected_content',
						'priority' => 2000,
				));


				$subscriber_archive = [
					'title' => 'Members only',
					'intro' => 'These wines are for subscriber only, subscribe to access'
				];

				foreach ($subscriber_archive as $key => $value) {
					$setting_name = 'protected_content_archive_'.$key;
					// Set default navigation layout
	        $wp_customize->add_setting(
	            $setting_name,
	            array(
	                'default' => __($value, 'foundationpress'),
	            )
	        );

	        // Add options for navigation layout
	        $wp_customize->add_control(
	            new WP_Customize_Control(
	                $wp_customize,
	                $setting_name.'_test',
	                array(
	                    'type' => 'textarea',
	                    'label' => $key,
	                    'section' => 'protected_content_archive',
	                    'settings' => $setting_name
	                )
	            )
	        );

				}

				// Create custom field for form labels
				$wp_customize->add_section('protected_content_password', array(
						'title' => __('Protected content password', 'foundationpress'),
						'panel' => 'protected_content',
						'priority' => 2000,
				));

				$wp_customize->add_setting(
						'protected_content_password_value',
						array(
								'default' => __('bh', 'foundationpress'),
						)
				);

				$wp_customize->add_control(
						new WP_Customize_Control(
								$wp_customize,
								'protected_content_password_control',
								array(
										'type' => 'text',
										'label' => 'Password for susbcriber product',
										'section' => 'protected_content_password',
										'settings' => 'protected_content_password_value'
								)
						)
				);
    }


    add_action('customize_register', 'bh_register_theme_customizer_protected');
endif;





function the_title_trim($title) {

	$title = attribute_escape($title);

	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);

	$replacewith = array(
		'', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);

	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');

add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
    global $post;
		$intro_label = get_theme_mod('protected_content_intro_label');
		$success_title = get_theme_mod('protected_content_success_title');
		$success_paragraph = get_theme_mod('protected_content_success_paragraph');
		$not_sub_title = get_theme_mod('protected_content_not_sub_title');
		$not_sub_button_yes = get_theme_mod('protected_content_not_sub_button_yes');
		$not_sub_button_no = get_theme_mod('protected_content_not_sub_button_no');
		$conf_title = get_theme_mod('protected_content_conf_title');
		$conf_paragraph = get_theme_mod('protected_content_conf_paragraph');
		$conf_error = get_theme_mod('protected_content_conf_error');
		$conf_button = get_theme_mod('protected_content_conf_button');
		$password = get_theme_mod('protected_content_password_value');
    $label = get_theme_mod('protected_content_intro_label');
    $o = '
		<div class="subscribe-checker" ng-subscribe ng-class="{loading : csb.loading }">
		<div class="loading-overlay">
			<i class="fa fa-spin fa-spinner"></i>
		</div>
		<form ng-submit="csb.checkAddress()" ng-show="!csb.emailChecked"
					 class="post-password-form"
		>
			<h4>'.$intro_label.'</h4>
			<label class="email-label" for="ng-sub-email">' . __( "Email address:" ) . ' </label>
			<input name="email" ng-model="csb.emailAddress" type="email" id="ng-sub-email" type="password" style="background: #ffffff; border:1px solid #999; color:#333333; padding:10px;" size="20" /><button class="button button-primary" type="submit">Confirm</button>
		</form>
		<form ng-show="csb.isSubscriber"  class="post-password-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
		<h4>'.$success_title.'</h4>
		<p>'.$success_paragraph.'</p>
		<label class="pass-label hide" for="' . $label . '">' . __( "PASSWORD:" ) . ' </label>
		<input value="'.$password.'" name="post_password" id="' . $label . '" type="hidden" style="background: #ffffff; border:1px solid #999; color:#333333; padding:10px;" size="20" />
		<input type="submit" name="Submit" class="button" value="' . esc_attr__( "Access content" ) . '" />
    </form>
		<form ng-submit="csb.subscribe()" ng-show="csb.emailChecked && !csb.isSubscriber && !csb.confrimForm"
					 class="post-password-form"
		>
			<h4>'.$not_sub_title.'</h4>
			<label class="email-label" for="ng-sub-email">' . __( "Email address:" ) . ' </label>
			<input name="email" ng-model="csb.emailAddress" type="email" id="ng-sub-email" type="password" style="background: #ffffff; border:1px solid #999; color:#333333; padding:10px;" size="20" />
			<button class="button button-primary" type="submit">'.$not_sub_button_yes.'</button>
			<a class="button secondary" href="'.get_option('siteurl').'/shop">'.$not_sub_button_no.'</a>
		</form>
		<form ng-submit="csb.checkConfirmation()" ng-show="csb.confrimForm && !csb.isSubscriber"
					 class="post-password-form"
		>
		<h4>'.$conf_title.'</h4>
		<p>'.$conf_paragraph.'</p>
		<p class="alert callout" ng-show="csb.confirmError">'.$conf_error.'</p>
		<label class="pass-label hide" for="' . $label . '">' . __( "PASSWORD:" ) . ' </label>
		<button class="button button-primary" type="submit">'.$conf_button.'</button>
    </form>
		</div>
    ';
    return $o;
}


add_action( 'wp_ajax_bh_check_subscriber', 'bh_check_subscriber_callback' );
add_action( 'wp_ajax_nopriv_bh_check_subscriber', 'bh_check_subscriber_callback' );

function bh_check_subscriber_callback() {
    global $wpdb; // this is how you get access to the database

    $email = $_REQUEST['email'];

		$mailchimp = new MC4WP_MailChimp;
		$member = $mailchimp->list_has_subscriber('3f6c9d20d3',$email,[]);

		if($member) {
			echo true;
		}
		else {
			echo false;
		}

    wp_die(); // this is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_bh_add_subscriber', 'bh_add_subscriber_callback' );
add_action( 'wp_ajax_nopriv_bh_add_subscriber', 'bh_add_subscriber_callback' );

function bh_add_subscriber_callback() {
    global $wpdb; // this is how you get access to the database

		$args = [
			'email_address' => $_REQUEST['email']
		];

		$mailchimp = new MC4WP_MailChimp;
		$member = $mailchimp->list_subscribe('3f6c9d20d3', $_REQUEST['email']);

    wp_die(); // this is required to terminate immediately and return a proper response
}

add_action( 'woocommerce_product_options_general_product_data', 'bh_is_pack' );

function bh_is_pack(){
    woocommerce_wp_checkbox( array( 'id' => 'bh_is_pack', 'wrapper_class' => 'show_if_simple show_if_variable', 'label' => __( 'Is this product a pack?', 'your-plugin-domain' ) ) );
}

add_action( 'woocommerce_process_product_meta', 'bh_pack_save_product_meta' );

function bh_pack_save_product_meta( $post_id ){
    if( isset( $_POST['bh_is_pack'] ) ) {
        update_post_meta( $post_id, 'bh_is_pack', 'yes' );
    } else {
        delete_post_meta( $post_id, 'bh_is_pack' );
    }
}
