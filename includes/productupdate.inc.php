<?php

include 'dbconnection.inc.php';
if((int)$_POST['CatID'] > 0){
  $CatID = (int)$_POST['CatID'];
  $Name = $_POST['Name'];
  $Image = $_POST['Image'];
  $Price = (int)$_POST['Price'];
  $Description = $_POST['Description'];
  $Inventory = (int)$_POST['Inventory'];

  $sql = "INSERT INTO Products (CatID, Name, Image, Price, Description,
    Inventory) VALUES ($CatID,'$Name','$Image',$Price,'$Description',$Inventory)";


  if (mysqli_query($con, $sql)) {
    header("Location: ../admin.php?update=success");
    exit();
  }



}else{
  header("Location: ../admin.php?update=error");
}
