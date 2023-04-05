<?php
    use Modules\Product\Entities\ProductSubCategory;
    $sub_cat_details = ProductSubCategory::with('category')->find(request()->subcat);
    $cat = optional(optional($sub_cat_details)->category)->id;
?>

<div class="widget-area-wrapper">
    <div class="widget widget-search">
        <form class="search-from">
            <div class="form-group">
                <input type="search" id="search_query" class="form-control" autocomplete="off" placeholder="search..." value="<?php echo e(request()->q); ?>">
            </div>
            <button type="submit" class="widget-search-btn">
                <i class="las la-search icon"></i>
            </button>
        </form>
    </div>
    <div class="widget widget-category">
        <h5 class="widget-title"><?php echo e(__('all categories')); ?></h5>
        <div class="category-wrap">
            <div id="accordion">
            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $i = rand(1000, 9999);
                ?>
                <div class="card p-0 border-0 custom-category-list">
                    <div class="card-header p-0" id="heading-<?php echo e($i); ?>">
                        <h5 class="mb-0">
                            <div class="single-checkbox-wrap">
                                <label>
                                    <input type="radio" name="product_cat" class="radio"
                                           <?php if(request()->cat == $category->id): ?> checked
                                           <?php endif; ?> value="<?php echo e($category->id); ?>">
                                    <span class="checkmark"><?php echo e($category->title); ?></span>
                                </label>

                                <?php if($category->subcategory->count() > 0): ?>
                                    <button class="sub-category-btn py-0 px-0 m-0" data-toggle="collapse"
                                            data-target="#collapse-<?php echo e($i); ?>"
                                            aria-expanded="true"
                                            aria-controls="collapse-<?php echo e($i); ?>">
                                        +
                                    </button>
                                <?php endif; ?>
                            </div>
                        </h5>
                    </div>

                    <?php if(optional($category->subcategory)->count() > 0): ?>
                        <div id="collapse-<?php echo e($i); ?>" class="collapse <?php echo e(($category->id === $cat) ? "show" : ""); ?>"
                             aria-labelledby="heading-<?php echo e($i); ?>" data-parent="#accordion">
                            <div class="card-body p-0">
                                <div class="widget-check-box checkbox-catagory ml-4">
                                    <?php $__currentLoopData = $category->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="single-checkbox-wrap">
                                            <label>
                                                <input type="radio" name="product_subcat"
                                                       class="radio"
                                                       <?php if(request()->subcat == $subcategory->id): ?> checked
                                                       <?php endif; ?> value="<?php echo e($subcategory->id); ?>">
                                                <span class="checkmark"><?php echo e($subcategory->title); ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="widget widget-category">
        <h5 class="widget-title"><?php echo e(__('all units')); ?></h5>
        <div class="category-wrap">
            <?php $__currentLoopData = $all_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-category-item">
                    <label class="radio-btn-wrapper">
                        <input type="radio" class="checkbox" name="product_unit" value="<?php echo e($unit->name); ?>"
                               <?php if(request()->unt == $unit->name): ?> checked <?php endif; ?>
                        >
                        <span class="checkmark"></span>
                        <span class="content">
                            <span class="left"><?php echo e($unit->name); ?></span>
                        </span>
                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="widget widget-range">
        <h5 class="widget-title"><?php echo e(__('filter by price')); ?></h5>
        <div class="range-wrap">
            <div id="slider-range"></div>
            <div class="range">
                <form>
                    <p class="price-range-wrap">
                        <label for="amount"><?php echo e(__('Range')); ?>:</label>
                        <input type="text" id="amount" readonly
                               style="border:0; color:#f6931f; font-weight:bold;"
                               value="<?php echo e(amount_with_currency_symbol($min_price)); ?> - <?php echo e(amount_with_currency_symbol($max_price)); ?>"
                        >
                    </p>
                </form>
            </div>
        </div>
    </div>

    <div class="widget widget-rating">
        <h5 class="widget-title"><?php echo e(__('Average rating')); ?></h5>
        <?php
            $searched_rating = request()->rt ?? 0;
        ?>
        <input type="hidden">
        <div class="rating-wrap">
            <?php for($i = 5; $i >= 1; $i--): ?>
                <?php echo getProductSearchRatingInput($i, $searched_rating); ?>

            <?php endfor; ?>
        </div>
    </div>

    <div class="widget widget-tag">
        <h5 class="widget-title"><?php echo e(__('tags')); ?></h5>
        <div class="tag-wrap">
            <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="#" class="tag-btn <?php if(isset(request()->t) && request()->t == $tag->tag_text): ?> active <?php endif; ?>"><?php echo e($tag->tag_text ?? $tag->tag); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php if(!empty($selected_items_display_status)): ?>
        <div class="widget widget-recently-added">
            <h5 class="widget-title"><?php echo e($selected_items_name); ?></h5>
            <div class="recently-added-wrap">
                <?php $__currentLoopData = $selected_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-recent-item">
                        <div class="img-box">
                            <?php echo render_image_markup_by_attachment_id($selected_item->image, 'grid', true); ?>

                        </div>
                        <div class="content">
                            <h5 class="title">
                                <a href="<?php echo e(route('frontend.products.single', $selected_item->slug)); ?>"><?php echo e(Str::limit($selected_item->title, 25)); ?></a>
                            </h5>
                            <span class="product-meta"><?php echo e(float_amount_with_currency_symbol($selected_item->sale_price)); ?>/1kg</span>
                            <div class="ratings">
                                <a href="#" class="icon-wrap">
                                    <?php echo render_ratings($selected_item->ratingAvg(), 'icon active'); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(!empty($featured_section_display_status)): ?>
        <div class="widget widget-add">
            <div class="add-banner-y-style-01">
                <a href="<?php echo e(url($featured_section_btn_url)); ?>">
                    <?php echo render_image_markup_by_attachment_id($featured_section_background_image); ?>

                </a>
                <div class="content">
                    <span class="sub-title"><?php echo e($featured_section_subtitle); ?></span>
                    <h4 class="title"><?php echo e($featured_section_title); ?></h4>
                    <div class="btn-wrapper">
                        <a href="<?php echo e(url($featured_section_btn_url)); ?>" class="shop-now-btn-style-01"><?php echo e($featured_section_btn_text); ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div><?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/resources/views/frontend/partials/product/product-filter-sidebar.blade.php ENDPATH**/ ?>