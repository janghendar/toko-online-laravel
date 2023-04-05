
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.loader.css','data' => []]); ?>
<?php $component->withName('loader.css'); ?>
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
<?php $__env->startSection('section'); ?>
<h5 class="mb-3"><?php echo e(__('Add Shipping Address')); ?></h5>
<div class="text-right btn-wrapper">
    <a href="<?php echo e(route('user.shipping.address.all')); ?>" class="btn-default rounded-btn semi-bold"><?php echo e(__('All Shipping Address')); ?></a>
</div>
<form action="<?php echo e(route("user.shipping.address.new")); ?>" method="POST" id="new_user_shipping_address_form">
    <?php echo csrf_field(); ?>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name"><?php echo e(__('Name')); ?></label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group col-md-6">
            <label for="email"><?php echo e(__('Email')); ?></label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group col-md-6">
            <label for="phone"><?php echo e(__('Phone')); ?></label>
            <input type="text" class="form-control" name="phone" id="phone">
        </div>
        <div class="form-group col-md-6">
            <label for="country"><?php echo e(__('Country')); ?></label>
            <select class="form-control" name="country" id="country">
                <option value=""><?php echo e(__('Select Country')); ?></option>
                <?php $__currentLoopData = $all_country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="state"><?php echo e(__('State')); ?></label>
            <select class="form-control" name="state" id="state">
                <option value=""><?php echo e(__('Select State')); ?></option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="city"><?php echo e(__('City')); ?></label>
            <input type="text" class="form-control" name="city" id="city">
        </div>
        <div class="form-group col-md-6">
            <label for="zipcode"><?php echo e(__('Zipcode')); ?></label>
            <input type="text" class="form-control" name="zipcode" id="zipcode">
        </div>
        <div class="form-group col-md-12">
            <label for="address"><?php echo e(__('Address')); ?></label>
            <input type="text" class="form-control" name="address" id="address" cols="30" rows="5">
        </div>
        <div class="col-md-6">
            <div class="btn-wrapper mt-4">
                <button class="btn-default rounded-btn semi-bold"><?php echo e(__('Submit')); ?></button>
            </div>
        </div>
    </div>
</form>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.loader.html','data' => []]); ?>
<?php $component->withName('loader.html'); ?>
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
<?php $__env->startSection('scripts'); ?>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function ($) {
                $('#country').on('change', function() {
                    let id = $(this).val();
                    $('.lds-ellipsis').show();
                    $.get('<?php echo e(route('country.info.ajax')); ?>', {id: id}).then(function (data) {
                        $('.lds-ellipsis').hide();
                        $('#state').html('<option value=""><?php echo e(__('Select State')); ?></option>');
                        data.states.map(function (e) {
                            $('#state').append('<option value="' + e.id + '">' + e.name + '</option>');
                        });
                    });
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/resources/views/frontend/user/dashboard/shipping/new.blade.php ENDPATH**/ ?>