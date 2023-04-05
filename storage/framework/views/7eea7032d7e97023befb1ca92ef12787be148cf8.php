<div class="product-filter-for-index-03" data-padding-bottom="<?php echo e($padding_bottom); ?>" data-padding-top="<?php echo e($padding_top); ?>">
    <div class="container custom-container-1720">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="side-menu-wrapper position-relative index-03">
                    <nav class="navbar navbar-area nav-style-03 side-menu">
                        <div class="container nav-container">
                            <div class="responsive-mobile-menu index-03">
                                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                        data-target="#bizcoxx_main_menu_two" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <i class="fas fa-bars icon"></i>
                                    <span class="text"><?php echo e($category_header_title); ?></span>
                                    <i class="fas fa-caret-down icon"></i>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse index-03-catg show" id="bizcoxx_main_menu_two">
                                <ul class="navbar-nav">
                                    <?php echo render_frontend_menu($category,'category_menu'); ?>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="btn-list-wrapper">
                            <ul class="btn-list btn-wrapper">
                                <li data-filter="new-items" class="product_filter_style_two active">New items</li>
                                <li data-filter="top-rated" class="product_filter_style_two">Top Rated</li>
                                <li data-filter="top-selling" class="product_filter_style_two">Top Selling</li>
                                <li data-filter="campaign" class="product_filter_style_two">Campaign</li>
                                <li data-filter="discounted" class="product_filter_style_two">Discounted</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="custom-row product-filter-two-wrapper" data-item-limit="<?php echo e($items); ?>">
                    <div class="filter-style-block-preloader lds-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                    <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="custom-col px-2 pb-3">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product_filter_style_two_items','data' => ['item' => $item]]); ?>
<?php $component->withName('frontend.product.product_filter_style_two_items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="btn-wrapper text-center margin-top-60 see-all">
                            <a href="<?php echo e(url("shop-page")); ?>" class="btn-default rounded-btn semi-bold">see all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grenmart\@core\app\Providers/../PageBuilder/views/product/product_category_menu.blade.php ENDPATH**/ ?>