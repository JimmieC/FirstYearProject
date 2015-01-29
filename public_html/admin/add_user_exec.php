<?php 
//create session
session_start();
if(session_is_registered(myusername))
{
	if($_SESSION['myusername'] == "##")
	{
		$host="mysql2.000webhost.com"; // Host name 
		$username="a9600570_admin"; // Mysql username 
		$password="pass123"; // Mysql password 
		$db_name="a9600570_larare"; // Database name 
		$tbl_name="teachers"; // Table name 

		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");


		$teachername = $_POST['teachername']; 
		$teacherid = $_POST['teacherid'];
		$teacherpassword = $_POST['teacherpassword'];
		$teacheremail = $_POST['teacheremail'];
		$teacherfakultet = $_POST['teacherfakultet'];
		$teachercalLink = $_POST['teachercalLink'];
		$teacherphone = $_POST['$teacherphone'];


		$query="INSERT INTO teachers ( name, id, phone, email, calLink, password, fakultet ) VALUES ( '$teachername', '$teacherid', '$teacherphone', '$teacheremail', '$teachercalLink', '$teacherpassword', '$teacherfakultet' );";
                       
        //valideringsmeddelande               
		if(mysql_query($query))
		{
			echo "Lärare tilllagd.";
		} 
 
		else
		{ 
			echo "Kunde inte lägga till användare..";
		} 	
	}
	
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



