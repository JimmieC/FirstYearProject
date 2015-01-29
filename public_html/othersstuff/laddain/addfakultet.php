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

# while($larare = mysql_fetch_array($result))
{
	$teacherid = $larare['id'];
	
	echo $id = substr($teacherid, 0, 2); 
	
	if ($id == 'TS')
	{
		mysql_query("UPDATE teachers SET fakultet='Teknik och Samhälle' WHERE id='$teacherid' "); // Updaterar databasen. 
	}  
	
	if ($id == 'OD')
	{
		mysql_query("UPDATE teachers SET fakultet='Tandvårdshögskolan' WHERE id='$teacherid' "); // Updaterar databasen. 
	} 
	
	if ($id == 'LS')
	{
		mysql_query("UPDATE teachers SET fakultet='Lärande och Samhälle' WHERE id='$teacherid' "); // Updaterar databasen. 
	} 
	
	if ($id == 'KS')
	{
		mysql_query("UPDATE teachers SET fakultet='Kultur och Samhälle' WHERE id='$teacherid' "); // Updaterar databasen. 
	} 
	
	if ($id == 'HS')
	{
		mysql_query("UPDATE teachers SET fakultet='Hälsa och Samhälle' WHERE id='$teacherid' "); // Updaterar databasen. 
	} 
	
	if ($id == 'BI')
	{
		mysql_query("UPDATE teachers SET fakultet='Bibliotek och IT' WHERE id='$teacherid' "); // Updaterar databasen. 
	} 
	
	if ($id == 'RK')
	{
		mysql_query("UPDATE teachers SET fakultet='Rektors Kansli' WHERE id='$teacherid' "); // Updaterar databasen. 
	} 
	

// mysql_query("UPDATE teachers SET password='$password' WHERE id='$teacherid' "); // Updaterar databasen. 

    echo "    > Added/Updated Fakultet. <br />";
}
?>


</body>
</html>




