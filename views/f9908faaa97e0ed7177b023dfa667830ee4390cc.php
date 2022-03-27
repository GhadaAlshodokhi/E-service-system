<?php $__env->startSection('content'); ?>

<div class ="content"> 
    <!-- Displaying The Validation Errors -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Displaying The Message  -->
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('message')); ?>

        </div>
    <?php endif; ?>


 
 <!-- Create Post Form -->

<form method ="post" enctype="multipart/form-data"> 
<?php echo csrf_field(); ?>


<div class="form-group">
    <label for="text">الاسم</label>
    <input type="text" class="form-control" name="name" value= "<?php echo e($employee_info->name); ?>"  readonly disabled >
</div>

<div class="form-group">
    <label for="email">البريد الالكتروني</label>
    <input type="email" class="form-control" name="email" value= "<?php echo e($employee_info->email); ?>" readonly disabled>
</div>

<div class="form-group">
    <label for="department">  الادارة</label>
    <input type="department" class="form-control" name="department" value= "<?php echo e(Session::get('department')); ?>" placeholder="الادارة" >
</div>

<div class="form-group">
    <label for="national_id">  الهوية الوطنية </label>
    <input type="national_id" class="form-control" name="national_id" value= "<?php echo e($employee_info->national_id); ?>" readonly disabled >
</div>

<div class="form-group">
    <label for="image"> صورة شخصية </label>
  <input type="file" id="image" name="image" accept="image/*">
</div>


<div >
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"> التسجيل</button>
</div>

</form>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('eservices_layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/ES/resources/views/eservices/edit.blade.php ENDPATH**/ ?>