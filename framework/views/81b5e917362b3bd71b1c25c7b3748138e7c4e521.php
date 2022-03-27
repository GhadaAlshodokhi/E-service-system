<?php $__env->startSection('content'); ?>

<div class ="content"> 
<body>

    <h4> للاستفادة من الخدمات المقدمة يرجى الدخول  </h4>     
    <h6> في حال عدم التسجيل مسبقاً يمكنكم    
    <a href="<?php echo e(route('new_user')); ?>"> التسجيل </a> 
    </h6>  
    <br>
    

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

    <!-- <?php echo e(Session::get('employee_login_email')); ?> -->


    
    <!-- Create Post Form -->

    <form method ="post" > 
    <?php echo csrf_field(); ?>
    
    <div class="form-group">
        <label >البريد الالكتروني</label>
        <input type="email" class="form-control" value= "<?php echo e(Session::get('employee_login_email')); ?>" name="email" placeholder="name@gmail.com" >
    </div>
    
    <div class="form-group">
        <label >   الرقم السري  </label>
        <input type="password" class="form-control" name="password" placeholder="********" >
    </div>


     
    <div >
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">دخول</button>
    </div>

    </form>

    
</div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('eservices_layout.layout_base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/ES/resources/views/eservices/login.blade.php ENDPATH**/ ?>