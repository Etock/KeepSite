<?php

include '../phpfiles/dbh.php';
include '../header.php';

$items = mysqli_real_escape_string($db,$_POST['Item_Name']);
$SID = $_SESSION['u_id'];
$ReserveDate = mysqli_real_escape_string($db,$_POST['StartDate']);
$ReserveDateEnd = mysqli_real_escape_string($db,$_POST['EndDate']);

$sql = "INSERT INTO reserve (Items,StudentID,ReserveDate,ReserveDateEnd) VALUES ('$items','$SID','$ReserveDate', '$ReserveDateEnd');";
$sql .= "Update reserve SET StudentName = (SELECT CONCAT_WS(' ',FirstName, LastName) FROM student WHERE ID = $SID) WHERE StudentID = $SID;";

$result = mysqli_multi_query($db,$sql);


if(!$result){
    header("Location: ../pages/dmcitems.php?QWW".$SID);
    mysqli_close($db);
}else{
    header("Location: ../pages/dmcitems.php?Success".$items);
    mysqli_close($db);
}
