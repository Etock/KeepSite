<!DOCTYPE html>
<?php
	
	session_start();
	include './phpfiles/dbh.php';
	
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alma College | The Keep</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full.css" rel="stylesheet">

  </head>
<style>
    .main{
        background-color: #333;
    }
    .navbar{
        background-color: #333;
    }
    .jumbotron{
        width: 80%;
        background-color: #333;
        color: #fff;
    }
    
    .logout:hover{
        background-color: #666;
        color: #fff;
    }
    .login:hover{
        background-color: #666;
        color: #fff;
    }
    .page-title{
        font-size: 14vw;
        font-family: 'Montserrat';
    }
    h1{
        font-size: 1vw;
        font-family: 'Montserrat';
    }
    .jumbotron .logout {
        width:64vw;
        font-size: 1vw;
    }
    .jumbotron .login {
        width:11vw;
        font-size: 10px;
    }
    .input{
        margin-right: 10px;
    }
     
    .spacer1{
        height: 7vw;
    }
    .spacer{
        height: 10vw;
    }
    html{
        background-color: #333;
    }
    .loginform{
    	padding-left:5px;
    }
    
</style>
  <body>

      <div class="main-content container-fluid main">
          <div class="row spacer1"></div>
  		    <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"> </div>
                <div class="jumbotron col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="page-title">The Keep</div>
                    <?php  
                    if(isset($_SESSION['u_id'])){
                       echo"<form action='./pages/dmcstats.php'><button class='btn logout'>Digital Media Commons</button></form><br><form class='form-inline logout' action='./logout.php' method='post'>
                      			<button id='Logout' name='Logout' class='btn logout' type='submit'>Logout</button>
                      	</form> ";
                    } else{
                        echo"<div class='row'><div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'></div><div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'><h1> Come into the Digital Media Commons to create an account! </h1></div></div>";
                        echo"<div class='row'><div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'></div>
                        <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
                        <form class='form-inline loginform' action='./login.php' method='post'>
                                    <input id='Username'  autocomplete='off' name='Username' type='text' placeholder='First Name' class='form-control col-lg-3 input inputone' required=''>
                                    <input id='Password'  autocomplete='off' name='Password' type='password' placeholder='Password' class='form-control col-lg-3 input' required=''>
                                    <button id='Login' name='Login' class='btn login' type='submit'>Login</button>
                            </form>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
                
            </div>
          <div class="row spacer"></div>
      </div>
  </body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>
