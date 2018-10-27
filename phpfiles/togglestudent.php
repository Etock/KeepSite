<?php

include 'dbh.php';

$id = htmlspecialchars($_GET["id"]);

$sql = "Update student
		SET SecurityLevel = 
							CASE 
	 							WHEN SecurityLevel = 'Student' THEN 'Keeper'
	 							WHEN SecurityLevel = 'Keeper' THEN 'Head Keeper'
	 							WHEN SecurityLevel = 'Head Keeper' THEN 'Student'
	 							WHEN SecurityLevel = 'Admin' THEN 'Admin'
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
