
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Product Inventory')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nice-select.css')); ?>">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.flash','data' => []]); ?>
<?php $component->withName('msg.flash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-category-edit')): ?>
            <div class="col-lg-12 mt-5">
                <form action="<?php echo e(route('admin.products.inventory.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($inventory->id); ?>">
                    <div class="card my-5">
                        <div class="card-body">
                            <h4 class="header-title"><?php echo e(__('Edit Product Inventory')); ?></h4>
                            <div class="text-right">
                                <a href="<?php echo e(route('admin.products.inventory.all')); ?>" type="button" class="btn btn-primary"><?php echo e(__('All Product Stock')); ?></a>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="product_id"><?php echo e(__('Product')); ?></label>
                                        <select name="product_id" id="product_id" class="form-control nice-select wide">
                                            <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id); ?>" <?php if($inventory->product_id == $product->id): ?> selected <?php endif; ?>><?php echo e($product->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sku"><?php echo e(__('SKU')); ?></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><?php echo e(__('SKU -')); ?></div>
                                            </div>
                                            <input type="text" class="form-control" id="sku" name="sku" placeholder="<?php echo e(__('SKU Text')); ?>" value="<?php echo e(str_replace('SKU-', '', $inventory->sku)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label for="stock_count"><?php echo e(__('Stock Count')); ?></label>
                                        <input type="number" id="stock_count" name="stock_count" class="form-control" placeholder="<?php echo e(__('Stock Count')); ?>" value="<?php echo e($inventory->stock_count); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card my-5">
                        <div class="card-body">
                            <?php if(!is_null($inventory_details)): ?>
                                <h5 class="mb-5"><?php echo e(__('product Variants')); ?></h5>
                                <?php $__currentLoopData = $inventory->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-row my-3 p-4 border border-info rounded">
                                        <input type="hidden" name="inventory_details_id[]" value="<?php echo e($inventory_details->id); ?>">
                                        <div class="col">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="size" id="size"><?php echo e(__('Size')); ?></label>
                                                        <select name="inventory_details_size[]" id="size" class="form-control">
                                                            <?php $__currentLoopData = $product_sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                        value="<?php echo e($product_size->id); ?>"
                                                                        <?php if($inventory_details->size == $product_size->id): ?>
                                                                        selected
                                                                        <?php endif; ?>
                                                                ><?php echo e($product_size->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="color" id="color"><?php echo e(__('Color')); ?></label>
                                                        <select name="inventory_details_color[]" id="color" class="form-control">
                                                            <?php $__currentLoopData = $product_colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                        value="<?php echo e($product_color->id); ?>"
                                                                        <?php if($inventory_details->color == $product_color->id): ?>
                                                                        selected
                                                                        <?php endif; ?>
                                                                ><?php echo e($product_color->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="additional_price"><?php echo e(__('Additional Price')); ?></label>
                                                        <input type="number" class="form-control" name="inventory_details_additional_price[]"
                                                               id="additional_price" step="0.01"
                                                               value="<?php echo e($inventory_details->additional_price); ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="stock_count"><?php echo e(__('Stock Count')); ?></label>
                                                        <input type="number" class="form-control" name="inventory_details_stock_count[]"
                                                               id="stock_count" value="<?php echo e($inventory_details->stock_count); ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="sold_count"><?php echo e(__('Sold Count')); ?></label>
                                                        <input type="number" class="form-control" name="inventory_details_sold_count[]"
                                                               id="sold_count" value="<?php echo e($inventory_details->sold_count); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                $present_inventory_attributes = $inventory_details_attributes->where('inventory_details_id', $inventory_details->id);
                                            ?>
                                            <?php if(!is_null($present_inventory_attributes) && $present_inventory_attributes->count()): ?>
                                                <h6 class="mt-4 mb-3"><?php echo e(__('Attributes')); ?></h6>
                                                <?php $__currentLoopData = $present_inventory_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $present_inventory_attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-row">
                                                        <input type="hidden"
                                                               
                                                               value="<?php echo e($present_inventory_attribute->id); ?>">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="text"
                                                                       class="form-control"
                                                                       
                                                                       value="<?php echo e($present_inventory_attribute->attribute_name); ?>"
                                                                       readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       
                                                                       value="<?php echo e($present_inventory_attribute->attribute_value); ?>"
                                                                       readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-auto">
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['title' => 'Image','name' => 'inventory_details_image[]','id' => $inventory_details->image,'dimentions' => '1920x1280']]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Image'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('inventory_details_image[]'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inventory_details->image),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('1920x1280')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-primary">
                            <i class="ti-check-box submit-btn"></i>
                            <?php echo e(__('Update Inventory Details')); ?>

                        </button>
                    </div>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => []]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable.js','data' => []]); ?>
<?php $component->withName('datatable.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.table.btn.swal.js','data' => []]); ?>
<?php $component->withName('table.btn.swal.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script src="<?php echo e(asset('assets/backend/js/jquery.nice-select.min.js')); ?>"></script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => []]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script>
        (function ($) {
            'use script'
            $(document).ready(function () {
                let nice_select_el = $('.nice-select');
                if (nice_select_el.length > 0) {
                    nice_select_el.niceSelect();
                }
            });
        })(jQuery)
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/resources/views/backend/products/inventory/edit.blade.php ENDPATH**/ ?>