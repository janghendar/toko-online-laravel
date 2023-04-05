<?php
    $attributes = \Modules\Product\Entities\ProductInventoryDetails::where("product_id",$product->id)->count();
?>

<?php if(isset($isCampaign) && $isCampaign): ?>
    <?php
        // campaign data check
        $campaign_product = !is_null($product->campaignProduct) ? $product->campaignProduct : getCampaignProductById($product->id);
        $sale_price = $campaign_product ? optional($campaign_product)->campaign_price : $product->sale_price;
        $deleted_price = !is_null($campaign_product) ? $product->sale_price : $product->price;
        $campaign_percentage = !is_null($campaign_product) ? getPercentage($product->sale_price, $sale_price) : false;
    ?>
<?php else: ?>
    <?php
        // campaign data check
        $campaign_product = !is_null($product->campaignProduct) ? $product->campaignProduct : getCampaignProductById($product->id);
        $sale_price = $campaign_product ? optional($campaign_product)->campaign_price : $product->sale_price;
        $deleted_price = !is_null($campaign_product) ? $product->sale_price : $product->price;
        $campaign_percentage = !is_null($campaign_product) ? getPercentage($product->sale_price, $sale_price) : false;
    ?>
<?php endif; ?>

<div class="single-product-view-list">
    <div class="product-thumb">
        <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>" class="img-link">
            <?php
                $isAjax = isset($isAjax) && $isAjax ? $isAjax : null;
                $is_lazy = isset($isAjax) && $isAjax ? false : true; // if loaded on product filter or any other ajax, disable lazy laoding
            ?>
            <?php echo render_image_markup_by_attachment_id($product->image, '', 'grid', $is_lazy, $isAjax); ?>

        </a>
            <div class="other-content">
                <?php if(isset($isCampaign) && $isCampaign): ?>
                    <span class="discount-tag"><?php echo e($campaign_percentage); ?>%</span>
                <?php endif; ?>
            </div>
    </div>
    <div class="product-content">
        <div class="main-content">
            <h4 class="product-title">
                <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"><?php echo e($product->title); ?></a>
            </h4>
            <div class="product-meta">
                <span class="product-meta"><?php echo e(amount_with_currency_symbol($sale_price)); ?> / <?php echo e($product->unit); ?> <?php echo e($product->uom); ?></span>
            </div>
            <div class="ratings list-card">
                <?php if($product->ratingCount()): ?>
                <?php echo ratingMarkup($product->ratingAvg(), $product->ratingCount(), false); ?>

                <?php endif; ?>
            </div>
            <div class="product-pricing">
                <del><?php echo e(amount_with_currency_symbol($deleted_price)); ?></del>
                <span class="price"><?php echo e(amount_with_currency_symbol($sale_price)); ?></span>
            </div>
            <div class="btn-and-quick-key">
                <div class="btn-wrapper">
                    <?php if(isset($attributes) && $attributes > 0): ?>
                        <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>" class="add-cart-style-02">
                            <?php echo e(__('View Options')); ?>

                        </a>
                    <?php else: ?>
                        <a href="#" class="add-cart-style-02 add_to_cart_ajax"
                           data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>"
                        >
                            <?php echo e(__('Add to Bag')); ?>

                        </a>
                    <?php endif; ?>
                </div>
                <div class="quick-key">
                    <ul class="quick-key-list">
                        <li>
                            <?php if(isset($attributes) && $attributes > 0): ?>
                                <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>">
                                    <i class="lar la-heart icon"></i>
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"
                                   class="add_to_wishlist_ajax"
                                   data-attributes="<?php echo e($product->attributes); ?>"
                                   data-id="<?php echo e($product->id); ?>"
                                >
                                    <i class="lar la-heart icon"></i>
                                </a>
                            <?php endif; ?>
                        </li>
                        <li>
                            <a href="#" data-id="<?php echo e($product->id); ?>" class="add_to_compare_ajax">
                                <i class="las la-random icon"></i>
                            </a>
                        </li>
                        <li>
                            <?php if(isset($attributes) && $attributes > 0): ?>
                                <a class="product-quick-view-ajax" href="javascript:void(0)" data-action-route="<?php echo e(route('frontend.products.single-quick-view', $product->slug)); ?>">
                                    <i class="las la-expand-arrows-alt icon"></i>
                                </a>
                            <?php else: ?>
                                <a class="quick-view" <?php echo getQuickViewDataMarkup($product); ?>>
                                    <i class="las la-expand-arrows-alt icon"></i>
                                </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/resources/views/components/frontend/product/product-list.blade.php ENDPATH**/ ?>