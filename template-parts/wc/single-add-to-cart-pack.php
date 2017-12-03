<div class="bh-add-to-cart-wrapper">
    <?php
    if (is_shop()):
    ?>
    <h3 class="bh-add-to-cart-wrapper--h3 " >
    <a class="" href="<?php the_permalink();?>">
    More info <i class="fa fa-caret-right" aria-hidden="true"></i>
    </a>
    </h3>

    <?php
    endif;
    ?>
    <h3 class="bh-add-to-cart-wrapper--h3 " style="color: #000;">Add to cart <i class="fa fa-caret-down" aria-hidden="true"></i></h3>


    <div id="add-to-cart-directive" class="bh-add-to-cart">
        <a class="add-to-cart-custom" data-value="1" id="add-btl-1" >
            <span class="bh-add-to-cart__qty">1</span>
            <span class="bh-add-to-cart__span bh-add-to-cart__span--bottle">Pack</span>
            <span class="bh-add-to-cart__span bh-add-to-cart__span--added">Added</span>
        </a>
    </div>
    <div class="bh-add-to-cart--price">

        <?php
        global $product;
        if ( $price_html = $product->get_price()*1 ) : ?>
            <span id="add-price-1" class="price"><?php echo '$'.money_format('%i',$price_html); ?></span>
        <?php endif; ?>
    </div>
</div>
