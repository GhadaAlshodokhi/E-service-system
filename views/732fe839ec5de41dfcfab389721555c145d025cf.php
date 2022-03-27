<?php $__env->startSection('content'); ?>

<div class ="content"> 
<body>

    <h4> للاستفادة من الخدمات المقدمة يرجى التسجيل </h4>     
    <h6> في حين التسجيل مسبقاً يمكنكم الدخول مباشرة من <a href="<?php echo e(route('login_user')); ?>"> هنا </a> </h6>  
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

    
    <!-- Create Post Form -->
    <form method ="post"> 
    <?php echo csrf_field(); ?>


    <div class="form-group">
        <label for="name" > <b> الاسم </b> </label>
        <input type="text" class="form-control" name="name" value= "<?php echo e(Session::get('name')); ?>" placeholder="الاسم" >
    </div>

    <div class="form-group">
        <label for="email"> <b> البريد الالكتروني </b></label>
        <input type="email" class="form-control" name="email" value= "<?php echo e(Session::get('email')); ?>" placeholder="example@gmail.com" >
    </div>

    <div class="form-group">
        <label for="phone" > <b> رقم الجوال </b></label>
        <input type="phone" class="form-control" name="phone" value= "<?php echo e(Session::get('phone')); ?>" placeholder="05********" >
    </div>

    <div class="form-group">
        <label for="national_id" >  <b>الهوية الوطنية </b> </label>
        <input type="national_id" class="form-control" name="national_id" value= "<?php echo e(Session::get('national_id')); ?>" placeholder="10********" >
    </div>

    <div class="form-group">
        <label for="password" >  <b> الرقم السري   </b> </label>
        <input type="password" class="form-control" name="password" placeholder="********" >
    </div>


    <div >
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"> التسجيل</button>
    </div>


    </form>

</div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('eservices_layout.layout_base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/ES/resources/views/eservices/register.blade.php ENDPATH**/ ?>