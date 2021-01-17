<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Sidebar Menu with sub-menu | CodingNepal</title> -->
    <title>Software Development Book</title>
  

   
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    
<link rel="stylesheet" href="{{ asset('css/style7.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="css/multilevel-dropdown.css">
  </head>
  <body>
 
  <script>
     @if(Session::has('mess'))

swal("Congrats!", "Successfully Approved !", "success");

@endif
@if(Session::has('mess2'))

swal("Congrats!", "Successfully Rejected !", "success");

@endif
	@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"

		switch(type){
			case 'info':
		         toastr.info("{{ Session::get('message') }}");
		         break;
	        case 'success':
	            toastr.success("{{ Session::get('message') }}");
	            break;
         	case 'warning':
	            toastr.warning("{{ Session::get('message') }}");
	            break;
	        case 'error':
		        toastr.error("{{ Session::get('message') }}");
		        break;
		}
	@endif
	$('.datepicker').datepicker({ 

startDate: new Date()

});
</script>

<div style=display:inline-flex>

<nav class="sidebar">
    <div class="user-info" style="display:inline-flex;margin:10px 10px 10px 10px">
            <div class="profile" style="padding: 15px 15px 15px 45px;">
            @foreach($student as $row)

              <img src="{{ asset($row->Image) }}" style="width:80px; height:80px; border-radius:50%;" alt="">
            </div>
            <div class="details" style="margin-top:25px">
              <p class="user-name" style="color:; margin-left:10px; font-size:20px;font-family: 'Pacifico', cursive;" >{{ $row->Name }}</p>
              @endforeach
            </div>
    </div>
<ul>
<li class=""><a href="{{ url('student/dashboard') }}"><i class="fas fa-tachometer-alt" style="margin-left: -10px;font-size:15px;"></i>&nbsp;&nbsp;Dashboard</span></li>
<li class=""><a href="{{ url('student/notification') }}"><i class="fas fa-bell" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Notification</span>
<span class="count" style="border-radius:50%; height:25px;width:25px;text-align:center; font-size:20px; border:none;margin-right:80px; padding-bottom:80px;color:yellow;"  id="student_notify_number">   </span>

</li>

<li class="active">
          <a href="#" class="feat-btn"><i class="fas fa-book-open" style="margin-left: -10px;font-size:13px;"></i>&nbsp;&nbsp;&nbsp;Book List
            <span class="fas fa-caret-down first"></span>
          </a>
          <ul class="feat-show">
<li><a href="{{ url('student/book-list/programming') }}">Programming</a></li>
<li><a href="{{ url('student/book-list/networking') }}">Networking</a></li>
<li><a href="{{ url('student/book-list/database') }}">Database</a></li>
<li><a href="{{ url('student/book-list/electronics') }}">Electronics</a></li>
<li><a href="{{ url('student/book-list/software-development') }}">Software Development</a></li>

</ul>
</li>

<li class=""><a href="{{ url('student/shelf-list') }}"><i class="fas fa-book" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Shelf List</span>
<li class=""><a href="{{ url('student/my-collection') }}"><i class="fas fa-book" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;My Collection</span></li>
<li class=""><a href="{{ url('student/my-submission') }}"><i class="fas fa-book" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;My Submission</span></li>



<li>
          <a href="#" class="serv-btn"><i class="fas fa-cog" style="margin-left: -10px;font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Settings
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
<li><a href="{{ url('student/edit-info') }}">Edit Info</a></li>
<li><a href="{{ url('student/change-password') }}">Change Password</a></li>

</ul>

</li>
<li class=""><a href="{{ url('student/log-out') }}"><i class="fas fa-sign-out-alt" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Log out</span></a></li>

</ul>
</nav>

    <div class="content" style="margin-left:310px;padding-top:120px; padding-right:50px;width:80%;">

              <h1 style="margin-top:-50px; padding-left:200px; padding-bottom:50px">Software Development Book</h1>


    <div class="container">

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Book ID</th>             
                <th>Book Name</th>
                <th>Writer Name</th>
                <th>Available (Shelf)</th>
                <th>Available (Students)</th>
                <th>Shelf ID</th>
                <th>Shelf Location</th>

            </tr>
        </thead>
        
        <tbody>
        <?php
             $count=1;
             ?>
            @foreach($book as $row)


            <tr>
            <td>{{ $count }}</td>
                <td>{{$row->Book_ID }}</td>
                <?php


                    $shelf_copy=DB::table('books')->where('Book_ID',$row->Book_ID)->first();

                    $student_copy=DB::table('records')->where('Book_ID',$row->Book_ID)
                    ->where('Submission_Status','No')->count();


                    $shelf=DB::table('shelfs')->where('Shelf_ID',$row->Shelf_ID)
                    ->first();


                ?>
               
          
               
                <td>{{ $row->Book_Name }}</td>
                <td>{{ $row->Writer_Name }}</td>
                <td>{{ $shelf_copy->Amounts }}</td>
                <td>{{ $student_copy }}</td>
                <td>{{ $row->Shelf_ID }}</td>
                <td>{{ $shelf->Shelf_Location }}</td>
                


            </tr>
            <?php

                $count++;

            ?>
            @endforeach
        </tbody>
    </table>
</div>
 
   
    </div>
</div>

    <script>
        
   $(document).ready( function () {
  var table = $('#dataTable').DataTable( {
      
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']]
  } )
} );

</script>
<script>
    
      $('.feat-btn').click(function(){
        $('nav ul .feat-show').toggleClass("show5");
        $('nav ul .first').toggleClass("rotate");
      });
      $('.extra-btn').click(function(){
        $('nav ul .extra-show').toggleClass("show2");
        $('nav ul .third').toggleClass("rotate");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });
      $('.shelf-btn').click(function(){
        $('nav ul .shelf-show').toggleClass("show3");
        $('nav ul .fourth').toggleClass("rotate");
      });
      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
    </script>
    
    
<script type="text/javascript">
        function loadDoc() {
        

                setInterval(function(){

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("student_notify_number").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "{{ Url('student/notify/count/') }}", true);
                xhttp.send();

                },3000);


        }
        loadDoc();


</script>


  </body>
</html>
