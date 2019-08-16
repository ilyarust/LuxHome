<?php
  include 'header.php'
?>


<main>
  <h1>Signup</h1>
  <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "emptyfields") {
        echo '<p>Fill in All Fields!</p>';
      }
      else if ($_GET['error'] == "invalidEmailUsername") {
        echo '<p>Invalid Username and Email!</p>';
      }
      else if ($_GET['error'] == "invalidEmail") {
        echo '<p>Invalid Email!</p>';
      }
      else if ($_GET['error'] == "invalidUsername") {
        echo '<p>Invalid Username!</p>';
      }
      else if ($_GET['error'] == "PasswordCheck") {
        echo '<p>Your Passwords do not match!</p>';
      }
      else if ($_GET['error'] == "UsernameTaken") {
        echo '<p>Username is already taken!</p>';
      }
    }
    else if ($_GET['signup'] == "success") {
      echo '<p>Signup Successed!</p>';
    }
   ?>

  <form  style = "text-align:center" class="form-horizontal" width="50%" action="includes/signup.inc.php" method="post">
    <input type="text" class="form-control" name="Name" placeholder="Name">
    <input type="text" class="form-control" name="Address" placeholder="Address">
    <input type="text" class="form-control" name="telNum" placeholder="Phone Number">
    <input type="text" class="form-control" name="Email" placeholder="Email">
    <input type="text" class="form-control" name="Username" placeholder="Username">
    <input type="password" class="form-control" name="Password" placeholder="Password">
    <input type="password" class="form-control" name="Password-repeat" placeholder="Repeat Password">
    <button type="submit" class="btn btn-default" name="signup-submit">Signup</button>

  </form>
</main>
