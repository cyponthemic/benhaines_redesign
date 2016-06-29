<?php
/**
 * The sidebar containing the main widget area
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php if (is_archive() OR is_home() OR is_page()):?>
    <aside class="sidebar" style="">
        <?php
        do_action('foundationpress_before_sidebar');
        ?>
        <div class="" style="background:#EBEBEB; padding: 30px 20px">
            <h4>Introducing Ben Haines</h4>
            <p class="category--intro">
                I started writing to share and inspire <a href="#" class="news-link">news</a> and <a href="#" class="articles-link">stories</a> directly from the vineyard. <a href="#" class="articles-link">Articles</a> that capture the essence of the wine I make and share <a href="#" class="reviews-link">reviews,</a> press release and upcoming events to better understand local wine industry in Australia
            </p>

            <h4>Categories</h4>
            <div class="category-flex">

                <?php if( is_page( 'news-reviews' )):?>
                    <a class="category--button hollow button black active" href="<?php echo site_url(); ?>/news-reviews/">SHOW ALL</a>
                <?php else:?>
                    <a class="category--button hollow button black" href="<?php echo site_url(); ?>/news-reviews/">SHOW ALL</a>
                <?php endif;?>

                <?php do_action( 'list_category_name'); ?>
<!--                <a class="category--button hollow news  button" href="#">NEWS</a>-->
<!--                <a class="category--button hollow reviews  button" href="#">REVIEWS</a>-->
<!--                <a class="category--button hollow articles button" href="#">ARTICLES</a>-->
            </div>
        </div>
        <?php do_action('foundationpress_after_sidebar'); ?>
    </aside>
<?php else: ?>
    <aside class="sidebar">
        <?php do_action('foundationpress_before_sidebar'); ?>
        <?php dynamic_sidebar('sidebar-widgets'); ?>
        <?php do_action('foundationpress_after_sidebar'); ?>
    </aside>
<?php endif; ?>
