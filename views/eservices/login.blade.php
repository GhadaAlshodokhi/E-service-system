@extends('eservices_layout.layout_base')

@section('content')

<div class ="content"> 
<body>

    <h4> للاستفادة من الخدمات المقدمة يرجى الدخول  </h4>     
    <h6> في حال عدم التسجيل مسبقاً يمكنكم    
    <a href="{{route('new_user')}}"> التسجيل </a> 
    </h6>  
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

    <!-- {{  Session::get('employee_login_email')  }} -->


    
    <!-- Create Post Form -->

    <form method ="post" > 
    @csrf
    
    <div class="form-group">
        <label >البريد الالكتروني</label>
        <input type="email" class="form-control" value= "{{Session::get('employee_login_email')}}" name="email" placeholder="name@gmail.com" >
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
@endsection
