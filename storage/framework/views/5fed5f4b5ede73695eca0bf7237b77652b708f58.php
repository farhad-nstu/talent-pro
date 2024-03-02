
<?php $__env->startSection('title', $title); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .info {
            background-color: aqua;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title"><?php echo $__env->yieldContent('title'); ?></h4>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-wrap gap-2 float-end">
                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-light waves-effect"><i
                                        class="fas-light fas fa-angle-double-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('shortenUrls.storeUrl')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php echo $__env->make('layouts.components.input', [
                                            'wrap' => 'col-md-6',
                                            'label' => 'Title',
                                            'type' => 'text',
                                            'field' => 'title',
                                            'id' => 'title',
                                            'placeholder' => 'Url title',
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make('layouts.components.input', [
                                            'wrap' => 'col-md-6',
                                            'label' => 'Original url',
                                            'type' => 'text',
                                            'field' => 'original_url',
                                            'id' => 'original_url',
                                            'placeholder' => 'Original url',
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <div class="mb-0 mb-md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\talent-pro\resources\views/layouts/pages/urls/create.blade.php ENDPATH**/ ?>