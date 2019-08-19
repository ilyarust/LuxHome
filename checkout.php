<?php
//  pre_r($_SESSION);
session_start();
  if(!isset($_SESSION['ID']) || (int)$_SESSION['ID'] <= 0){
    header("Location:login.php");
    exit();
  }
  include 'header.php';
?>


<div style="clear:both"></div>
<!--table-->
<div class ="table-responsive">
  <table class = "table">
    <tr><th colspan = "4"><h3>User Info</h3></th></tr>
  <tr>
    <th width="25%">Name</th>
    <th width="25%">Address</th>
    <th width="25%">Phone Number</th>
    <th width="25%">Email</th>
  </tr>

  <?php
  //connects to database to provide products
  include 'includes/dbconnection.inc.php';

  $query = 'select * FROM Customers WHERE ID = ' . $_SESSION['ID'];

  $result = mysqli_query ($con, $query);

  if($result):
    if(mysqli_num_rows($result)> 0 ):
      while($product = mysqli_fetch_assoc($result)):
        //pre_r($product);
  ?>
  <div class = "data">
    <tr method = "post">
      <td><?php echo $product['Name']; ?></td>
      <td><?php echo $product['Address']; ?></td>
      <td><?php echo $product['telNum']; ?></td>
      <td><?php echo $product['Email']; ?></td>
    </tr>
  <?php
      endwhile;
    endif;
  endif;
  ?>

  </table>

  <!--Code for Order List with Remove Function-->
  <div style="clear:both"></div>
  <br/>
  <!--table-->
  <div class ="table-responsive">
    <table class = "table">
      <tr><th colspan = "4"><h3>Order Details</h3></th></tr>
    <tr>
      <th width="55%">Product Name</th>
      <th width="10%">Quantity</th>
      <th width="20%">Price</th>
      <th width="15%">Total</th>
    </tr>
    <?php
    //checks if Cart is empty, if not empty prints product info
    if(!empty($_SESSION['cart'])):

      $total = 0;

      foreach($_SESSION['cart'] as $key => $product):

    ?>
    <tr>
      <td><?php echo $product['Name']; ?></td>
      <td><?php echo $product['Quantity']; ?></td>
      <td>$ <?php echo $product['Price']; ?></td>
      <td>$ <?php echo number_format($product['Quantity'] * $product['Price'],2); ?></td>
    </tr>
    <?php
        $total = $total + ($product['Quantity'] * $product['Price']);
        $_SESSION['total'] = $total;
      endforeach;
      //pre_r($_SESSION['cart']);
    //  pre_r($_SESSION['total']);
    ?>
    <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">$ <?php echo number_format($total, 2); ?></td>
        <td></td>
    </tr>
    <tr>
      <!--If one or more items in cart, Checkout button appears-->
        <td colspan="5">
          <?php
            if (isset($_SESSION['cart'])):
            if (count($_SESSION['cart']) > 0):
          ?>
            <a href="includes/checkout.inc.php" method = "POST" class="button">Confirm Order</a>
          <?php endif; endif; ?>
        </td>
    </tr>
    <?php
    endif;
    ?>
    </table>
  </div>
