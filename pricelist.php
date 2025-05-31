
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/dfba0bb4d8.js"></script>
</head>
<body>
    
    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <a href="#" id="close"><i class='fa fa-close'></i></a>
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a class="active" href="pricelist.php">Price List</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li id="lg-bag"><a href="cart.html"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div id="mobile">
            <!-- <a href="cart.html"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a> -->
            <i id="bar" class="fa fa-bars" aria-hidden="true"></i>      
                 
        </div>
    </section>

    <section id="feature" class="section-p1">

    <h6 style="text-align: center;">ONE SOUND CRACKERS (60% DISCOUNT)</h6>

<div style="display: flex; justify-content: flex-end; align-items: center; gap: 20px; margin-bottom: 15px;">
    <div id="totalBox">Grand Total: ₹<span id="grandTotal">0</span></div>
    <form id="checkoutForm" method="POST" action="checkout.php" onsubmit="return prepareOrderData()">
    <input type="hidden" name="order_data" id="order_data">
    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
        <img src="img/download.png" alt="Checkout" title="Proceed to Checkout" width="60">
        <h3 style="font-size: 16px;">Click me</h3>
    </button>
</form>
</div>


     <div class="table-container">
    <table>
    <tr>
       
      <th>Image</th>
      <th>Code</th>
      <th class="product">Product Name</th>
      <th>Content</th>
      <th>Actual Price</th>
      <th>Amount (40%)</th>
      <th class="quantity">Quantity</th>
      <th>Total</th>

    </tr>

    <tr>
      <th colspan="8" class="section-header">
        ONE SOUND CRACKERS (60% DISCOUNT)
      </th>
    </tr>
    <tr>
      <th colspan="16" class="section-header">
        ONE SOUND CRACKERS (60% DISCOUNT)
      </th>
    </tr>


    <?php
  $products = [
      ["img" => "img/img1.jpg", "code" => 21, "name" => "5'' Atom Bomb (10 Pkts)", "content" => "Box", "actual" => 600],
      ["img" => "img/img5.jpg", "code" => 22, "name" => "7 Shots Mini Rockets", "content" => "Pack", "actual" => 300],
      ["img" => "img/img6.jpg", "code" => 23, "name" => "Color Sparklers (10 Pkts)", "content" => "Bundle", "actual" => 200],
  ];

  foreach ($products as $index => $product) {
      $discount = floor($product["actual"] * 0.4); // 50% OFF
      echo "<tr class='highlight'>
              <td><img src='{$product["img"]}' alt='Product' width='40'></td>
              <td>{$product["code"]}</td>
              <td>{$product["name"]}</td>
              <td>{$product["content"]}</td>
              <td><s>₹{$product["actual"]}</s></td>
              <td>₹{$discount}</td>
              <td><input type='number' min='0' class='quantity-input' data-index='n{$index}'></td>
              <td class='product-total' id='total-n{$index}'>₹0</td>
            </tr>";
  }
  ?>
         <tr>
    <th colspan="8" class="section-header">
      NEXT SECTION: NEW CRACKERS (50% DISCOUNT)
    </th>
  </tr>

     <?php
  $products = [
      ["img" => "img/img4.jpg", "code" => 21, "name" => "5'' Atom Bomb (10 Pkts)", "content" => "Box", "actual" => 600],
      ["img" => "img/img5.jpg", "code" => 22, "name" => "7 Shots Mini Rockets", "content" => "Pack", "actual" => 300],
      ["img" => "img/img6.jpg", "code" => 23, "name" => "Color Sparklers (10 Pkts)", "content" => "Bundle", "actual" => 200],
  ];

  foreach ($products as $index => $product) {
      $discount = floor($product["actual"] * 0.4); // 50% OFF
      echo "<tr class='highlight'>
              <td><img src='{$product["img"]}' alt='Product' width='60'></td>
              <td>{$product["code"]}</td>
              <td>{$product["name"]}</td>
              <td>{$product["content"]}</td>
              <td><s>₹{$product["actual"]}</s></td>
              <td>₹{$discount}</td>
              <td><input type='number' min='0' class='quantity-input' data-index='n{$index}'></td>
              <td class='product-total' id='total-n{$index}'>₹0</td>
            </tr>";
  }
  ?>
    </table>
    </div>
   
<div id="orderSummary"></div>
 </section>



   <footer class="section-p1">
    <div class="col">
        <img class="logo" src="img/logo.png" alt="">
        <h4>Contact</h4>
        <p><strong>Address :</strong> Lorem ipsum dolor sit</p>
        <p><strong>Phone :</strong> 13569876540</p>
        <p><strong>Hours :</strong> 5hoai</p>
        <div class="follow">
            <h4>Follow Us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>

    <div class="col">
        <h4>About</h4>
        <a href="#">About US</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Contact Us</a>
        <a href="#">About US</a>
    </div>

    <div class="col">
        <h4>MY Account</h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
    </div>


    <div class="col install">
        <h4>Install App</h4>
        <p>From app store or Google PLay Store</p>
        <div class="row">
            <img src="img/pay/app.jpg" alt="">
            <img src="img/pay/play.jpg" alt="">
        </div>
        <p>Secured payment Gateways</p>
        <img src="img/pay/pay.png" alt="">
    </div>

    <div class="copyright">
        <p>c 2022, With ❤ Bhandary ,  Ecommerce Website Template</p>
    </div>

   </footer>
   <script>
    const numProducts = <?= count($products) ?>;
</script>

    <script src="script.js"></script>
</body>
</html>