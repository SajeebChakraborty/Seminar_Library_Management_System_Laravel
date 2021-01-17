<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Hash;
use \App\Mail\VerifyEmail;
use \App\Mail\ForgetPassEmail;
use Illuminate\Support\Facades\Redirect;

class StudentAuthController extends Controller
{
    public function sign_up_show()
    {

        return view('student.sign_up_page');


    }
    public function sign_up_process(Request $req)
    {

        $data=array();

        $data['Name']=$req->name;
        $data['Student_ID']=$req->student_id;
        $data['Session']=$req->session;
        $data['Contact_no']=$req->contact;
        $data['Email']=$req->email;
        $data['Username']=$req->username;
        $pass=Hash::make($req->password);
        $data['Password']=$pass;
        $data['Read']="No";

        $email_check=DB::table('students')->where('Email',$req->email)->count();

        $username_check=DB::table('students')->where('Username',$req->username)->count();

        $student_id_check=DB::table('students')->where('Student_ID',$req->student_id)->count();

        if($student_id_check > 0)
        {

            $notification = array(
                'message' => 'Student ID already registered !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }
        if($username_check > 0)
        {

            $notification = array(
                'message' => 'Username already exists !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }
        if($email_check > 0)
        {

            $notification = array(
                'message' => 'Email already registered !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }

        $email_code=rand(1000,9999);
        $data['Confirmation_Code']=$email_code;

        $data['Verify']="No";

        $image=$req->picture;
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/image/'.$req->student_id. '/';
        $image_url=$upload_path.$image_full_name;
        //file upload in project folder
         $upload=$image->move($upload_path,$image_full_name);
        //file url upload in database
        $data['image']=$image_url;

        if($req->password!=$req->confirm_password)
        {

            $notification = array(
                'message' => 'Password do not match !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }

        $register=DB::table('students')->Insert($data);

        if($register)
        {

            $id=DB::getPdo()->lastInsertId();

            $details = [
                'title' => 'Seminar Library Management System',
                'body' => 'Your verification code - '.$email_code
            ];
           
            \Mail::to($req->email)->send(new \App\Mail\VerifyEmail($details));

            return Redirect::to('student/verify-email/'.$id);


        }



    }
    public function verify_email($id)
    {

       

        Session::put('Student_id',$id);
        


        return view('student.verify_email');



    }
    public function confirm_email(Request $req)
    {

        $id=Session::get('Student_id');

        $student=DB::table('students')->where('id',$id)->first();

        if($req->code == $student->Confirmation_Code)
        {

            $data=array();
            $data['Verify']="Panding";

            $update_status=DB::table('students')->where('id',$id)->update($data);
            Session::put('Student_id',null);

            $notification = array(
                'mess' => 'account is created !',
                
            );
    
            

            return Redirect::to('/')->with($notification);


        }
        else{

            $notification = array(
                'message' => 'Invalid Verification Code !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);

        }



    }
    public function forget_password()
    {

        return view('student.forget_password');


    }
    public function forget_password_process(Request $req)
    {

        $email=DB::table('students')->where('Email',$req->email)->count();

        if($email == 0)
        {

            $notification = array(
                'message' => 'Email is not registered !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }
        $auto_number=rand(10000000,9999999999);

        Session::put('Student_Email',$req->email);

        Session::put('link_number',$auto_number);

        $details2 = [
            'title' => 'Seminar Library Management System',
            'body' => 'Please quickly change your password by link (Between 30 Minutes) - http://localhost:8000/student/recover-password/'.$auto_number
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

        return view('student.change_password');

    }
    public function recover_password_process(Request $req)
    {

        $email=Session::get('Student_Email');

        $student=DB::table('students')->where('Email',$email)->first();


            if($req->new_password == $req->confirm_password)
            {

                $data=array();
                $pass=Hash::make($req->new_password);
                $data['Password']=$pass;
                $update_password=DB::table('students')->where('Email',$email)->update($data);

                if($update_password)
                {

                    $notification = array(
                        'mess2' => 'Sucessfully Change Password !',
                        
                    );    
                    Session::put('link_number',null);            
                    return Redirect::to('/')->with($notification);

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

        $email = DB::table('students')->where('Email',$req->email)->count();

        $username = DB::table('students')->where('Username',$req->email)->count();

        if($email > 0 || $username > 0)
        {

                if($email > 0)
                {

                    $student = DB::table('students')->where('Email',$req->email)->first();

                                    


                }     
                if($username > 0)
                {

                    $student = DB::table('students')->where('Username',$req->email)->first();

                    


                }

                if(Hash::check($req->password,$student->Password))
                {

                    if($student->Verify == "Panding")
                    {

                        $notification = array(
                            'mess3' => 'Not Approve by Admin !',
                            
                        );
                        
                        return back()->with($notification);


                    }
                    else if($student->Verify == "No")
                    {

                        $id = $student->id;

                        $email_code=rand(1000,9999);

                        $data=array();
                        $data['Confirmation_Code']=$email_code;

                        $update_code=DB::table('students')->where('id',$id)->update($data);

                        $details = [
                            'title' => 'Seminar Library Management System',
                            'body' => 'Your verification code - '.$email_code
                        ];
                       
                        \Mail::to($req->email)->send(new \App\Mail\VerifyEmail($details));
                       
                        return Redirect::to('student/verify-email/'.$id);
            


                    }
                    else{

                        Session::put('Student_ID',$student->id);
                        return Redirect::to('/student/dashboard');


                    }

                    


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

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->get();

        return view('student.dashboard',compact('student'));



    }
    public function log_out()
    {


        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }

        Session::put('Student_ID',null);

        return Redirect::to('/');



    }
    public function change_password()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }

        $student=DB::table('students')->where('id',$student_status)->get();



        return view('student.change_password_page',compact('student'));


    }
    public function change_password_process(Request $req)
    {

        $student=Session::get('Student_ID');

        $student_account=DB::table('students')->where('id',$student)->first();


        if(Hash::check($req->old_password,$student_account->Password))
        {

            if($req->new_password==$req->confirm_password)
            {

                $req->new_password=Hash::make($req->new_password);

                $data=array();

                $data['Password']=$req->new_password;

                $update_password=DB::table('students')->where('id',$student)->update($data);

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


        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }

        $student=DB::table('students')->where('id',$student_status)->get();


        
        return view('student.edit_info',compact('student'));



    }

    public function edit_info_process(Request $req,$id)
    {

        $username=$req->username;

        $check_username=DB::table('students')->where('Username',$username)
        ->where('id','<>',$id)
        ->count();


        if($check_username > 0)
        {

            $notification = array(
                'message' => 'Username already exits !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);




        }

        
        $data=array();

        $data['Username']=$req->username;

        $data['Contact_no']=$req->contact;

        $data['Email']=$req->email;

        $update_info=DB::table('students')->where('id',$id)
        ->update($data);


        if($update_info)
        {

            $notification = array(
                'message' => 'Successfully updated info !',
                'alert-type' => 'success'
            );
    
            return back()->with($notification);



        }
        else{

            $notification = array(
                'message' => 'Same data already exits !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);



        }



    }


}
