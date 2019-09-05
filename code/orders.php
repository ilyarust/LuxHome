<?php
  include 'header.php';
?>

<div style="clear:both"></div>
<br/>
<!--table-->
<div class ="table-responsive">
  <table class = "table">
    <tr><th colspan = "5"><h3>Order Details</h3></th></tr>
  <tr>
    <th width="10%">Order #</th>
    <th width="55%">Products</th>
    <th width="20%">Date Ordered</th>
    <th width="15%">Total</th>
  </tr>

<?php
  if(isset($_SESSION['ID'])){
    include 'includes/dbconnection.inc.php';
    $query = 'SELECT * FROM Orders WHERE customerID = '. $_SESSION['ID'];
    $result = mysqli_query ($con, $query);

    if($result):
      if(mysqli_num_rows($result)> 0 ):
        while($row = mysqli_fetch_assoc($result)):
?>
        <div class = "data">
          <tr method = "post">
            <td><?php echo $row['ID']; ?></td>
            <td><table class = "table">
          <tr>
            <th width="50%">Name</th>
            <th width="25%">Quantity</th>
            <th width="25%">Price</th>
          </tr>
<?php
          $sql = 'SELECT p.Name, p.Price, d.Quantity FROM Products p, OrderDetail d WHERE p.ID = d.ProdID and d.OrderID ='. $row['ID'];
          $test = mysqli_query($con, $sql);
          if ($test):
            if (mysqli_num_rows($test) > 0):
              while ($rows = mysqli_fetch_assoc($test)):
 ?>
                <tr>
                  <th width="50%"><?=$rows['Name']?></th>
                  <th width="25%"><?=$rows['Quantity']?></th>
                  <th width="25%"><?=$rows['Price']?></th>
                </tr>

<?php
             endwhile;
           endif;
         endif;
 ?>


          </table></td>
            <td><?php echo $row['DateOrdered']; ?></td>
            <td>$ <?php echo $row['Total']; ?></td>
          </tr>
<?php
     endwhile;
   endif;
 endif;
   //pre_r($Orderslist);
}
 ?>

 </table>
</div>
