


<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2> بيانات الموظف  </h2>
            </div>

            <div class="card-body">
                <b>الاسم: </b> <?php echo e($user_loged_in->name); ?> <br>
                <b>الادارة: </b> <?php echo e($user_loged_in->department); ?> <br>
                <b>تاريخ التفعيل : </b> <?php echo e($user_loged_in->hr_manegar_approve_at); ?><br> 
                <b>تاريخ نهايه البطاقة : </b> <?php echo e($user_loged_in->card_expire_date_at); ?><br>
                <?php echo e(QrCode::generate($user_loged_in->card_expire_date_at)); ?>

            </div>
        </div>
   
    </div>
</body>
</html><?php /**PATH /Users/mac/Desktop/ES/resources/views/eservices/pdf_qr.blade.php ENDPATH**/ ?>