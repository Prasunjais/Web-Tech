<?php
// include database configuration file
include 'dbConfig.php';

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: Book.php");
}



// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout - WEB-tech Book Store</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        table {
    border-spacing: 0;
    border-collapse: collapse;
    background-color: transparent;

    }
        p {
    margin: 0 0 10px;
    box-sizing: border-box;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
font-size: 14px;
line-height: 1.42857143;
color: #333;
            cursor: auto !important;
        }
        
    .container{width: 100%;padding: 50px;}
    .table{width: 65%;
        float: left;
        max-width: 100%;
    margin-bottom: 20px;
}
            table,td {
    background-color: transparent;  
border-spacing: 0;
border-collapse: collapse;
                text-align: left;
            padding: 8px;
        }
 
    .shipAddr{width: 30%;float: left;box-sizing: border-box;margin-left: 30px;}
    .footBtn{width: 95%;float: left;box-sizing: border-box;}
    .orderBtn {float: right;}
        .btn-warning {
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236;
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
        a {
    text-decoration: none;
}
        .btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
        .orderBtn {
    float: right;
}
         .btn-success:hover {
    background-color: darkgreen;
    
}
        .btn-warning:hover {
   
            background-color: darkorange;
   
            
}
        h1,h2,h3
        {
            font-family: sans-serif;
            font-size: 36px;
            color: maroon;
        }
        h4
        {
            font-family: sans-serif;
            font-size: 28px;
            color:darkred;
        }
    </style>
        
</head>
<body>
<div class="container">
    <img src="images/logo.jpg" style="width:100%; max-width:300px;">
    <hr>
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
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
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '&#8377;'.$item["subtotal"].' INR'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '&#8377;'.$cart->total().' INR'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Shipping Details</h4>
        <p><?php echo $custRow['name']; ?></p>
        <p><?php echo $custRow['email']; ?></p>
        <p><?php echo $custRow['phone']; ?></p>
        <p><?php echo $custRow['address']; ?></p>
    </div>
    <div class="footBtn">
        <a href="book.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
        <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
</div>
</body>
</html>