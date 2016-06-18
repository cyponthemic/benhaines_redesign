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





<div class="news news_featured news_featured_hero">

	<div class="news--description-holder news--description-holder_hero" data-equalizer-watch>
		<div class="news--category">
			<span class="news--category--title">Category:</span>
			<span class="news--category--category">News</span>
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