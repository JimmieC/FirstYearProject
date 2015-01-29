<!DOCTYPE html>

<html>
	<head>
	    <title>Hitta min lärare</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link href="css/style.css" type="text/css" rel="stylesheet">
		<link href="css/jquery-ui.css" type="text/css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
		<script src="js/jquery-1.11.0.js"></script>	
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery-hover-dropdown-box.js"></script>
		<script src="js/jquery.ui.touch-punch.min.js"></script>
		

		<link rel="stylesheet" href="css/jquery-hover-dropdown-box.css" />
		<link rel="stylesheet" type="text/css" href="http://mahlarare.net78.net:80/phpicalendar-2.4/templates/default/default.css" />
		<script id="nicetitle" type="text/javascript" src="http://mahlarare.net78.net:80/phpicalendar-2.4/nicetitle/nicetitle.js"></script>
		<link rel="stylesheet" type="text/css" href="http://mahlarare.net78.net:80/phpicalendar-2.4/nicetitle/nicetitle.css" />
			
	</head>
	
	<?php
	require_once 'mobiledetect/Mobile_Detect.php';
	$detect = new Mobile_Detect;
	?>
		
	<?php require_once 'admin/check-login-status.php'; ?> <!-- Kollar om man är inloggad etc --> 	
	
<body> <!-- Allt innanför <body> är webbsidans "kropp". All data som visas finns här i. Innanför <head> visas istället alla data OM data. Så som metadata och sidans titel och länkade cssdokument. -->
<div id="wrapper"> <!-- Wrapper används som ett "skal" runt allt innehåll -->
<header id="head"> <!-- <header> fungerar som ett huvud i dokumentet -->
<a href="../index.php">
	<img src="img/logo.png" alt="Malmö Högskola" class="mahlogo"/>
</a>

<form method="post" name="update" action="admin/change_lang.php" />
<input type="text" id="sweeng" hidden="hidden" name="language" value="<?php echo json_encode($_SESSION['currlang']); ?>" /> 
<input type="submit" id="langbutton" class="language-control" name="Submit" value="SV/ENG" />
</form>

<?php
if($_SESSION['currlang'] == 0)  // Om det är engelska
{
include_once('language/translationswedish.php');
}

if($_SESSION['currlang'] == 1) // Om det är svenska
{
include_once('language/translationenglish.php');
}
?>


<?php if($isLoggedIn == true)
		{?>

			<a id="profile-control" onclick="openKontrollpanel();">
					<img src="img/profile.png" alt="Profil" class="profilelogo"/>
			</a>

			<a href="/profile.php?user=<?php echo $user['id']; ?>" id="isLoggedIn" class="profile-name">		
				<?php echo $user['name'], ', ',  $user['id']; ?>
			</a>
			
			<a href="/profile.php?user=<?php echo $user['id']; ?>" class="profile-name-mobile">		
				<?php echo $user['id']; ?>
			</a>

<?php
	};
		
?>

<?php if($isLoggedIn == false)
	{?>

		<a id="profile-control" onclick="openKontrollpanel();">
			<img src="img/profile.png" alt="Profil" class="profilelogo"/>
		</a>

<?php
	};
		
?>

</header>			
			
		<?php if($isLoggedIn == false)
		{?>
		<div id="kontrollpanel"> 
		<a id="exit-kontrollpanel" onclick="exitControl();"> X </a>
			<div class="itemrow" onclick="loginpopup();">
			<p> <?php echo $menuLogin; ?> </p>
			</div>
			
			 <?php include('admin/login-popup.php'); ?>
			
		</div>
		
		
		<?php
		};
		
		?>
		
		<?php if(($isLoggedIn == true) && ($isAdmin == false))
		{?>
		<div id="kontrollpanel"> 
		<a id="exit-kontrollpanel" onclick="exitControl();"> X </a>
			<a href="/profile.php?user=<?php echo $user['id']; ?>">
			<div class="itemrow">
			<p> <?php echo $menuProfile; ?> </p>
			</div>
			 </a>
			 
			<div class="itemrow" onclick="changePassword()";>
			<p> <?php echo $menuChangepass; ?> </p>
			</div>
			
			<?php include('admin/update_password.php'); ?>
			
			<div class="itemrow" onclick="updateEmailOrPhone();"> 
			<p> <?php echo $menuUpdate; ?> </p>
			</div>
			<?php include('admin/update_email_telephone.php'); ?>
			
			<div class="itemrow" onclick="updateProfilePicture()";>
			<p> <?php echo $profileMenuUpdatePicture; ?> </p>
			</div>
			<?php include('admin/change_profile_pic_form.php'); ?>
								
			<div class="itemrow" onclick="updateOfficeLocation()";>
			<p> <?php echo $menuOfficeLocation; ?> </p>
			</div>
			<?php include('admin/add_office.php'); ?>
			
			<div class="itemrow" onclick="updateinstitute()";>
			<p> <?php echo $menuChangeinstitute ?> </p>
			</div>
			<?php include ('admin/change_institute.php') ?>

			<div class="itemrow" onclick="logout();">
			<p>  <?php echo $menuLogout; ?> </p>
			</div>
			
		</div>
		
		<?php
		};
		
		?>
		
		
		<?php if(($isLoggedIn == true) && ($isAdmin == true))
		{?>
		<div id="kontrollpanel"> 
		<a id="exit-kontrollpanel" onclick="exitControl();"> X </a>
			<div class="itemrow">
			<a href="http://mahlarare.net78.net/admin/manage_user.php">Hantera användare</a>
			</div>
			
			<div class="itemrow">
			<p>Ändra lösenord </p>
			</div>
			
			<div class="itemrow" onclick="logout();">
			<p> Logga ut</p>
			</div>
			
		</div>
		
		<?php
		};
		
		?>
					
  
<script type="text/javascript">   // Öppna login-popup (logga in)
  function loginpopup(){
		$( "#loginpopup" ).toggle( "fast", function() {
    // Animation complete.
    		});
  }
  
    function logout(){
		window.location.replace("admin/logout.php");
  }
  
  function changePassword(){
		$( "#changepasswordform" ).toggle( "fast", function() {
    // Animation complete.
    		});
  }
  function updateEmailOrPhone(){
		$( "#updateemailtelephoneform" ).toggle( "fast", function() {
    // Animation complete.
    		});
			

  }
  
  	 function updateProfilePicture(){
	$( "#updatePic" ).toggle( "fast", function() {
    // Animation complete.
    		});
			}
			function updateOfficeLocation(){
	$( "#addOfficeform" ).toggle( "fast", function() {
    // Animation complete.
    		});
			}
			function updateinstitute(){
	$( "#changeInstituteform" ).toggle( "fast", function() {
    // Animation complete.
    		});
			}
			
   function exitControl(){
		$( "#kontrollpanel" ).hide( "fast", function() {
    // Animation complete.
    		})
    		}
    function exitWindowBusyTime(){
		$( "#busyTimePopup" ).hide( "fast", function() {
    // Animation complete.
    		})
    		}
    		 function exitWindowBusyStatus(){
		$( "#busyStatusPopup" ).hide( "fast", function() {
    // Animation complete.
    		})
    		};
</script>


<script type="text/javascript">
		function openKontrollpanel()
		{
			$( "#kontrollpanel" ).toggle( "fast", function() {
    // Animation complete.
    		});
		}
		
</script>
  
   
  
  