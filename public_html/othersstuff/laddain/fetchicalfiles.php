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
		$schedulelink = "http://schema.mah.se/setup/jsp/SchemaICAL.ics?startDatum=idag&intervallTyp=m&intervallAntal=6&sprak=SV&sokMedAND=true&forklaringar=true&resurser=s.";

	$callink = $schedulelink . $larare['id'];
	
	$teacherid = $larare['id'];
	
	echo $callink; // Hela länken med ID.

// mysql_query("UPDATE teachers SET calLink='$callink' WHERE id='$teacherid' "); // Updaterar databasen. 

    echo "Data inserted. <br />";
}
?>






</body>
</html>




