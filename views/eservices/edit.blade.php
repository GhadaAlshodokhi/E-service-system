@extends('eservices_layout.layout')

@section('content')

<div class ="content"> 
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

<form method ="post" enctype="multipart/form-data"> 
@csrf


<div class="form-group">
    <label for="text">الاسم</label>
    <input type="text" class="form-control" name="name" value= "{{$employee_info->name}}"  readonly disabled >
</div>

<div class="form-group">
    <label for="email">البريد الالكتروني</label>
    <input type="email" class="form-control" name="email" value= "{{$employee_info->email}}" readonly disabled>
</div>

<div class="form-group">
    <label for="department">  الادارة</label>
    <input type="department" class="form-control" name="department" value= "{{Session::get('department')}}" placeholder="الادارة" >
</div>

<div class="form-group">
    <label for="national_id">  الهوية الوطنية </label>
    <input type="national_id" class="form-control" name="national_id" value= "{{$employee_info->national_id}}" readonly disabled >
</div>

<div class="form-group">
    <label for="image"> صورة شخصية </label>
  <input type="file" id="image" name="image" accept="image/*">
</div>


<div >
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"> التسجيل</button>
</div>

</form>

</div>
@endsection