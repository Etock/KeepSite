<?php

include 'dbh.php';

$barcode = mysqli_real_escape_string($db,$_POST['BarCode_Number']);
$name = mysqli_real_escape_string($db,$_POST['Item_Name']);
$clvl = mysqli_real_escape_string($db,$_POST['Clearance_Number']);
$mainitem = mysqli_real_escape_string($db,$_POST['Main_Item']);
$itemtype = mysqli_real_escape_string($db,$_POST['Item_Type']);

    $sql = "INSERT INTO equipment (barcode,name,clvl,COnum,main,EquipType) VALUES ('$barcode','$name','$clvl','0','$mainitem','$itemtype')";
    $result = mysqli_query($db,$sql);

if(!$result){
    header("Location: ../pages/dmcitems.php?QWW");
    mysqli_close($db);
}else{
    header("Location: ../pages/dmcitems.php?Success");
    mysqli_close($db);
}