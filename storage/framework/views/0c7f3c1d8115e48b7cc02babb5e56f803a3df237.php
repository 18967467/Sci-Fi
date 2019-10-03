<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('robots.robot.upload')); ?>" accept-charset="UTF-8" id="create_robot_form" name="create_robot_form" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            
<input class="form-control" name="user_id" type="text" id="user_id" value="<?php echo e(Auth::user()->id); ?>" hidden>
<input class="form-control" name="state" type="checkbox" id="state" value="0" hidden>

<?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="form-group">
		<label for="<?php echo e($property->name); ?>" class="col-md-2 control-label"><?php echo e($property->name); ?></label><br>
		<i><?php echo e($property->description); ?></i>
		<div class="col-md-10">
		<?php switch($property->InputType->type):
			case (0): ?>
				<input class="form-control" name="<?php echo e($property->name); ?>" type="text" id="<?php echo e($property->name); ?>" value="" minlength="0" maxlength="255">
        		<?php echo $errors->first('$property->name', '<p class="help-block">:message</p>'); ?>

				<?php break; ?>
			<?php case (1): ?>
				<input type="radio" name="<?php echo e($property->name); ?>" value="" hidden checked>
				<?php $__currentLoopData = $property->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<input type="radio" name="<?php echo e($property->name); ?>" value="<?php echo e($option->option); ?>">&nbsp&nbsp&nbsp&nbsp<?php echo e($option->option); ?></br>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
				<?php break; ?>
			<?php case (2): ?>
				<input type="checkbox" name="<?php echo e($property->name); ?>[]" value="" hidden checked>
				<?php $__currentLoopData = $property->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<input type="checkbox" name="<?php echo e($property->name); ?>[]" value="<?php echo e($option->option); ?>">&nbsp&nbsp&nbsp&nbsp<?php echo e($option->option); ?><br>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php break; ?>
			<?php case (3): ?>
				<select name="<?php echo e($property->name); ?>">
				<?php $__currentLoopData = $property->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($option->option); ?>">&nbsp&nbsp&nbsp&nbsp<?php echo e($option->option); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<option value="" hidden></option>
				</select>
				<?php break; ?>
			<?php case (10): ?>
				<input class="form-control" name="<?php echo e($property->name); ?>" type="text" id="<?php echo e($property->name); ?>" value="" minlength="0" maxlength="255">
        		<?php echo $errors->first('$property->name', '<p class="help-block">:message</p>'); ?>

				<?php break; ?>
			<?php default: ?>
				<?php break; ?>
		<?php endswitch; ?>
		</div>
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input class="btn btn-primary" type="submit" value="Add">
        </div>
    </div>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sci-Fi\resources\views/users/upload.blade.php ENDPATH**/ ?>