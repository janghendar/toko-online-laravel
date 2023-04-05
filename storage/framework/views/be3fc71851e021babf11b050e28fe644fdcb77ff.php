<?php $__env->startSection('style'); ?>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.niceselect.css','data' => []]); ?>
<?php $component->withName('niceselect.css'); ?>
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
    <div class="dashboard-form-wrapper">
        <h2 class="title"><?php echo e(__('Edit Profile')); ?></h2>
        <form action="<?php echo e(route('user.profile.update')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name"><?php echo e(__('Name')); ?></label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user_details->name); ?>">
            </div>
            <div class="form-group">
                <label for="email"><?php echo e(__('Email')); ?></label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo e($user_details->email); ?>">
            </div>
            <div class="form-group">
                <label for="phone"><?php echo e(__('Phone')); ?></label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo e($user_details->phone); ?>">
            </div>

            <div class="form-group">
                <?php
                    $all_countries = DB::table("countries")
                        ->select("id","name")->where("status","publish")
                        ->get();
                ?>

                <label for="country"><?php echo e(__('Country')); ?></label>
                <select id="country" class="form-control nice-select wide" name="country">
                    <option value="">Select Country</option>
                    <?php $__currentLoopData = $all_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>" <?php echo e($user_details->country == $country->id ? "selected" : ""); ?>><?php echo e($country->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="state"><?php echo e(__('State')); ?></label>

                <select class="form-control" id="state" name="state">
                    <option value="">Select State</option>
                    <?php
                        $states = \App\Country\State::where("country_id", $user_details->country ?? 0)->get();
                        foreach ($states as $state){
                            ?>
                            <option value="<?php echo e($state->id); ?>" <?php echo e($state->id == $user_details->state ? "selected" : ""); ?>><?php echo e($state->name); ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="city"><?php echo e(__('City')); ?></label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo e($user_details->city); ?>">
            </div>
            <div class="form-group">
                <label for="zipcode"><?php echo e(__('Zipcode')); ?></label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo e($user_details->zipcode); ?>">
            </div>
            <div class="form-group">
                <label for="address"><?php echo e(__('Address')); ?></label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo e($user_details->address); ?>">
            </div>
            <div class="form-group">
                <label for="image"><?php echo e(__('Image')); ?></label>
                <div class="media-upload-btn-wrapper">
                    <div class="img-wrap">
                        <?php echo render_attachment_preview_for_admin($user_details->image); ?>

                    </div>
                    <input type="hidden" name="image">
                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                        <?php echo e(__('Upload Image')); ?>

                    </button>
                </div>
                <small><?php echo e(__('Recommended image size 150x150')); ?></small>
            </div>

            <div class="btn-wrapper mt-4">
              <button type="submit" class="btn-default rounded-btn semi-bold"><?php echo e(__('Save changes')); ?></button>
          </div>
        </form>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => ['userUpload' => true,'type' => 'user','imageUploadRoute' => route('user.upload.media.file')]]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['userUpload' => true,'type' => 'user','imageUploadRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file'))]); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.niceselect.js','data' => []]); ?>
<?php $component->withName('niceselect.js'); ?>
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
        (function($){
            "use strict";

            $(document).on("change","#country",function (){
                let id = $(this).val().trim();

                $.get('<?php echo e(route('country.state.info.ajax')); ?>', {id: id}).then(function(data) {
                    $('#state').html(data);
                });
            });

            $(document).ready(function () {
                $(document).on('click','.mobile_nav',function(e){
                    e.preventDefault();
                    $(this).parent().toggleClass('show');
                });

                if ($('.nice-select').length) {
                    $('.nice-select').niceSelect();
                }
            });
        })(jQuery);
    </script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => ['deleteRoute' => route('user.upload.media.file.delete'),'imgAltChangeRoute' => route('user.upload.media.file.alt.change'),'allImageLoadRoute' => route('user.upload.media.file.all'),'type' => 'user']]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['deleteRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.delete')),'imgAltChangeRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.alt.change')),'allImageLoadRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.all')),'type' => 'user']); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\grenmart-api\@core\resources\views/frontend/user/dashboard/edit-profile.blade.php ENDPATH**/ ?>