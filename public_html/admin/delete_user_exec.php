<?php 

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

			//delete teacher from database with matching username
			$id = $_POST['id'];
			$query= "DELETE FROM teachers WHERE id='$id'";
                       
                       
			if(mysql_query($query))
			{
				echo "Lärare borttagen.";
			} 
 
			else
			{ 
				echo "Kunde inte ta bort användare..";
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



