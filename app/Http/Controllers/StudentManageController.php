<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use \App\Mail\ApproveMail;
use \App\Mail\RemoveStudentMail;
use \App\Mail\RejectMail;
use Hash;

class StudentManageController extends Controller
{
    public function student_approve($id)
    {

        $data=array();

        $data['Verify']="Approve";

        $student=DB::table('students')->where('id',$id)->first();

        $approve=DB::table('students')->where('id',$id)->update($data);

        if($approve)
        {

            $details_approve = [
                'title' => 'Seminar Library Management System',
                'body' => 'Congrats! Your account is approved.Please login now...'
            ];
           
            \Mail::to($student->Email)->send(new \App\Mail\ApproveMail($details_approve));

            $notification = array(
                'message' => 'Successfully Approved !',
                'alert-type' => 'success'
            );
    
            return back()->with($notification);


        }



    }
    public function student_reject($id)
    {

       
        $student=DB::table('students')->where('id',$id)->first();

       
        $reject=DB::table('students')->where('id',$id)->delete();



        if($reject)
        {

            $details_reject = [
                'title' => 'Seminar Library Management System',
                'body' => 'Opps! Your account is rejected.Please try again...'
            ];
           
            \Mail::to($student->Email)->send(new \App\Mail\RejectMail($details_reject));


            $notification = array(
                'message' => 'Successfully Rejected !',
                'alert-type' => 'success'
            );
    
            return back()->with($notification);


        }



    }
    public function remove_student()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $student=DB::table('students')->where('Verify','Approve')->get();

        return view('admin.remove_student',compact('student'));


    }
    public function remove_student_process($id)
    {

        $student=DB::table('students')->where('id',$id)->where('Verify','Approve')->first();

        $record=DB::table('records')->where('Student_ID',$student->Student_ID)
        ->where('Submission_Status','No')
        ->count();


        if($record > 0)
        {

            
            $notification = array(
                'message' => 'This student has already some books !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);



        }

        $details_remove = [
            'title' => 'Seminar Library Management System',
            'body' => 'Opps! Your account is deleted by Admin'
        ];
       
        \Mail::to($student->Email)->send(new \App\Mail\RemoveStudentMail($details_remove));

        $remove_student=DB::table('students')->where('id',$id)->delete();


        if($remove_student)
        {

            $notification = array(
                'message' => 'Successfully Removed Student !',
                'alert-type' => 'success'
            );
    
            return back()->with($notification);




        }



    }
    public function student_info()
    {

        
        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $student=DB::table('students')->where('Verify','Approve')->get();

        return view('admin.student_info',compact('student'));


    }
    public function student_details($id)
    {


        $student=DB::table('students')->where('Verify','Approve')->where('id',$id)->first();

        $book=DB::table('records')->where('Student_ID',$student->Student_ID)
        ->where('Submission_Status','No')
        ->get();

        $student=DB::table('students')->where('Verify','Approve')->where('id',$id)->get();


        return view('admin.student_details',compact('student','book'));


    }
    public function notification()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $notification=DB::table('students')->where('Verify','Panding')
        ->where('Read','No')
        ->get();

        $data=array();


        $data['Read']="Yes";


        $update=DB::table('students')->where('Read','No')->update($data);

        return view('admin.notification',compact('notification'));


    }
    public function notify_count()
    {


        $student=DB::table('students')->where('Verify','Panding')->where('Read','No')->count();

        if($student == 0)
        {

            return null;
            

        }

        return $student;




    }
    public function my_collection()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->first();


        $collection=DB::table('records')->where('Student_ID',$student->Student_ID)
        ->where('Submission_Status','No')
        ->get();

        $student=DB::table('students')->where('id',$student_status)->get();


        return view('student.my_collection',compact('student','collection'));




    }
    public function my_submission()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->first();


        $submission=DB::table('records')->where('Student_ID',$student->Student_ID)
        ->where('Submission_Status','Yes')
        ->get();

        $student=DB::table('students')->where('id',$student_status)->get();


        return view('student.my_submission',compact('student','submission'));




    }
 
}
