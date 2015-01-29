<?php

$isLoggedIn = false;
$isOnProfile = false;
$isAdmin = false;

session_start();
				
				if(session_is_registered(myusername))
				{
				
					$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				
					if (false !== strpos($url,$_SESSION['myusername']))  
					{
						$isLoggedIn = true;
						$isOnProfile = true;
						// Om inloggad och är på sin egen profil
					}
					
					else
					{
						$isLoggedIn = true;
						$isOnProfile = false;
						// Inloggad men inte på sin profil
					}
					
					$isLoggedIn = true;
					
					if($_SESSION['myusername'] == '##')  //Inloggad samt admin
					{
						$isAdmin = true;	
					}
						
				// Inloggad
				}
					
				else
				{	
					$isLoggedIn = false;
					$isOnProfile = false;
					// Inte inloggad
				}

$user = $_SESSION['myusername']; // Variablen user hämtas från GET. Från URL-adressen.

mysql_connect("mysql2.000webhost.com", "a9600570_admin", "pass123") or die(mysql_error());  //Anslut till databas-servren med användarnamn och lösenord.
mysql_select_db("a9600570_larare") or die(mysql_error()); //Anslut till specifik databas

mysql_set_charset("utf8");  //Svenska tecken.

$user = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE id = '$user'")); //Här hämtar den informationen om USER. 

mysql_close();  // Stänger uppkopplingen mot databsen.
?>