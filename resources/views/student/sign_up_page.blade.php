<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seminar Library Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Hanalei+Fill&display=swap" rel="stylesheet">

</head>
<body>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
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
<a href="{{ url('/admin') }}" class="btn btn-danger" style="margin-left:1140px; margin-top:14px;">Go to Admin Panel</a>

<form method="post" action="{{ url('student/sign-up/process') }}" enctype="multipart/form-data">

    @csrf 
    
    <div id="wrapper">
        
        <div class="login">
            <div class="logo"> 
                <img src="image/librarylogo.png" alt="">
            </div>
            <div class="loginBox">
                
                <strong><i class=""></i>Name</strong><br>
                <input type="text" name="name" required><br>
                <strong><i class=""></i>Student ID</strong><br>
                <input type="text" name="student_id" required><br>
                <strong><i class=""></i>Session no</strong><br>


                <select name="session" id="">
                <option value="2019-2020">2020-2021</option>
                <option value="2019-2020">2019-2020</option>
                <option value="2018-2019">2018-2019</option>
                <option value="2017-2018">2017-2018</option>
                <option value="2016-2017">2016-2017</option>
                <option value="2015-2016">2015-2016</option>
                <option value="2014-2015">2014-2015</option>
                </select>
                <strong><i class=""></i>Username</strong><br>
                <input type="text" name="username" required><br>
                <strong><i class="fas fa-envelope"></i>Email</strong><br>
                <input type="email" name="email" required><br>
                <strong><i class="fas fa-phone-alt"></i>Contact no</strong><br>
                <input type="number" name="contact" required><br>
                
                <strong><i class="fas fa-camera"></i>Image</strong><br>

                <input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="picture" required>
                <br>
                
                <strong><i class="fa fa-key"></i>Password</strong><br>
                <input type="password" name="password" required><br>
                <strong><i class="fa fa-key"></i>Confirm Password</strong><br>
                <input type="password" name="confirm_password" required><br>
                <input id="loginButton" type="submit"; value="Sign Up">
                </form>
            </div>
            <div class="forgottenPasswoard"> 
                <span><a href="{{ url('/') }}">Already have an account?</a></span>
            </div>
        </div>
       
    </div>
  
  
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>