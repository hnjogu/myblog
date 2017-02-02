<?php $__env->startSection('header'); ?>
  <div class="post-heading">
    <h1><?php echo e($post->title); ?></h1>
    <h2 class="subheading"><?php echo e($post->description); ?></h2>
    <span class="meta">
      <?php echo e($post->created_at->format('m d,y \a\t h:i a')); ?> By
      <a href="<?php echo e(url('/user/'.$post->author_id)); ?>"><?php echo e($post->author->name); ?></a>
    </span>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <?php if($post): ?>
    <div class="">
  	    <?php echo $post->body; ?>

    </div>
   <?php if(Auth::guest()): ?>
     <p>
     	please login to write a comment
     </p>
     <?php else: ?>
     <div class="">
     	<h3>leave a comment</h3>
     </div>
     <div class="panel-body">
     	<form class="" action="/comment/add" method="post">
     		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
     		<input type="hidden" name="on_post" value="<?php echo e($post->id); ?>">
     		<input type="hidden" name="slug" value="<?php echo e($post->slug); ?>">
     		<div class="form-group">
     			<textarea required="required" placeholder="enter your comment" name="body" class="form-control"></textarea>
     		</div>
     		<input type="submit" name='post_comment' class="btn btn-success" value="post">
     	</form>
     </div>
   <?php endif; ?>
   <div class="">
   	 <?php if($comments): ?>
   	   <ul style="list-style: none; padding: 0">
   	   	  <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
   	   	  <li class="panel-body">
   	   	    <div class="list-group">
   	   	    	<div class="list-group-item">
   	   	    	<h3><?php echo e($comment->author->name); ?></h3>
   	   	    	<p><?php echo e($comment->created_at->format('m,d,y \a\t h:i a')); ?></p>
   	   	    </div>
   	   	    <div class="list-group-item">
   	   	    <p><?php echo e($comment->body); ?></p>   	   	    	
   	   	    </div>
   	   	  </div>
   	   	 </li>
   	   	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   	   </ul>
   	   <?php endif; ?>
   </div>
   <?php else: ?>
    //404 error
  <?php endif; ?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>