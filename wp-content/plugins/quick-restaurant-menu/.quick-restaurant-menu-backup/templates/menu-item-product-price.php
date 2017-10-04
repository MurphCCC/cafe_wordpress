<div class="erm_product_price">
    <?php
    $prices = get_post_meta( $item_id, '_erm_prices', true );
    if ( !empty($prices) ) { ?>
        <ul>
            <?php foreach( $prices as $price ) { ?>
                    
                    <h3 class="erm_product_title"><?php echo apply_filters('erm_filter_price', $price['value']); ?></h2>
            <?php } ?>
        </ul>
    <?php }
    ?>
</div>