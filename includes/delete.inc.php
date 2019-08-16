<?php

include 'dbconnection.inc.php';
if(filter_input(INPUT_GET, 'action') == 'delete'){
  $sql = 'DELETE FROM Products WHERE ID = ' . $_GET['ID'];

  if (mysqli_query($con, $sql)) {
    header("Location: ../admin.php?update=success");
  }
  else {
    header("Location: ../admin.php?update=error");
  }
}
