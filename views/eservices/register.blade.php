@extends('eservices_layout.layout_base')

@section('content')

<div class ="content"> 
<body>

    <h4> للاستفادة من الخدمات المقدمة يرجى التسجيل </h4>     
    <h6> في حين التسجيل مسبقاً يمكنكم الدخول مباشرة من <a href="{{route('login_user')}}"> هنا </a> </h6>  
    <br>
    

    <!-- Displaying The Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Displaying The Message  -->
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    
    <!-- Create Post Form -->
    <form method ="post"> 
    @csrf


    <div class="form-group">
        <label for="name" > <b> الاسم </b> </label>
        <input type="text" class="form-control" name="name" value= "{{Session::get('name')}}" placeholder="الاسم" >
    </div>

    <div class="form-group">
        <label for="email"> <b> البريد الالكتروني </b></label>
        <input type="email" class="form-control" name="email" value= "{{Session::get('email')}}" placeholder="example@gmail.com" >
    </div>

    <div class="form-group">
        <label for="phone" > <b> رقم الجوال </b></label>
        <input type="phone" class="form-control" name="phone" value= "{{Session::get('phone')}}" placeholder="05********" >
    </div>

    <div class="form-group">
        <label for="national_id" >  <b>الهوية الوطنية </b> </label>
        <input type="national_id" class="form-control" name="national_id" value= "{{Session::get('national_id')}}" placeholder="10********" >
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
@endsection
