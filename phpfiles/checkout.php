<?php
include 'dbh.php';
include '../header.php';

/* clean/set/get variables */
$items = mysqli_real_escape_string( $db, $_POST[ 'Item_Name' ] );
$SID = mysqli_real_escape_string( $db, $_POST[ 'StudentID' ] );
$u_last = $_SESSION[ 'u_last' ];
$u_first = $_SESSION[ 'u_first' ];
$u_clvl = $_SESSION[ 'clvl' ];

/* Cleaning Item Input */
$items = str_replace( ' ', '', $items );
$items = str_replace( "\\r", "", $items );
$items = str_replace( "\\n", "", $items );
$items = str_split( $items, '4' );
$items = "'". implode( "', '", $items ) ."'";

/* Get Keeper Name */
$KeeperName = "'".$u_first . ' ' . $u_last."'";

/* Due Date collection */
$DueDate = "'".date('m/d/Y', strtotime('+4 days'))."'";

/* Clean Student ID */
$SID = substr( $SID, 3, 10 );
$SID = "'".$SID."'";

$sqlchecklock = "SELECT * FROM equipment WHERE barcode IN ($items) AND equiplock = 'True'";
$sqlchecklockresult = mysqli_query($db,$sqlchecklock);
$checklock = mysqli_num_rows($sqlchecklockresult);

if($checklock < 1){
	$sqlcheckrequirements = "SELECT DISTINCT clvl FROM equipment WHERE 
				(SELECT clvl FROM student WHERE ID = $SID) >= (SELECT MAX(clvl) FROM equipment WHERE barcode IN ($items))";
	$sqlcheckrequirementsresult = mysqli_query($db, $sqlcheckrequirements);
	$checkrequirements = mysqli_num_rows($sqlcheckrequirementsresult);
	if($checkrequirements >= 3){
		$sql = "INSERT into checkout(StudentID,KeeperID,DueDate,Items) 
		Values((SELECT CONCAT_WS(' ',FirstName, LastName) FROM student WHERE ID = $SID),
			$KeeperName,
			$DueDate,
			(SELECT GROUP_CONCAT(name) FROM equipment WHERE barcode IN ($items)))";
				
		$result = mysqli_query($db,$sql);

		if ( !$result ) {
			header( "Location: ../pages/dmccheckout.php?QWW");
			mysqli_close( $db );
		}else{
			header( "Location: ../pages/dmccheckout.php?Success");
			mysqli_close( $db );
		}
	}else{
		header( "Location: ../pages/dmccheckout.php?SDNMR");
		mysqli_close( $db );
	}
}else{
	header( "Location: ../pages/dmccheckout.php?IL=".$checklock);
	mysqli_close( $db );
}
