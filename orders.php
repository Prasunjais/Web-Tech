<?php
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
    <link rel="stylesheet" href="style2.css" type="text/css">
    <script type="text/JavaScript">
 
    </script>
    <style>
        .btn-warning {
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236;
        text-decoration: none;
}
        .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
        th
        {
            font-family: sans-serif;
            font-size: 22px;
            text-align: left;
            padding-left: 10px;
            padding-top: 15px;
        }
        .btn-block {
    display: block;
    width: 100%;
            
}
   
        .btn-warning:hover {
   
            background-color: darkorange;
   
            
}
        table,td {
    background-color: transparent;
border-spacing: 0;
border-collapse: collapse;
            padding: 8px;
        }
        .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
        .btn-success {
    color: #fff;
            text-decoration: none;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
        .btn-success:hover {
    background-color: darkgreen;
    
}
        ul, a, h2 {
    margin: 0;
    padding: 0;
    list-style: none;
}
        
        .container{padding: 50px;}
    input[type="number"]{width: 20%;}

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
      <li><a href="orders.php"><span>My Orders</span></a></li>
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
    <div class="center_content" style="width:1030px;">
    <div class="title_box">Web-Tech Shooping Cart</div>
    <table class="table">
    <thead>
        <tr>
            <th>Cover</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
       <?php
        $cus = $_SESSION['sessCustomerID'];         
        $qryy = $db->query("SELECT * FROM order_items WHERE order_id IN (SELECT id FROM orders where customer_id ='$cus')");
        $sum=0;
            if ($qryy->num_rows > 0) {
        echo 'Customer ID : '.$cus;
               
            ?>
        <?php
    
            while($pro = $qryy->fetch_assoc()) 
                 {
                     echo 'Product ID : '.$pro['id']; 
                     $ptID = $pro['id'];
                     $qryyy = $db->query("SELECT product_id FROM order_items WHERE id = '$ptID'");
                     $prID = $qryyy->fetch_assoc();
                     $pID = $prID['product_id'];
                     $pr = $db->query("SELECT * FROM products where id = '$pID'");
                     $prod = $pr->fetch_assoc()
            ?>
        <tr>
            <td><img src="<?php echo $prod['loc'];?>"></td>
            <td><?php echo $prod['name'];?></td>
            <td><?php echo '&#8377; '.$prod['price'].' INR'; 
                $sum = $sum+$prod['price'];?></td>
            <td><input type="number" class="form-control text-center" value="1"></td>
            <td><?php echo '&#8377; '.$prod['price'].' INR'; ?></td>
        </tr>
        
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Your cart is empty.....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2"></td>
            <?php if($sum > 0){ ?>
            <td class="text-center"><h3><strong><b>Total <?php echo '&#8377;'.$sum.' INR'; ?></b></strong></h3></td>
            
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
</body>
</html>