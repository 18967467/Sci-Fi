<?php $__env->startSection('content'); ?>
<?php if(session()->has('message')): ?>
<div class="alert alert-success">
<?php echo e(session()->get('message')); ?>

</div>
<?php endif; ?>
<div class="container">
	<?php
    	$collection = collect();	
    	foreach($robot->robotInfos as $robotInfo) {
    		$collection->push(['property' => $robotInfo->Property->name, 'content' => $robotInfo->content, 'order' => $robotInfo->Property->order]);
    	}
    	$sorted = $collection->sortBy('order')->where('order' , '>', 0);
    	$propertyName = $sorted->where('property', 'Name')->first();
    	$propertyImage = $sorted->where('property', 'Image')->first();
	?>
    <!-- Portfolio Item Heading -->
    <h1 class="my-4 text-primary"><?php echo e($propertyName['content']); ?></h1>
    
    <!-- Portfolio Item Row -->
    <div class="row">
        <div class="col-md-8">
          <img class="img-fluid" src="<?php echo e($propertyImage['content']); ?>" alt="">
        </div>
        <div class="col-md-4" style="background-color:lightblue">
        	<?php $__currentLoopData = $sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robotInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        		<?php if($robotInfo['property'] != "Image" && $robotInfo['property'] != "Name"): ?>
        			<p class="card-text"><strong><?php echo e($robotInfo['property']); ?>&nbsp</strong><?php echo e($robotInfo['content']); ?></p>
        		<?php endif; ?>                        		
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p align="center"><button type="button" class="btn btn-success">Save</button></p>
        </div>
  	</div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <h3 class="my-4 text-primary">Related Robots</h3>

    <div class="row">    
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
                <img class="card-img-top" width="200" height="150" src="<?php echo e(asset('img/robot/rb02.jpg')); ?>" alt="">
              </a>
        </div>        
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
                <img class="card-img-top" width="200" height="150" src="<?php echo e(asset('img/robot/rb03.jpg')); ?>" alt="">
              </a>
        </div>        
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
                <img class="card-img-top" width="200" height="150" src="<?php echo e(asset('img/robot/rb01.jpg')); ?>" alt="">
              </a>
        </div>        
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
                <img class="card-img-top" width="200" height="150" src="<?php echo e(asset('img/robot/rb04.jpg')); ?>" alt="">
              </a>
        </div>    
    </div>
 <form class="form-horizontal"  method="get" id="comment_form">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                        <label class="control-label col-md-4">Comment:</label>
                       <div class="col-md-8">
                            <textarea class="form-control" name="comment" id="comment" data-id="<?php echo e($robot->id); ?>"></textarea>
                            <input type="hidden" name="robot_id" value="<?php echo e($robot->id); ?>" />
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo e(auth()->id); ?>" />
                        </div> 
                        </div>
                        <div class="form-group" align="center">
                        <button class="btn btn-success" type="submit" id="addComment">Add</button>
                        </div>     
                        
                    </form>    
    
   
    
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="card">
<h3>Comments</h3>
<div id="display-comment">
<?php $__currentLoopData = $robot->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card-header"><em><strong><?php echo e($comment->user->name); ?></strong></em></div>
<div class="card-body comment-container">
<span><?php echo e($comment->comment); ?></span>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
</div>
</div>
</div>
</div>
<!-- /.container -->
<?php $__env->stopSection(); ?>

   
                    
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sci-Fi\resources\views/users/robotdetail.blade.php ENDPATH**/ ?>