<?php
  include 'header.php';


  //function for deleting products from cart
  if(filter_input(INPUT_GET, 'action') == 'delete'){
    foreach($_SESSION['cart'] as $key => $product){
      if ($product['ID'] == filter_input(INPUT_GET, 'ID')){
        unset($_SESSION['cart'][$key]);
      }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
  }

  //function for updating quantity in Cart
  if(filter_input(INPUT_POST, 'Update') == 'Update'){
    foreach($_SESSION['cart'] as $key => $product){
      //print("Here: $key -> $product <BR>");
      if ($product['Quantity'] !== (int)$_POST['Quantity'][$key]){
        $_SESSION['cart'][$key]['Quantity'] = (int)$_POST['Quantity'][$key];
      }
    }

  }
 ?>


<!--Code for Order List with Remove Function-->
<div style="clear:both"></div>
<br/>
<!--table-->
<div class ="table-responsive">
  <form method="POST" action="cart.php">
  <table class = "table">
    <tr><th colspan = "5"><h3>Order Details</h3></th></tr>
  <tr>
    <th width="40%">Product Name</th>
      <th width="10%">Quantity <input type="submit" name="Update" value="Update"> </th>
    <th width="20%">Price</th>
    <th width="15%">Total</th>
    <th width="5%">Action</th>
  </tr>
  <?php
  //checks if Cart is empty, if not empty prints product info
  if(!empty($_SESSION['cart'])):

    $total = 0;

    foreach($_SESSION['cart'] as $key => $product):
  ?>
  <tr>
    <td><?php echo $product['Name']; ?></td>
    <td><input type="number" name="Quantity[<?php echo $key?>]" value="<?php echo $product['Quantity']; ?>"></td>
    <td>$ <?php echo $product['Price']; ?></td>
    <td>$ <?php echo number_format($product['Quantity'] * $product['Price'],2); ?></td>
    <td>
        <a href="cart.php?action=delete&ID=<?php echo $product['ID']; ?>">
            <div class="btn-danger">Remove</div>
        </a>
    </td>
  </tr>
  <?php
      $total = $total + ($product['Quantity'] * $product['Price']);
    endforeach;
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
          <a href="checkout.php" class="button">Checkout</a>
        <?php endif; endif; ?>
      </td>
  </tr>
  <?php
  endif;
  ?>
  </table>
</form>
</div>
