<?php

session_start();
	if(session_is_registered(myusername))
			{
				$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				if (false !== strpos($url,$_SESSION['myusername']))   // Om inloggad och är på sin egen profil
				{
				echo '<button name="users" value="0" id="changeButton" onClick="showUser(this.value)">';
					$busy = $user["busy"];
					if ($busy)
						{
							echo $profileButtonstatusBusy;
						}
						
					else
						{
							echo $profileButtonstatusNotbusy;
						}
					echo '</button>';
					
					}
					
					else // Inte inloggad och inte ens egen profil.
					{
					echo '<button name="users" value="0" id="changeButton">';
					$busy = $user["busy"];
					if ($busy)
						{
							echo $profileButtonstatusBusy;
						}
						
					else
						{
							echo $profileButtonstatusNotbusy;
						}
					echo '</button>';

					}
					
					}
					
					else // Inte inloggad och inte ens egen profil.
					{
					echo '<button name="users" value="0" id="changeButton">';
					$busy = $user["busy"];
					if ($busy)
						{
							echo $profileButtonstatusBusy;
						}
						
					else
						{
							echo $profileButtonstatusNotbusy;
						}
					echo '</button>';

					}

					


?>
