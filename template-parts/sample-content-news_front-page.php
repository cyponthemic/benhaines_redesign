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





<div <?php post_class('news news_featured') ?>;>
    <div class="news--image">
        <div
            class="image-crop image-crop_news <?php echo(has_post_thumbnail() ? 'image-crop_news' : 'image-crop_no-image') ?>">

            <?php
            echo '<a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '">';
            echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'image-crop--image'));
            echo '</a>';
            ?>


        </div>
    </div>
    <div class="news--description-holder" data-equalizer-watch>
        <div class="news--category">
            <?php do_action('bhr_category_name'); ?>
        </div>
        <div class="news--title">
            <h3>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        </div>
        <div class="news--description">
            <p><?php the_excerpt(); ?></p>
        </div>
        <div class="news--cta">
            <a class="medium button button-bold hollow" href="<?php the_permalink(); ?>">read more</a>
        </div>
    </div>
</div>