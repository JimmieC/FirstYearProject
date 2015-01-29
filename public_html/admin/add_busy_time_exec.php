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


date_default_timezone_set("Europe/Stockholm");

$thisFullTime = date("Y-m-d H:i:s");

$myBusyTime = $_POST['myBusyTime'];
	
$myBusyTimeHour = substr($myBusyTime, 0, -3); 	

$myBusyTimeMinute = substr($myBusyTime, -2); 
$myBusyTimeMinute = ($myBusyTimeMinute * 60);

$timeString = "+" . "$myBusyTimeHour" . " hours " . "$myBusyTimeMinute" . " seconds" ;
echo $timeString;

echo '<br/>';

$new_time = date("Y-m-d H:i:s", strtotime($timeString));
echo $new_time;

$query = "UPDATE teachers SET busyTime = '$new_time' WHERE id = '$user'"; 
$query2 = "UPDATE teachers SET busy = '0' WHERE id = '$user'";
$query3 = "UPDATE teachers SET busyStatus = '' WHERE id = '$user'";  

if(mysql_query($query) && mysql_query($query2) && mysql_query($query3))
{
$usrname = $_SESSION['myusername'];
$header = 'location:http://mahlarare.net78.net/profile.php?user=' . $usrname;
header($header);

 echo " <br/> Upptagenstid uppdaterat.";
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



