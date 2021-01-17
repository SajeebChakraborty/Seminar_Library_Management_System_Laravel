<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  <head>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Sidebar Menu with sub-menu | CodingNepal</title> -->
    <title>Notification</title>
  

   
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
    <style>
    html *{
    -webkit-font-smoothing: antialiased;
}

.title h3{
    font-size: 25px !important;
    margin-top: 20px;
    margin-bottom: 25px;
    line-height: 1.4em !important;
    font-weight: 300;
}

/* alerts */

.alert {
    border: 0;
    border-radius: 0;
    padding: 20px 15px !important;
    line-height: 20px;
    font-weight: 300;
    color: #fff;
}

.alert .alert-icon {
    display: block;
    float: left;
    margin-right: 1.071rem;
}

.alert b {
    font-weight: 500;
    font-size: 12px;
    text-transform: uppercase;
}

.close {
    float: right;
    font-size: 1.5rem;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
}
.alert .close {
    color: #fff;
    text-shadow: none;
    opacity: .9;
}
.alert .close i {
    font-size: 20px;
}
.alert .close:hover{
    opacity: 1;
    color: #fff;
}
.alert.alert-info {
    background-color: #00cae3;
    color: #fff;
}

.alert.alert-success {
    background-color: #55b559;
    color: #fff;
}

.alert.alert-warning {
    background-color: #ff9e0f;
    color: #fff;
}

.alert.alert-danger {
    background-color: #f55145;
    color: #fff;
}

.alert.alert-primary {
    background-color: #a72abd;
    color: #fff;
}

/* footer */

footer{
    margin-top: 20px;
    color: #555;
    background: #fff;
    padding: 25px;
    font-weight: 300;
    
}
.footer p{
    margin-bottom: 0;
    font-size: 14px;
    margin: 0 0 10px;
    font-weight: 300;
}
footer p a{
    color: #555;
    font-weight: 400;
}

footer p a:hover {
    color: #9f26aa;
    text-decoration: none;
}
    
    
    </style>
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
<li class="active"><a href="{{ url('student/notification') }}"><i class="fas fa-bell" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Notification</span>

<span class="count" style="border-radius:50%; height:25px;width:25px;text-align:center; font-size:20px; border:none;margin-right:80px; padding-bottom:80px;color:yellow;"  id="student_notify_number">   </span>

</li>

<li>
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
    <?php

        $count=0;

        
        date_default_timezone_set("Asia/Dhaka");
        $today=date("d-m-Y");

        $today = strtotime($today); 



    ?>
    @foreach($records as $row)

    <?php

    $Expired_Date = strtotime($row->Expired_Date);


    ?>

    @if($today >= $Expired_Date)

        <?php

            $count++;


        ?>

    @endif
    
    @endforeach

    @if($count == 0)
    


        <h5 style="margin-top:200px; padding-left:360px; padding-bottom:50px;color:red;">No Notification is available !</h5>



    @endif
  

    <div class="content" style="margin-left:310px;padding-top:120px; padding-right:50px;width:80%;">
    @foreach($records as $row)

    <?php

    $Expired_Date = strtotime($row->Expired_Date);


    ?>

    @if($today >= $Expired_Date)
    <div class="alert alert-danger">
         <div class="container">
             <div class="alert-icon">
                <i class="material-icons">error_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
             <b>Warning:</b> Your Book ID {{ $row->Book_ID }} is Expired at {{ $row->Expired_Date }}.Please submit the book... 
        </div>
    </div>
    @endif
    @endforeach
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
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
      <script>
      $(document).ready(function() {
    $('body').bootstrapMaterialDesign();
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
