
<?php $__env->startSection('title', 'User List'); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .avatar-xl {
            height: 2.5rem;
            width: 2.5rem;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-12">
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
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.create')): ?>
                                    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary waves-effect waves-light">Add
                                        New</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(route(\Request::route()->getName())); ?>" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email"
                                                name="email" placeholder="Email"
                                                value="<?php echo e($requests['email'] ?? ''); ?>">
                                            <p class="text-danger" id="email_err"></p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="mb-0 mb-md-3">
                                            <button type="submit" class="btn btn-success">Search</button>

                                            <a href="<?php echo e(route(\Request::route()->getName())); ?>" class="btn btn-info">Remove
                                                Filters</a>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive ">
                    <table class="table table-bordered table-striped nowrap w-100">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Business Channel</th>
                                <th>Office</th>
                                <th>User</th>
                                <th>E-Mail</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <!-- <th>Role</th> -->
                                <!-- <th>Permissions</th> -->
                                <th>action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                    <td><?php echo e(__('#' . $user->staff_id)); ?></td>
                                    <td><?php echo e($user->Channel->name??''); ?></td>
                                    <td><?php echo e($user->Office->name??''); ?></td>
                                    <td>
                                        <div class="text-center">
                                            <img src="<?php echo e(parse_url($user->avatar, PHP_URL_SCHEME) == 'https' || parse_url($user->avatar, PHP_URL_SCHEME) == 'http'
                                                ? $user->avatar
                                                : Storage::url($user->avatar)); ?>"
                                                alt="avatar-4" class="avatar-xl img-thumbnail rounded-circle">
                                            <h4 class="text-primary" style="font-size: 16px !important;">
                                                <?php echo e($user->name); ?></h4>
                                            <h5 class="text-muted font-size-13">
                                                <?php echo e($user->designation_id ? $user->designation->name : 'Producer'); ?></h5>
                                        </div>
                                    </td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->mobile); ?></td>
                                    <td>
                                        <?php if($user->status): ?>
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure desable this?')"
                                                href="<?php echo e(route('user.status', $user->id)); ?>"
                                                class="btn btn-info">Disable</a>
                                        <?php else: ?>
                                            <a class="btn btn-success" onclick="return confirm('Are you sure enable this?')"
                                                href="<?php echo e(route('user.status', $user->id)); ?>"
                                                class="btn btn-info">Enable</a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($user->roles->first()?$user->roles->first()->name:''); ?></td>
                                    <!-- <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.edit')): ?>
        <a href="<?php echo e(route('user.permissions', $user->id)); ?>" class="btn btn-warning"><i
                                                            class="fas fa-edit"></i></a>
    <?php endif; ?>
                                        </td> -->
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.edit')): ?>
                                            <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn btn-warning"><i
                                                    class="fas fa-edit"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php echo e($users->links()); ?>

                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\talent-pro-lab\resources\views/layouts/admin/pages/users/index.blade.php ENDPATH**/ ?>