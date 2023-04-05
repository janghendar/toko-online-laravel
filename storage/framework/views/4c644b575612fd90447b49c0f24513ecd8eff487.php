<?php
    $attributes = \Modules\Product\Entities\ProductInventoryDetails::where("product_id",$product->id)->count();

    $campaign_product = getCampaignProductById($product->id);
    $sale_price = $campaign_product ? $campaign_product->campaign_price : $product->sale_price;
    $deleted_price = $campaign_product ? $product->sale_price : $product->price;
    $campaign_percentage = $campaign_product ? getPercentage($product->sale_price, $sale_price) : false;
    $campaignProductEndDate = $product->campaign->end_date ?? $product->campaign->end_date->end_date ?? '';

    $campaignSoldCount = \App\Campaign\CampaignSoldProduct::where("product_id",$product->id)->first();
    $stock_count = $campaign_product ? $campaign_product->units_for_sale - optional($campaignSoldCount)->sold_count ?? 0 : optional($product->inventory)->stock_count;
    $stock_count = $stock_count > 0 ? $stock_count : 0;
?>

<div class="single-product-view-grid-style-02 product_card">
    <div class="product-thumb lazy"
            <?php echo render_background_image_markup_by_attachment_id($product->image, 'grid', true); ?>

    >
        <div class="other-content">
            <?php if(!empty($product->badge)): ?>
                <span class="badge-tag"><?php echo e($product->badge); ?></span>
            <?php endif; ?>
            <?php if(!empty($campaign_percentage)): ?>
                <span class="discount-tag"><?php echo e(round($campaign_percentage,2)); ?>%</span>
            <?php endif; ?>
        </div>
        <div class="hover-content">
            <div class="cart-control">
                <div class="value-button minus decrease"><i class="las la-minus"></i></div>
                <input type="number" name="quantity" class="qty_" value="1" />
                <div class="value-button plus increase"><i class="las la-plus"></i></div>
            </div>
        </div>
    </div>
    <div class="product-content">
        <div class="main-content">
            <div class="product-pricing">
                <del><?php echo e(float_amount_with_currency_symbol($deleted_price)); ?></del>
                <span class="price"><?php echo e(float_amount_with_currency_symbol($sale_price)); ?></span>
            </div>
            <h4 class="product-title">
                <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"><?php echo e($product->title); ?></a>
            </h4>
            <div class="product-meta">
                <span class="quantity"><?php echo e($product->unit); ?> <?php echo e($product->uom); ?></span>

                <?php if($stock_count > 0): ?>
                    <span class="availability"><?php echo e(__('In stock')); ?> (<?php echo e($stock_count); ?>)</span>
                <?php else: ?>
                    <span class="availability text-danger"><?php echo e(__('Out of stock')); ?> (<?php echo e($stock_count); ?>)</span>
                <?php endif; ?>
            </div>
            <div class="ratings">
                <?php if($product->ratingCount()): ?>
                    <?php echo ratingMarkup($product->ratingAvg(), $product->ratingCount()); ?>

                <?php endif; ?>
            </div>
            <div class="btn-wrapper">
                <?php if(isset($attributes) && $attributes > 0): ?>
                    <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>" class="add-cart-style-02"><?php echo e(__('View Options')); ?></a>
                    <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>" class="favourite">
                        <i class="las la-heart icon hover"></i>
                        <i class="lar la-heart icon regular"></i>
                    </a>
                <?php else: ?>
                    <a href="#" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>" class="add-cart-style-02 add_to_cart_ajax_with_quantity"><?php echo e(__('Add to Bag')); ?></a>
                    <a href="#" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>" class="favourite add_to_wishlist_ajax">
                        <i class="las la-heart icon hover"></i>
                        <i class="lar la-heart icon regular"></i>
                    </a>
                <?php endif; ?>
                <a href="#" data-id="<?php echo e($product->id); ?>" class="favourite add_to_compare_ajax">
                    <i class="las la-plus-square icon hover"></i>
                    <i class="lar la-plus-square icon regular"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grenmart\@core\resources\views/components/frontend/product/product-card-02.blade.php ENDPATH**/ ?>