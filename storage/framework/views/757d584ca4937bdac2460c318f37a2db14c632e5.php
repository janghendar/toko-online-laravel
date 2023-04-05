<?php
    $visibility_class = '';

    if (request()->routeIs('frontend.dynamic.page')) {
        if (isset($page_post) && !$page_post->breadcrumb_status) {
            $visibility_class = 'd-none';
        }
    }

    if (request()->routeIs('homepage')) {
        $visibility_class = 'd-none';
        if (isset($page_details) && $page_details->breadcrumb_status) {
            $visibility_class = '';
        }
    }
?>
<div class="breadcrumb-area bg <?php echo e($visibility_class); ?>"
        <?php echo render_background_image_markup_by_attachment_id(get_static_option('site_breadcrumb_bg')); ?>

>
    <div class="container custom-container-1318">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="content">
                        <ul class="page-list">
                            <li class="list-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                            <?php if(Route::currentRouteName() === 'frontend.dynamic.page'): ?>
                                <li class="list-item"><a href="#"><?php echo e($page_post->title ?? $page_name ?? ''); ?></a></li>
                            <?php elseif(Route::currentRouteName() === 'frontend.products.single'): ?>
                                <li class="list-item"><a href="#"><?php echo $__env->yieldContent('page-title'); ?></a></li>
                            <?php else: ?>
                                <li class="list-item"><a href="#"><?php echo $__env->yieldContent('page-title'); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/resources/views/frontend/partials/breadcrumb.blade.php ENDPATH**/ ?>