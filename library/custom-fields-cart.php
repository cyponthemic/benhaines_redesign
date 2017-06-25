<?php

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    $user = new WP_User(get_current_user_id());
    if(get_user_meta( $user->ID, 'billing_first_name', true )){
        $userMetaFullName = get_user_meta( $user->ID, 'billing_first_name', true )." ".get_user_meta( $user->ID, 'billing_last_name', true );
    }
    $fields['billing']['billing_fullname']= array(
        'label'     => __('Name', 'woocommerce'),
        'placeholder'   => _x('Your full name', 'placeholder', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row'),
        'clear'     => true,
        'custom_attributes' => array(
            'ng-model' => 'blc.fields.billing_fullname',
            'ng-init' => 'blc.fields.billing_fullname="'.($userMetaFullName ?: $userMetaFullName).'"',
            'ng-change' => 'blc.setNames()',
            'ng-prevent-form-on-enter' => ''
        )
    );

    $fields['billing']['billing_gg_address']= array(
        'label'     => __('Delivery Address', 'woocommerce'),
        'placeholder'   => _x('eg. 123 High Street Melbourne', 'placeholder', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row'),
        'clear'     => true,
        'custom_attributes' => array(
            'ng-model' => 'billing_gg_address',
            'ng-googleplace' => '',
            'ng-prevent-form-on-enter' => '',
            'ng-focus' => 'gc.geolocate()',
        )
    );
    //reorder start

    //reorder end

    //adding custom attribute to company field
    $fields['billing']['billing_company']['custom_attributes'] = array(
        'ng-model' => 'blc.fields.billing_company',
        'ng-show' => 'blc.company'
    );

    //adding custom attribute to company field
    $fields['billing']['billing_phone']['custom_attributes'] = array(
        'ng-model' => 'blc.fields.billing_phone'
    );

    $fields['billing']['billing_postcode']= array(
        'required' => 'false',
        'custom_attributes' => array(
            'ng-model' => 'blc.fields.billing_postcode',
            'ng-show' => 'blc.showAddress'
        )
    );

    //hidden address fields
    $hffields = array(
        "billing_address_1",
        "billing_address_2",
        "billing_postcode",
        "billing_country",
        "billing_state",
        "billing_city"
    );
    //hidden name fields
    $hfnfields = array(
        "billing_first_name",
        "billing_last_name",
        "billing_email"
    );
    $userGGaddress = '';
    foreach($hffields as $hffields)
    {
        $fields['billing'][$hffields]['required'] = false;
        $fields['billing'][$hffields]['custom_attributes']['ng-show'] = 'blc.showAddress';
        if(get_user_meta( $user->ID, $hffields, true )){
            $userGGaddress = $userGGaddress.get_user_meta( $user->ID, $hffields, true ).', ';
        }
    }
    foreach($hfnfields as $hffields)
    {
        $fields['billing'][$hffields]['required'] = false;
        $fields['billing'][$hffields]['custom_attributes']['ng-show'] = 'blc.showFullName';
    }
    //ng model
    $ngfields = array(
        "billing_fullname",
        "billing_first_name",
        "billing_last_name",
        "billing_gg_address",
        "billing_address_1",
        "billing_address_2",
        "billing_postcode",
        "billing_country",
        "billing_state",
        "billing_city"
    );
    $fields['billing']['billing_state']['type'] = 'text';

    foreach($ngfields as $ngfields)
    {

        $fields['billing'][$ngfields]['custom_attributes']['ng-model'] = 'blc.fields.'.$ngfields;
        $userMeta = get_user_meta( $user->ID, $ngfields, true );
        if($userMeta){
            $fields['billing'][$ngfields]['custom_attributes']['ng-init'] = 'blc.fields.'.$ngfields.'="'.$userMeta.'"';
        }


    }
    $fields['billing']['billing_gg_address']['custom_attributes']['ng-init'] = "blc.fields.billing_gg_address=\"".$userGGaddress."\"";

    $fields2['billing']['billing_fullname'] = $fields['billing']['billing_fullname'];
    $fields2['billing']['billing_first_name'] = $fields['billing']['billing_first_name'];
    $fields2['billing']['billing_last_name'] = $fields['billing']['billing_last_name'];
    $fields2['billing']['billing_company'] = $fields['billing']['billing_company'];
    $fields2['billing']['billing_gg_address'] = $fields['billing']['billing_gg_address'];
    $fields2['billing']['billing_phone'] = $fields['billing']['billing_phone'];
    $fields2['billing']['billing_email'] = $fields['billing']['billing_email'];
    $fields2['billing']['billing_address_1'] = $fields['billing']['billing_address_1'];
    $fields2['billing']['billing_address_2'] = $fields['billing']['billing_address_2'];
    $fields2['billing']['billing_city'] = $fields['billing']['billing_city'];
    $fields2['billing']['billing_postcode'] = $fields['billing']['billing_postcode'];
    $fields2['billing']['billing_state'] = $fields['billing']['billing_state'];
    $fields2['billing']['billing_country'] = $fields['billing']['billing_country'];



    $checkout_fields = array_merge( $fields, $fields2 );

    return $checkout_fields;
}

add_action( 'wp_enqueue_scripts', 'agentwp_dequeue_stylesandscripts', 100 );
function agentwp_dequeue_stylesandscripts() {
    if ( class_exists( 'woocommerce' ) ) {
        wp_dequeue_style( 'select2' );
        wp_deregister_style( 'select2' );
        wp_dequeue_script( 'select2');
        wp_deregister_script('select2');
    }
}
