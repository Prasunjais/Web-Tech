<?php  session_start();
 
// include database configuration file
include 'dbConfig.php';
// initializ shopping cart class


$user = $_POST['id'];
$pass = $_POST['pass'];
$query = $db->query("SELECT * FROM customers WHERE id='$user' AND password='$pass'");
if(!$query)
{
	echo "<br><hr><h1 align=\"center\">INTERNAL ERROR</h1><hr>";
}
else
{
if($query->num_rows > 0)
     {
      $_SESSION['sessCustomerID'] = $_POST['id'];
         header("Location:loginPage.php");	
     }
else
     {
     echo "<br><hr><h1 align=\"center\" style=\"color:red\">INVALID LOGIN!</h1><h3>Please Check your username and password</h3><hr>";
     	
     }
}
?>