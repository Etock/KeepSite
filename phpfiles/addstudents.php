<?php

include 'dbh.php';

$SID = mysqli_real_escape_string($db,$_POST['ID_Number']);
$fname = mysqli_real_escape_string($db,$_POST['First_Name']);
$lname = mysqli_real_escape_string($db,$_POST['Last_Name']);
$clvl = mysqli_real_escape_string($db,$_POST['ClearanceLevel']);
$slvl = mysqli_real_escape_string($db,$_POST['SecurityLevel']);
$password = mysqli_real_escape_string($db,$_POST['Password']);
$passwordconfirm = mysqli_real_escape_string($db,$_POST['PasswordConfirm']);

$SID = substr( $SID, 3, 10 );
$SID = "'" . $SID . "'";


if(strcmp($password, $passwordconfirm) != 0){
	header("Location: ../pages/dmcstudents.php?PWDM");
   	mysqli_close($db);
}else{

$hashedpassword = md5($password);


if(isset($_POST['checkboxes-0'])){
	$checkbox0 = 'X';
}
else{
    $checkbox0 = '';
}
if(isset($_POST['checkboxes-1'])){
	$checkbox1 = 'X';
}
else{
    $checkbox1 = '';
}
if(isset($_POST['checkboxes-2'])){
	$checkbox2 = 'X';
}
else{
    $checkbox2 = '';
}
if(isset($_POST['checkboxes-3'])){
	$checkbox3 = 'X';
}
else{
    $checkbox3 = '';
}
if(isset($_POST['checkboxes-4'])){
	$checkbox4 = 'X';
}
else{
    $checkbox4 = '';
}
if(isset($_POST['checkboxes-5'])){
	$checkbox5 = 'X';
}
else{
    $checkbox5 = '';
}

$sql = "INSERT INTO student (ID,FirstName,LastName,clvl,SecurityLevel,game,video,photo,sound,web,graphic,Password) VALUES ($SID,'$fname','$lname','$clvl','$slvl','$checkbox0','$checkbox1','$checkbox2','$checkbox3','$checkbox4','$checkbox5','$hashedpassword')";

$result = mysqli_query($db,$sql);

if(!$result){
    header("Location: ../pages/dmcstudents.php?SIDE");
    mysqli_close($db);
}else{
    header("Location: ../pages/dmcstudents.php?Success");
    mysqli_close($db);
}
}