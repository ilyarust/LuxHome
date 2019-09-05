<?php
  include 'includes/auth.inc.php';
  session_start();

  function pre_r($array){
      echo '<pre>';
      print_r($array);
      echo '</pre>';
  }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LuxHome</title>
    <meta name="description" content="DESCRIPTION">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <link rel = "stylesheet" type = "text/css" href = "myStyleSheet.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

  <div class = "container">
    <h1 style="text-align:center">LuxHome</h1>
    <!--Navigation through website-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
      </ul>

      <ul class="navbar-nav">
        <li>
          <a class="nav-link" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
        </li>
        <?php
          if (isset($_SESSION['ID'])) {
            echo '<li><a class="nav-link" href="orders.php"><span class="glyphicon glyphicon-book"></span> Orders</a></li>
            <li><a class="nav-link" href="includes/logout.inc.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';

          }
          else {
            echo '<li><a class="nav-link" href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a class="nav-link" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
          }
         ?>
        <li><a class="nav-link" href="admin.php"><span class="glyphicon glyphicon-lock"></span> Admin</a></li>
      </ul>
    </nav>


    <hr>
