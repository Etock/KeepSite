<?php

include 'dbh.php';
$id = htmlspecialchars($_GET["id"]);

$sql = "DELETE FROM student WHERE ID = $id";

$result = mysqli_query($db,$sql);

if(!$result){
    header("Location: ../pages/dmcstudentsdmcstudent.php?QWW");
    mysqli_close($db);
}else{
    header("Location: ../pages/dmcstudents.php?Success");
    mysqli_close($db);
}


