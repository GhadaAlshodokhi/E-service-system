<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>
 
 <!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

/* font import */
@import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

    body {
        font-family: 'Droid Arabic Kufi', serif;
        font-size:100%;
        font-size: 18px;
        font-weight: normal;
        text-align: justify;
        color: #44687D;
    }
  
    .footer {
        height: 50px;
        position: absolute;
        left: 0;
        right: 0;
        z-index: 150;
        margin-top:50px;
    
    }


    /* a { color: #44687D !important; } */

    .img-header {
        /* height: 200px; 
        width: 100%; */
        margin-top: 0px;
        margin-bottom: 20px;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center; 
        width: 100%;
        background-size: 100% 100%;
        }

        a.navbar-brand  {
        font-weight: bold !important;
        }
        .navbar-light .navbar-brand{
            color:#44687d !important;
        }

    </style>

</head>

<body>


    <!-- Google translator -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- Google translator -->

    <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'ar'}, 'google_translate_element');
        }
    </script>

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
            <b><a class="nav-link" href="#">تواصل معنا</a> </b>
        </li>

        <li class="nav-item active">
           <b> <a class="nav-link" href="#" > تغيير اللغة <span class="sr-only">(current)</span></a> <b>
        </li>

         
        </ul>
        <span class="navbar-text">
             اهلا بك :
            {{Session::get('employee_name')}}
            &nbsp&nbsp&nbsp
            <b> {{date("Y-m-d")}}</b>
        </span>

        

    </div>
    </nav>


    <div >
        <img class="img-header" alt="eServices" src="../img/bdf-eservicesbanner.jpeg"> 
        <!-- <img class="img-header" alt="eServices" src="../img/description-image-eServices.jpeg">  -->
        <!-- <img class="img-header" alt="eServices" src="../img/eservices-card-one.png">  -->
    </div>
   
    <div align="left" id="google_translate_element"></div>

    <div class="container">
        @yield('content')
    <div>


    <footer class="footer footer-spa text-center" style="background: #F9F9F9; padding: 10px; border-top: solid 1px #E4E4E4;">
        <p>
            جميع الحقوق محفوظة  ©   
        </p>
    
 
    </footer>


</body>
</html>