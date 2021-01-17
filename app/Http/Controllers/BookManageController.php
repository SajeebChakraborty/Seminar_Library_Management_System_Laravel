<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Hash;
use \App\Mail\BookOrderMail;
use \App\Mail\BookReceiveMail;
use Illuminate\Support\Facades\Redirect;

class BookManageController extends Controller
{
    public function add_shelf()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        return view('admin.add_shelf');



    }
    public function add_shelf_process(Request $req)
    {


        $data=array();

        $data['Shelf_ID']=$req->shelf_id;
        $data['Shelf_Location']=$req->shelf_location;

        $unique_shelf=DB::table('shelfs')->where('Shelf_ID',$req->shelf_id)->count();

        if($unique_shelf > 0){

            $notification = array(
                'message' => 'Shelf ID already exits !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);


        }

        $add_shelf=DB::table('shelfs')->Insert($data);

        if($add_shelf)
        {
            $notification = array(
                'message' => 'Successfully added shelf !',
                'alert-type' => 'success'
            );
         
           return back()->with($notification);
    


        }

    }
    public function update_shelf()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $shelf=DB::table('shelfs')->get();

        return view('admin.update_shelf',compact('shelf'));


    }
    public function edit_shelf($id)
    {


        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $shelf=DB::table('shelfs')->where('id',$id)->first();

        $books_amount=DB::table('books')->where('Shelf_ID',$shelf->Shelf_ID)->sum('amounts');

        $shelf=DB::table('shelfs')->where('id',$id)->get();


        return view('admin.edit_shelf',compact('shelf','books_amount'));



    }
    public function edit_shelf_process(Request $req,$id)
    {

        $data=array();

        $data['Shelf_Location']=$req->shelf_location;

        $update_shelf=DB::table('shelfs')->where('id',$id)->update($data);

        if($update_shelf)
        {

            $notification = array(
                'message' => 'Successfully updated shelf !',
                'alert-type' => 'success'
            );
         
           return back()->with($notification);


        }
        else{

            $notification = array(
                'message' => 'Already same location exits !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);


        }


    }
    public function remove_shelf()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $shelf=DB::table('shelfs')->get();


        return view('admin.remove_shelf',compact('shelf'));



    }
    public function remove_shelf_process($id)
    {

        $shelf=DB::table('shelfs')->where('id',$id)->first();

        $books_amount=DB::table('books')->where('Shelf_ID',$shelf->Shelf_ID)->sum('amounts');

        if($books_amount > 0)
        {

            $notification = array(
                'message' => 'Already some books exits in this self !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);


        }

        $books_shelf=DB::table('records')->where('Shelf_ID',$shelf->Shelf_ID)->count();

        if($books_shelf > 0)
        {


            $notification = array(
                'message' => 'Already some books of the self exits in students  !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);



        }

        $delete_shelf=DB::table('shelfs')->where('id',$id)->delete();

        if($delete_shelf)
        {

            $notification = array(
                'message' => 'Successfully deleted shelf !',
                'alert-type' => 'success'
            );
         
           return back()->with($notification);


        }


    }
    public function add_book()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $shelf=DB::table('shelfs')->get();

        return view('admin.add_book',compact('shelf'));





    }
    public function add_book_process(Request $req)
    {

        if($req->amounts <=0)
        {

            $notification = array(
                'message' => 'Amounts of Book is not Negative or Zero !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);


        }

        $check_book=DB::table('books')->where('Book_ID',$req->book_id)->count();

        if($check_book > 0)
        {

            $notification = array(
                'message' => 'Book ID already exits !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);


        }

        $data=array();
        $data['Book_ID']=$req->book_id;
        $data['Book_Name']=$req->book_name;
        $data['Writer_Name']=$req->writer_name;
        $data['Catagory']=$req->catagory;
        $data['Shelf_ID']=$req->shelf_id;
        $data['Amounts']=$req->amounts;

        $add_book=DB::table('books')->Insert($data);

        if($add_book)
        {

            $notification = array(
                'message' => 'Sucessfully Added Book',
                'alert-type' => 'success'
            );
         
           return back()->with($notification);


        }
        

    }
    public function update_book()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $books=DB::table('books')->get();

        return view('admin.update_books',compact('books'));



    }
    public function edit_book($id)
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $books=DB::table('books')->where('id',$id)->get();

        $shelf=DB::table('shelfs')->get();

        return view('admin.edit_books',compact('books','shelf'));




    }
    public function edit_book_process(Request $req,$id)
    {

        if($req->amounts < 0)
        {

            $notification = array(
                'message' => 'Amounts of Book is not Negative !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);


        }
        
        $data=array();

        $data['Shelf_ID']=$req->shelf_id;
        $data['Amounts']=$req->amounts;

        $update_book=DB::table('books')->where('id',$id)->update($data);

        if($update_book)
        {

            $notification = array(
                'message' => 'Successfully updated book !',
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
    public function remove_book()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $books=DB::table('books')->get();


        return view('admin.remove_books',compact('books'));



    }
    public function remove_book_process($id)
    {

        $book=DB::table('books')->where('id',$id)->first();

        $student_copy=DB::table('records')->where('Book_ID',$book->Book_ID)
        ->where('Submission_Status','No')
        ->count();

        if($student_copy > 0)
        {

            $notification = array(
                'message' => 'Student has already this book !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);



        }

        $book=DB::table('books')->where('id',$id)->first();


        if($book->Amounts > 0)
        {


            $notification = array(
                'message' => 'Shelf has already this book !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);



        }


        $delete_book=DB::table('books')->where('id',$id)->delete();

        if($delete_book)
        {

            $notification = array(
                'message' => 'Successfully deleted book !',
                'alert-type' => 'success'
            );
         
           return back()->with($notification);



        }



    }
    public function book_order()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $book_order=DB::table('records')->get();


        return view('admin.book_order_show',compact('book_order'));



    }
    public function add_order()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }


        return view('admin.add_order');



    }
    public function add_order_process(Request $req)
    {

        $student=DB::table('students')->where('Verify','Approve')->where('Student_ID',$req->student_id)->count();

        if(! $student)
        {

            $notification = array(
                'message' => 'Wrong Student ID !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);


        }

        $book=DB::table('books')->where('Book_ID',$req->book_id)->count();

        if(! $book)
        {

            $notification = array(
                'message' => 'Wrong Book ID !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);


        }

        $again_order=DB::table('records')->where('Book_ID',$req->book_id)
        ->where('Student_ID',$req->student_id)
        ->where('Submission_Status','No')
        ->count();

        if($again_order)
        {

            $notification = array(
                'message' => 'Sorry, This book is already ordered for same student !',
                'alert-type' => 'error'
            );
         
           return back()->with($notification);


        }
        
        $data=array();

        $data['Book_ID']=$req->book_id;
        $data['Student_ID']=$req->student_id;

        date_default_timezone_set("Asia/Dhaka");

        $today=date("d-m-Y");

        $data['Collection_Date']=$today;
        
        $data['Submission_Status']="No";

        $data['Submission_Date']="N/A";

        $data['Read']="No";

        $expiredDate = date('d-m-Y', strtotime("+6 months", strtotime($today)));

        $data['Expired_Date']=$expiredDate;

        $add_order=DB::table('records')->Insert($data);

        if($add_order)
        {

            $book=DB::table('books')->where('Book_ID',$req->book_id)->first();

            $data2=array();

            $data2['Amounts']=$book->Amounts - 1;

            $remove_book=DB::table('books')->where('Book_ID',$req->book_id)->update($data2);

            if($remove_book)
            {

                $student=DB::table('students')->where('Student_ID',$req->student_id)->first();

                $details_order = [
                    'title' => 'Seminar Library Management System',
                    'body' => 'Book ID  - "'.$req->book_id.'" ordered for you. Expired Date - .'.$expiredDate
                ];
               
                \Mail::to($student->Email)->send(new \App\Mail\BookOrderMail($details_order));


                $notification = array(
                    'message' => 'Successfully order completed !',
                    'alert-type' => 'success'
                );
             
               return back()->with($notification);



            }


        }

    }
    public function book_received()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $book_order=DB::table('records')->where('Submission_Status','No')->get();


        return view('admin.book_received',compact('book_order'));



    }
    public function book_received_process($id)
    {

        date_default_timezone_set("Asia/Dhaka");

        $today=date("d-m-Y");

        $data=array();

        $data['Submission_Date']=$today;

        $data['Submission_Status']="Yes";

        $update_status=DB::table('records')->where('id',$id)->update($data);

        if($update_status)
        {

          
            $book=DB::table('records')->where('id',$id)->first();

            $book2=DB::table('books')->where('Book_ID',$book->Book_ID)->first();

            $data2=array();

            $data2['Amounts']=$book2->Amounts + 1;

            $add_book=DB::table('books')->where('Book_ID',$book2->Book_ID)->update($data2);
         

            $student=DB::table('students')->where('Verify','Approve')->where('Student_ID',$book->Student_ID)->first();


            $details_received = [
                'title' => 'Seminar Library Management System',
                'body' => 'Book ID  - "'.$book->Book_ID.'" received by Admin. '
            ];
           
            \Mail::to($student->Email)->send(new \App\Mail\BookReceiveMail($details_received));

            $notification = array(
                'message' => 'Successfully received !',
                'alert-type' => 'success'
            );
         
           return back()->with($notification);

        }


    }
    public function programming_book()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }


        $book=DB::table('books')->where('Catagory','Programming')->get();

     


        return view('admin.programming_book',compact('book'));


    }
    public function networking_book()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }


        $book=DB::table('books')->where('Catagory','Networking')->get();

     


        return view('admin.networking_book',compact('book'));


    }
    public function database_book()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }


        $book=DB::table('books')->where('Catagory','Database')->get();

     


        return view('admin.database_book',compact('book'));


    }
    public function electronics_book()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }


        $book=DB::table('books')->where('Catagory','Electronics')->get();

     


        return view('admin.electronics_book',compact('book'));


    }
    public function software_book()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }


        $book=DB::table('books')->where('Catagory','Software Development')->get();

     


        return view('admin.software_book',compact('book'));


    }
    public function book_details($id)
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $book=DB::table('books')->where('id',$id)->first();

        $records=DB::table('records')->where('Book_ID',$book->Book_ID)
        ->where('Submission_Status','No')
        ->get();

        $book=DB::table('books')->where('id',$id)->get();



        return view('admin.book_details',compact('book','records'));



    }
    public function shelf_list()
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $shelf=DB::table('shelfs')->get();


        return view('admin.shelf_list',compact('shelf'));



    }
    public function programming_book_student()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->get();


        $book=DB::table('books')->where('Catagory','Programming')->get();

     


        return view('student.programming_book',compact('student','book'));


    }
    public function networking_book_student()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->get();


        $book=DB::table('books')->where('Catagory','Networking')->get();

     


        return view('student.networking_book',compact('student','book'));


    }
    public function database_book_student()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->get();


        $book=DB::table('books')->where('Catagory','Database')->get();

     


        return view('student.database_book',compact('student','book'));


    }
    public function electronics_book_student()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->get();


        $book=DB::table('books')->where('Catagory','Electronics')->get();

     


        return view('student.electronics_book',compact('student','book'));


    }
    public function software_book_student()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->get();


        $book=DB::table('books')->where('Catagory','Software Development')->get();

     


        return view('student.software_book',compact('student','book'));


    }
    public function shelf_list_student()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->get();


        $shelf=DB::table('shelfs')->get();


        return view('student.shelf_list',compact('student','shelf'));




    }
    public function shelf_details($id)
    {

        $admin_status=Session::get('Admin_ID');
        
        if(! $admin_status)
        {

            return Redirect::to('/admin');


        }

        $shelf=DB::table('shelfs')->where('id',$id)->first();


        $book=DB::table('books')->where('Shelf_ID',$shelf->Shelf_ID)->get();


        $shelf=DB::table('shelfs')->where('id',$id)->get();


        return view('admin.shelf_details',compact('book','shelf'));



    }
    public function shelf_details_student($id)
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }
        $student=DB::table('students')->where('id',$student_status)->get();

        $shelf=DB::table('shelfs')->where('id',$id)->first();


        $book=DB::table('books')->where('Shelf_ID',$shelf->Shelf_ID)->get();


        $shelf=DB::table('shelfs')->where('id',$id)->get();


        return view('student.shelf_details',compact('student','book','shelf'));
        


    }

    public function student_notification()
    {

        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }

        $student=DB::table('students')->where('id',$student_status)->first();

        $records=DB::table('records')->where('Student_ID',$student->Student_ID)
        ->where('Submission_Status','No')
        ->where('Read','No')
        ->get();
    
    
        date_default_timezone_set("Asia/Dhaka");
        $today=date("d-m-Y");


    


        

        $data=array();


        $data['Read']="Yes";




        $update_read=DB::table('records')->where('Student_ID',$student->Student_ID)
        ->where('Read','No')
        ->update($data);

        $student=DB::table('students')->where('id',$student_status)->get();



        return view('student.notification',compact('student','records'));





    }

    public function student_notify_count()
    {

        
        $student_status=Session::get('Student_ID');

        if(! $student_status)
        {

            return Redirect::to('/');



        }

        date_default_timezone_set("Asia/Dhaka");
        $today=date("d-m-Y");

        $today = strtotime($today); 

        $student=DB::table('students')->where('id',$student_status)->first();

        
        $records=DB::table('records')->where('Student_ID',$student->Student_ID)
        ->where('Submission_Status','No')
        ->where('Read','No')
        ->get();

        $count=0;

        foreach($records as $row)
        {

            $Expired_Date = strtotime($row->Expired_Date);
            
            if($Expired_Date <= $today)
            {


                $count++;



            }



        }

       
        
        /*

        $records=DB::table('records')->where('Student_ID',$student->Student_ID)
        ->where('Submission_Status','No')
        ->where('Read','No')->where('Expired_Date','<=',$today)
        ->count();


        */

        if($count == 0)
        {

            return null;


        }



        return $count;



    }
}

