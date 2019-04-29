<?php 
// include database configuration file
include 'dbConfig.php';
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

$cusid = $_SESSION['sessCustomerID'];
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
    <style>
    .form-style-1 {
    margin:10px auto;
    max-width: 400px;
    padding: 20px 12px 10px 20px;
    font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
        form
        {
            width:500px;
            float:left;
        }
.form-style-1 li {
    padding: 0;
    display: block;
    list-style: none;
    margin: 10px 0 0 0;
}
.form-style-1 label{
    margin:0 0 3px 0;
    padding:0px;
    display:block;
    font-weight: bold;
}
        #bcr {
            margin-top: 20px;
            background-image: url(images/Books/Contact_2.gif);
            width:195px;
            height: 509px;
            float: left;
        }
.form-style-1 input[type=text],
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=password],
.form-style-1 input[type=email],
textarea,
select{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border:1px solid #BEBEBE;
    padding: 7px;
    margin:0px;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none; 
}
.form-style-1 input[type=text]:focus,
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=password]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus,
.form-style-1 select:focus{
    -moz-box-shadow: 0 0 8px #88D5E9;
    -webkit-box-shadow: 0 0 8px #88D5E9;
    box-shadow: 0 0 8px #88D5E9;
    border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
    width: 49%;
}

.form-style-1 .field-long{
    width: 100%;
}
.form-style-1 .field-select{
    width: 100%;
}
.form-style-1 .field-textarea{
    height: 100px;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
    background: #4B99AD;
    padding: 8px 15px 8px 15px;
    border: none;
    color: #fff;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
    background: #4691A4;
    box-shadow:none;
    -moz-box-shadow:none;
    -webkit-box-shadow:none;
}
.form-style-1 .required{
    color:red;
}

    </style>
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
      <li><a href="Book.php">Book Store</a></li>
      <li><a href="orders.php">My Orders</a></li>
      <li><a href="Ship.php"><span>Account &amp; Shipping</span></a></li>
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
    <div id="main_content" style="margin-left:100px;">
    <!-- end of left content -->
    <div class="center_content" style="padding:unset;">
     <div class="center_title_bar">Account and Address Information</div>
         <?php
      $query = $db->query("SELECT * FROM customers WHERE id = ".$cusid);
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
     <div id="tablediv">
    <form name="f2" action="update.php" method="post">
    <ul class="form-style-1">
    <li><label>ID : <span class="required">*</span></label><input type="text" name="id" class="field-long" placeholder="ID" value="<?php echo $row['id']; ?>"required></li>
    <li>
        <label>Email :<span class="required">*</span></label>
        <input type="email" name="em" class="field-long" value="<?php echo $row["email"]; ?>" required>
    </li>
    <li>
        <label>Password :<span class="required">*</span></label>
        <input type="text" name="pass" class="field-long" value="<?php echo $row["password"]; ?>" required>
    </li>
    <li>
         <label>Name :<span class="required">*</span></label>
        <input type="text" name="name" value="<?php echo $row["name"]; ?>" class="field-long" required>
    </li>
    <li>
         <label>Address :<span class="required">*</span></label>
        <input type="text" name="add" class="field-long" value="<?php echo $row["address"]; ?>" required>
    </li>
    <li>
         <label>Phone :<span class="required">*</span></label>
        <input type="text" name="ph" class="field-long" value="<?php echo $row["phone"]; ?>" required>
    </li>
    
        <li>
        <input type="submit" value="Update Info" name="submit" />
    </li>
</ul>
</form>   </div>
       
     
    </div>
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
        <img src="images/Books/Below.jpg" width=560px height=135px style="margin-left:-180px" >
        </div>
    </div>
    <!-- end of center content -->
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
