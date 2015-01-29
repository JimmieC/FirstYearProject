<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
</head>
<body>

<?php
// Ansluta till databasen så att vi kan ändra saker. 
mysql_connect("mysql2.000webhost.com", "a9600570_admin", "pass123") or die(mysql_error());  //Anslut till databas-servren med användarnamn och lösenord.
mysql_select_db("a9600570_larare") or die(mysql_error()); //Anslut till specifik databas
?>



<?php
// Make a MySQL Connection
$query = "SELECT * FROM teachers"; 

mysql_set_charset("utf8");  //Svenska tecken.

$result = mysql_query($query) or die(mysql_error());

while($larare = mysql_fetch_array($result))
{
	$teacherid = $larare['id'];
	
	echo $password = rand_passwd(8,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
	

// mysql_query("UPDATE teachers SET password='$password' WHERE id='$teacherid' "); // Updaterar databasen. 

    echo "    > Password added / updated. <br />";
}
?>

<?php   // Funktion för random lösenord.
function rand_passwd( $length = 8, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789' ) {
    return substr( str_shuffle( $chars ), 0, $length );
}

?>

</body>
</html>




