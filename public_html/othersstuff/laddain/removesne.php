<?php
// Ansluta till databasen så att vi kan ändra saker. 
mysql_connect("mysql2.000webhost.com", "a9600570_admin", "pass123") or die(mysql_error());  //Anslut till databas-servren med användarnamn och lösenord.
mysql_select_db("a9600570_larare") or die(mysql_error()); //Anslut till specifik databas


$query = "SELECT * FROM teachers"; 

mysql_set_charset("utf8");  //Svenska tecken.

$result = mysql_query($query) or die(mysql_error());

$x = 0;
while($row = mysql_fetch_array($result)){ 
$rowid = $row['id'];
$id = $row['id'];
$id = str_replace(" ","",$id);
$id = str_replace(",","",$id);

echo $id;

mysql_set_charset("utf8");  //Svenska tecken.

// KOD FÖR ATT LÄGGA TILL LÄRARE
  
# mysql_query("UPDATE teachers SET phone='' WHERE phone='0' ");
 

}



?>
