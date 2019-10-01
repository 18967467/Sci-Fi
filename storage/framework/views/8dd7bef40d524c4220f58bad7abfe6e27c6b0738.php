<?php $__env->startSection('content'); ?>  
<div class="row">
    <div class="col-lg-3">
    	<form action="/action_page.php" id="filterForm">
    	<h2 class="my-4">Filter</h2>
    	<a href="#" onclick="document.getElementById('filterForm').reset();document.getElementById('submit').click();" class="btn btn-block btn-sm btn-danger"><i class="fas fa-eraser"></i> Clear</a><br>
        <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<label><?php echo e($filter->name); ?></label><br>
            <?php switch(optional($filter->InputType)->type):            	
                case (0): ?>
        			<input type="text" name="<?php echo e($filter->name); ?>" class="form-control" placeholder="<?php echo e($filter->name); ?>" onKeyUp="document.getElementById('submit').click();">
        			<?php break; ?>
        		<?php case (1): ?>
        			<?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        					<input type="radio" name="<?php echo e($filter->name); ?>" value="<?php echo e($option->option); ?>" onclick="document.getElementById('submit').click();">	<?php echo e($option->option); ?><br>
        			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        			<?php break; ?>
        		<?php case (2): ?>
        		<?php $i = 0?>
        			<?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        					<input type="checkbox" name="<?php echo e($filter->name .'*'. ++$i); ?>" value="<?php echo e($option->option); ?>" onclick="document.getElementById('submit').click();">	
        					<?php echo e($option->option); ?><br>
        			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        			<?php break; ?>
        		<?php case (3): ?>
        			<select>
        			<?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        					 <option value="<?php echo e($option->option); ?>"><?php echo e($option->option); ?></option><br>
        			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        			</select>
        			<?php break; ?>
        		<?php case (10): ?>
        			<input type="text" class="form-control" placeholder="<?php echo e($filter->name); ?>">
        			<?php break; ?>
        		<?php default: ?>
            <?php endswitch; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        <input type="submit" value="Submit" id='submit' hidden>
        </form>
    </div>
    <!-- /.col-lg-3 -->

	<div class="col-lg-9 my-4">     
        <div class="row" id="content">

        </div>       
    </div>
    <!-- /.col-lg-9 -->
</div>
<!-- /.row -->    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sci-Fi\resources\views/users/home.blade.php ENDPATH**/ ?>