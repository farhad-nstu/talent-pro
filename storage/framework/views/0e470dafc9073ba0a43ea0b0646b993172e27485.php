
<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startPush('style'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
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
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.show')): ?>
                                    <a href="<?php echo e(route('user.index')); ?>" class="btn btn-primary waves-effect waves-light">User
                                        List</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-xl-4">

                            <div class="card h-100">

                                <div class="card-body">
                                    <div>
                                        
                                        <div class="clearfix"></div>

                                        <div class="text-center bg-pattern">
                                            <img src="<?php echo e(parse_url($admin->avatar, PHP_URL_SCHEME) == 'https' || parse_url($admin->avatar, PHP_URL_SCHEME) == 'http'
                                                ? $admin->avatar
                                                : Storage::url($admin->avatar)); ?>"
                                                alt="avatar-4" class="avatar-xl img-thumbnail rounded-circle mb-3">
                                            <h4 class="text-primary mb-2"><?php echo e($admin->name); ?></h4>
                                            <h5 class="text-muted font-size-13 mb-3">Admin</h5>
                                            <div class="text-center">
                                                <a href="mailto:<?php echo e($admin->email); ?>"
                                                    class="btn btn-success me-2 waves-effect waves-light btn-sm"><i
                                                        class="mdi mdi-email-outline me-1"></i>Send Mail</a>
                                                <a href="tel:<?php echo e($admin->mobile); ?>"
                                                    class="btn btn-primary waves-effect waves-light btn-sm"><i
                                                        class="mdi mdi-phone-outline me-1"></i>PhoneCall</a>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        
                                    </div>

                                    <hr class="my-4">

                                    

                                    <hr class="my-4">
                                    <div class="table-responsive">
                                        <h5 class="font-size-16">Personal Information</h5>

                                        <div>
                                            <p class="mb-1 text-muted">Mobile :</p>
                                            <h5 class="font-size-14"><?php echo e($admin->mobile ?? 'No Number'); ?></h5>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-1 text-muted">E-mail :</p>
                                            <h5 class="font-size-14"><?php echo e($admin->email ?? 'No E-Mail'); ?></h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="card mb-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tasks" role="tab">
                                            <i class="mdi mdi-clipboard-text-outline font-size-20"></i>
                                            <span class="d-none d-sm-block">Roles</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#about" role="tab">
                                            <i class="mdi mdi-account-circle-outline font-size-20"></i>
                                            <span class="d-none d-sm-block">About</span>
                                        </a>
                                    </li>

                                    
                                </ul>
                                <!-- Tab content -->
                                <div class="tab-content p-4">
                                    <div class="tab-pane" id="about" role="tabpanel">

                                        <div>
                                            
                                            <div class="clearfix"></div>

                                            <div class="text-center bg-pattern">
                                                <img src="<?php echo e(parse_url($admin->avatar, PHP_URL_SCHEME) == 'https' || parse_url($admin->avatar, PHP_URL_SCHEME) == 'http'
                                                    ? $admin->avatar
                                                    : Storage::url($admin->avatar)); ?>"
                                                    alt="avatar-4" class="avatar-xl img-thumbnail rounded-circle mb-3">
                                                <h4 class="text-primary mb-2"><?php echo e($admin->name); ?></h4>
                                                <h5 class="text-muted font-size-13 mb-3">Admin
                                                </h5>
                                                <div class="text-center">
                                                    <a href="mailto:<?php echo e($admin->email); ?>"
                                                        class="btn btn-success me-2 waves-effect waves-light btn-sm"><i
                                                            class="mdi mdi-email-outline me-1"></i>Send Mail</a>
                                                    <a href="tel:<?php echo e($admin->mobile); ?>"
                                                        class="btn btn-primary waves-effect waves-light btn-sm"><i
                                                            class="mdi mdi-phone-outline me-1"></i>PhoneCall</a>
                                                    <a href="<?php echo e(route('admin.profile.info', $admin->id)); ?>"
                                                        class="btn btn-primary waves-effect waves-light btn-sm"><i
                                                            class="mdi mdi-account-circle me-1"></i>Edit Profile</a>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            
                                        </div>

                                        <hr class="my-4">

                                        

                                        <hr class="my-4">
                                        <div class="table-responsive">
                                            <h5 class="font-size-16">Personal Information</h5>

                                            <div>
                                                <p class="mb-1 text-muted">Mobile :</p>
                                                <h5 class="font-size-14"><?php echo e($admin->mobile ?? 'No Number'); ?></h5>
                                            </div>
                                            <div class="mt-3">
                                                <p class="mb-1 text-muted">E-mail :</p>
                                                <h5 class="font-size-14"><?php echo e($admin->email ?? 'No E-Mail'); ?></h5>
                                            </div>
                                        </div>


                                    </div>

                                    
                                    <div class="tab-pane active" id="tasks" role="tabpanel">
                                        <div>
                                            <h5 class="font-size-16 mb-3">Active</h5>

                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-centered">
                                                    <tbody>
                                                        <?php $__currentLoopData = $admin->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td style="width: 60px;">
                                                                    <div class="form-check font-size-16 text-center">
                                                                        <label class="form-check-label"
                                                                            for="tasks-activeCheck2"><?php echo e($loop->index + 1); ?></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="#"
                                                                        class="fw-bold text-dark"><?php echo e(ucwords($role->name)); ?></a>
                                                                </td>

                                                                <td><?php echo e($admin->created_at->format('d-M-Y')); ?></td>
                                                                <td style="width: 160px;"><span
                                                                        class="badge badge-soft-primary font-size-12">Active</span>
                                                                </td>

                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end row -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div> <!-- end col -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\talent-pro-lab\resources\views/layouts/admin/pages/users/show.blade.php ENDPATH**/ ?>