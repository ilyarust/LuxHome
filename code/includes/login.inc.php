<?php

if (isset($_POST['login-submit'])) {

  require 'dbconnection.inc.php';

  $Email_Username = $_POST['Email_Username'];
  $Password = $_POST['Password'];

  if (empty($Email_Username) || empty($Password)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM Customers WHERE Username=? OR Email=?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../login.php?error=sqlerror");
      exit();
    }
    else {

      mysqli_stmt_bind_param($stmt, "ss", $Email_Username, $Email_Username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $PasswordCheck = password_verify($Password, $row['Password']);
        if ($PasswordCheck == false) {
          header("Location: ../login.php?error=WrongPassword");
          exit();
        }
        else if ($PasswordCheck == true) {
          session_start();
          $_SESSION['ID'] = $row['ID'];
          $_SESSION['Username'] = $row['Username'];
          //come back and put in all other user data to continue throughout shopping session

          header("Location: ../index.php?login=success");
          exit();

        }
        else {
          header("Location: ../login.php?error=WrongPassword");
          echo '<p><b>The password you have entered is incorrect!</b></p>';
          exit();
        }
      }
      else {
        header("Location: ../login.php?error=noUser");
        exit();
      }

    }
  }

}
else {
  header("Location: ../login.php");
  exit();
}
