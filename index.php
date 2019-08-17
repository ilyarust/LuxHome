<?php
  include 'header.php';

?>

<main>
  <?php
  if (isset($_SESSION['ID'])) {
    echo '<p style="text-align:center"><b> You are logged in!</b></p>';
  }
  ?>
  <!--quick info of website-->
    <div id="text1">
      <p style="text-align:center"> LuxHome.</p>
      <p style="text-align:center"> Your one-stop shop for all your office or battlestation needs</p>
      <p style="text-align:center"> We offer a range of products for any one persons budget.</p>
      <p style="text-align:center"> All of our products will be shipped within 5-7 business days.</p>
    </div>
    <hr>
    <!-- image of products-->
    <div id="image1">
      <img src="https://i.ytimg.com/vi/JsW1GPUr6h8/maxresdefault.jpg" class="img-fluid" class="rounded" width ="800" height ="500"</img></p>
    </div>
</main>
</div>
</body>
  <footer>
    <small>&copy; Test Copyright 2019, LuxHome</small>
  </footer>
</html>
