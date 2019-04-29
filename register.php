<?php session_start();
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
$query = $db->query("INSERT INTO `customers`(`name`, `email`, `phone`, `address`, `created`, `modified`, `status`, `password`) VALUES ('$Na','$em','$ph','$add','12-7-15','18-7-15','1','$pass')");
if(!$query)
    echo " Sorry ";
    else
       header["Location:book.php"];

$_SESSION['sessCustomerID'] = $ID;
