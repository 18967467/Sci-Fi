<?php $__env->startSection('content'); ?>  
<div class="row">
    <div class="col-lg-3">
    	<h2 class="my-4">Filter</h4>
        <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<label><?php echo e($filter->name); ?></label><br>
            <?php switch(optional($filter->InputType)->type):
            	
                case (0): ?>
        			<input type="text" class="form-control" placeholder="<?php echo e($filter->name); ?>">
        			<?php break; ?>
        		<?php case (1): ?>
        			<?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        					<input type="radio" name="<?php echo e($filter->name); ?>" value="<?php echo e($option->option); ?>">	<?php echo e($option->option); ?><br>
        			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        			<?php break; ?>
        		<?php case (2): ?>
        			<?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        					<input type="checkbox" name="<?php echo e($filter->name); ?>" value="<?php echo e($option->option); ?>">	<?php echo e($option->option); ?><br>
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
    </div>
    <!-- /.col-lg-3 -->

	<div class="col-lg-9 my-4">     
        <div class="row">
			<?php $__currentLoopData = $robots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">                        
                        <div class="card-body">
                            <?php
                            	$collection = collect();	
                            	foreach($robot->robotInfos as $robotInfo) {
                            		$collection->push(['property' => $robotInfo->Property->name, 'content' => $robotInfo->content, 'order' => $robotInfo->Property->order]);
                            	}
                            	$sorted = $collection->sortBy('order')->where('order' , '>', 0);
                        	?>
                        	<?php $__currentLoopData = $sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robotInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        		<?php if($robotInfo['property'] == "Image"): ?>
                        			<a href="#">
                        				<img alt="" src="<?php echo e($robotInfo['content']); ?>" style="max-width:100%; max-height:100%;">
                    				</a>
                        		<?php elseif($robotInfo['property'] == "Name"): ?>
                        			<h5 class="card-title">
                            			<a href="#"><?php echo e($robotInfo['content']); ?></a>
                            		</h5>	
                        		<?php else: ?>
                        			<p class="card-text"><strong><?php echo e($robotInfo['property']); ?>&nbsp</strong><?php echo e($robotInfo['content']); ?></p>
                        		<?php endif; ?>                        		
                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>
          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
        </div>
        <!-- /.row -->
<!--         <table id="register" class="table table-sm table-hover" cellspacing="0">   -->
<!--           	<thead> -->
<!--                 <tr> -->
<!--                     <th></th> -->
<!--                     <th>Name</th> -->
<!--                     <th>Position</th> -->
<!--                     <th>Salary</th> -->
<!--                     <th>Start</th> -->
<!--                     <th>Office</th> -->
<!--                     <th>Extn</th> -->
<!--                 </tr> -->
<!--             </thead> -->
<!--         </table> -->
    </div>
    <!-- /.col-lg-9 -->
</div>
<!-- /.row -->    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sci-Fi\resources\views/users/saved.blade.php ENDPATH**/ ?>