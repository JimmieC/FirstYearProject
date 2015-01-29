

<?php

session_start();

			if(session_is_registered(myusername))
			{
				
				$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				
				if (false !== strpos($url,$_SESSION['myusername']))   // Om inloggad och är på sin egen profil
				{	
					if($_SESSION['currlang'] == 0)  // Om det är engelska
					{
						include_once('../language/translationenglish.php');
					}

					if($_SESSION['currlang'] == 1) // Om det är svenska
					{
						include_once('../language/translationswedish.php');
					}

					$busy = $_GET['busyBool'];
					$id = $_GET['id'];


					mysql_connect("mysql2.000webhost.com", "a9600570_admin", "pass123") or die(mysql_error());  //Anslut till databas-servren med användarnamn och lösenord.
					mysql_select_db("a9600570_larare") or die(mysql_error()); //Anslut till specifik databas
					mysql_set_charset("utf8");  //Svenska tecken.



					if ($busy == 1)
					{
						mysql_query("UPDATE teachers SET busy=1 WHERE id = '$id'");
						echo $profileButtonstatusBusy;
					}

					if ($busy == 0)
					{
						mysql_query("UPDATE teachers SET busy=0 WHERE id = '$id'");
						echo $profileButtonstatusNotbusy;
					}

					mysql_close();  // Stänger uppkopplingen mot databsen.

				}

				else
				{

				}

			}

			else
			{
			}




?>

