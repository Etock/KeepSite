    <?php
    	include "../header.php";      
    echo"    
        <div class='row'>
	<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>";
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
  					<strong>".$IL." Item(s) Are Locked From Checkout! Search The Items Page To Find Out Which Items</strong>
				</div>";
		}
        ?>
    <?php
    if ($u_SecurityLevel == 'Head Keeper' or $u_SecurityLevel == 'Admin'){
    echo"<div class='row'>";
    echo"<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>";
    echo"<div class='card mb-3'>
        <a href='#' class ='collapsable clear-link-text'>
            <div class='card-header'>
                <i class='fa fa-user'></i> Add New Users 
            </div></a>
            <div class='card-body content'>
                <form class='form-horizontal' action='../phpfiles/addstudents.php' method='post'>
                    <fieldset>
                        <div class='form-group'>
                            <label class='control-label' for='ID_Number'>ID Number:</label>  
                            <input id='ID_Number'  autocomplete='off' name='ID_Number' type='text' placeholder='Scan ID Number' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='First_Name'>First Name:</label>  
                            <input id='First_Name'  autocomplete='off' name='First_Name' type='text' placeholder='Enter First Name' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='Last_Name'>Last Name:</label>  
                            <input id='Last_Name'  autocomplete='off' name='Last_Name' type='text' placeholder='Enter Last Name' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label for='clearancelevel'>Clearance Level:</label>
                                <select class='form-control' id='clearancelevel' name='ClearanceLevel'>
                                    <option  selected='selected' value = '0'>Not A NMS Student.</option>
                                    <option  value = '1'>Has Taken Or Is In 101.</option>
                                    <option  value = '2'>Has Taken Or Is In Camera Media.</option>
                                    <option  value = '3'>Has Gone Beyond The Two Intro Classes.</option>
                                </select>
                        </div>
                        <div class='form-group'>
                            <label for='securitylevel'>Access Level:</label>
                                <select class='form-control' id='securitylevel' name='SecurityLevel'>
                                    <option  selected='selected' value = 'Student'>Student</option>
                                    <option value = 'Keeper'>Keeper</option>
                                    <option value = 'Head Keeper'>Head Keeper</option>
                                    <option value = 'Faculty'>Faculty</option>
                                    <option value = 'Admin'>Admin</option>
                                </select>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='Password'>Password:</label>  
                            <input id='Password'  autocomplete='off' name='Password' type='password' placeholder='Enter A Password' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='PasswordConfirm'>Retype Your Password:</label>  
                            <input id='PasswordConfirm'  autocomplete='off' name='PasswordConfirm' type='password' placeholder='Retype Your Password' class='form-control input-md' required=''>
                        </div>
				        <div class='form-group'>
				   	        <label control-label' for='checkboxes'>Skills:</label><br>
    						  <label class='checkbox-inline' for='checkboxes-0'>
      							<input type='checkbox' name='checkboxes-0' id='checkboxes-0' value='Game Design'> Game Design
    						</label>
    						<label class='checkbox-inline' for='checkboxes-1'>
      							<input type='checkbox' name='checkboxes-1' id='checkboxes-1' value='Video Editing'> Video Editing
    						</label>
    						<label class='checkbox-inline' for='checkboxes-2'>
      							<input type='checkbox' name='checkboxes-2' id='checkboxes-2' value='Photography'> Photography
    						</label>
    						<label class='checkbox-inline' for='checkboxes-3'>
      							<input type='checkbox' name='checkboxes-3' id='checkboxes-3' value='Sound Design'> Sound Design
    						</label>
    						<label class='checkbox-inline' for='checkboxes-4'>
      							<input type='checkbox' name='checkboxes-4' id='checkboxes-4' value='Web Design'> Web Design
    						</label>
    						<label class='checkbox-inline' for='checkboxes-5'>
      							<input type='checkbox' name='checkboxes-5' id='checkboxes-5' value='Graphic Design'> Graphic Design
    						</label>
				        </div>
                        <!-- Button -->
                        <div class='form-group'>
                            <button id='Add_Student' name='Add_Student' class='btn btn-secondary' type='submit'>Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>";
       echo "</div>";
           echo"<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>";
        echo"<div class='card mb-3'>
        <a href='#' class ='collapsable clear-link-text'>
            <div class='card-header'>
                <i class='fa fa-user'></i> Edit Passwords 
            </div></a>
            <div class='card-body content'>
                <form class='form-horizontal' action='../phpfiles/changepassword.php' method='post'>
                    <fieldset>
                        <div class='form-group'>
                            <label class='control-label' for='ID_Number'>ID Number:</label>  
                            <input id='ID_Number'  autocomplete='off' name='ID_Number' type='text' placeholder='Scan ID Number' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='password'>Password:</label>  
                            <input id='password'  autocomplete='off' name='password' type='password' placeholder='Enter Password' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='passwordconfirm'>Confirm Password:</label>  
                            <input id='passwordconfirm'  autocomplete='off' name='passwordconfirm' type='password' placeholder='Enter Password' class='form-control input-md' required=''>
                        </div>
                        <!-- Button -->
                        <div class='form-group'>
                            <button id='Edit_Password' name='Edit_Password' class='btn btn-secondary' type='submit'>Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>";
        echo "</div>";
        echo "</div>";
    }elseif($u_SecurityLevel == 'Keeper'){
         echo"<div class='card mb-3'>
         <a href='#' class ='collapsable clear-link-text'>
            <div class='card-header'>
                <i class='fa fa-user'></i> Add New Users 
            </div>
            </a>
            <div class='card-body content'>
                <form class='form-horizontal' action='../phpfiles/addstudents.php' method='post'>
                    <fieldset>
                        <div class='form-group'>
                            <label class='control-label' for='ID_Number'>ID Number:</label>  
                            <input id='ID_Number'  autocomplete='off' name='ID_Number' type='text' placeholder='Scan ID Number' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='First_Name'>First Name:</label>  
                            <input id='First_Name'  autocomplete='off' name='First_Name' type='text' placeholder='Enter First Name' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='Last_Name'>Last Name:</label>  
                            <input id='Last_Name'  autocomplete='off' name='Last_Name' type='text' placeholder='Enter Last Name' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label for='clearancelevel'>Clearance Level:</label>
                                <select class='form-control' id='clearancelevel' name='ClearanceLevel'>
                                    <option  selected='selected' value = '0'>Not A NMS Student.</option>
                                    <option  value = '1'>Has Taken Or Is In 101.</option>
                                    <option  value = '2'>Has Taken Or Is In Camera Media.</option>
                                    <option  value = '3'>Has Gone Beyond The Two Intro Classes.</option>
                                </select>
                        </div>
                        <div class='form-group'>
                            <label for='securitylevel'>Access Level:</label>
                                <select class='form-control' id='securitylevel' name='SecurityLevel'>
                                    <option  selected='selected' value = 'Student'>Student</option>
                                    <option value = 'Keeper'>Keeper</option>
                                    <option value = 'Faculty'>Faculty</option>
                                </select>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='Password'>Password:</label>  
                            <input id='Password'  autocomplete='off' name='Password' type='password' placeholder='Enter A Password' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='PasswordConfirm'>Retype Your Password:</label>  
                            <input id='PasswordConfirm'  autocomplete='off' name='PasswordConfirm' type='password' placeholder='Retype Your Password' class='form-control input-md' required=''>
                        </div>
				        <div class='form-group'>
				   	        <label control-label' for='checkboxes'>Skills:</label><br>
    						  <label class='checkbox-inline' for='checkboxes-0'>
      							<input type='checkbox' name='checkboxes-0' id='checkboxes-0' value='Game Design'> Game Design
    						</label>
    						<label class='checkbox-inline' for='checkboxes-1'>
      							<input type='checkbox' name='checkboxes-1' id='checkboxes-1' value='Video Editing'> Video Editing
    						</label>
    						<label class='checkbox-inline' for='checkboxes-2'>
      							<input type='checkbox' name='checkboxes-2' id='checkboxes-2' value='Photography'> Photography
    						</label>
    						<label class='checkbox-inline' for='checkboxes-3'>
      							<input type='checkbox' name='checkboxes-3' id='checkboxes-3' value='Sound Design'> Sound Design
    						</label>
    						<label class='checkbox-inline' for='checkboxes-4'>
      							<input type='checkbox' name='checkboxes-4' id='checkboxes-4' value='Web Design'> Web Design
    						</label>
    						<label class='checkbox-inline' for='checkboxes-5'>
      							<input type='checkbox' name='checkboxes-5' id='checkboxes-5' value='Graphic Design'> Graphic Design
    						</label>
				        </div>
                        <!-- Button -->
                        <div class='form-group'>
                            <button id='Add_Student' name='Add_Student' class='btn btn-secondary' type='submit'>Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>";
        echo"<div class='card mb-3'>
        <a href='#' class ='collapsable clear-link-text'>
            <div class='card-header'>
                <i class='fa fa-user'></i> Edit Passwords 
            </div></a>
            <div class='card-body content'>
                <form class='form-horizontal' action='../phpfiles/changepassword.php' method='post'>
                    <fieldset>
                        <div class='form-group'>
                            <label class='control-label' for='ID_Number'>ID Number:</label>  
                            <input id='ID_Number'  autocomplete='off' name='ID_Number' type='text' placeholder='Scan ID Number' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='password'>Password:</label>  
                            <input id='password'  autocomplete='off' name='password' type='password' placeholder='Enter Password' class='form-control input-md' required=''>
                        </div>
                        <div class='form-group'>
                            <label class='control-label' for='passwordconfirm'>Confirm Password:</label>  
                            <input id='passwordconfirm'  autocomplete='off' name='passwordconfirm' type='password' placeholder='Enter Password' class='form-control input-md' required=''>
                        </div>
                        <!-- Button -->
                        <div class='form-group'>
                            <button id='Edit_Password' name='Edit_Password' class='btn btn-secondary' type='submit'>Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>";
    }
        ?>
        <div class="card mb-3">
        <a href='#' class ='collapsable clear-link-text'>
        <div class="card-header">
            <i class="fa fa-user"></i> Users 
        </div>
        </a>
        <div class="card-body content">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php
                    if ($u_SecurityLevel == 'Head Keeper' or $u_SecurityLevel == 'Admin'){
	                   echo"<thead>
                                            <tr>
                                                <th> ID </td>
                                                <th> First Name </th>
                                                <th> Last Name </th>
                                                <th> Clearance Level </th>
                                                <th> Access Level </th>
                                                <th> Update </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ";
                                            $sql = mysqli_query($db,"SELECT * FROM student WHERE ID != '2000000000'");
                                            while($result = mysqli_fetch_assoc($sql)){
                                                echo'
                                                <tr>
                                                    <td>'.$result['ID'].'</td>
                                                    <td>'.$result['FirstName'].'</td>
                                                    <td>'.$result['LastName'].'</td>
                                                    <td>'.$result['clvl'].'</td>
                                                    <td>'.$result['SecurityLevel'].'</td>
                                                    <td> <a href=../phpfiles/togglestudentaccess.php?id='.$result['ID'].' onclick=\'return confirm_alert(this);\'> Increase Clearance Level </a> \
							 <a href=../phpfiles/togglestudentsecurity.php?id='.$result['ID'].' onclick=\'return confirm_alert(this);\'> Increase Access Level </a> \
							 <a href=../phpfiles/deletestudent.php?id='.$result['ID'].' onclick=\'return confirm_alert(this);\'>Delete</a>
						    </td>
                                                </tr>';
                                            }
                                echo"
                                       </tbody>";
                        }
                     if ($u_SecurityLevel == 'Keeper'){
	                   echo"<thead>
                                            <tr>
                                                <th> ID </td>
                                                <th> First Name </th>
                                                <th> Last Name </th>
                                                <th> Clearance Level </th>
                                                <th> Access Level </th>
                                                <th> Game Design </th>
                                                <th> Web Design </th>
                                                <th> Video Editing </th>
                                                <th> Sound Design </th>
                                                <th> Graphic Design </th>
                                                <th> Photography </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ";
                                            $sql = mysqli_query($db,"SELECT * FROM student WHERE ID != '2000000000'");
                                            while($result = mysqli_fetch_assoc($sql)){
                                                $game = $result['game'];
                                                $web = $result['web'];
                                                $video = $result['video'];
                                                $sound = $result['sound'];
                                                $graphic = $result['graphic'];
                                                $photo = $result['photo'];
                                                echo'
                                                <tr>
                                                    <td>'.$result['ID'].'</td>
                                                    <td>'.$result['FirstName'].'</td>
                                                    <td>'.$result['LastName'].'</td>
                                                    <td>'.$result['clvl'].'</td>
                                                    <td>'.$result['SecurityLevel'].'</td>
                                                    <td align="center">'.$game.'</td>
                                                    <td align="center">'.$web.'</td>
                                                    <td align="center">'.$video.'</td>
                                                    <td align="center">'.$sound.'</td>
                                                    <td align="center">'.$graphic.'</td>
                                                    <td align="center">'.$photo.'</td>
                                                </tr>';
                                            }
                                echo"
                                       </tbody>";
                        } 
                     if ($u_SecurityLevel == 'Student' or $u_SecurityLevel == 'Faculty'){
	                   echo"<thead>
                                            <tr>
                                                <th> First Name </th>
                                                <th> Last Name </th>
                                                <th> Game Design </th>
                                                <th> Web Design </th>
                                                <th> Video Editing </th>
                                                <th> Sound Design </th>
                                                <th> Graphic Design </th>
                                                <th> Photography </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ";
                                            $sql = mysqli_query($db,"SELECT * FROM student WHERE ID != '2000000000'");
                                            while($result = mysqli_fetch_assoc($sql)){
                                            	$game = $result['game'];
                                                $web = $result['web'];
                                                $video = $result['video'];
                                                $sound = $result['sound'];
                                                $graphic = $result['graphic'];
                                                $photo = $result['photo'];
                                                echo'
                                                <tr>
                                                    <td>'.$result['FirstName'].'</td>
                                                    <td>'.$result['LastName'].'</td>
                                                    <td align="center">'.$game.'</td>
                                                    <td align="center">'.$web.'</td>
                                                    <td align="center">'.$video.'</td>
                                                    <td align="center">'.$sound.'</td>
                                                    <td align="center">'.$graphic.'</td>
                                                    <td align="center">'.$photo.'</td>
                                                </tr>';
                                            }
                                echo"
                                       </tbody>";
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
