<?php
//include_once 'auth.php';
  include 'header.php'

?>



<div style="clear:both"></div>
<!--table-->
<div class ="table-responsive">
  <table class = "table">
    <tr><th colspan = "9"><h3>Products</h3></th></tr>
  <tr>
    <th width="5%">ID</th>
    <th width="5%">Category ID</th>
    <th width="15%">Name</th>
    <th width="20%">Image Directory</th>
    <th width="15%">Price</th>
    <th width="35%">Description</th>
    <th width="5%">Inventory</th>
    <th width="5%">Edit</th>
    <th width="5%">Delete</th>
  </tr>

<?php
//connects to database to provide products
include 'includes/dbconnection.inc.php';

$query = 'select * FROM Products ORDER by CatID ASC';

$result = mysqli_query ($con, $query);

if($result):
  if(mysqli_num_rows($result)> 0 ):
    while($product = mysqli_fetch_assoc($result)):
//  print_r($product);
?>

<div class = "data">
  <tr method = "post">
    <td><?php echo $product['ID']; ?></td>
    <td><?php echo $product['CatID']; ?></td>
    <td><?php echo $product['Name']; ?></td>
    <td><?php echo $product['Image']; ?></td>
    <td>$ <?php echo $product['Price']; ?></td>
    <td><?php echo $product['Description']; ?></td>
    <td><?php echo $product['Inventory']; ?></td>
    <td>
        <a href="edit.php?action=edit&ID=<?php echo $product['ID']; ?>">
            <div class="btn-danger">Edit</div>
        </a>
    </td>
    <td>
        <a href="includes/delete.inc.php?action=delete&ID=<?php echo $product['ID']; ?>">
            <div class="btn-danger">Delete</div>
        </a>
    </td>
  </tr>
<?php
    endwhile;
  endif;
endif;
?>

</table>
<br>

<form action="includes/productupdate.inc.php" method="POST">
  <input type="number" name="CatID"  placeholder="Category ID">
  <input type="text" name="Name"  placeholder="Product Name">
  <input type="text" name="Image"  placeholder="Image Directory">
  <input type="number" name="Price"  placeholder="Price" step=".01">
  <input type="text" name="Description"  placeholder="Description">
  <input type="number" name="Inventory"  placeholder="Inventory">
  <button type="submit" name="submit">Update</button>


</form>






</div>
</body>

</html>
