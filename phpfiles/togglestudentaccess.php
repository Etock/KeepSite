<?php

include 'dbh.php';
$id = htmlspecialchars($_GET["id"]);

$sql = "Update student
		SET clvl = 
							CASE 
	 							WHEN clvl = '0' THEN '1'
	 							WHEN clvl = '1' THEN '2'
	 							WHEN clvl = '2' THEN '3'
	 							WHEN clvl = '3' THEN '0'
							END
		WHERE ID = $id";

$result = mysqli_query($db,$sql);

if(!$result){
    header("Location: ../pages/dmcstudents.php?QWW");
    mysqli_close($db);
}else{
    header("Location: ../pages/dmcstudents.php?Success");
    mysqli_close($db);
}