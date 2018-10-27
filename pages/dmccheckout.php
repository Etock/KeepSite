     <?php
     	include "../header.php";      
    echo"    
        <div class='row'>
	<div class=' col-xs-12 col-sm-12 col-md-12 col-lg-12'>";
		if ( isset( $_GET[ 'QWW' ] ) ) {
			echo "<div class='alert alert-danger text-center alert-dismissible' role='alert'>
  					<strong>Something Went Wrong!</strong>
				</div>";
		}
		if ( isset( $_GET[ 'Success' ] ) ) {
			echo "<div class='alert alert-success alert-dismissible text-center' role='alert'>
  					<strong>Success!</strong>
				</div>";
		}
		if ( isset( $_GET[ 'PWDM' ] ) ) {
			echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
  					<strong>Passwords Didn't Match!</strong>
				</div>";
		}
		if ( isset( $_GET['SIDE' ] ) ) {
			echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
  					<strong>That Student ID Already Has An Account!</strong>
				</div>";
		}
		if ( isset( $_GET['IL' ] ) ) {
		$IL = htmlspecialchars($_GET["IL"]);
			echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
  					<strong>".$IL." Item(s) Are Locked From Checkout! Search The Items Page By Typing 'True' In The Search Field To Find Out What Is Locked.</strong>
				</div>";
		}
		if ( isset( $_GET['SDNMR' ] ) ) {
			echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
  					<strong>Student Does Not Meet Requirements To Check That Out!</strong>
				</div>";
		}
		if ( isset( $_GET['IAM' ] ) ) {
			echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
  					<strong>Items Are Missing From The Checkin!</strong>
				</div>";
		}
       echo" </div>
        </div>";
        ?>
    <?php
    if($u_SecurityLevel == 'Head Keeper' or $u_SecurityLevel == 'Admin' or $u_SecurityLevel == 'Keeper'){
    echo"<div class='row'>";
    echo"<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>";
    echo"<div class='card mb-3'>
            <a href='#' class ='collapsable clear-link-text'>
            <div class='card-header'>
                <i class='fa fa-sign-out'></i>Checkout
            </div>
            </a>
        <div class='card-body content'>
          <form class='form-horizontal' action='../phpfiles/checkout.php' method='post'>
              <fieldset>
                  <div class='form-group'>
                      <label class='control-label' for='Item_Name'>Items Being Checked Out:</label>
                        <textarea id='C_Information' autocomplete='off' name='Item_Name' type='text' style='height:150px; resize:none;' placeholder='Scan Into Here' class='form-control input-md' required></textarea>
                  </div>
                  <div class='form-group'>
                      <label class='control-label' for='StudentID'>Student ID Number:</label>
                        <input id='Clearance_Level' autocomplete='off' name='StudentID' type='text' placeholder='Scan Their ID' class='form-control input-md' required=''>
                  </div>
                  <div class='form-group'>
                      <button id='CheckoutItems' name='CheckoutItems' class='btn btn-secondary' type='submit'>Submit</button>
                  </div>
              </fieldset>
            </form>
        </div>
    </div>
    </div>
   <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
    <div class='card mb-3'>
    <a href='#' class ='collapsable clear-link-text'>
        <div class='card-header''>
            <i class='fa fa-sign-in'></i> Check In Equipment</div></a>
        <div class='card-body content'>
            <form class='form-horizontal' action='../phpfiles/checkin.php' method='post'>
					<fieldset>
						<div class='form-group'>
							<label class='control-label' for='Item_Name'>Items Being Checked In:</label>
							<textarea id='C_Information' autocomplete='off' name='Item_Name' type='text' style='height:150px; resize:none;' placeholder='Scan Into Here' class='form-control input-md' required=''></textarea>
						</div>
						<div class='form-group'>
							<label class='control-label' for='StudentID'>Student ID Number:</label>
							<input id='StudentID' autocomplete='off' name='StudentID' type='text' placeholder='Scan Their ID' class='form-control input-md' required=''>
						</div>
						<div class='form-group'>
							<label class='control-label' for='StudentID'> Check Out ID: </label>
							<input id='CheckoutID' autocomplete='off' name='CheckoutID' type='text' placeholder='Enter Checkout ID' class='form-control input-md' required=''>
						</div>
						<!-- Button -->
						<div class='form-group'>
							<button id='CheckoutItems' name='CheckoutItems' class='btn btn-secondary' type='submit'>Submit</button>
						</div>
					</fieldset>
				</form>
            </div>
        </div>
        </div>
        </div>";
    }
    ?>
    <div class='card mb-3'>
         <a href='#' class ='collapsable clear-link-text'>
        <div class='card-header'>
            <i class='fa fa-table'></i> Checked Out Equipment</div></a>
        <div class='card-body content'>
          <div class='table-responsive'>
            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
            <?php
                if ($u_SecurityLevel == 'Head Keeper' or $u_SecurityLevel == 'Admin' or $u_SecurityLevel == 'Keeper'){
                    $query = mysqli_query($db, "SELECT * FROM checkout;");
                   	$columnnames = array("ID","Items","Student Name", "Keeper Name", "Due Date");
                   	$columndatanames = array("ID","Items","StudentID","KeeperID","DueDate");
                   	tablecreation($query,$columnnames,$columndatanames);
                    echo"
                        <script type='text/javascript'>
                            function confirm_alert(node) {
                                return confirm('Please click on OK to continue.');
                            }
                        </script>";
                }
            ?>
            <?php
                if ($u_SecurityLevel == 'Student' or $u_SecurityLevel == 'Faculty'){
                    $query = mysqli_query($db, "SELECT * FROM checkout;");
                   	$columnnames = array("Items", "Due Date");
                   	$columndatanames = array("Items","DueDate");
                   	tablecreation($query,$columnnames,$columndatanames);
                    echo"
                        <script type='text/javascript'>
                            function confirm_alert(node) {
                                return confirm('Please click on OK to continue.');
                            }
                        </script>";
                }
            ?>
            </table>
          </div>
        </div>
    </div>
    <div class="card mb-3"> 
        <a href='#' class ='collapsable clear-link-text'>
        <div class="card-header">
            <i class="fa fa-table"></i> Reserved Equipment</div></a>
        <div class="card-body content">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php
			     if ($u_SecurityLevel == 'Head Keeper' or $u_SecurityLevel == 'Admin'){
                    echo"<thead>
                            <tr>
                                <th> ID </td>
                                <th> Student Name </th>
                                <th> Items </th>
                                <th> Starting Date </th>
                                <th> Ending Date </th>
                                <th> Approved or Not </th>
                                <th> Approve / Decline / Delete </th>
                            </tr>
                        </thead>
                        <tbody>";
                        $sql = mysqli_query($db,"SELECT * FROM reserve");
                        while($result = mysqli_fetch_assoc($sql)){
                            echo'<tr>
                                    <td>'.$result['ID'].'</td>
                                    <td>'.$result['StudentName'].'</td>
                                    <td>'.$result['Items'].'</td>
                                    <td>'.$result['ReserveDate'].'</td>
                                    <td>'.$result['ReserveDateEnd'].'</td>
                                    <td>'.$result['Approved'].'</td>
                                    <td> <a href=../phpfiles/reserveapprove.php?id='.$result['ID'].'> Approve </a> /
                                    <a href=../phpfiles/reservedecline.php?id='.$result['ID'].'> Decline </a> /
                                    <a href=../phpfiles/reservedelete.php?id='.$result['ID'].' onclick=\'return confirm_alert(this);\'> Delete </a> </td>
                                </tr>';
                        }
                    echo"</tbody>";
                }
			     if ($u_SecurityLevel == 'Keeper'){
                    echo"<thead>
                            <tr>
                                <th> ID </td>
                                <th> Student Name </th>
                                <th> Items </th>
                                <th> Starting Date </th>
                                <th> Ending Date </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        <tbody>";
                        $sql = mysqli_query($db,"SELECT * FROM reserve WHERE Approved = 'O'");
                        while($result = mysqli_fetch_assoc($sql)){
                            echo'<tr>
                                    <td>'.$result['ID'].'</td>
                                    <td>'.$result['StudentName'].'</td>
                                    <td>'.$result['Items'].'</td>
                                    <td>'.$result['ReserveDate'].'</td>
                                    <td>'.$result['ReserveDateEnd'].'</td>
                                    <td><a href=../phpfiles/reservedelete.php?id='.$result['ID'].' onclick=\'return confirm_alert(this);\'> Delete </a> </td>
                                </tr>';
                        }
                    echo"</tbody>";
                }
                 if ($u_SecurityLevel == 'Student' or $u_SecurityLevel == 'Faculty'){
                    echo"<thead>
                            <tr>
                                <th> ID </td>
                                <th> Student Name </th>
                                <th> Items </th>
                                <th> Starting Date </th>
                                <th> Ending Date </th>
                            </tr>
                        </thead>
                        <tbody>";
                        $sql = mysqli_query($db,"SELECT * FROM reserve WHERE Approved = 'O'");
                        while($result = mysqli_fetch_assoc($sql)){
                            echo'<tr>
                                    <td>'.$result['ID'].'</td>
                                    <td>'.$result['StudentName'].'</td>
                                    <td>'.$result['Items'].'</td>
                                    <td>'.$result['ReserveDate'].'</td>
                                    <td>'.$result['ReserveDateEnd'].'</td>
                                </tr>';
                        }
                    echo"</tbody>";
                }
                ?>
            </table>
          </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
    <script type='text/javascript'>
        function confirm_alert(node) {
            return confirm('Press OK to confirm.');
        }
        var acc = document.getElementsByClassName("collapsable");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
        /* Toggle between hiding and showing the active panel */
        var content = this.nextElementSibling;
        if (content.style.display === "none") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
    });
}
    </script>
  </div>
</div>
</body>

</html>
