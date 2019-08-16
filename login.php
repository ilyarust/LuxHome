<?php
  include 'header.php'
?>


<main>
  <h1>Login</h1>
  <form  style = "text-align:center" class="form-horizontal" width="50%" action="includes/login.inc.php" method="post">
    <input type="text" class="form-control" name="Email_Username" placeholder="Email/Username">
    <input type="password" class="form-control" name="Password" placeholder="Password">
    <button type="submit" class="btn btn-default" name="login-submit">Login</button>

  </form>
</main>
