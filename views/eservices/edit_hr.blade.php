@extends('eservices_layout.layout')

@section('content')

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


   
<!-- HR -->
@if (  $user_loged_in -> slug == 'hr')

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
    @foreach ( $employee_info as $em)
        <!-- Activate account -->
        @if( ($em -> slug == 'employee') and ($em -> status_account == 0) )
        <tbody>
            <tr>
                <th>-</th>
                <td>{{$em-> name}}</td>
                <td>{{$em-> phone}}</td>
                <td>{{$em-> national_id}}</td>
                <td> 
                    <a href="/account_active/{{$em-> id}}"> <i style="color:green;"class="fa fa-user" aria-hidden="true"> تفعيل</i> </a>
                </td>
            </tr>
        </tbody>
        @endif
    @endforeach
</table> 
@endif

<hr>
<!-- HR or HR Maneger -->
@if (  ($user_loged_in -> slug == 'hr') )
    <div class="header_1"> 
        <h4 >  طلبات بطاقات الموظفين   <a align="left" href="/export_card_request_hr/">   <i style="color:black;" class="fa fa-file-excel-o"></i> </a></h4> 
        <h6> ( تفعيل البطاقات ) </h6> 
    </div> 
@endif

@if (  $user_loged_in -> slug == 'hr')
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
        @foreach ( $employee_info as $em)
            <!-- Card request approve/reject -->
            @if( ($em -> slug == 'employee') and ($em -> status_account == 1) and ($em -> status_card_requeste == 1) ) 
                <tbody>
                    <tr>
                        <td>-</td>
                        <td>{{$em-> name}}</td>
                        <td>{{$em-> department}}</td>
                        <td>{{$em-> phone}}</td>
                        <td>{{$em-> email}}</td>
                        <td>{{$em-> national_id}}</td>
                        <td> 
                        <!-- To maneger -->
                            <a href="/request_card/{{$em-> id}}/2">  <i style="color:green;" class="fa fa-check"></i> </a>  
                            &nbsp
                        <!-- To Employee (to re request) -->
                            <a href="/request_card/{{$em-> id}}/0"> <i style="color:red;" class="fa fa-times" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                </tbody>
            @endif
        @endforeach         
    </table> 


 <!-- HR Maneger--> 
@elseif( $user_loged_in -> slug == 'hr_maneger' )
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

    @foreach ( $employee_info as $em)
             <!-- Card request approve/reject -->
        @if( ($em -> slug == 'employee') and ($em -> status_card_requeste == 2) )
            <tbody>
                <tr>
                    <td>-</td>
                    <td>{{$em-> name}}</td>
                    <td>{{$em-> department}}</td>
                    <td>{{$em-> phone}}</td>
                    <td>{{$em-> email}}</td>
                    <td>{{$em-> national_id}}</td>
                    <td> 
                    <!-- To maneger -->
                        <a href="/request_card_hr_manager/{{$em-> id}}/3"> <i style="color:green;" class="fa fa-check"></i> </a>  
                        &nbsp&nbsp
                    <!-- To Employee (to re request) -->
                        <a href="/request_card_hr_manager/{{$em-> id}}/0"> <i style="color:red;" class="fa fa-times" aria-hidden="true"></i> </a>
                    </td>
                </tr>
            </tbody>            
        @endif
    @endforeach
</table> 

@endif
  




</div>
@endsection