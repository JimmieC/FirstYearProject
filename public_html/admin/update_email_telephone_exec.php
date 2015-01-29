<?php 


session_start();
if(session_is_registered(myusername))
{
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

		function ValidateEmail($inputemail)
		{
			//(/@{1}.+\.+/)
			$myemail = $inputemail;
			$pos = '/@/';
			$pos2 = '/\./';
			preg_match_all($pos, $myemail, $matches);
			preg_match_all($pos2, $myemail, $matches2);
#			print_r($matches);
		
			if( (count($matches[0]) == 1) && (count($matches2[0] >= 1)))
			{
				return true;	
			}
			else
			{
			return false;
			}
		
		}

		$email = $_POST['useremail']; 
			
								
		if (!empty($email))
		{
			if(ValidateEmail($email)== true)
			{
				$query = "UPDATE teachers SET email = '$email' WHERE id = '$user'"; 
				
				if(mysql_query($query))
				{
					echo "Email uppdaterat.";
				}
			}
			else
			{
				echo "Email får endast innehålla ett '@' och måste innehålla minst en '.'";
			}
		} 	
			
			
		function ValidateTelephone($inputTelephone)
		{
			$myTelephone = $inputTelephone;
			$characters1 = '/^[0-9]*$/'; //söker efter ett obestämt antal siffror mellan 0-9 
			$characters2 = '/^\+{1,2}\d+$/'; //söker efter 1-2 plustecken följt av minst en siffra
			preg_match_all($characters1, $myTelephone, $matchesCharacters);
			preg_match_all($characters2, $myTelephone, $matchesCharacters2);
			//print_r($matchesCharacters);
			//echo '</br>';
			//print_r($matchesCharacters2);
			//echo '</br>';
			
			//Om det hittas [endast siffror] eller [plustecken följt av siffror] då returneras true
			if((count($matchesCharacters[0]) >= 1) Or (count($matchesCharacters2 [0]) >= 1 ))
			{
				//echo "success", '</br>';
				return true;
			} 
			
			else 
			{
				//echo "fail", '</br>';
				return false;
			}  
						
		}	
		
		$telefon = $_POST['usertelephone']; 
		if (!empty($telefon))
		{
			if (ValidateTelephone($telefon) == true)
			{
				$query = "UPDATE teachers SET phone = '$telefon' WHERE id = '$user'"; 
				if(mysql_query($query))
				{
					echo "Telefonnummer uppdaterat.";
				} 
			}	
			
			else
			{
				echo "Använd endast giltiga tecken [0-9] eller ++ med siffror";
			}
				
		}
		
		if ((empty($telefon)) && (empty($email)))
		{
			echo "Ange telefonnummer.";
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