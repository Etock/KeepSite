<?php

include 'dbh.php';
include '../header.php';

$items = mysqli_real_escape_string($db,$_POST['Item_Name']);
$SID = mysqli_real_escape_string($db,$_POST['StudentID']);
$CheckoutID = mysqli_real_escape_string($db,$_POST['CheckoutID']);
$u_last = $_SESSION['u_last'];
$u_first = $_SESSION['u_first'];

/* cleaning item input */
$items = str_replace( ' ', '', $items );
$items = str_replace( "\\r", "", $items );
$items = str_replace( "\\n", "", $items );
$items = str_split( $items, '4' );
$items = "'". implode( "', '", $items ) ."'";

/* get keeper name */
$KeeperName = $u_first . ' ' . $u_last;

/* clean student id */
$SID = substr( $SID, 3, 10 );
$SID = "'" . $SID . "'";


$firstcheck = "SELECT * FROM checkout
		WHERE (Items = (SELECT GROUP_CONCAT(name) 
		FROM equipment WHERE barcode IN($items))) 
		AND (StudentID = (SELECT CONCAT_WS(' ',FirstName, LastName) FROM student WHERE ID = $SID));";

$testingitems = mysqli_query($db,$firstcheck);
$checkitems = mysqli_num_rows($testingitems);
if($checkitems < 1){
    header("Location: ../pages/dmccheckout.php?IAM");
    mysqli_close($db);	
}else{

	$sql = "";

	$DueDate = date('m/d/Y');

	if ( strpos( $items, '0011' ) !== false ) {
		$sql .= "Update equipment SET COnum = COnum + 1 where barcode = '0011';";
	}

	if ( strpos( $items, '0016' ) !== false ) {
		$sql .= "Update equipment SET COnum = COnum + 1 where barcode = '0016';";
	}

	if ( strpos( $items, '0020' ) !== false ) {
		$sql .= "Update equipment SET COnum = COnum + 1 where barcode = '0020';";
	}

	if ( strpos( $items, '0027' ) !== false ) {
		$sql .= "Update equipment SET COnum = COnum + 1 where barcode = '0027';";
	}

	if ( strpos( $items, '0032' ) !== false ) {
		$sql .= "Update equipment SET COnum = COnum + 1 where barcode = '0032';";
	}

	if ( strpos( $items, '0038' ) !== false ) {
		$sql .= "Update equipment SET COnum = COnum + 1 where barcode = '0038';";
	}

	$sql .= "INSERT INTO checkoutlog (Items, StudentID, KeeperID)
		SELECT Items,StudentID,KeeperID FROM checkout
		WHERE (Items = (SELECT GROUP_CONCAT(name) 
		FROM equipment WHERE barcode IN($items))) AND (StudentID = (SELECT CONCAT_WS(' ',FirstName, LastName) FROM student WHERE ID = $SID));";

	$sql .= "UPDATE checkoutlog 
		 SET KeeperIDIN = '$KeeperName' 
		 WHERE (Items = (SELECT GROUP_CONCAT(name) 
		 FROM equipment WHERE barcode IN($items))) AND (StudentID = (SELECT CONCAT_WS(' ',FirstName, LastName) FROM student WHERE ID = $SID));";
		 
	$sql .= "UPDATE checkoutlog 
		 SET DateOfCheckin = '$DueDate' 
		 WHERE (Items = (SELECT GROUP_CONCAT(name) 
		 FROM equipment WHERE barcode IN($items))) AND (StudentID = (SELECT CONCAT_WS(' ',FirstName, LastName) FROM student WHERE ID = $SID));";
		 
	$sql .= "DELETE FROM checkout WHERE (Items = (SELECT GROUP_CONCAT(name) FROM equipment WHERE barcode IN ($items)))
	 	AND (StudentID = (SELECT CONCAT_WS(' ',FirstName, LastName) FROM student WHERE ID = $SID)) AND (ID = $CheckoutID);";

	$result = mysqli_multi_query($db,$sql);

	if(!$result){
    		header("Location: ../pages/dmccheckout.php?QWW");
    		mysqli_close($db);
	}else{
    		header("Location: ../pages/dmccheckout.php?Success");
    		mysqli_close($db);
	}
}


