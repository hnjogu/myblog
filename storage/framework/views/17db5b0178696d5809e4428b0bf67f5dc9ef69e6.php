<?php $__env->startSection('header'); ?>
<div class="site-heading">
  <h1>keep up to date</h1>
  <hr class="small">
  <span class="subheading">keep me updated</span> 
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <?php if(!$posts->count()): ?>
   there no post for you.login to write a new blog now and become a blog writer!!!
   <?php else: ?>
   <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
       <h2 class="post-title">
           <a href="<?php echo e(url('/'.$post->slug)); ?>"><?php echo e($post->title); ?></a>
       </h2>
       <p class="post-subtitle">
           <?php echo str_limit($post->body, $limit= 120,$end ='..... <a href='.url("/".$post->slug).'>Read More</a>'); ?>

       </p>
       <p class="post-meta">
         <?php echo e($post->created_at->format('M d,y \a\t h:i a')); ?> By <a href="<?php echo e(url('/user/'.$post->author_id)); ?>"><?php echo e($post->author->name); ?></a>
           
       </p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
    <?php endif; ?>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagination'); ?>
<div class="row">
    <hr>
    <?php echo $posts->links(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>