<?php

if (isset($_POST['signup-submit'])){

  require 'dbconnection.inc.php';

  $Name = $_POST['Name'];
  $Address = $_POST['Address'];
  $telNum = $_POST['telNum'];
  $Email = $_POST['Email'];
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];
  $Password_repeat = $_POST['Password-repeat'];


  if (empty($Name) || empty($Address) || empty($telNum) || empty($Email) || empty($Username) || empty($Password) || empty($Password_repeat)) {
    header("Location: ../signup.php?error=emptyfields&Name=".$Name."&Address=".$Address."&telNum=".$telNum."&Email=".$Email."&Username=".$Username);
    exit();
  }
  else if (!filter_var($Email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA_Z0-9]*$/", $Username)) {
    header("Location: ../signup.php?error=invalidEmailUsername");
    exit();
  }
  else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidEmail&Name=".$Name."&Address=".$Address."&telNum=".$telNum."&Username=".$Username);
    exit();
  }
  else if (!preg_match("/^[a-zA_Z0-9]*$/", $UserName)) {
    header("Location: ../signup.php?error=invalidUsername&Name=".$Name."&Address=".$Address."&telNum=".$telNum."&Email=".$Email);
    exit();
  }
  else if ($Password !== $Password_repeat) {
    header("Location: ../signup.php?error=PasswordCheck&Username=".$Username."&Mail=".$Email);
    exit();
  }
  else {

    $sql = "SELECT Username FROM Customers WHERE Username=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $Username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signup.php?error=UsernameTaken&Name=".$Name."&Address=".$Address."&telNum=".$telNum."&Email=".$Email);
        exit();
      }
      else {

        $sql = "INSERT INTO Customers (Name, Address, telNum, Email, Username, Password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {

          header("Location: ../signup.php?error=sqlerror");
          exit();
      }
      else {
        $hashedPwd = password_hash($Password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssssss", $Name, $Address, $telNum, $Email, $Username, $hashedPwd);
        mysqli_stmt_execute($stmt);
        header("Location: ../signup.php?signup=success");
        exit();
      }
    }

  }


}
mysqli_stmt_close($stmt);
mysqli_close($con);

}
else{
  header("Location: ../signup.php");
}
