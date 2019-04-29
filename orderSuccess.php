<?php
if(!isset($_REQUEST['id'])){
    header("Location: Book.php");
}
// include database configuration file
include 'dbConfig.php';

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty


// set customer ID in session

// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>WEB-tech Book Store Invoice</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
    
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="images/logo.jpg" style="width:100%; max-width:300px;">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                Invoice #: <?php echo $_GET['id']; ?><br>
                                Created: <?php echo $custRow['created']; ?><br>
                                Due: <?php echo $custRow['modified']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                <?php echo $custRow['name']; ?><br>
                                <?php echo $custRow['email']; ?><br>
                                <?php echo $custRow['phone']; ?><br>
                                <?php echo $custRow['address']; ?>
                            </td>
                            <td></td>
                            <td></td>
                            
                            <td>
                                WEb-Tech Book Store<br>
                                Kolkata<br>
                                info@webtech.com<br>
                                +111 1084 8585 2336
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                <td>
                </td>
                <td></td>
                <td>
                    A/R
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Cash On Delivery
                </td>
                <td></td>
                <td></td>
                <td>
                    Approved
                </td>
            </tr>
            
            <tr class="heading">
                <td>Item</td>
                <td style="text-align:center;">Price</td>
                <td style="text-align:center;">Quantity</td>
                <td>Sub-total</td>
            </tr>
            
                <?php
                $qryy = $db->query("SELECT * FROM order_items WHERE order_id = ".$_GET['id']);
                 
                
            if ($qryy->num_rows > 0) {
    
            while($prID = $qryy->fetch_assoc()) 
                 {
                     $qryyy = $db->query("SELECT * FROM products WHERE id = ".$prID['product_id']);
                     $pro = $qryyy->fetch_assoc();
            ?>
          
            <tr class="item">
                <td>
                    <?php echo $pro['name']; ?>
                </td>
                <td style="text-align:center;"><?php echo '&#8377;'.$pro['price'].' INR'; ?></td>
                <td style="text-align:center;"><?php echo $prID['quantity']; ?></td>
                <td><?php echo '&#8377;'.$pro['price']*$prID['quantity'].' INR'; ?></td>
            </tr>
            <?php } } ?>
            <tr class="total">
                <td></td>
                <td></td>
                <?php
                $qry = $db->query("SELECT total_price FROM orders WHERE id = ".$_GET['id']);
                $totRow = $qry->fetch_assoc(); ?>
                <td><em>TOTAL : </em></td>
                <td style="text-align:left;">
                    <?php echo '&#8377;'.$totRow['total_price'].' INR'; ?>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <h3>Regards,<br></h3>
        
        <img src="images/Books/sig.png">
        <br>
        
    <h3 style="text-align:left;color:red;">PRASUN JAISWAL</h3>
    <p style="margin-top:-15px;">CEO,WEb-Tech Book Store</p>
    <p style="margin-top:-15px;">Kolkata</p>
    
        <br>
    <p style="font-family:monospace;font-size:15px;text-align:center;">Please receive the books in good condition</p> <p><input type="button" name="print" value="Print" onclick="window.print();"></p>   
    </div>
</body>
</html>
