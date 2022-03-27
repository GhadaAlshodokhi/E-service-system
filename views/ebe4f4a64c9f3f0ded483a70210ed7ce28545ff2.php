<?php $__env->startSection('content'); ?>

<style>

 
 
.header_1 {
   margin-top:5px;
   background-color: #4c6f83;
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


   
<!-- HR -->
<?php if(  $user_loged_in -> slug == 'hr'): ?>

    <div class="header_1"> 
        <h4 >  طلبات الموظفين   <a align="left" href="/export_verifying_account_hr/">   <i style="color:black;" class="fa fa-file-excel-o"></i> </a></h4> 
        <h6> ( تفعيل الحسابات ) </h6> 
    </div> 

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">رقم الجوال</th>
      <th scope="col">الهوية الوطنية</th>
      <th scope="col">تفعيل الحساب </th>
    </tr>
  </thead>
    <?php $__currentLoopData = $employee_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $em): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Activate account -->
        <?php if( ($em -> slug == 'employee') and ($em -> status_account == 0) ): ?>
        <tbody>
            <tr>
                <th>-</th>
                <td><?php echo e($em-> name); ?></td>
                <td><?php echo e($em-> phone); ?></td>
                <td><?php echo e($em-> national_id); ?></td>
                <td> 
                    <a href="/account_active/<?php echo e($em-> id); ?>"> <i style="color:green;"class="fa fa-user" aria-hidden="true"> تفعيل</i> </a>
                </td>
            </tr>
        </tbody>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table> 
<?php endif; ?>

<hr>
<!-- HR or HR Maneger -->
<?php if(  ($user_loged_in -> slug == 'hr') ): ?>
    <div class="header_1"> 
        <h4 >  طلبات بطاقات الموظفين   <a align="left" href="/export_card_request_hr/">   <i style="color:black;" class="fa fa-file-excel-o"></i> </a></h4> 
        <h6> ( تفعيل البطاقات ) </h6> 
    </div> 
<?php endif; ?>

<?php if(  $user_loged_in -> slug == 'hr'): ?>
    <table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col">#</th>
        <th scope="col">الاسم</th>
        <th scope="col"> الادارة </th>
        <th scope="col">رقم الجوال</th>
        <th scope="col"> البريد الالكتروني </th>
        <th scope="col">الهوية الوطنية</th>
        <th scope="col"> اعتماد الطلب </th>
        </tr>
    </thead>
        <?php $__currentLoopData = $employee_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $em): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Card request approve/reject -->
            <?php if( ($em -> slug == 'employee') and ($em -> status_account == 1) and ($em -> status_card_requeste == 1) ): ?> 
                <tbody>
                    <tr>
                        <td>-</td>
                        <td><?php echo e($em-> name); ?></td>
                        <td><?php echo e($em-> department); ?></td>
                        <td><?php echo e($em-> phone); ?></td>
                        <td><?php echo e($em-> email); ?></td>
                        <td><?php echo e($em-> national_id); ?></td>
                        <td> 
                        <!-- To maneger -->
                            <a href="/request_card/<?php echo e($em-> id); ?>/2">  <i style="color:green;" class="fa fa-check"></i> </a>  
                            &nbsp
                        <!-- To Employee (to re request) -->
                            <a href="/request_card/<?php echo e($em-> id); ?>/0"> <i style="color:red;" class="fa fa-times" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                </tbody>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
    </table> 


 <!-- HR Maneger--> 
<?php elseif( $user_loged_in -> slug == 'hr_maneger' ): ?>
    <div class="header_1"> 
        <h4 >  اعتماد طلبات الموظفين  <a align="left" href="/export_card_request_hr/">   <i style="color:black;" class="fa fa-file-excel-o"></i> </a></h4> 
        <h6> ( تفعيل البطاقات ) </h6> 
    </div> 

    <table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col">#</th>
        <th scope="col">الاسم</th>
        <th scope="col"> الادارة </th>
        <th scope="col">رقم الجوال</th>
        <th scope="col"> البريد الالكتروني </th>
        <th scope="col">الهوية الوطنية</th>
        <th scope="col"> اعتماد الطلب </th>
        </tr>
    </thead>

    <?php $__currentLoopData = $employee_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $em): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <!-- Card request approve/reject -->
        <?php if( ($em -> slug == 'employee') and ($em -> status_card_requeste == 2) ): ?>
            <tbody>
                <tr>
                    <td>-</td>
                    <td><?php echo e($em-> name); ?></td>
                    <td><?php echo e($em-> department); ?></td>
                    <td><?php echo e($em-> phone); ?></td>
                    <td><?php echo e($em-> email); ?></td>
                    <td><?php echo e($em-> national_id); ?></td>
                    <td> 
                    <!-- To maneger -->
                        <a href="/request_card_hr_manager/<?php echo e($em-> id); ?>/3"> <i style="color:green;" class="fa fa-check"></i> </a>  
                        &nbsp&nbsp
                    <!-- To Employee (to re request) -->
                        <a href="/request_card_hr_manager/<?php echo e($em-> id); ?>/0"> <i style="color:red;" class="fa fa-times" aria-hidden="true"></i> </a>
                    </td>
                </tr>
            </tbody>            
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table> 

<?php endif; ?>
  




</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('eservices_layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/ES/resources/views/eservices/edit_hr.blade.php ENDPATH**/ ?>