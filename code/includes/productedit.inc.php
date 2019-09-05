<?php

include 'dbconnection.inc.php';

if(isset($_POST['submit'])){

  $ID = (int)$_POST['ID'];
  $CatID = (int)$_POST['CatID'];
  $Name = $_POST['Name'];
  $Image = $_POST['Image'];
  $Price = (int)$_POST['Price'];
  $Description = $_POST['Description'];
  $Inventory = (int)$_POST['Inventory'];

  //$sql = 'UPDATE Products SET CatID='. $_POST[CatID] . ', Name='. $_POST[Name] . ', Image=' . $_POST[Image] . ', Price ='. $_POST[Price] .', Description='. $_POST[Inventory] .' WHERE ID = '. $_POST[ID];
  $sql = "UPDATE Products SET CatID ='$CatID', Name ='$Name', Image = '$Image', Price = '$Price', Description = '$Description', Inventory = '$Inventory' WHERE ID = '$ID'";
    $result = mysqli_query ($con, $sql);
    if ($result === true) {
      header("Location: ../admin.php?update=success");
    } else {
      header("Location: ../admin.php?update=fail");
    }
}
