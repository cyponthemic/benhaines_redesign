<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
/*
Template Name: Sample Content Product
*/
?>





<div  <?php post_class('news news_featured news_featured_hero'); ?>>

	<div class="news--description-holder news--description-holder_hero" data-equalizer-watch>
		<div class="news--category">
			<?php do_action( 'bhr_category_name' ); ?>
		</div>
		<div class="news--title news--title_hero">
			<h3>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
		</div>
		<div class="news--description">
			<p><?php the_excerpt(); ?></p>
		</div>
		<div class="news--cta">
			<a class="medium button button-bold" href="<?php the_permalink(); ?>">read more</a>
		</div>
	</div>
</div>