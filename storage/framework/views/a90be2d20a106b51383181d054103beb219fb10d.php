<?php
    $attributes = \Modules\Product\Entities\ProductInventoryDetails::where("product_id",$item->id)->count();
    if (isset($isCampaign) && $isCampaign) {
        $campaign_product = getCampaignProductById($item->id);
        $campaignItemInfo = getCampaignItemStockInfo($campaign_product);
        $percentage = $campaignItemInfo['sold_count'] / $campaignItemInfo['in_stock_count'] * 100;
        $campaign_percentage = getCampaignPricePercentage($campaign_product, $item->price, 1);
        $campaignProductEndDate = $item->campaign->end_date ?? $item->campaign->end_date->end_date ?? '';
        $sale_price = $campaign_product ? $campaign_product->campaign_price : $item->sale_price;
        $deleted_price = $campaign_product ? $item->sale_price : $item->price;
    }else{
        $campaign_product = getCampaignProductById($item->id);
        $campaignProductEndDate = $item->campaign->end_date ?? $item->campaign->end_date->end_date ?? '';
        $sale_price = $campaign_product ? optional($campaign_product)->campaign_price : $item->sale_price;
        $deleted_price = !is_null($campaign_product) ? $item->sale_price : $item->price;
        $campaign_percentage = !is_null($campaign_product) ? getPercentage($item->sale_price, $sale_price) : false;
    }

    $quick_view_data = getQuickViewDataMarkup($item);
    $quick_view_markup = '<a href="#" id="quickview" class="quick-view" '.$quick_view_data.'}><i class="lar la-eye icon"></i></a>';
?>

<div class="single-product-view-grid-style-04">
    <div class="product-thumb">
        <ul class="other-content">
            <?php if(!empty($item->badge)): ?>
                <li>
                    <span class="badge-tag"><?php echo e($item->badge); ?></span>
                </li>
            <?php endif; ?>
            <?php if(!empty($campaign_percentage)): ?>
                <li>
                    <span class="discount-tag"><?php echo e(round($campaign_percentage,2)); ?>%</span>
                </li>
            <?php endif; ?>
        </ul>
        <a href="#" class="img-link">
            <?php echo render_image_markup_by_attachment_id($item->image); ?>

        </a>
    </div>
    <div class="product-content">
        <div class="main-content">
            <h4 class="product-title">
                <a href="<?php echo e(route("frontend.products.single",["slug" => $item->slug])); ?>"><?php echo e(html_entity_decode($item->title)); ?></a>
            </h4>
            <div class="bottom-content">
                <div class="left-content">
                    <div class="ratings">
                        <?php if($item->ratingCount()): ?>
                        <?php echo ratingMarkup($item->ratingAvg(), $item->ratingCount(), false); ?>

                        <?php endif; ?>
                        </span>
                        <?php if($item->ratingCount()): ?>
                            <span class="total-feedback">(<?php echo e($item->ratingCount()); ?>)</span>
                        <?php endif; ?>
                    </div>
                    <div class="product-pricing">
                        <span class="price"><?php echo e(float_amount_with_currency_symbol($sale_price)); ?></span>
                    </div>
                </div>
                <div class="right-content">
                    <?php if(isset($attributes) && $attributes > 0): ?>
                        <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>">
                            <i class="las la-shopping-cart icon"></i>
                        </a>
                    <?php else: ?>
                        <a href="javascript:void(0)" data-attributes="<?php echo e($item->attributes); ?>" data-id="<?php echo e($item->id); ?>"
                           class="add_to_cart_ajax">
                            <i class="las la-shopping-cart icon"></i>
                        </a>
                    <?php endif; ?>

                    <?php if(isset($attributes) && $attributes > 0): ?>
                        <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>">
                            <i class="lar la-heart icon"></i>
                        </a>
                    <?php else: ?>
                        <a href="javascript:void(0)" data-attributes="<?php echo e($item->attributes); ?>" data-id="<?php echo e($item->id); ?>"
                           class="add_to_wishlist_ajax">
                            <i class="lar la-heart icon"></i>
                        </a>
                    <?php endif; ?>



                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\grenmart\@core\resources\views/components/frontend/product/product_filter_style_two_items.blade.php ENDPATH**/ ?>