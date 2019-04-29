<?php
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;
?>

<!DOCTYPE html>
<html lang="en">

    <head>
    
        <title>WEb Tech Book Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      <div id="searchcontainer" style="-webkit-box-sizing:unset;-moz-box-sizing:unset;box-sizing:unset;">
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
      <li><a href="index.html">Home</a></li>
        <li><a href="About.html">About Us</a></li>
      <li><a href="Book.html"><span>Book Store</span></a></li>
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

    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
</head>
</head>
<body>
    
    <div id="frame" style="width:1000px">
    <div id="main_content"> 
    <div class="center_content" style="width:1030px;">
    <div class="title_box">Web-Tech Shooping Cart</div>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '&#8377;'.$item["price"].' INR'; ?></td>
            <td><input type="number" name="qty" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo '&#8377;'.$item["subtotal"].' INR'; ?></td>
            <td>
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Your cart is empty.....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="Book.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '&#8377;'.$cart->total().' INR'; ?></strong></td>
            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
</body>
</html>