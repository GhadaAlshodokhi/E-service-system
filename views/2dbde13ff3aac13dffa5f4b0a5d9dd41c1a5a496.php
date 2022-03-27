
    <!--  navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" >نظام خدمات الموظفين </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <b> <a class="nav-link" href="/login/"> تسجيل الدخول <span class="sr-only">(current)</span></a> </b>
        </li>

        <li class="nav-item active">
            <b><a class="nav-link" href="/home/"> الرئيسة <span class="sr-only">(current)</span></a> </b>
        </li>        
        

        <li class="nav-item">
            <b><a class="nav-link" href="<?php echo e(route('new_user')); ?>">تواصل معانا</a> </b>
        </li>

        <li class="nav-item active">
           <b> <a class="nav-link" href="#" > تغيير اللغة <span class="sr-only">(current)</span></a> <b>
        </li>

         
        </ul>
        <span class="navbar-text">
             اهلا بك :
            <b> <?php echo e(Session::get('employee_name')); ?> </b>
            &nbsp&nbsp&nbsp
            <b> <?php echo e(date("Y-m-d")); ?></b>
        </span>

        

    </div>
    </nav>
<?php /**PATH /Users/mac/Desktop/ES/resources/views/eservices_layout/nav.blade.php ENDPATH**/ ?>