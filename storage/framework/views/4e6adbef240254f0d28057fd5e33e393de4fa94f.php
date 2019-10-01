<?php $__env->startSection('content'); ?>

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
        	<?php switch($user->privilege):
            	case (0): ?>
            		<div class="alert alert-danger" role="alert" style="text-align: center;">
                      <?php echo e(isset($user->name) ? $user->name : 'User'); ?>

                    </div>
            		<?php break; ?>
            	<?php case (1): ?>
            		<div class="alert alert-success" role="alert" style="text-align: center;">
                      <?php echo e(isset($user->name) ? $user->name : 'User'); ?>

                    </div>
            		<?php break; ?>
            	<?php case (100): ?>
            		<div class="alert alert-warning" role="alert" style="text-align: center;">
                      <?php echo e(isset($user->name) ? $user->name : 'User'); ?>

                    </div>
            		<?php break; ?>
            	<?php default: ?>
            		<div class="alert alert-secondary" role="alert" style="text-align: center;">
                      <?php echo e(isset($user->name) ? $user->name : 'User'); ?>

                    </div>
            	 	<?php break; ?>
            <?php endswitch; ?>
        </span>

        <div class="pull-right">

            <form method="POST" action="<?php echo route('users.user.destroy', $user->id); ?>" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            <?php echo e(csrf_field()); ?>

                <div class="btn-group btn-group-sm" role="group">
                    <a href="<?php echo e(route('users.user.index')); ?>" class="btn btn-dark" title="Show All User">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Go Back</span>
                    </a>

                    <a href="<?php echo e(route('users.user.create')); ?>" class="btn btn-success" title="Create New User">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                    </a>
                    
                    <a href="<?php echo e(route('users.user.edit', $user->id )); ?>" class="btn btn-primary" title="Edit User">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete User" onclick="return confirm(&quot;Click Ok to delete User.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div><br><br>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd><?php echo e($user->name); ?></dd>
            <dt>Email</dt>
            <dd><?php echo e($user->email); ?></dd>
            <dt>Email Verified At</dt>
            <dd><?php echo e($user->email_verified_at); ?></dd>
            <dt>Password</dt>
            <dd><?php echo e($user->password); ?></dd>
            <dt>Phone</dt>
            <dd><?php echo e($user->phone); ?></dd>
            <dt>Address</dt>
            <dd><?php echo e($user->address); ?></dd>
            <dt>Dob</dt>
            <dd><?php echo e($user->dob); ?></dd>
            <dt>Avatar</dt>
            <dd><?php echo e($user->avatar); ?></dd>
            <dt>Privilege</dt>
            <dd>
			<?php switch($user->privilege):
            	case (0): ?>
            		<div class="alert alert-danger" role="alert" style="text-align: center;">
                      Banned
                    </div>
            		<?php break; ?>
            	<?php case (1): ?>
            		<div class="alert alert-success" role="alert" style="text-align: center;">
                      User
                    </div>
            		<?php break; ?>
            	<?php case (100): ?>
            		<div class="alert alert-warning" role="alert" style="text-align: center;">
                      Admin
                    </div>
            		<?php break; ?>
            	<?php default: ?>
            		<div class="alert alert-secondary" role="alert" style="text-align: center;">
                      Others
                    </div>
            	 	<?php break; ?>
            <?php endswitch; ?>
			</dd>
            <dt>Remember Token</dt>
            <dd><?php echo e($user->remember_token); ?></dd>
            <dt>Created At</dt>
            <dd><?php echo e($user->created_at); ?></dd>
            <dt>Updated At</dt>
            <dd><?php echo e($user->updated_at); ?></dd>

        </dl>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sci-Fi\resources\views/users/show.blade.php ENDPATH**/ ?>