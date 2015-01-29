<?php
$user = $_GET["user"]; // Variablen user hämtas från GET. Från URL-adressen.

mysql_connect("mysql2.000webhost.com", "a9600570_admin", "pass123") or die(mysql_error());  //Anslut till databas-servren med användarnamn och lösenord.
mysql_select_db("a9600570_larare") or die(mysql_error()); //Anslut till specifik databas

mysql_set_charset("utf8");  //Svenska tecken.

$user = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE id = '$user'")); //Här hämtar den informationen om USER. 

mysql_close();  // Stänger uppkopplingen mot databsen.
?>