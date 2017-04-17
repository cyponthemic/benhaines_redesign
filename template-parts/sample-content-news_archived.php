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





<article  <?php post_class('news news_archived'); ?>>
    <div class="news--image">
        <div
            class="image-crop image-crop_news <?php echo(has_post_thumbnail() ? 'image-crop_news' : 'image-crop_no-image') ?>">

            <?php
            echo '<a href="' . get_permalink($_post->ID) . '" title="' . esc_attr($_post->post_title) . '">';
            echo get_the_post_thumbnail($_post->ID, 'fp-large', array('class' => 'image-crop--image'));
            echo '</a>';
            ?>


        </div>
    </div>
    <div class="news--description-holder news--description-holder_archived">
        <div class="news--category">

            <?php do_action('bhr_category_name'); ?>
            <span style="margin-left: 30px"><?php the_date(); ?></span>

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
</article>
