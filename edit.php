<?php
  include 'header.php'
?>


<div style="clear:both"></div>
<!--table-->
<div class ="table-responsive">
  <table class = "table">
    <tr><th colspan = "7"><h3>Products</h3></th></tr>
  <tr>
    <th width="5%">Category ID</th>
    <th width="15%">Name</th>
    <th width="20%">Image Directory</th>
    <th width="20%">Price</th>
    <th width="25%">Description</th>
    <th width="5%">Inventory</th>
    <th width="5%">Action</th>
  </tr>

  <?php
  //connects to database to provide products
  include 'includes/dbconnection.inc.php';

  $query = 'select * FROM Products WHERE ID = ' . $_GET['ID'];

  $result = mysqli_query ($con, $query);

  if($result):
    if(mysqli_num_rows($result)> 0 ):
      while($product = mysqli_fetch_assoc($result)):
      //  print_r($product);
  ?>
  <div class = "data">
    <form method = "POST" action = "includes/productedit.inc.php">
    <tr>
      <input type="hidden" name="ID" value="<?php echo $product['ID']; ?>">
      <td><input type="number" name="CatID" value="<?php echo $product['CatID']; ?>"></td>
      <td><input type="text" name="Name" value="<?php echo $product['Name']; ?>"></td>
      <td><input type="text" name="Image" value="<?php echo $product['Image']; ?>"></td>
      <td><input type="number" name="Price" value="<?php echo $product['Price']; ?>"></td>
      <td><input type="text" name="Description" value="<?php echo $product['Description']; ?>"></td>
      <td><input type="number" name="Inventory" value="<?php echo $product['Inventory']; ?>"></td>
      <td><button type="submit" name="submit" value ="update">Update</button></td>
    </tr>
  </form>
  <?php
      endwhile;
    endif;
  endif;
  ?>

  </table>
  <br>




</div>
</body>

</html>
