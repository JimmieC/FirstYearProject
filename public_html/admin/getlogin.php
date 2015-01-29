<?php
			session_start();
			
			if(session_is_registered(myusername))
			{
				echo 'Inloggad med ID: ', $_SESSION['myusername'], '<br/>';
					
				$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


				if (false !== strpos($url,$_SESSION['myusername']))   // Om inloggad och är på sin egen profil
				{
					echo 'Detta är din profil, här visas din kontrollpanel. <br/>', 
					'<a href="admin/logout.php"> Logga ut </a>', '<br/><br/>';
				} 
					
				else 
				{
					// Inte din profil.
				}
			}
			
			else  // Inte inloggad
			{ 
				echo '<a id="openlogin"> Logga in? </a> <br/>';
				include('main_login.php');
			}
		?>