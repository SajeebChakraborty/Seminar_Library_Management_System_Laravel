<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\ForgetPassEmail;
use Session;
use DB;
use Hash;
use Illuminate\Support\Facades\Redirect;


class AdminAuthController extends Controller
{
    public function sign_in_show()
    {

        return view('admin.sign_in');


    }
    public function forget_password()
    {

        return view('admin.forget_password');



    }
    public function forget_password_process(Request $req)
    {
        $email=DB::table('admins')->where('Email',$req->email)->count();

        if($email == 0)
        {

            $notification = array(
                'message' => 'Email is not registered !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }
        $auto_number=rand(10000000,9999999999);

        Session::put('Admin_Email',$req->email);

        Session::put('link_number_admin',$auto_number);

        $details2 = [
            'title' => 'Seminar Library Management System',
            'body' => 'Please quickly change your password by link (Between 30 Minutes) - http://localhost:8000/admin/recover-password/'.$auto_number
        ];
       
        \Mail::to($req->email)->send(new \App\Mail\ForgetPassEmail($details2));

        $notification = array(
            'message' => 'Successfully Email Sent ! Check your Email',
            'alert-type' => 'info'
        );

        return back()->with($notification);


    }
    public function recover_password()
    {

        return view('admin.change_password');        


    }
    public function recover_password_process(Request $req)
    {

        $email=Session::get('Admin_Email');

        $student=DB::table('admins')->where('Email',$email)->first();

      

            if($req->new_password == $req->confirm_password)
            {

                $data=array();
                $pass=Hash::make($req->new_password);
                $data['Password']=$pass;
                $update_password=DB::table('admins')->where('Email',$email)->update($data);

                if($update_password)
                {

                    $notification = array(
                        'mess2' => 'Sucessfully Change Password !',
                        
                    );    
                    Session::put('link_number_admin',null);            
                    return Redirect::to('/admin')->with($notification);

                }
                else{

                    $notification = array(
                        'message' => 'Time is over !',
                        'alert-type' => 'error'
                    );
            
                    return back()->with($notification);


                }
               

            }
            else{

                $notification = array(
                    'message' => 'Password do not match !',
                    'alert-type' => 'error'
                );
        
                return back()->with($notification);



            }


      



    }
    public function sign_in_process(Request $req)
    {

        $email = DB::table('admins')->where('Email',$req->email)->count();

        $username = DB::table('admins')->where('Username',$req->email)->count();

        if($email > 0 || $username > 0)
        {

                if($email > 0)
                {

                    $admin = DB::table('admins')->where('Email',$req->email)->first();

                                    


                }     
                if($username > 0)
                {

                    $admin = DB::table('admins')->where('Username',$req->email)->first();

                    


                }

                if(Hash::check($req->password,$admin->Password) || $req->password==$admin->Password)
                {

                   
                    Session::put('Admin_ID',$admin->id);
                   
                    return Redirect::to('/admin/dashboard');           


                }
                else{

                    $notification = array(
                        'message' => 'Wrong Password !',
                        'alert-type' => 'error'
                    );
                 
                   return back()->with($notification);
        
                

                }


        }
        else{

            $notification = array(
                'message' => 'Wrong Username or Email !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }


    }
    public function dashboard()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $total_student=DB::table('students')->where('Verify','Approve')->count();
        $total_book=DB::table('books')->sum('Amounts');
        $total_shelf=DB::table('shelfs')->count();
        $total_order=DB::table('records')->where('Submission_Status','No')->count();

        $records=DB::table('records')->where('Submission_Status','No')->orderBy('id','desc')->paginate(3);


        return view('admin.dashboard',compact('total_student','total_book','total_shelf','total_order','records'));



    }
    public function log_out()
    {

        Session::put('Admin_ID',null);

        return Redirect::to('/admin');

    }
    public function student_request()
    {

        $admin_status=Session::get('Admin_ID');

        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $student=DB::table('students')->where('Verify','Panding')->get();

        return view('admin.student_request',compact('student'));


    }
    public function change_password()
    {

        $admin_status=Session::get('Admin_ID');

        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        return view('admin.change_auth_password');



    }
    public function change_password_process(Request $req)
    {

        $admin=Session::get('Admin_ID');

        $admin_account=DB::table('admins')->where('id',$admin)->first();


        if(Hash::check($req->old_password,$admin_account->Password) || $req->old_password==$admin_account->Password)
        {

            if($req->new_password==$req->confirm_password)
            {

                $req->new_password=Hash::make($req->new_password);

                $data=array();

                $data['Password']=$req->new_password;

                $update_password=DB::table('admins')->where('id',$admin)->update($data);

                if($update_password)
                {


                    $notification = array(
                        'message' => 'Successfully change password !',
                        'alert-type' => 'success'
                    );
            
                    return back()->with($notification);
    



                }
                else
                {

                    $notification = array(
                        'message' => 'Same password is exits !',
                        'alert-type' => 'error'
                    );
            
                    return back()->with($notification);
    



                }

            }
            else
            {

                $notification = array(
                    'message' => 'Password do not match !',
                    'alert-type' => 'error'
                );
        
                return back()->with($notification);



            }



        }
        else
        {

            $notification = array(
                'message' => 'Wrong Old Password !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);



        }




    }
    public function edit_info()
    {

        $admin_status=Session::get('Admin_ID');

        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $admin=DB::table('admins')->where('id',$admin_status)->get();

        return view('admin.edit_info',compact('admin'));        



    }
    public function update_info_process(Request $req)
    {

        $data=array();

        $admin_status=Session::get('Admin_ID');

        $data['Username']=$req->username;

        $check_username=DB::table('admins')->where('Username',$req->username)->count();

        if($check_username > 0)
        {

            $notification = array(
                'message' => 'Username already exits !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }

        $update_info=DB::table('admins')->where('id',$admin_status)->update($data);

        if($update_info)
        {

            $notification = array(
                'message' => 'Successfully updated info !',
                'alert-type' => 'success'
            );
    
            return back()->with($notification);



        }



    }
}
