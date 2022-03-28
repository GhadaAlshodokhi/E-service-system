


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
                <b>الاسم: </b> {{$user_loged_in->name}} <br>
                <b>الادارة: </b> {{$user_loged_in->department}} <br>
                <b>تاريخ التفعيل : </b> {{$user_loged_in->hr_maneger_approve_at}}<br> 
                <b>تاريخ نهايه البطاقة : </b> {{$user_loged_in->card_expire_date_at}}<br>
                {{QrCode::generate($user_loged_in->card_expire_date_at)}}
            </div>
        </div>
   
    </div>
</body>
</html>
