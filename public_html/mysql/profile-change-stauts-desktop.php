<?php

session_start();
	if(session_is_registered(myusername))
			{
			
				$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				if (false !== strpos($url,$_SESSION['myusername']))   // Om inloggad och är på sin egen profil
				{
				
				$targetDiv = "this.getElementsByClassName('value')[0].innerHTML";
				
				echo '
				<div class="statusButton" id="changeToFree" onClick="changeBusyValue(', $targetDiv, ')"> 
				<p class="value">0</p> 
				<p class="buttonStatus">', $profileButtonstatusNotbusy, '</p> 
				</div>';
				
				echo '
				<div class="statusButton" id="changeToBusy" onClick="changeBusyValue(', $targetDiv, ')"> 
				<p class="value">1</p> 
				<p class="buttonStatus">', $profileButtonstatusBusy, '</p> 
				</div>';
				
				echo '
				<button onclick="addBusyTime()" id="addBusyTime">', $buttonTimeBusy, '</button>
				
				<div id="busyTimePopup" style="display:none;">
				<a id="exit-kontrollpanel" onclick="exitWindowBusyTime();"> X </a>
					<form method="post" action="../admin/add_busy_time_exec.php">
						<p>', $buttonTimeBusyDescription, ' </p>
						';
						
						date_default_timezone_set("Europe/Stockholm");
						$thisFullTime = date("Y-m-d H:i:s");
						echo'
						<input name="myBusyTime" type="time">
						<input type="submit" name="Submit" value="', $buttonUnavailableUpdate, '">

					</form>

				 </div>
				<br/>
				';
				
				echo '
				<button onclick="addBusyStatus()" id="addBusyStatus">', $buttonBusyStatus, '</button>
				
				<div id="busyStatusPopup" style="display:none;">
				<a id="exit-kontrollpanel" onclick="exitWindowBusyStatus();"> X </a>
					<form method="post" action="../admin/add_busy_status_exec.php">
						<p>', $buttonBusyStatusDescription, '</p>
						';
						
						echo'
						<input name="myBusyStatus" type="text">
						<input type="submit" name="Submit" value="', $buttonStatusUpdate, '">

					</form>

				 </div>
				
				';

					
					}
					
					else //  Inloggad och inte ens egen profil.
					{
					
				echo '
						<div class="statusButton" id="changeToFree"> 
							<p class="buttonStatus">', $profileButtonstatusNotbusy, '</p> 
							<p id="isLoggedInOnOtherProfile"></p>
						</div>';
				
						echo '
						<div class="statusButton" id="changeToBusy"> 
							<p class="buttonStatus">', $profileButtonstatusBusy, '</p> 
						</div>';
					
					

					}
					
					}
					
					else // Inte inloggad och inte ens egen profil.
					{
					
						echo '
						<div class="statusButton" id="changeToFree"> 
							<p class="buttonStatus">', $profileButtonstatusNotbusy, '</p> 
						</div>';
				
						echo '
						<div class="statusButton" id="changeToBusy"> 
							<p class="buttonStatus">', $profileButtonstatusBusy, '</p> 
						</div>';
				
					}

					


?>
