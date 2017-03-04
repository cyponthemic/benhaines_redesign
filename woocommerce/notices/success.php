<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

?>

<?php foreach ( $messages as $message ) : ?>
<!--<section class="section section-white message__header">-->
<!--    <div class="row">-->
<!--        <div class="small-12 large-12 columns" role="main">-->
            <div class="woocommerce-message" data-ng-notice>
                <span>
                <?php echo wp_kses_post( $message ); ?>
                </span>
            </div>
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<?php endforeach; ?>