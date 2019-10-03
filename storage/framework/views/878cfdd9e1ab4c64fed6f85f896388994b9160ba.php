<?php $__env->startSection('content'); ?>

    <?php if(Session::has('success_message')): ?>
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            <?php echo session('success_message'); ?>


            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    <?php endif; ?>

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Comments</h4>
            </div>

            

        </div>
        
        <?php if(count($comments) == 0): ?>
            <div class="panel-body text-center">
                <h4>No Comments Available.</h4>
            </div>
        <?php else: ?>
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Robot</th>
                            <th>User</th>
                            <th>Comment</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($comment->robot->id); ?></td>
                            <td><?php echo e($comment->user->name); ?></td>
                            <td><?php echo e($comment->comment); ?></td>

                            <td>

                                <form method="POST" action="<?php echo e(route('comments.comment.destroy', $comment->id)); ?>">
                               
                                        <button type="submit" class="btn btn-danger">
                                         Delete
                                         
                                         <?php echo csrf_field(); ?>
                                         <?php echo method_field('DELETE'); ?>                                          
                                        </button>

                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            <?php echo $comments->render(); ?>

        </div>
        
        <?php endif; ?>
    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sci-Fi\resources\views/comments/index.blade.php ENDPATH**/ ?>