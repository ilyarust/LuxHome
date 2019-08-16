<?php
  session_start();
  require 'dbconnection.inc.php';

if (!isset($_POST)) {
  header("Location: ../checkout.php?update=error3");
  exit();
  }

  $CustomerID = (int)$_SESSION['ID'];
  $OrderDate = date(DATE_RFC822);
  $Total = $_SESSION['total'];
  $sql = "INSERT INTO Orders (customerID, Total, DateOrdered) VALUES ($CustomerID,$Total,'$OrderDate');";
  if (mysqli_query($con, $sql)) {
    header("Location: ../checkout2.php?update=success");
    //unset($_SESSION['cart']);
    $OrderID = mysqli_insert_id($con);

  }
  else {
    header("Location: ../checkout.php?update=error");

  }
  //$OrderID = mysqli_insert_id($con);


  if (is_array($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $key => $product){
      $ProdID = (int)$product['ID'];
      $ProdQuant = (int)$product['Quantity'];
      $query = "INSERT INTO OrderDetail (OrderID, ProdID, Quantity) VALUES ($OrderID,$ProdID,$ProdQuant);";
      mysqli_query($con, $query);
      unset($_SESSION['cart']);
    }
  }
  else {
    header("Location: ../checkout.php?update=error2");
    exit();
  }
