<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\Models\Employee;
use App\Exports\UsersExport;
use App\Exports\HrExport;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;


class MainController extends Controller
{

     public function index(){
        return 'This is the laravel project';

    }

//-------------------------------------------------

    public function login()
    {
        return view('eservices.login');
    }


    public function login_post(Request $request)
    {

        $request->validate([
            
            'email' => 'required|exists:employees,email',
            'password' => 'required',
        
            ],

            [
            'email.required'    => 'فضلا البريد الالكتروني الزامي ',
            'password.required'    => 'فضلا  الرقم السري  الزامي ',
            'exists' => 'فضلا يرجى التحقق من التسجيل  مسبقاً', 
            ]

        );

        $checkLogin = DB::table('employees')->where([ 'email'=>$request->email,'password'=>$request->password])->first();

        if (null === $checkLogin){
            // invalid password;
            return redirect()->route('login_user')->with('message' , 'يرجى التحقق من البريد الالكتروني او كلمة المرور');               
        }
        else
        {
            Session::put('employee_login_email',$request->email);
        
            // account statues 
            $status_account = $checkLogin->status_account ;
            if ( $status_account === 0)
                // unactive message & refresh page.
                return redirect()->route('login_user')->with('message' , 'لم يتم تفعيل حسابك من قبل موظفي الادارة البشرية');   

                 // account active, redirect
                return redirect()->route('home');  

          }



    }


//-------------------------------------------------

    public function register()
    {
        return view('eservices.register');
    }

 
    public function register_post(Request $request)
    {

// Session store
        Session::put('name',$request->name);
        Session::put('email',$request->email);
        Session::put('phone',$request->phone);
        Session::put('national_id',$request->national_id);

        
        if ( ! Employee::isSaudi($request->national_id) ){
            return redirect()->route('new_user')->with('message' , 'يرجى التحقق من الهوية الوطنية');               

        }else 
        
        {

        $request->validate([

            'name' => 'required|max:255|string',
            'email' => 'required|email|max:255|regex:/(.*)@gmail\.com/i|unique:employees',
            'phone' =>  'required|numeric|digits:10',
            'national_id' => 'required|unique:employees',
            'password' => 'required|min:6',
            ],

            [
            'regex'    => ' @gmail.com يتم قبول فقط صيغة ',
            'name.required'    => 'فضلا الاسم الزامي ',
            'email.required'    => 'فضلا البريد الالكتروني الزامي ',
            'email.unique'    => 'فضلا البريد الالكتروني مسجل مسبقاً ',
            'phone.required'    => 'فضلا رقم الجوال الزامي ',
            'national_id.required'    => 'فضلا الهوية الوطنية الزامي ',
            'national_id.numeric'    => 'يرجى ادخال ارقام فقط في خانة الهوية الوطنية ',
            'national_id.digits'    => 'يرجى ادخال الهوية الوطنية ١٠ خانات   ',
            'password.required'    => 'فضلا الرقم السري الزامي ',
            'numeric'    => 'يرجى ادخال ارقام فقط في خانة رقم الجوال',
            'digits'    => ' رقم الجوال يتكون من ١٠ خانات   ',
            'email'    => 'فضلا ادخال الايميل بالشكل الصحيح ',
            'string'    => 'فضلا ادخال احرف فقط في خانة الاسم    ',
            'max'    => 'فضلا الحد الاعلى ٢٥٥ احرف على الاكثر ',
            'min'    => 'يرجى ادخال رقم سري ٦ خانات على الاقل ',
            'unique' => 'المستخدم مسجل مسبقاً',
            ],

        );

          //Data Insert into database
          $data =[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'national_id'=>$request->national_id,
            // 'password'=>bcrypt($request->password), TODO: encript pass
            'password'=>$request->password,
            'slug'=>'employee',
            'created_at'=>date("Y-m-d H:i:s"),
            'status_account'=>0,
            'status_card_requeste'=>0,
            'active_card'=>0,
 
        ];

        DB::table('employees')->insert($data);

        
        return redirect()->back()->with('message', ' تم التسجيل بنجاح ');
    }
    
    }


//-------------------------------------------------

    public function home()
    {

        $user_loged_in = DB::table('employees')->where('email' , Session::get('employee_login_email'))->first();

        $employee_info = DB::table('employees')->get();

        if( $user_loged_in->card_expire_date_at == null ){
            $card_not_expier = false ;
        }else{

            $date1 = Carbon::createFromFormat('Y-m-d H:i:s', $user_loged_in->card_expire_date_at);
            $date2 = Carbon::createFromFormat('Y-m-d H:i:s', date("Y-m-d H:i:s"));

            $card_not_expier = $date1->gt($date2); 
        }
       

        Session::put('employee_name',$user_loged_in->name);

        return view('eservices.home' , compact('employee_info' , 'user_loged_in' ,'card_not_expier' ));
       
     }


    public function home_post(Request $request)
    { 
        return view('eservices.home',compact('rows'));

    }

//-------------------------------------------------

    public function edit()
    {
        $employee_info = DB::table('employees')->where(['email'=>Session::get('employee_login_email')])->first();
        return view('eservices.edit' , compact('employee_info'));
    }

    public function edit_post(Request $request)
    { 
        $employee_info = DB::table('employees')->where(['email'=>Session::get('employee_login_email')])->first();
 
        
        Session::put('department' , $request->department );

        $request->validate([
            'department' => 'required|max:100|string',
            'image' => 'required|mimes:jpeg,bmp,png',
 
            ],

            [
            'required'    => 'فضلا الحقل الزامي ',
            'image.required'    => 'فضلا رفع صورة الزامي ',
            'mimes' => 'jpeg,bmp,png فضلا يسمح فقط بصور  ' ,
            'string'    => 'فضلا ادخال احرف فقط',
            'max'    => 'فضلا الحد الاعلى ١٠٠ احرف على الاكثر ',

            ],

        );

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/employees/', $filename);
        }
          //Data Insert into database
        DB::table('employees')
            ->where('email', Session::get('employee_login_email'))
            ->update(['department' => $request->department , 
                     'card_requested_at' => date("Y-m-d H:i:s"),
                     'employee_image' => $filename,
                     'status_card_requeste' => 1 ]);

 
        
        return redirect('home')->with('message', ' تم تقديم الطلب بنجاح ');


    }

    
//-------------------------------------------------

    public function edit_hr()
    {
        
        $user_loged_in = DB::table('employees')->where('email' , Session::get('employee_login_email'))->first();
        $employee_info = DB::table('employees')->get();

        return view('eservices.edit_hr' , compact('employee_info' , 'user_loged_in'));
    }


    public function account_active_hr($id)
    { 
        //Update  database
        DB::table('employees')
        ->where('id',$id)
        ->update(['status_account' => 1 , 
                 'activate_account_at' => date("Y-m-d H:i:s")
                  ]);

        // return redirect('edit_hr');
        return redirect('edit_hr')->with('message', ' تم التنفيذ بنجاح ');
    }  
    

// HR department can accept or reject the request
    public function request_card_hr($id , $status)
    { 
        
        //Update  database
        DB::table('employees')
        ->where('id',$id)
        ->update(['status_card_requeste' => $status ,
                'active_card' => $status ,
                ]);

        // return redirect('edit_hr');
        return redirect('edit_hr')->with('message', ' تم التنفيذ بنجاح ');
    }  


// HR_Manager department can accept or reject the request
    public function request_card_hr_manager($id , $status)
    { 
        //Update  database
        DB::table('employees')
        ->where('id',$id)
        ->update([
            'hr_maneger_approve_at'=> date("Y-m-d H:i:s") ,
            'card_expire_date_at'=> date('Y-m-d H:i:s', strtotime('+1 year', strtotime(date("Y-m-d H:i:s")))) ,
            'status_card_requeste' => $status , 
            'active_card' => $status , 
        ]);

        return redirect('edit_hr')->with('message', ' تم التنفيذ بنجاح ');
    }    

// export the requests data as excel sheet file
    public function export_verifying_account_hr()
    { 
        return Excel::download(new UsersExport, 'طلبات تفعيل حسابات الموظفين.xlsx');
    }

// export the requests data as excel sheet file
    public function export_card_request_hr()
    { 
        return Excel::download(new HrExport, 'طلبات البطاقات الموظفين.xlsx');
    }

// employee export the requests data as PDF format 
    public function export_employee_pdf_card()
    { 
        return Excel::download(new EmployeeExport, 'بياناتي.pdf');
    }

    
//-------------------------------------------------
    public function download_employee_pdf_card($id)
    {
        $user_loged_in = DB::table('employees')->where('id' ,$id)->first();

        return view('eservices.pdf_qr',compact('user_loged_in'));
        

    }
 

}



