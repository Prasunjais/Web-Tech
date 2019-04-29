<?php 
// include database configuration file
include 'dbConfig.php';
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>WEb Tech Book Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="w3.css">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="style2.css" type="text/css">
    <script type="text/JavaScript">
 
    </script>
    </head>
<body>
<div id="frame">
  <div id="headcontainer">
    <div id="leftcontainer">
      <div id="logo"><a href="#"><img src="images/logo.jpg" alt="" width="267" height="40" /></a></div>
    </div>
    <div id="rightcontainer">
      <div id="searchcontainer">
        <div id="sleft"><img src="images/searchbgleft.jpg" alt="" /> </div>
        <div id="smiddle">
          <div id="search">Search:</div>
          <div id="sbox">
            <form id="form1" name="form1" method="post" action="#">
              <input type="text" name="textfield"  style="width:100px; height:15px; border:1px solid #B2B2B1;" />
            </form>
          </div>
          <div id="sbutton">
            <label>
            <input type="image" name="imageField" src="images/searchbutton.jpg" title="Go" />
            </label>
          </div>
        </div>
        <div id="sright"><img src="images/searchbgright.jpg" alt="" /></div>
      </div>
    </div>
    <br class="spacer" />
  </div>
  <div id="navcontainer">
    <ul>
      <li><a href="index.php">Home</a></li>
        <li><a href="About.html">About Us</a></li>
      <li><a href="Book.php"><span>Book Store</span></a></li>
      <li><a href="orders.php">My Orders</a></li>
      <li><a href="Ship.php">Account &amp; Shipping</a></li>
      <li class="noPad"><a href="Contact.html">Contacts</a></li>
    </ul>
  </div>
 <div class="w3-content w3-section" style="width:770px">
  <img class="mySlides w3-animate-fading" src="images/bannerpic.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images/bannerpic2.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images/bannerpic3.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images/bannerpic4.jpg" style="width:100%">
</div>
    <script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 9000);    
}
</script>
    </div>
    <div id="frame" style="width:1000px">
<div id="main_content">
    <div class="left_content">
      <div class="title_box">Publishers</div>
      <ul class="left_menu">
        <li class="odd"><a href="#">Simon &amp; Schuster</a></li>
        <li class="even"><a href="#">Harper Collins</a></li>
        <li class="odd"><a href="#">Penguin Random House</a></li>
        <li class="even"><a href="#">Hachette Livre.</a></li>
        <li class="odd"><a href="#">Pearson</a></li>
        <li class="even"><a href="#">ThomsonReuters</a></li>
        <li class="odd"><a href="#">RELX Group</a></li>
        <li class="even"><a href="#">Wolters Kluwer</a></li>
        <li class="odd"><a href="#">McGraw-Hill Education</a></li>
        <li class="odd"><a href="#">Wiley</a></li>
        <li class="even"><a href="#">Egmont Group</a></li>
      </ul>
      <div class="title_box">Best Seller</div>
      <div class="border_box">
        <div class="product_title"><a href="details.html">Terry's Brooks</a></div>
        <div class="product_img"><a href="details.html"><img src="images/Books/b11.gif" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">&#8377;219</span> <span class="price">&#8377;125</span></div>
      </div>
      <div class="title_box">Newsletter</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="#" class="join">join</a> </div>
      <div class="banner_adds"> <a href="#"><img src="images/Books/bann1.jpg" alt="" border="0" /></a> </div>
    </div>
    <!-- end of left content -->
    <div class="center_content">
      <div class="center_title_bar">Recommended Books for you</div>
       <?php
      
        $query = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <p> </p>
        <div class="prod_box">
        <div class="top_prod_box"></div>
        <div class="center_prod_box">
          <div class="product_title"><a href="details.html"><?php echo $row["name"]; ?></a></div>
          <div class="product_img"><a href="details.html"><?php echo '<img src='.$row["loc"].'>';?></a></div>
          <div class="prod_price"><span class="reduce">&#8377;350 </span> <span class="price"><?php echo '&#8377;'.$row["price"].' INR'; ?></span></div>
        </div>
        <div class="bottom_prod_box"></div>
        <div class="prod_details_tab"> <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="details.html" class="prod_details">details</a> </div>
      </div>
        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
      <div class="center_title_bar">Best Books for you!</div>
      <?php
      
        $query = $db->query("SELECT * FROM bestproducts ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
      
        <div class="prod_box">
        <div class="top_prod_box"></div>
        <div class="center_prod_box">
          <div class="product_title"><a href="details.html"><?php echo $row["name"]; ?></a></div>
          <div class="product_img"><a href="details.html"><?php echo '<img src='.$row["loc"].'>';?></a></div>
          <div class="prod_price"><span class="reduce">&#8377;350</span> <span class="price"><?php echo '&#8377;'.$row["price"].' INR'; ?>
              </span></div>
        </div>
        <div class="bottom_prod_box"></div>
        <div class="prod_details_tab"> <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="details.html" class="prod_details">details</a> </div>
      </div>
        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
      
        <div style="float:left;">
        <img src="images/Books/Below.jpg" width=560px height=135px >
        </div>
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="shopping_cart">
        <div class="cart_title">Shopping cart</div>
        <div class="cart_details"> Items in the cart :<?php echo $cart->total_items(); ?><span id="p1"></span> <br />
          <span class="border_cart"></span> Total: <span class="price">&#8377;<?php echo $cart->total(); ?></span> </div>
        <div class="cart_icon"><a href="viewCart.php" class="cart-link" title="View Cart" ><img src="images/shoppingcart.png" alt="" width="48" height="48" border="0" /></a></div>
      </div>
      <div class="title_box">New Arrival</div>
      <div class="border_box">
        <div class="product_title"><a href="details.html">Twilight</a></div>
        <div class="product_img"><a href="details.html"><img src="images/Books/b10.gif" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">&#8377;1100</span> <span class="price">&#8377;550</span></div>
      </div>
      <div class="title_box">Authors</div>
      <ul class="left_menu">
        <li class="odd"><a href="#">Chetan Bhagat</a></li>
        <li class="even"><a href="#">Durjoy Dutta</a></li>
        <li class="odd"><a href="#">Arundhati Roy</a></li>
        <li class="even"><a href="#">Amitav Ghost</a></li>
        <li class="odd"><a href="#">Jhumpa Lahiri</a></li>
        <li class="even"><a href="#">Khushwant Singh</a></li>
        <li class="odd"><a href="#">Vikram Seth</a></li>
        <li class="even"><a href="#">Salman Rushdie</a></li>
      </ul>
      <div class="banner_adds"> <a href="#"><img src="images/Books/bann2.jpg" alt="" border="0" /></a> </div>
    </div>
    <!-- end of right content -->
  </div>
     <div id="about">
         <div class="prod_box">
        <div class="top_prod_box"></div>
         <div class="center_prod_box">&copy;Prasun_jais All Rights Reserved</div>
             </div>
         </div>

        </div>
     
  <!-- end of main content -->
        </body>
</html>
