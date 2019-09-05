<?php
//starts session and creates empty array for cart
session_start();
$product_IDs = array();

//Checks if Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'add_to_cart')){
  //adds product to cart and pushes data
  if(isset($_SESSION['cart'])){

    //keeps track of item count in shopping cart
    $count = count($_SESSION['cart']);

    //creates an array that assigns array key to product ID
    $product_IDs = array_column($_SESSION['cart'], 'ID');

    //adds product to cart
    if(!in_array(filter_input(INPUT_GET, 'ID'), $product_IDs)){
      $_SESSION['cart'][$count] = array
        (
            'ID' => filter_input(INPUT_GET, 'ID'),
            'Name' => filter_input(INPUT_POST, 'Name'),
            'Price' => filter_input(INPUT_POST, 'Price'),
            'Quantity' => filter_input(INPUT_POST, 'Quantity')
          );
    }
    else{
      //checks if product exists in cart, if it does then it updates quantity
      for($i = 0;$i < count($product_IDs); $i++ ){
        if($product_IDs[$i] == filter_input(INPUT_GET,'ID')){
          $_SESSION['cart'][$i]['Quantity'] += filter_input(INPUT_POST, 'Quantity');
        }
      }
    }

  }
  else{

    //If the cart array is empty, this creates an array using the submitted form data from product
    $_SESSION['cart'][0] = array
    (
        'ID' => filter_input(INPUT_GET, 'ID'),
        'Name' => filter_input(INPUT_POST, 'Name'),
        'Price' => filter_input(INPUT_POST, 'Price'),
        'Quantity' => filter_input(INPUT_POST, 'Quantity')
      );
  }
}
//pre_r($_SESSION);
//test format for arra
?>

<!--creates header for page-->
<?php
  include 'header.php';
?>
<form action="prodSearch.php" method="POST">
  <input type="text"  name="search" placeholder="Search">
  <button type="submit" name="submit-Search">Search</button>
</form>
<br>


  <?php
  //connects to database to provide products
  include 'includes/dbconnection.inc.php';


  $query = 'select * FROM Products ORDER by CatID ASC';

  $result = mysqli_query ($con, $query);

  if($result):
    if(mysqli_num_rows($result)> 0 ):
      while($product = mysqli_fetch_assoc($result)):
        //print_r($product);
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
      endwhile;
    endif;
  endif;

  pre_r($query);
  ?>



  </div>
</body>

</html>
