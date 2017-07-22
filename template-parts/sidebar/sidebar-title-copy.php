<?php
do_action('foundationpress_before_sidebar');
?>
<div class="" style="background:#EBEBEB; padding: 30px 20px">
    <h4>Welcome to Ben Haines Wine</h4>

    <!-- <p >
        I started writing to share and inspire <a href="#" class="news-link">news</a> and <a href="#"
                                                                                             class="articles-link">stories</a>
        directly from the vineyard. <a href="#" class="articles-link">Articles</a> that capture the essence of
        the wine I make and share <a href="#" class="reviews-link">reviews,</a> press release and upcoming
        events to better understand local wine industry in Australia
    </p> -->
    <p class="category--intro">
      Creating Ben Haines Wine sparked more than a wine journey;
      it's a human adventure driven by collaboration and curiosity
      that connects people together. I share this with <a href="<?php echo get_post_type_archive_link('post') ?>" class="articles-link">stories</a> and
      <a href="<?php echo get_post_type_archive_link('news') ?>" class="news-link">news</a> from my perpetual
      exploration of unique, high-quality vineyard sites.
      They also include <a href="<?php echo get_post_type_archive_link('review') ?>" class="reviews-link">reviews</a>, <a href="<?php echo get_post_type_archive_link('news') ?>" class="news-link">new releases and events.</a>
    </p>
    <h4>Categories</h4>

    <div class="category-flex">

        <?php if (is_page('news-reviews')): ?>
            <a class="category--button hollow button black active"
               href="<?php echo site_url(); ?>/news-reviews/">SHOW ALL</a>
        <?php else: ?>
            <a class="category--button hollow button black" href="<?php echo site_url(); ?>/news-reviews/">SHOW
                ALL</a>
        <?php endif; ?>

        <?php do_action('list_category_name'); ?>
    </div>
</div>
<?php do_action('foundationpress_after_sidebar'); ?>
