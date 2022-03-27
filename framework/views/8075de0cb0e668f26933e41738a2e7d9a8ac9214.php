<?php $__env->startSection('content'); ?>

<style>

.header {
    background-color: #47879882;
    color: white;
    text-align:center;

}
</style>

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
    

<div class="container">
    <!-- Create Post Form -->
    <form method ="post" > 
        <?php echo csrf_field(); ?>
        <div class="row" xstyle="border: solid 1px;">
            <!-- <div class="col-12 header">
                <h4 >  الشاشة الرئيسية  </h4>
            </div> -->

            <div class="col-12 " >

                        <!-- Employee Home -->
        <?php if( ($user_loged_in -> slug == 'employee') and ($user_loged_in -> status_account == 1) ): ?>
            <!-- New card request -->
            <?php if( ($user_loged_in -> status_card_requeste == 0)  ): ?>
              <a  href="edit" class="btn btn-info" >  تقديم الطلب على بطاقة  </a>      

            <!-- Card Expierd , request for a new one  -->
            <?php elseif( ($user_loged_in -> status_card_requeste != 0) and ( ($user_loged_in -> card_expire_date_at != null)) and ( !$card_not_expier ) ): ?>
                <a href="edit" class="btn btn-info" >  تقديم الطلب على بطاقة </a>
            
            <!-- Card approved by hr_maneger -->
            <?php elseif( ($user_loged_in -> active_card == 3) and ($user_loged_in -> status_card_requeste != 0) and ( $card_not_expier) ): ?>
                <a href="javascript: w=window.open('download_employee_pdf_card/<?php echo e($user_loged_in -> id); ?>'); w.print();" class="btn btn-info">  QR يحتوى على PDF طباعة البطاقة </a>

                <b>  <a href="/export_employee_pdf_card/" class="btn btn-info">    PDF تصدير البطاقة </a> </b>

        <?php endif; ?> 

        <!-- Hr Home -->
        <?php elseif( $user_loged_in -> slug == 'hr'): ?>
            <a href="/edit_hr/" class="btn btn-info" >  استعراض الطلبات</a>

        <!-- Hr Maneger Home -->
        <?php elseif( $user_loged_in -> slug == 'hr_maneger'): ?>
        <a href="/edit_hr/" class="btn btn-info" >  اعتماد الطلبات</a>

        <?php endif; ?> 
            </div>
        </div>
    </form>
 </div>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('eservices_layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/ES/resources/views/eservices/home.blade.php ENDPATH**/ ?>