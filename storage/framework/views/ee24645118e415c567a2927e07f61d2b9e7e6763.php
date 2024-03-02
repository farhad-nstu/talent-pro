
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
                                
                                    <a href="<?php echo e(route('shortenUrls.createUrl')); ?>"
                                        class="btn btn-primary waves-effect waves-light">Create
                                        New</a>
                                
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
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped nowrap w-100">
                        <thead>
                            <tr class="table-hd-bg">
                                <th>#</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Original url</th>
                                <th>Shorten url</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody id="urlData">
                            <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($url['title']); ?></td>
                                    <td><?php echo e(isset($url->user) ? $url->user->name : $url['user_id']); ?></td>
                                    <td><?php echo e($url['original_url']); ?></td>
                                    <td><?php echo e($url['shortener_url']); ?></td>
                                    <td>
                                        
                                            <a href="<?php echo e(route('shortenUrls.editUrl', $url['id'])); ?>"
                                                class="btn btn-primary waves-effect waves-light"><i class="fas fa-edit"></i></a>
                                            <button data-url-id="<?php echo e($url['id']); ?>"
                                                class="urlDeleteButton btn btn-danger waves-effect waves-light"><i class="fas fa-trash"></i></button>
                                        
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <!-- Pagination -->
                        <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
                            <?php echo e($urls->links('pagination::bootstrap-4')); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script>
$("#urlData").on("click", "button.urlDeleteButton", function () {
    element = $(this);
    url_id = element.data('url-id');

    bootbox.confirm({
        title: "Remove url?",
        message: `Are you sure you want to remove url <strong>${url_id}</strong>? This action cannot be reversed.`,
        buttons: {
            cancel: {
                label: 'No',
                className: 'btn-sm btn-primary',
            },
            confirm: {
                label: 'Yes',
                className: 'btn-sm btn-danger',
            }
        },
        callback: function (confirmed) {
            console.log('This was logged in the callback: ' + confirmed);
            if (confirmed) {
                let form_data = new FormData();

                form_data.append("csrfmiddlewaretoken", '<?php echo e(csrf_field()); ?>');
                form_data.append("url_id", url_id);

                axios.post("<?php echo e(route('shortenUrls.deleteUrl')); ?>", form_data, {})
                    .then(function (response) {
                        if (response.data.length <= 0) {
                            console.log("empty");
                            return false;
                        }
                        data = response.data
                        message = data.message

                        location.reload();
                    })
                    .catch(function (error) {
                        return false;
                    });
            }
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\talent-pro-lab\resources\views/layouts/pages/urls/index.blade.php ENDPATH**/ ?>