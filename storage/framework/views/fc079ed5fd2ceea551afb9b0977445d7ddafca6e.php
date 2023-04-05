
<?php $__env->startSection('section'); ?>
    <?php if($all_shipping_address && $all_shipping_address->count()): ?>
        <h4 class="mb-5"><?php echo e(__('My Shipping Address')); ?></h4>
        <div class="text-right mb-3 btn-wrapper">
            <a href="<?php echo e(route('user.shipping.address.new')); ?>" class="btn-default rounded-btn semi-bold"><?php echo e(__('Add Shipping Address')); ?></a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Name')); ?></th>
                    <th><?php echo e(__('Address')); ?></th>
                    <th><?php echo e(__('Action')); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $all_shipping_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($address->name); ?></td>
                        <td><?php echo e($address->address); ?></td>
                        <td>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.table.btn.swal.delete','data' => ['route' => route('shipping.address.delete', $address->id),'class' => 'las la-trash']]); ?>
<?php $component->withName('table.btn.swal.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shipping.address.delete', $address->id)),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('las la-trash')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <?php echo $all_shipping_address->links(); ?>

        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            <?php echo e(__('No Shipping Address Found. ')); ?>

            <a class="btn btn-link" href="<?php echo e(route('user.shipping.address.new')); ?>"><?php echo e(__('Create New?')); ?></a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/resources/views/frontend/user/dashboard/shipping/all.blade.php ENDPATH**/ ?>