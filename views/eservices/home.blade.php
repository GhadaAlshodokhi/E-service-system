@extends('eservices_layout.layout')

@section('content')

<style>

.header {
    background-color: #47879882;
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
    

<div class="container">
    <!-- Create Post Form -->
    <form method ="post" > 
        @csrf
        <div class="row" xstyle="border: solid 1px;">
            <!-- <div class="col-12 header">
                <h4 >  الشاشة الرئيسية  </h4>
            </div> -->

            <div class="col-12 " >

                        <!-- Employee Home -->
        @if( ($user_loged_in -> slug == 'employee') and ($user_loged_in -> status_account == 1) )
            <!-- New card request -->
            @if( ($user_loged_in -> status_card_requeste == 0)  )
              <a  href="edit" class="btn btn-info" >  تقديم الطلب على بطاقة  </a>      

            <!-- Card Expierd , request for a new one  -->
            @elseif( ($user_loged_in -> status_card_requeste != 0) and ( ($user_loged_in -> card_expire_date_at != null)) and ( !$card_not_expier ) )
                <a href="edit" class="btn btn-info" >  تقديم الطلب على بطاقة </a>
            
            <!-- Card approved by hr_maneger -->
            @elseif( ($user_loged_in -> active_card == 3) and ($user_loged_in -> status_card_requeste != 0) and ( $card_not_expier) )
                <a href="javascript: w=window.open('download_employee_pdf_card/{{$user_loged_in -> id}}'); w.print();" class="btn btn-info">  QR يحتوى على PDF طباعة البطاقة </a>

                <b>  <a href="/export_employee_pdf_card/" class="btn btn-info">    PDF تصدير البطاقة </a> </b>

        @endif 

        <!-- Hr Home -->
        @elseif( $user_loged_in -> slug == 'hr')
            <a href="/edit_hr/" class="btn btn-info" >  استعراض الطلبات</a>

        <!-- Hr Maneger Home -->
        @elseif( $user_loged_in -> slug == 'hr_maneger')
        <a href="/edit_hr/" class="btn btn-info" >  اعتماد الطلبات</a>

        @endif 
            </div>
        </div>
    </form>
 </div>

 @endsection