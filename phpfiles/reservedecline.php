<?php

include 'dbh.php';

$id = htmlspecialchars($_GET["id"]);

$sql = "Update reserve
		SET Approved = 'X'
		WHERE ID = $id";

$result = mysqli_query($db,$sql);

if(!$result){
    header("Location: ../pages/dmccheckout.php?QWW");
    mysqli_close($db);
}else{
    header("Location: ../pages/dmccheckout.php?Success");
    mysqli_close($db);
}