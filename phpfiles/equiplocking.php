<?php
/*
ini_set('display_errors', 1); 
ini_set('log_errors',1); 
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
*/
include 'dbh.php';
$id = $_GET["id"];

$sql = "Update equipment SET equiplock = 
						CASE
							WHEN equiplock = 'True' THEN 'False'
							WHEN equiplock = 'False' THEN 'True'
						END	
				 	WHERE barcode = '$id'";

$result = mysqli_query($db,$sql);

if(!$result){
    header("Location: ../pages/dmcitems.php?QWW");
    mysqli_close($db);
}else{
    header("Location: ../pages/dmcitems.php?Success");
    mysqli_close($db);
}
