<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) {
	return;
}

?>


<form id="login" autocomplete="off"
	  ng-submit="clc.loginForm()"
	  class="" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>
	<p><strong>{{clc.title}}</strong></p>
	<p class="status">{{clc.message}}</p>
	<label for="email">
		Your email
	</label>
	<input id="email" type="email" name="email"
		   ng-init="clc.loginEmail = clc.emailAddress"
		   ng-model="clc.loginEmail"
		   style="display: block">
	<label for="password">
		Your password
	</label>
	<input id="password" type="password" name="password" ng-model="clc.loginPassword">

	<button class="button submit_button" type="submit" value="Login" name="submit">
		<i loading-spinner="" class="fa fa-spinner fa-spin fa-fw loading-spinner-button"></i>
		<span ng-hide="clc.isReturning">Create Account</span>
		<span ng-show="clc.isReturning">Login</span>
	</button>
	<a class="button" href="<?php echo wp_lostpassword_url(); ?>">
		<span ng-hide="clc.isReturning">Lost your logins?</span>
		<span ng-show="clc.isReturning">Lost your password?</span>
		</a>
	<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
</form>







