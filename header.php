<?php
    session_start();
    include "../phpfiles/dbh.php";
    include "../phpfiles/phpfunctions.php";
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .clear-link-text{
        color:#000;
    }
    .content{
        display:block;
    }  
    .main{
    	margin-top:20px;
    }  
</style>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Alma College | The Keep</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.php"><h1>The Keep</h1></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link" href="../pages/dmcstudents.php">
            <i class="fa fa-fw fa-3x fa-user"></i>
            <span class="nav-link-text" style="font-size: 25px;"> Users</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Items">
          <a class="nav-link" href="../pages/dmcitems.php">
            <i class="fa fa-fw fa-3x fa-briefcase"></i>
            <span class="nav-link-text" style="font-size: 25px;"> Items </span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Checkout">
          <a class="nav-link" href="../pages/dmccheckout.php">
            <i class="fa fa-fw fa-3x fa-table"></i>
            <span class="nav-link-text" style="font-size: 25px;"> Checkout </span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Checkout">
          <a class="nav-link" href="../pages/dmcstats.php">
            <i class="fa fa-fw fa-3x fa-line-chart"></i>
            <span class="nav-link-text" style="font-size: 25px;"> Statistics </span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if(!isset($_SESSION['u_id'])){

                }else{
                echo "<li class='nav-item'>
                        <form class='form-inline login' action='../logout.php' method='post'>
                            <button id='logout' name='logout' class='btn btn-secondary' type='submit'><i class='fa fa-fw fa-sign-out''></i>Logout</button>
                        </form>
                      </li>";
                  	$u_id = $_SESSION['u_id']; 
			$u_last = $_SESSION['u_last'];
			$u_first = $_SESSION['u_first'];
			$u_clvl = $_SESSION['clvl'];
			$u_SecurityLevel = $_SESSION['SecurityLevel'];
            }   
        
   echo"   </ul>
    </div>
  </nav>
  <div class='content-wrapper'>
    <div class='container-fluid main'>";
    ?>