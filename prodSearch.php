<?php
include 'header.php';
include 'includes/dbconnection.inc.php';

if(isset($_POST['submit-Search'])){
  $search =   mysqli_real_escape_string($con, $_POST['search']);
  $query =  "select * FROM Products WHERE Name LIKE '%$search%'";
  $result = mysqli_query ($con, $query);
  $query_result = mysqli_num_rows($result);

  if ($query_result > 0) {
    while($product =  mysqli_fetch_assoc($result)){
?>
      <!--Prints out product form for all available products-->
      <div class = "col-sm-4 col-md-3" >
        <form method = "post" action="products.php?action=add&ID=<?php echo $product['ID']; ?>">
          <div class = "products">
            <img src = "<?php echo $product['Image']; ?>" class = "img-responsive" width = "200px"  height = "160px"/>
            <h4 class = "text-info"><?php echo $product['Name'];?></h4>
            <h5 class = "text-info"><?php echo $product['Description'];?></h5>
            <h4>$ <?php echo $product['Price']; ?></h4>
            <input type="text" name ="Quantity" class="form-control" value ="1" />
            <input type="hidden" name="Name" value="<?php echo $product['Name']; ?>" />
            <input type="hidden" name="Price" value="<?php echo $product['Price']; ?>" />
            <input type="submit" name="add_to_cart" style = "margin-top:5px;" class ="btn btn-info" value ="Add to Cart" />
          </div>
        </form>
      </div>

      <?php
    }
  }else {
    echo "There are no results!";
  }
}
      ?>


      </div>
    </body>

    </html>
