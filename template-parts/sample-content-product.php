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



<div class="product product-archived">
    <div class="image-crop image-crop_bottle">

        <?php
        $price = get_post_meta(get_the_ID(), '_regular_price');
        echo '<a href="' . get_permalink($_post->ID) . '" title="' . esc_attr($_post->post_title) . '">';
        echo get_the_post_thumbnail($_post->ID, 'full', array('class' => 'image-crop--bottle-shot'));
        echo '</a>';
        ?>


    </div>

    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?>&nbsp;|&nbsp;$<?php echo $price[0]; ?></a></h3>
    <a class="medium button button-bold" href="<?php the_permalink(); ?>">Discover</a>
</div>

