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
    echo"<div class='card mb-3'>
        <a href='#' class ='collapsable clear-link-text'>
        <div class='card-header'>
            <i class='fa fa-briefcase'></i> Add New Items </div>
            </a>
        <div class='card-body content'>
            <form class='form-horizontal' action='../phpfiles/additem.php' method='post'>
                <fieldset>
                    <div class='form-group'>
                        <label class='control-label' for='BarCode_Number'>Barcode:</label>  
                            <input id='BarCode_Number'  autocomplete='off' name='BarCode_Number' type='text' placeholder='Scan the Barcode' class='form-control input-md' required=''>
                    </div>
                    <div class='form-group'>
                        <label class='control-label' for='Item_Name'>Item Name:</label>  
                            <input id='Item_Name'  autocomplete='off' name='Item_Name' type='text' placeholder='Item Name' class='form-control input-md' required=''>
                    </div>
                    <div class='form-group'>
                        <label for='Clearance_Number'>Clearance Level:</label>
                            <select class='form-control' id='Clearance_Number' name='Clearance_Number'>
                                <option  selected='selected' value = '0'>Not A NMS Student.</option>
                                <option  value = '1'>Has Taken Or Is In 101.</option>
                                <option  value = '2'>Has Taken Or Is In Camera Media.</option>
                                <option  value = '3'>Has Gone Beyond The Two Intro Classes.</option>
                            </select>
                    </div>
                    <div class='form-group'>
                        <label for='Main_Item'>Main Item:</label>
                            <select class='form-control' id='Main_Item' name='Main_Item'>
                                <option  selected='selected' value = '0'>No</option>
	                           <option  value = '1'>Yes</option>
                            </select>
                    </div>
                    <div class='form-group'>
                        <label for='Item_Type'>Item Type:</label>
                            <select class='form-control' id='Item_Type' name='Item_Type'>
                                <option  selected='selected' value = 'Camera'>Camera</option>
                                <option  value = 'Sound'>Sound</option>
                                <option  value = 'Memory'>Memory</option>
                                <option  value = 'Lens'>Lens</option>
                                <option  value = 'Lighting'>Lighting</option>
                                <option  value = 'Misc'>Misc</option>
                                <option  value = 'Power'>Power</option>
                                <option  value = 'Stabilizer'>Stabilizer</option>
                                <option  value = ''>Not A Main Item</option>
                            </select>
                    </div>
                   	<div class='form-group'>
                    	<button id='Add_Item' name='Add_Item' class='btn btn-secondary' type='submit'>Submit</button>
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
            <i class="fa fa-shopping-cart"></i> Reserve Items </div></a>
        <div class="card-body content">
            <form class='form-horizontal' action='../phpfiles/reserve.php' method='post'>
				<fieldset>
				    <div class='form-group'>
				        <label class='control-label' for='Item_Name'>Items Being Reserved:</label>
				            <textarea id='Item_Name' autocomplete='off' name='Item_Name' type='text' style='height:150px; resize:none;' placeholder='Type in the Item Names Seperated By Commas' class='form-control input-md' required=''></textarea>
				    </div>
				    <div class='form-group'>
				        <label class='control-label' for='StartDate'>Start Date:</label>
				            <input id='StartDate' autocomplete='off' name='StartDate' type='text' placeholder='mm/dd/yyyy' class='form-control input-md' required=''>
				    </div>
                    <div class='form-group'>
				        <label class='control-label' for='EndDate'>End Date:</label>
                            <input id='EndDate' autocomplete='off' name='EndDate' type='text' placeholder='mm/dd/yyyy' class='form-control input-md' required=''>
				    </div>
				    <div class='form-group'>
                        <button id='CheckoutItems' name='CheckoutItems' class='btn btn-secondary' type='submit'>Submit</button>
				        <p> <br>*Reserve requests will only be accepted if they are a duration of 48 hours or less. Requests must be made two days in advance and will show up on the table below once they have been approved. Please allow two buisness days maximum for approval.</p>
				    </div>
				</fieldset>
            </form>
        </div>
    </div>
        <div class="card mb-3">
        <a href='#' class ='collapsable clear-link-text'>
        <div class="card-header">
            <i class="fa fa-briefcase"></i> Items </div></a>
        <div class="card-body">
          <div class="table-responsive">
              <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                <?php
                    if ($u_SecurityLevel == 'Head Keeper' or $u_SecurityLevel == 'Admin'){
                        $query = mysqli_query($db, "SELECT * FROM equipment");
                        $columnnames = array("Barcode","Name","Clearance Level", "Type","Locked?");
                        $columndatanames = array("barcode","name","clvl","EquipType", "equiplock");
                        tablecreation($query,$columnnames,$columndatanames);
                    }
                    elseif($u_SecurityLevel == 'Keeper'){
                        $query = mysqli_query($db, "SELECT * FROM equipment WHERE main != '0'");
                   	    $columnnames = array("Barcode","Name","Clearance Level", "Type", "Locked?");
                   	    $columndatanames = array("barcode","name","clvl","EquipType", "equiplock");
                   	    normaltablecreation($query,$columnnames,$columndatanames);
                    }
                    elseif($u_SecurityLevel == 'Student' or $u_SecurityLevel == 'Faculty'){
                        $query = mysqli_query($db, "SELECT * FROM equipment WHERE main != '0'");
                   	    $columnnames = array("Name","Clearance Level", "Type", "Locked?");
                   	    $columndatanames = array("name","clvl","EquipType", "equiplock");
                   	    normaltablecreation($query,$columnnames,$columndatanames);
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
