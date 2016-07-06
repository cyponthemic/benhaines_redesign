<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="off-canvas position-right" id="mobile-menu" data-off-canvas data-position="right" role="navigation">
  <?php foundationpress_mobile_nav(); ?>
</nav>
<nav class="off-canvas position-left off-canvas-sidebar" id="mobile-menu-2" data-off-canvas data-position="left" role="navigation">

  <?php get_sidebar('offcanvas'); ?>

</nav>
<div class="off-canvas-content" data-off-canvas-content>
