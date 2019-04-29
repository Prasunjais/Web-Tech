<!DOCTYPE HTML>
<html>
<head>
<?php 
// include database configuration file
include 'dbConfig.php';

// set customer ID in session
$ID = $_POST['id'];
$Na = $_POST['name'];
$em = $_POST['em'];
$pass = $_POST['pass'];
$add = $_POST['add'];
$ph = $_POST['ph'];
echo $ID;
echo $Na;
echo $em;
echo $pass;
echo $add;
echo $ph;

// get customer details by session customer ID
$query = $db->query("UPDATE `customers` SET `name`='$Na',`email`='$em',`phone`='$ph',`address`='$add',`password`='$pass' WHERE id='$ID'");
if(!$query)
    echo " Sorry ";
    else
    {
       echo "?><script type='text/javascript'>alert('updatted successfully!')</script><?php ";
        header("Location:Ship.php");
    } ?>
</head>
    </html>        