<div class="user-select-option">
    <?php if($product->attributes && $product->attributes != 'null'): ?>
        <?php $product_attributes = decodeProductAttributesOld($product->attributes); ?>
        <?php $__currentLoopData = $product_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="size section attribute_row">
            <span class="name"><?php echo e($attribute['name']); ?></span>
            <div class="checkbox-color ">
                <?php $__currentLoopData = $attribute['terms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-checkbox-wrap attribute">
                    <label>
                        <input type="radio" name="attr_<?php echo e($attribute['name']); ?>" data-attr="<?php echo e(json_encode($term)); ?>" class="checkbox">
                        <span data-name="<?php echo e($attribute['name']); ?>" data-extra="<?php echo e($term['additional_price']); ?>" class="size-code">
                            <?php echo e($term['name']); ?> <?php if(isset($term['additional_price']) && $term['additional_price'] > 0): ?> (+<?php echo e(float_amount_with_currency_symbol($term['additional_price'])); ?>) <?php endif; ?>
                        </span>
                    </label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<div class="d-flex">
    <div class="input-group">
        <input class="quantity form-control" type="number" min="1" max="10000000" value="1" id="quantity_single_quick_view_btn">
    </div>
    <div class="btn-wrapper">
        <a href="#" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>" class="btn-default rounded-btn add-cart-style-02 add_to_cart_ajax">
            <?php echo e(__('add to cart')); ?>

        </a>

        <a href="#" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>" class="btn-default rounded-btn add-cart-style-02 buy_now_single_quick_view_btn">
            <?php echo e(__('Buy now')); ?>

        </a>
    </div>
</div>
<?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/resources/views/frontend/partials/product-attributes.blade.php ENDPATH**/ ?>