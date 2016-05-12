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



<div class="news news-archived">

		<div class="image-crop image-crop_news" >
			    <?php
				echo '<a href="' . get_permalink( $_post->ID ) . '" title="' . esc_attr( $_post->post_title ) . '">';
				echo get_the_post_thumbnail( $_post->ID, 'full', array( 'class' => 'image-crop--image' ) );
				echo '</a>';
				?>

		</div>
		<div class="news--description"  data-equalizer-watch>

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				<?php the_excerpt(); ?>

			<a class="medium button button-bold hollow" href="<?php the_permalink(); ?>">read more</a>
		</div>

</div>