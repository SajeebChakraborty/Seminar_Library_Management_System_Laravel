<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Sidebar Menu with sub-menu | CodingNepal</title> -->
    <title>Admin Dashboard</title>
  

   
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
              <img src="{{ asset('image/admin.png') }}" style="width:80px; height:80px; border-radius:50%;" alt="">
            </div>
            <div class="details" style="margin-top:30px">
              <p class="user-name" style="color:; margin-left:10px; font-size:20px;font-family: 'Pacifico', cursive;" >Admin</p>
              <p class="designation" style="color:; margin-left:10px; margin-top:-15px; font-size:20px">CSE , RU</p>
            </div>
    </div>
<ul>
<li class="active"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-tachometer-alt" style="margin-left: -10px;font-size:15px;"></i>&nbsp;&nbsp;Dashboard</span></li>
<li class=""><a href="{{ url('admin/notification') }}"><i class="fas fa-bell" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Notification</span>
<span class="count" style="border-radius:50%; height:25px;width:25px;text-align:center; font-size:20px; border:none;margin-right:80px; padding-bottom:80px;color:yellow;"  id="notify_number">   </span>

</li>

<li>
          <a href="#" class="feat-btn"><i class="fas fa-book-open" style="margin-left: -10px;font-size:13px;"></i>&nbsp;&nbsp;&nbsp;Book List
            <span class="fas fa-caret-down first"></span>
          </a>
          <ul class="feat-show">
<li><a href="{{ url('admin/book-list/programming') }}">Programming</a></li>
<li><a href="{{ url('admin/book-list/networking') }}">Networking</a></li>
<li><a href="{{ url('admin/book-list/database') }}">Database</a></li>
<li><a href="{{ url('admin/book-list/electronics') }}">Electronics</a></li>
<li><a href="{{ url('admin/book-list/software-development') }}">Software Development</a></li>

</ul>
</li>
<li class="">
          <a href="#" class="extra-btn"><i class="far fa-edit" style="margin-left: -10px;font-size:13px;"></i>&nbsp;&nbsp;&nbsp;Book Management
            <span class="fas fa-caret-down third" style="margin-left:30px;"></span>
          </a>
          <ul class="extra-show">
<li><a href="{{ url('admin/add-book') }}">Add New Book</a></li>
<li><a href="{{ url('admin/update-book') }}">Update Book</a></li>
<li><a href="{{ url('admin/remove-book') }}">Remove Book</a></li>
</ul>
</li>
<li class=""><a href="{{ url('admin/shelf-list') }}"><i class="fas fa-book" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Shelf List</span></li>

<li >
          <a href="#" class="shelf-btn"><i class="far fa-edit" style="margin-left: -10px;font-size:13px;"></i>&nbsp;&nbsp;&nbsp;Shelf Management
            <span class="fas fa-caret-down fourth"></span>
          </a>
          <ul class="shelf-show">
<li><a href="{{ url('admin/add-shelf') }}">Add New Shelf</a></li>
<li><a href="{{ url('admin/update-shelf') }}">Update Self</a></li>
<li><a href="{{ url('admin/remove-shelf') }}">Remove Self</a></li>
</ul>
</li>
<li class=""><a href="{{ url('admin/book-order') }}"><i class="fas fa-book" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Book Order</span></li>
<li class=""><a href="{{ url('admin/book-received') }}"><i class="fas fa-book" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;Book Received</span></li>
<li class=""><a href="{{ url('admin/student-info') }}"><i class="fas fa-user-graduate" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Student Info</span></li>
<li class=""><a href="{{ url('admin/student-request') }}"><i class="fas fa-comments" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;Student Request</span></li>
<li class=""><a href="{{ url('admin/remove-student') }}"><i class="fas fa-trash" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Remove Student</span></li>


<li>
          <a href="#" class="serv-btn"><i class="fas fa-cog" style="margin-left: -10px;font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Settings
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
<li><a href="{{ url('admin/edit-info') }}">Edit Info</a></li>
<li><a href="{{ url('admin/change-password') }}">Change Password</a></li>

</ul>

</li>
<li class=""><a href="{{ url('admin/log-out') }}"><i class="fas fa-sign-out-alt" style="margin-left: -10px; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Log out</span></a></li>

</ul>
</nav>
<style>

  .parent_card{


      display:inline-flex;
      margin-top:20px;


  }
  .card_special{


      box-shadow: 5px 8px #888888;
      border:2px solid black;
      margin-left:50px;
      margin-top:10px;
      padding: 20px 0px 0px 0px;
      border-radius:15px;
      width:450px;
      height:250px;



  }
  .card_special:hover{

    background:orange;
    border: 3px solid green;
    transform: rotate(5deg);
    transition-duration: 0.5s;


  }
  .card_special h5{

    
    padding:10px 20px 0px 20px;


  }
  .card_special h2{

    padding:10px 20px 15px 20px;


  }
  .card_special img{


    width:100%;
    border-radius:15px;



  }
  .intro{

    text-align:center;
    

  }
  .intro .profile_section{



  }
  .intro img{

    width:150px;
    height:150px;
    border-radius:50%;
    border: 10px solid blue;
    background:transparent;
    margin-bottom:20px;

  }
  .into .name{

   

  }
  .inro .roll{



  }
  .intro .section{


    margin-bottom:50px;


  }
 

</style>

    <div class="content" style="margin-left:310px;padding-top:0px; padding-right:50px;width:80%;">

    <div class="parent_card">
    
        <div class="card_special">
          
          <h5>Total Student</h5>
          <h2>{{ $total_student }}</h2>


          <img src="{{ asset('image/Card_graph2.png') }}" alt="">
        
        
        </div>
        <div class="card_special">
      
        <h5>Total Book (Shelf)</h5>
        <h2>{{ $total_book }}</h2>


        <img src="{{ asset('image/Card_graph3.png') }}" alt="">
      
      
        </div>
    
    
    
    </div>
    <div class="parent_card">
    
        <div class="card_special">
          
          <h5>Total Shelf</h5>
          <h2>{{ $total_shelf }}</h2>


          <img src="{{ asset('image/Card_graph4.png') }}" alt="">
        
        
        </div>
        <div class="card_special">
      
        <h5>Book Order (Not Submitted)</h5>
        <h2>{{ $total_order }}</h2>


        <img src="{{ asset('image/Card_graph5.png') }}" alt="">
      
      
        </div>
        </div>
     
        <br>
        <br>
        <br>
        <br>
        <br>
        <h3 style="margin-left:50px;">Recent Order</h3>
        <table class="table table-striped" style="width:90%;margin-left:50px; ">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Student ID</th>
      <th scope="col">Book ID</th>
      <th scope="col">Collection Date</th>
    </tr>
  </thead>
  <?php

    $count=1;

  ?>
  @foreach($records as $row)

  <tbody>
    <tr>
      <th scope="row">{{ $count }}</th>
      <td>{{ $row->Student_ID }}</td>
      <td>{{ $row->Book_ID }}</td>
      <td>{{ $row->Collection_Date }}</td>

    </tr>
    
  </tbody>

  <?php

    $count++;


  ?>

  @endforeach

</table>
<br><br>
<br>
<center><i><b>Powered By</b>
</i></center>
<br>
<div class="parent_card" style="margin-left:20px;">


<div class="intro" style="margin-left:300px;">

    <div class="profile_section">
    
      <img src="{{ asset('image/Sajeeb_Chakraborty.jpg') }}" alt="">
      <div class="name">Sajeeb Chakraborty</div>
      <div class="roll">Roll : 1811076104</div>
      <div class="section">Session : 2017-2018</div>
    
    
    
    </div>
</div>


<div class="intro" style="margin-left:100px;">

    <div class="profile_section">
    
      <img src="{{ asset('image/Sajeeb_Chakraborty.jpg') }}" alt="">
      <div class="name">Asibul Hasan</div>
      <div class="roll">Roll : 1811076117</div>
      <div class="section">Session : 2017-2018</div>
    
    
    
    </div>
</div>

</div>

<div class="parent_card" style="margin-left:190px;">





<div class="intro" >

<div class="profile_section" style="margin-left:50px;">

  <img src="{{ asset('image/Sajeeb_Chakraborty.jpg') }}" alt="">
  <div class="name">Umme Salma Rumi</div>
  <div class="roll">Roll : 1812576142</div>
  <div class="section">Session : 2017-2018</div>



</div>
</div>


<div class="intro" style="margin-left:50px;">

    <div class="profile_section">
    
      <img src="{{ asset('image/Sajeeb_Chakraborty.jpg') }}" alt="">
      <div class="name">Md Farhad Hasan Rony</div>
      <div class="roll">Roll : 1810876139</div>
      <div class="section">Session : 2017-2018</div>
    
    
    
    </div>
</div>

<div class="intro" style="margin-left:50px;">

    <div class="profile_section">
    
      <img src="{{ asset('image/Sajeeb_Chakraborty.jpg') }}" alt="">
      <div class="name">Pijush Barai</div>
      <div class="roll">Roll : 1811076129</div>
      <div class="section">Session : 2017-2018</div>
    
    
    
    </div>
</div>




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
                    document.getElementById("notify_number").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "{{ Url('admin/notify/count/') }}", true);
                xhttp.send();

                },1000);


        }
        loadDoc();


</script>

  </body>
</html>
