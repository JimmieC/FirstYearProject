<?php 


session_start();
if(session_is_registered(myusername)){
$user = $_SESSION['myusername'];
	if ($_SESSION['myusername'] == "$user")
	{


$host="mysql2.000webhost.com"; // Host name 
$username="a9600570_admin"; // Mysql username 
$password="pass123"; // Mysql password 
$db_name="a9600570_larare"; // Database name 
$tbl_name="teachers"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


$password = $_POST['userpassword']; 
$query = "UPDATE teachers SET password = '$password' WHERE id = '$user'"; 
if(mysql_query($query))
{
 echo "Lösenord uppdaterat.";
} 
 
else
{ 
	echo "Uppdateringen misslyckades..";
} 	}
	
	else
{
header("location:../index.php");
}

}

else
{
header("location:../index.php");
}




?> 



