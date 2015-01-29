<?php include('header.php'); ?> <!-- Allt från <html>-starttaggen ner till </head> finns  här. Så slipper man skriva om det varje gång. -->
				
<div id="profile"> <!-- innanför denna <div> finns lärarprofilen. Allting innanför denna <div> är PHP. -->

	<div id="profileinfo">

<?php include('mysql/connect.php'); ?>

<?php
if(!function_exists('date_diff')) {
  class DateInterval {
    public $y;
    public $m;
    public $d;
    public $h;
    public $i;
    public $s;
    public $invert;
    public $days;
 
    public function format($format) {
      $format = str_replace('%R%y', 
        ($this->invert ? '-' : '+') . $this->y, $format);
      $format = str_replace('%R%m', 
         ($this->invert ? '-' : '+') . $this->m, $format);
      $format = str_replace('%R%d', 
         ($this->invert ? '-' : '+') . $this->d, $format);
      $format = str_replace('%R%h', 
         ($this->invert ? '-' : '+') . $this->h, $format);
      $format = str_replace('%R%i', 
         ($this->invert ? '-' : '+') . $this->i, $format);
      $format = str_replace('%R%s', 
         ($this->invert ? '-' : '+') . $this->s, $format);
 
      $format = str_replace('%y', $this->y, $format);
      $format = str_replace('%m', $this->m, $format);
      $format = str_replace('%d', $this->d, $format);
      $format = str_replace('%h', $this->h, $format);
      $format = str_replace('%i', $this->i, $format);
      $format = str_replace('%s', $this->s, $format);
 
      return $format;
    }
  }
 
  function date_diff(DateTime $date1, DateTime $date2) {
 
    $diff = new DateInterval();
 
    if($date1 > $date2) {
      $tmp = $date1;
      $date1 = $date2;
      $date2 = $tmp;
      $diff->invert = 1;
    } else {
      $diff->invert = 0;
    }
 
    $diff->y = ((int) $date2->format('Y')) - ((int) $date1->format('Y'));
    $diff->m = ((int) $date2->format('n')) - ((int) $date1->format('n'));
    if($diff->m < 0) {
      $diff->y -= 1;
      $diff->m = $diff->m + 12;
    }
    $diff->d = ((int) $date2->format('j')) - ((int) $date1->format('j'));
    if($diff->d < 0) {
      $diff->m -= 1;
      $diff->d = $diff->d + ((int) $date1->format('t'));
    }
    $diff->h = ((int) $date2->format('G')) - ((int) $date1->format('G'));
    if($diff->h < 0) {
      $diff->d -= 1;
      $diff->h = $diff->h + 24;
    }
    $diff->i = ((int) $date2->format('i')) - ((int) $date1->format('i'));
    if($diff->i < 0) {
      $diff->h -= 1;
      $diff->i = $diff->i + 60;
    }
    $diff->s = ((int) $date2->format('s')) - ((int) $date1->format('s'));
    if($diff->s < 0) {
      $diff->i -= 1;
      $diff->s = $diff->s + 60;
    }
 
    $start_ts   = $date1->format('U');
    $end_ts   = $date2->format('U');
    $days     = $end_ts - $start_ts;
    $diff->days  = round($days / 86400);
 
    if (($diff->h > 0 || $diff->i > 0 || $diff->s > 0))
      $diff->days += ((bool) $diff->invert)
        ? 1
        : -1;
 
    return $diff;
 
  }
 
}
?>

<?php 

if(!empty($user['photo']))
{
echo "<img id='profile-pic' style=", '"background-image:url(', "'" . $user['photo'] . "')", '"', ";", "> "; 
}

echo '<div id="profile-details">';

echo '<div class="profilename">' . $user["name"] . ', ' . $user["id"] . '.</div>' . '<br>';    // Skriver ut namnet.

echo "<p> $descriptionEmail: " . $user["email"] . "</p>";				// Email
echo "<p> $descriptionTel: " . $user["phone"] . "</p> <br/>";					// Telefon

	if(!empty($user["office"]))
	{
echo "<p> $profileOfficeLocation: " . $user["office"] . "</p>";			// Fakultet
	}

	if(!empty($user["fakultet"]))
	{
echo "<p> $descriptionInstitute: " . $user["fakultet"] . "</p>";			// Fakultet
	}

date_default_timezone_set("Europe/Stockholm");

$thisFullTime = date("Y-m-d H:i:s");
$thisFullTimeDateTimeObj = new DateTime($thisFullTime);

$userBusyTime =  $user["busyTime"];
$userTimeObj = new DateTime($userBusyTime);

if($thisFullTimeDateTimeObj < $userTimeObj)
{
$difference = date_diff($thisFullTimeDateTimeObj, $userTimeObj);

$hours = $difference->format('%h hours');

echo '<br/> <p id="hasBusyTime">' . $unavailabilityCountdown ;

if ($hours > 0)
{
echo $difference->format('%h' . ' ' . $profilehours . ' ' . '%i' . ' ' . $profileminutes . '');
}

else
{
echo $difference->format('%i' . $profileminutes . ' ' . '%s' . $profileseconds . '');
}

echo '</p>';

}

	if(!empty($user["busyStatus"]))
	{
echo "<p id='hasBusyStatus'>" . $profileBusyStatus . $user["busyStatus"] . "</p>";			// Fakultet
	}

echo "<p id='currentlocation'> </p>";

?>

	</div>
	
</div>

<div class="statusbuttons">


<?php

if (( $detect->isMobile() ) || ( $detect->isTablet() )) // Om webbläsaren  är mobil eller tablet.
{ 
include('mysql/profile-change-stauts-mobile.php');
}

else // Om webbläsaren är på dator
{
include('mysql/profile-change-stauts-desktop.php');
}
 
?>


<script>
function addBusyTime()
{
			$( "#busyTimePopup" ).toggle( "fast", function() {
    // Animation complete.
    		});
		}	
		
function addBusyStatus()
{
			$( "#busyStatusPopup" ).toggle( "fast", function() {
    // Animation complete.
    		});
		}	
</script>

<script type="text/javascript">

function showUser(str) { //Mobilmetod för uppdatering
var usrValue = document.getElementById("changeButton");

if (usrValue.value == 1)
	{
	usrValue.value = "0";	
	}
	
else
	{
	usrValue.value = "1";
	}	
	

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      usrValue.innerHTML= xmlhttp.responseText;         
    }
  }

  var usr=<?php echo json_encode($user["id"]); ?>;
  
  xmlhttp.open("GET","admin/getstatus.php?busyBool=" + str + "&id=" + usr, true);
  
  xmlhttp.send();
  
    if (str == 1)
{
	if (document.getElementById("changeButton")) {
		document.getElementById("changeButton").style.background = "red";
		}	
	
} 

if (str == 0)
{
	if (document.getElementById("changeButton")) {
		document.getElementById("changeButton").style.background = "green";
		}	
	
} 
  
  
}

function changeBusyValue(str) {	  //Datormetod för statusuppdatering

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      usrValue.innerHTML= xmlhttp.responseText;         
    }
  }

  var usr=<?php echo json_encode($user["id"]); ?>;
  
  xmlhttp.open("GET","admin/getstatus.php?busyBool=" + str + "&id=" + usr, true);
  
  xmlhttp.send();
  
  if (str == 1)
{
	if (document.getElementById("changeToBusy")) {
			
			document.getElementById("changeToBusy").className += ' busyButtonRight';
			document.getElementById("changeToFree").className = 'statusButton leftInactive';
		}
	
} 

if (str == 0)
{
	if (document.getElementById("changeToFree")) {
			document.getElementById("changeToFree").className += ' freeButtonLeft';
			document.getElementById("changeToBusy").className = 'statusButton rightInactive';
		}	
	
} 
  
  
}

</script>

<script> // TILL DATOR, instansiering

if(document.getElementById("isLoggedIn"))  //Inloggad
{

 var isBusy =<?php echo json_encode($user["busy"]); ?>;

if (isBusy == 1)
{
	if (document.getElementById("changeToBusy")) {
			document.getElementById("changeToBusy").className += ' busyButtonRight';
			document.getElementById("changeToFree").className += ' leftInactive';
		}
	
	if (document.getElementById("changeButton")) {
		document.getElementById("changeButton").style.background = "red";
		}	
	
} 

if (isBusy == 0)
{
	if (document.getElementById("changeToFree")) {
			document.getElementById("changeToFree").className += ' freeButtonLeft';
			document.getElementById("changeToBusy").className += ' rightInactive';
		}
	
	if (document.getElementById("changeButton")) {
		document.getElementById("changeButton").style.background = "green";
		}	
	
} 
}

else //Utloggad
{

 var isBusy =<?php echo json_encode($user["busy"]); ?>;
 

if (isBusy == 1)
{
	if (document.getElementById("changeToBusy")) {
			document.getElementById("changeToBusy").className += ' busyButtonRight';
			document.getElementById("changeToFree").className += ' busyButtonLeft';
			document.getElementById("changeToFree").getElementsByClassName('buttonStatus')[0].innerHTML = "";
		}
	
	if (document.getElementById("changeButton")) {
		document.getElementById("changeButton").style.background = "red";
		}	
	
} 

if (isBusy == 0)
{
	if (document.getElementById("changeToFree")) {
			document.getElementById("changeToFree").className += ' freeButtonLeft';
			document.getElementById("changeToBusy").className += ' freeButtonRight';
			document.getElementById("changeToBusy").getElementsByClassName('buttonStatus')[0].innerHTML = "";
		}
	
	if (document.getElementById("changeButton")) {
		document.getElementById("changeButton").style.background = "green";
		}	
	
} 

}


if(document.getElementById("isLoggedInOnOtherProfile"))  //Inloggad och på annan profil

{


 var isBusy =<?php echo json_encode($user["busy"]); ?>;

if (isBusy == 1)
{
	if (document.getElementById("changeToBusy")) {
			document.getElementById("changeToBusy").className = 'statusButton busyButtonRight';
			document.getElementById("changeToFree").className = 'statusButton busyButtonLeft';
			document.getElementById("changeToFree").getElementsByClassName('buttonStatus')[0].innerHTML = "";
		}
	
	if (document.getElementById("changeButton")) {
		document.getElementById("changeButton").style.background = "red";
		}	
	
} 

if (isBusy == 0)
{
	if (document.getElementById("changeToFree")) {
			document.getElementById("changeToFree").className = 'statusButton freeButtonLeft';
			document.getElementById("changeToBusy").className = 'statusButton freeButtonRight';
			document.getElementById("changeToBusy").getElementsByClassName('buttonStatus')[0].innerHTML = "";
		}
	
	if (document.getElementById("changeButton")) {
		document.getElementById("changeButton").style.background = "green";
		}	
	
} 


}

 
</script>
</div>


<?php
$current_view = "week";
define('BASE', '/home/a9600570/public_html/phpicalendar-2.4/');
require_once(BASE.'functions/ical_parser.php');
require_once(BASE.'functions/list_functions.php');
require_once(BASE.'functions/template.php');
require_once(BASE.'functions/event.js');
header("Content-Type: text/html; charset=$phpiCal_config->charset");

$minical_view = $current_view;
switch ($phpiCal_config->minical_view) {
	case 'day':
	case 'week':
	case 'month':
		$minical_view = $phpiCal_config->minical_view;
		break;
}

$starttime 			= "0500";
$weekstart 			= 1;
$unix_time 			= strtotime($getdate);
$today_today        = date('Ymd', time() + $phpiCal_config->second_offset); 
$next_week 			= date("Ymd", strtotime("+1 week",  $unix_time));
$prev_week 			= date("Ymd", strtotime("-1 week",  $unix_time));
$next_day			= date('Ymd', strtotime("+1 day",  $unix_time));
$prev_day 			= date('Ymd', strtotime("-1 day",  $unix_time));
$start_week_time 	= strtotime(dateOfWeek($getdate, $phpiCal_config->week_start_day));
$end_week_time 		= $start_week_time + (($phpiCal_config->week_length - 1) * 25 * 60 * 60);
$start_week 		= localizeDate($dateFormat_week, $start_week_time);
$end_week 			= localizeDate($dateFormat_week, $end_week_time);
$display_date 		= "$start_week - $end_week";
$sidebar_date 		= localizeDate($dateFormat_week_list, $unix_time);

// For the side months
ereg ("([0-9]{4})([0-9]{2})([0-9]{2})", $getdate, $day_array2);
$this_day 	= $day_array2[3]; 
$this_month = $day_array2[2];
$this_year 	= $day_array2[1];

// select for calendars
$available		= availableCalendars($username, $password, $phpiCal_config->ALL_CALENDARS_COMBINED);
$list_icals 	= display_ical_list($available);
$list_years 	= list_years();
$list_months 	= list_months();
$list_weeks 	= list_weeks();
$list_jumps 	= list_jumps();
$list_calcolors = list_calcolors();
$list_icals_pick = display_ical_list($available, TRUE);

// login/logout
$is_logged_in = ($username != '' && !$invalid_login) ? true : false;
$show_user_login = (!$is_logged_in && $phpiCal_config->allow_login == 'yes');
$login_querys = login_querys();
$logout_querys = logout_querys();

$page = new Page(BASE.'templates/'.$phpiCal_config->template.'/week.tpl');

$page->replace_files(array(
	'header'			=> BASE.'templates/'.$phpiCal_config->template.'/header.tpl',
	'event_js'			=> BASE.'functions/event.js',
	'footer'			=> BASE.'templates/'.$phpiCal_config->template.'/footer.tpl',
    'sidebar'           => BASE.'templates/'.$phpiCal_config->template.'/sidebar.tpl',
    'search_box'        => BASE.'templates/'.$phpiCal_config->template.'/search_box.tpl'
	));

$page->replace_tags(array(
	'version'			=> $phpiCal_config->phpicalendar_version,
	'charset'			=> $phpiCal_config->charset,
	'default_path'		=> $phpiCal_config->default_path,
	'template'			=> $phpiCal_config->template,
	'cal'				=> $cal,
	'getdate'			=> $getdate,
 	'getcpath'			=> "&cpath=$cpath",
    'cpath'             => $cpath,
	'calendar_name'		=> $cal_displayname,
	'display_date'		=> $display_date,
	'current_view'		=> $current_view,
	'sidebar_date'		=> $sidebar_date,
	'rss_powered'	 	=> $rss_powered,
	'rss_available' 	=> '',
	'rss_valid' 		=> '',
    'show_search'       => $phpiCal_config->show_search,
	'next_day' 			=> $next_day,
	'next_week' 		=> $next_week,
	'prev_day'	 		=> $prev_day,
	'prev_week'	 		=> $prev_week,
	'show_goto' 		=> '',
	'show_user_login'	=> $show_user_login,
	'invalid_login'		=> $invalid_login,
	'login_querys'		=> $login_querys,
	'is_logged_in' 		=> $is_logged_in,
	'username'			=> $username,
	'logout_querys'		=> $logout_querys,
	'list_icals' 		=> $list_icals,
	'list_icals_pick' 		=> $list_icals_pick,
	'list_years' 		=> $list_years,
	'list_months' 		=> $list_months,
	'list_weeks' 		=> $list_weeks,
	'list_jumps' 		=> $list_jumps,
	'legend'	 		=> $list_calcolors,
	'style_select' 		=> '',
	'l_goprint'			=> $lang['l_goprint'],
	'l_preferences'		=> $lang['l_preferences'],
	'l_calendar'		=> $lang['l_calendar'],
	'l_legend'			=> $lang['l_legend'],
	'l_tomorrows'		=> $lang['l_tomorrows'],
	'l_jump'			=> $lang['l_jump'],
	'l_todo'			=> $lang['l_todo'],
	'l_prev'			=> $lang['l_prev'],
	'l_next'			=> $lang['l_next'],
	'l_day'				=> $lang['l_day'],
	'l_week'			=> $lang['l_week'],
	'l_month'			=> $lang['l_month'],
	'l_year'			=> $lang['l_year'],
	'l_subscribe'		=> $lang['l_subscribe'],
	'l_download'		=> $lang['l_download'],
		'l_search'				=> $lang['l_search'],
	'l_pick_multiple'	=> $lang['l_pick_multiple'],
	'l_powered_by'		=> $lang['l_powered_by'],
	'l_this_site_is'	=> $lang['l_this_site_is']			
	));
	
if ($phpiCal_config->allow_preferences != 'yes') {
	$page->replace_tags(array(
	'allow_preferences'	=> ''
	));
}	
	
if ($phpiCal_config->allow_login == 'yes') {
	$page->replace_tags(array(
	'l_invalid_login'	=> $lang['l_invalid_login'],
	'l_password'		=> $lang['l_password'],
	'l_username'		=> $lang['l_username'],
	'l_login'			=> $lang['l_login'],
	'l_logout'			=> $lang['l_logout']
	));
}

if ($phpiCal_config->show_search != 'yes') {
	$page->nosearch($page);
}	
	
$page->draw_week($page);
$page->tomorrows_events($page);
$page->get_vtodo($page);
$page->draw_subscribe($page);

$page->output();

?>









		</div> <!-- <div> (lärarprofilen) avslutas. -->
	</div> <!-- <div> (wrapper) avslutas. -->
	
	
<script>
 
var array = document.getElementsByClassName('eventbg2_1');
for (var i = 0; i < array.length; i++) { 

var eventinfo = array[i].innerHTML;

var eventdate = eventinfo.search("EventData");
  
var event_date_text = eventinfo.substr(eventdate + 17, 2);
var event_date_text = parseFloat(event_date_text);

 var aDate = new Date();
 var thisDate = aDate.getDate();
 
if(event_date_text == thisDate)  // Finns det några event idag?
 {

var starttimepos = eventinfo.search("event_start");
var endtimepos = eventinfo.search("event_end");
var eventlocation = eventinfo.search("Location");

var event_start_time_text = eventinfo.substr(starttimepos + 20, 4);
var event_start_time_text = parseFloat(event_start_time_text);

var event_end_time_text = eventinfo.substr(endtimepos + 18, 4);
var event_end_time_text = parseFloat(event_end_time_text);

var event_location_text = eventinfo.substr(eventlocation + 9, 7); 

 var thisHour = aDate.getHours();
 var thisMin = aDate.getMinutes();
 
 if(thisMin < 10)  //För att hela talet blir en decimal mindre om den räknar bort nollan.
 {
	 thisMin = "0" + thisMin;
 }
 
 var thisTimeNow = thisHour + "" + thisMin;
 var thisTimeNow = parseFloat(thisTimeNow);
	  
 	if((event_start_time_text < thisTimeNow) && (event_end_time_text > thisTimeNow))  // Det är schemalagdt
 	{
 	
 		if(document.getElementById("changeToBusy")) // Det finns datorelement 
 		{
 		var busyVariable = "<?php echo $profileButtonstatusBusy; ?>";
 		
	 		document.getElementById("changeToBusy").className = 'statusButton busyButtonRight';
			document.getElementById("changeToFree").className = 'statusButton busyButtonLeft';
			document.getElementById("changeToFree").getElementsByClassName('buttonStatus')[0].innerHTML = "";
			document.getElementById("changeToBusy").getElementsByClassName('buttonStatus')[0].innerHTML = busyVariable;
			
	 	}
	 	
	 	if(document.getElementById("changeButton")) // Det finns mobilelement
	 	{
		 	var changeButton = document.getElementById("changeButton");
		 	 var busyVar = "<?php echo $profileButtonstatusBusy; ?>";
		 	changeButton.innerHTML = busyVar;
		 	changeButton.style.background = "red";
		}
		
		var currentLocation = document.getElementById("currentlocation");
		 	currentLocation.innerHTML = event_location_text;
		
	 }
 }
 
 
 var thisHour = aDate.getHours();
 var thisMin = aDate.getMinutes();
 
 if(thisMin < 10)  //För att hela talet blir en decimal mindre om den räknar bort nollan.
 {
	 thisMin = "0" + thisMin;
 }
 
 var thisTimeNow = thisHour + "" + thisMin;
 var thisTimeNow = parseFloat(thisTimeNow);
 
 if((thisTimeNow < 0700) || (thisTimeNow > 2000) )  // Klockan är för tidigt eller för sent för läraren
 {
 
 if(document.getElementById("changeToBusy")) // Det finns datorelement 
 		{
 		var busyVariable = "<?php echo $profileButtonstatusBusy; ?>";
 		
	 		document.getElementById("changeToBusy").className = 'statusButton busyButtonRight';
			document.getElementById("changeToFree").className = 'statusButton busyButtonLeft';
			document.getElementById("changeToFree").getElementsByClassName('buttonStatus')[0].innerHTML = "";
			document.getElementById("changeToBusy").getElementsByClassName('buttonStatus')[0].innerHTML = busyVariable;
			
	 	}
	 	
	 	if(document.getElementById("changeButton")) // Det finns mobilelement
	 	{
		 	var changeButton = document.getElementById("changeButton");
		 	 var busyVar = "<?php echo $profileButtonstatusBusy; ?>";
		 	changeButton.innerHTML = busyVar;
		 	changeButton.style.background = "red";
		} 
 }
 


}

if(document.getElementById("hasBusyTime"))   // Om har upptagen-status
{

if(document.getElementById("isLoggedIn"))  //Inloggad
{

if(document.getElementById("changeToBusy")) // Det finns datorelement 
 		{
 		var busyVariable = "<?php echo $profileButtonstatusBusy; ?>";
 		
 			
 			document.getElementById("changeToBusy").className = 'statusButton busyButtonRight';
			document.getElementById("changeToFree").className = 'statusButton leftInactive';
			
	 	}
	 	
	 	if(document.getElementById("changeButton")) // Det finns mobilelement
	 	{
		 	var changeButton = document.getElementById("changeButton");
		 	 var busyVar = "<?php echo $profileButtonstatusBusy; ?>";
		 	changeButton.innerHTML = busyVar;
		 	changeButton.style.background = "red";
		} 
	
	$( "#addBusyStatus" ).show();
	$( "#hasBusyStatus" ).show();

	}

else // Inte inloggad men busy
{
	if(document.getElementById("changeToBusy"))
	{
		var busyVariable = "<?php echo $profileButtonstatusBusy; ?>";
 		
 			document.getElementById("changeToBusy").className = 'statusButton busyButtonRight';
			document.getElementById("changeToFree").className = 'statusButton busyButtonLeft';
			document.getElementById("changeToFree").getElementsByClassName('buttonStatus')[0].innerHTML = "";			
	 	}
	 	
	 	if(document.getElementById("changeButton")) // Det finns mobilelement
	 	{
		 	var changeButton = document.getElementById("changeButton");
		 	 var busyVar = "<?php echo $profileButtonstatusBusy; ?>";
		 	changeButton.innerHTML = busyVar;
		 	changeButton.style.background = "red";
		} 
	
	$( "#addBusyStatus" ).show();
	$( "#hasBusyStatus" ).show();
	}

if(document.getElementById("isLoggedInOnOtherProfile"))  //Inloggad och på annan profil och busy

{
if(document.getElementById("changeToBusy"))
	{
		var busyVariable = "<?php echo $profileButtonstatusBusy; ?>";
 		
 			document.getElementById("changeToBusy").className = 'statusButton busyButtonRight';
			document.getElementById("changeToFree").className = 'statusButton busyButtonLeft';
			document.getElementById("changeToFree").getElementsByClassName('buttonStatus')[0].innerHTML = "";			
	 	}
	 	
	 	if(document.getElementById("changeButton")) // Det finns mobilelement
	 	{
		 	var changeButton = document.getElementById("changeButton");
		 	 var busyVar = "<?php echo $profileButtonstatusBusy; ?>";
		 	changeButton.innerHTML = busyVar;
		 	changeButton.style.background = "red";
		} 
	
	$( "#addBusyStatus" ).show();
	$( "#hasBusyStatus" ).show();
}

}

else // Inte busy
{
$( "#addBusyStatus" ).hide();
$( "#hasBusyStatus" ).hide();
}
</script>

<script type="text/javascript">

        var changeButton = document.getElementById("changeButton");
        
        var mobileNotBusyVar = "<?php echo $profileButtonstatusNotbusy; ?>";

        if (changeButton.innerHTML == mobileNotBusyVar)
      	  {
	        changeButton.value = "1";
	      }	    
</script>

</div> <!-- <div> (wrapper) avslutas. -->
	</body> <!-- body avslutas. -->
</html> <!-- htmldokumentet avslutas. -->

<?php # include('footer.php'); ?> <!-- Allt från <html>-starttaggen ner till </head> finns  här. Så slipper man skriva om det varje gång. -->