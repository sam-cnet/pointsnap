<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <title>PointSnap | Account Login</title>

<link rel="icon" 
      type="image/ico" 
      href="http://pointsnap.ca/favicon.ico">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://pointsnap.ca/css/main.css">
  <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body data-spy="scroll" data-target=".navbar" data-offset="100">

    
    <nav class="navbar navbar-default">

       
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">


	    </a>
            
            <button  id="bars" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <i class="fa fa-bars"></i>
            </button>
            
          </div>
          
          <div class="collapse navbar-collapse" id="navbar-collapse">
              <ul class="nav navbar-nav">
                  <li><a href="#features">Features</a></li>
                  <li><a href="#pricing">Pricing</a></li>
                  <li><a href="#team">Our Team</a></li>
              </ul>
	
	      <ul class="nav navbar-nav navbar-right">
		  <li>
                    
		      <a href='http://pointsnap.ca/app/login.php' class="btn">
		        <i class="fa fa-lock"></i> Login
		      </a>
                  </li>  
	      </ul>
          </div>
        </div>
       
        
    </nav>


    
    <div class="container">
      <div class="page-header">

	<h1 class="logo">PointSnap</h1>

	<h1>Please login</h1>
	  

	<form id="loginForm" style="max-width:250px;margin-left:auto;margin-right:auto;" action="/app/api/auth/index.php" method="POST">


	<div class="form-group">	
	<input type="email" class="form-control" placeholder="Enter your email address" name="username" />	
	</div>
	<div class="form-group">	
	<input type="password" class="form-control" placeholder="Enter your password" name="password" />	
	</div>


	<div class="page-header-button">
<!--	  <a class="btn btn-pistachio btn-xl" id="submit">
	   Login
	  </a>
-->

	  <input type="submit" class="btn btn-pistachio btn-xl" value="Login" />
	  
	</div>

	</form>

	<div class="modal fade" id="register-modal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header" style="border-bottom:0px;">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Basic accounts are 100% free and always will be</h4>
	      </div>
	      <div class="modal-body">


		<div class="container-fluid" style="width:80%;">

		  <form>

		    <div class="form-group text-left">
		      <label>Email address</label>	
		      <input type="email" class="form-control" placeholder="Enter your email" />
		    </div>

		    <div class="form-group">
                      <label>Password</label>
                      <input type="email" class="form-control" placeholder="Enter your email" />
                    </div>

		    <div class="form-group">
                      <label>Confirm password</label>
                      <input type="email" class="form-control" placeholder="Enter your email" />
                    </div>

		    <div class="form-group">
                      <label>
                      <input type="checkbox" /> Send me promotional emails
		      </label>
                    </div>


		    <div class="form-group">
		      <input type="submit" class="btn btn-success" value="Signup" />
		    </div>
		  </form>

		</div>		
	
	      </div>

	
	    </div>
	  </div>
	</div><!--end of modal-->

     
      </div><!--end of page-header-->

    </div><!--end of page container-->




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.3/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.2/underscore-min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 
  <script type="text/javascript">
    $(document).ready(function(){
      $("#loginForm").hide();
      $("#loginForm").fadeIn(300);


	$("nav a").not('.btn').on("click", function(e){
	
	 e.preventDefault();

	 var hash = this.hash; 

	  $('html, body').animate({

	    scrollTop: $(hash).offset().top

	  }, 300, function() {

	    window.location.hash = hash;
	  });

	});
	
    });


  </script>

    <script>
        $(document).ready(function(){
            
	  $("body").fadeIn({

	     duration: 1000	  	

	  });           

	  $("h1.logo").css("color", "#000");
 
            $("#bars").click(function(){
                
                if($(this).find('i').hasClass('fa fa-bars')){
                    $(".fa-bars").removeClass("fa fa-bars").toggleClass("fa fa-times");
                }else{
                    $(this).find('i').removeClass("fa fa-times").toggleClass("fa fa-bars");
                }
                
                
            });
      
            
            $(".navbar-brand").click(function(){
           
                $("#side-bar").toggleClass("open");
                
            });
        });
    </script> 
  <script type="text/javascript">

    $("document").ready(function(){


	$("#submit").click(function(){

	  $("#loginForm").submit();

	});
    });
	
  </script>
 


 </body>
</html> 
