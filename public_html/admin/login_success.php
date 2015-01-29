
<?php
session_start();

if(!session_is_registered(myusername))
{
	header("location:../index.php");
}
?>

<html>
<body>
<?php
$usrname = $_SESSION['myusername'];
$header = 'location:http://mahlarare.net78.net/profile.php?user=' . $usrname;
header($header);


echo $usrname;
echo $header;
?>
</body>
</html>