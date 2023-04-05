    <?php
        $product_img_url = null;
        $product_image = get_attachment_image_by_id($product->image,"full", false);
        $product_img_url = !empty($product_image) ? $product_image['img_url'] : '';
        $sidebar_status = get_static_option('sidebar_status');
        $sidebar_position = get_static_option('sidebar_position');

        $campaign_product = getCampaignProductById($product->id);
        $sale_price = $campaign_product ? $campaign_product->campaign_price : $product->sale_price;
        $deleted_price = $campaign_product ? $product->sale_price : $product->price;
        $campaign_percentage = $campaign_product ? getPercentage($product->sale_price, $sale_price) : false;
        $campaignSoldCount = \App\Campaign\CampaignSoldProduct::where("product_id",$product->id)->first();
        $stock_count = $campaign_product ?
            $campaign_product->units_for_sale - (optional($campaignSoldCount)->sold_count ?? 0) :
            optional($product->inventory)->stock_count;
        $stock_count = $stock_count > 0 ? $stock_count : 0;

        if($campaign_product){
            $campaign_title = \App\Campaign\Campaign::select('id','title')->where("id",$campaign_product->campaign_id)->first();
        }

        $productImage = render_image_markup_by_attachment_id($product->image,'w-100');

        $randomCountDown = rand(1111111,9999999);
    ?>
    <div class="modal-dialog modal-xl">
        <div class="modal-content p-5">
            <div class="quick-view-close-btn-wrapper quick-view-details">
                <button class="quick-view-close-btn"><i class="las la-times"></i></button>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product_details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-view-wrap product-img quick-view-long-img">
                                    <ul class="other-content">
                                        <?php if(!empty($product->badge)): ?>
                                            <li>
                                                <span class="badge-tag"></span>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($campaign_percentage)): ?>
                                            <li>
                                                <span class="discount-tag"></span>
                                            </li>
                                        <?php endif; ?>
                                    </ul>

                                    <?php echo $productImage; ?>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <?php if(!empty($campaign_product)): ?>
                                        <div class="flash-countdown-wrapper">
                                            <div class="flash-countdown-title-single">
                                                <h6 class="flash-countdown-title"><?php echo e($campaign_title->title); ?></h6>
                                            </div>
                                            <div class="flash-countdown-product flash-countdown-product-quick-view-<?php echo e($randomCountDown); ?>"
                                                 data-date="<?php echo e(optional($campaign_product)->end_date); ?>">
                                                <div class="single-box">
                                                    <span class="counter-days item"></span>
                                                    <span class="label item"><?php echo e(__('D')); ?></span>
                                                </div>
                                                <div class="single-box">
                                                    <span class="counter-hours item"></span>
                                                    <span class="label item"><?php echo e(__('H')); ?></span>
                                                </div>
                                                <div class="single-box">
                                                    <span class="counter-minutes item"></span>
                                                    <span class="label item"><?php echo e(__('M')); ?></span>
                                                </div>
                                                <div class="single-box">
                                                    <span class="counter-seconds item"></span>
                                                    <span class="label item"><?php echo e(__('S')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-summery">
                                    <span class="product-meta pricing">
                                         <span id="unit"><?php echo e($product->unit); ?> </span> <span id="uom"><?php echo e($product->uom); ?></span>
                                    </span>
                                    <h3 class="product-title title"><?php echo e($product->title); ?></h3>
                                    <div>
                                        <span class="availability is_available">
                                            <?php if($stock_count > 0): ?>
                                                <span class="availability"><?php echo e(filter_static_option_value('product_in_stock_text', $setting_text, __('In stock'))); ?> (<?php echo e($stock_count); ?>)</span>
                                            <?php else: ?>
                                                <span class="availability text-danger"><?php echo e(filter_static_option_value('product_out_of_stock_text', $setting_text, __('Out of stock'))); ?></span>
                                            <?php endif; ?>
                                        </span>
                                    </div>

                                    <?php if($product->ratingCount() > 0): ?>
                                        <div class="rating-wrap">
                                            <div class="ratings">
                                                <?php echo ratingMarkup($product->ratingAvg(), $product->ratingCount(), false); ?>

                                            </div>
                                            <p class="total-ratings">(<?php echo e($product->ratingCount()); ?>)</p>
                                        </div>
                                    <?php endif; ?>

                                    <div class="short-description">
                                        <p class="info"><?php echo $product->summary; ?></p>
                                    </div>

                                    <?php if($product->attributes && $product->attributes != 'null'): ?>
                                        <?php $product_attributes = decodeProductAttributes($product->attributes); ?>
                                        <?php $__currentLoopData = $product_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="size section attribute_row">
                                                <span class="name"><?php echo e($attribute['name']); ?></span>
                                                <div class="checkbox-color ">
                                                    <?php $__currentLoopData = $attribute['terms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="single-checkbox-wrap attribute">
                                                            <label>
                                                                <input type="radio"
                                                                       name="attr_<?php echo e($attribute['name']); ?>"
                                                                       data-attr="<?php echo e(json_encode($term)); ?>"
                                                                       class="checkbox">
                                                                <span data-name="<?php echo e($attribute['name']); ?>"
                                                                      data-extra="<?php echo e($term['additional_price']); ?>"
                                                                      class="size-code">
                                                                <?php echo e($term['name']); ?> <?php if(isset($term['additional_price']) && $term['additional_price'] > 0): ?>
                                                                        (+<?php echo e(float_amount_with_currency_symbol($term['additional_price'])); ?>

                                                                        ) <?php endif; ?>
                                                            </span>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    <div class="price-wrap">
                                        <span class="price"
                                              data-main-price="<?php echo e($sale_price); ?>"
                                              data-currency-symbol="<?php echo e(site_currency_symbol()); ?>"
                                              id="quick-view-price"
                                        >
                                            <?php echo e(float_amount_with_currency_symbol($sale_price)); ?>

                                        </span>
                                        <del class="del-price"><?php echo e(float_amount_with_currency_symbol($deleted_price)); ?></del>
                                    </div>

                                    <?php if($productSizes->count() > 0): ?>
                                        <div class="quick-view-value-input-area margin-top-15 size_list">
                                                    <span class="input-list">
                                                        <strong class="color-light"><?php echo e(__('Size:')); ?></strong>
                                                        <input class="form--input quick-view-value-size" name="size" type="text" value="">
                                                        <input type="hidden" id="quick_view_selected_size">
                                                    </span>
                                            <ul class="quick-view-size-lists" data-type="Size">
                                                <?php $__currentLoopData = $productSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!empty($product_size)): ?>
                                                        <li class=""
                                                            data-value="<?php echo e(optional($product_size)->id); ?>"
                                                            data-display-value="<?php echo e(optional($product_size)->name); ?>"
                                                        > <?php echo e(optional($product_size)->name); ?> </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($productColors->count() > 0): ?>
                                        <div class="quick-view-value-input-area margin-top-15 color_list">
                                            <span class="input-list">
                                                <strong class="color-light"><?php echo e(__('Color:')); ?></strong>
                                                <input class="form--input value-size" name="color" type="text"
                                                       value="">
                                                <input type="hidden" id="quick_view_selected_color">
                                            </span>
                                            <ul class="quick-view-size-lists color-list" data-type="Color">
                                                <?php $__currentLoopData = $productColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!empty($product_color)): ?>
                                                        <li
                                                                class="radius-percent-50  "
                                                                data-value="<?php echo e(optional($product_color)->id); ?>"
                                                                data-display-value="<?php echo e(optional($product_color)->name); ?>"
                                                        >
                                                            <span class="color-list-overlay"></span>
                                                            <span style="background: <?php echo e(optional($product_color)->color_code); ?>"></span>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                    <?php $__currentLoopData = $available_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="quick-view-value-input-area margin-top-15 attribute_options_list">
                                            <span class="input-list">
                                                <strong class="color-light"><?php echo e($attribute); ?></strong>
                                                <input class="form--input value-size" type="text" value="">
                                                <input type="hidden" id="selected_attribute_option"
                                                       name="selected_attribute_option">
                                            </span>
                                            <ul class="quick-view-size-lists" data-type="<?php echo e($attribute); ?>">
                                                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li
                                                            class=""
                                                            data-value="<?php echo e($option); ?>"
                                                            data-display-value="<?php echo e($option); ?>"
                                                    > <?php echo e($option); ?> </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    

                                    <div class="user-select-option">
                                        <div class="cart-control">
                                            <div class="value-button minus decrease"><i
                                                        class="las la-minus"></i></div>
                                            <input type="text" name="quantity" id="quick-view-quantity" class="qty_"
                                                   value="1">
                                            <div class="value-button plus increase"><i
                                                        class="las la-plus"></i></div>
                                        </div>
                                        <div class="btn-and-fav">
                                            <?php if($stock_count): ?>
                                                <div class="btn-wrapper">
                                                    <a href="#"
                                                       class="btn-default rounded-btn add_to_cart_single_page_quick_view"
                                                       data-id="<?php echo e($product->id); ?>"
                                                    >
                                                        <?php echo e(filter_static_option_value('add_to_cart_text', $setting_text, __('add to cart'))); ?>

                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if($stock_count): ?>
                                        <div class="btn-wrapper btn-and-fav d-flex flex-wrap mb-4">
                                            <a href="#" data-id="<?php echo e($product->id); ?>"
                                               class="cart buy_now_single_page_quick_view btn-default rounded-btn"><?php echo e(__('Buy Now')); ?></a>

                                            <div class="favorite add_to_wishlist_single_page_quick_view"
                                                 data-id="<?php echo e($product->id); ?>">
                                                <a href="#">
                                                    <i class="lar la-heart icon"></i>
                                                </a>
                                            </div>
                                            <div class="favorite add_to_compare_ajax_single_page_quick_view"
                                                 data-id="<?php echo e($product->id); ?>">
                                                <a href="#">
                                                    <i class="las la-retweet icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="cart-option"></div>
                                    <?php if($product->category && $product->category->id): ?>
                                       
                                        <div class="category">
                                            <span class="name"><?php echo e(__("Categories:")); ?></span>
                                            <a href="<?php echo e(route('frontend.products.category', [
                                        'id' => optional($product->category)->id,
                                        'slug' => \Str::slug(optional($product->category)->title ?? '')
                                    ])); ?>">
                                                <?php echo e(optional($product->category)->title); ?>

                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!is_null($product->getSubcategory())): ?>
                                       
                                       <div class="category">
                                           <span class="name"><?php echo e(__("Sub Category:")); ?></span>
                                           <?php $__currentLoopData = $product->getSubcategory(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <a href="<?php echo e(route('frontend.products.subcategory', [
                                       'id' => $subcat->id,
                                       'any' => \Str::slug($subcat->title ?? '')
                                   ])); ?>">
                                               <?php echo e($subcat->title); ?>

                                           </a>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          
                                       </div>
                                   <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <script>
        // check condition if those variable are declared than no need to declare again
        window.quick_view_attribute_store = JSON.parse('<?php echo json_encode($product_inventory_set); ?>');
        window.quick_view_additional_info_store = JSON.parse('<?php echo json_encode($additional_info_store); ?>');
        window.quick_view_available_options = $('.quick-view-value-input-area');


        loopcounter('flash-countdown-product-quick-view-<?php echo e($randomCountDown); ?>');
    </script>
<?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/resources/views/frontend/product/quick-view.blade.php ENDPATH**/ ?>