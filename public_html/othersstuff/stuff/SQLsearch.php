
search box is set to the search.php file

search.php script:

Needs database connection to get to database files
Assign search variable and set it to receive the value of the search box
php variable $search  = $searchBoxValue

<?php
//SQL
$sql = "SELECT" * FROM contacts
WHERE email like '%$search%' OR // this line searches for the text entered into the search box
								// the % means that everything in the database with something before or after the entered
								// search field will be returned.
								// this means that any string of letters equal to the search box input t.ex "aft"
FIRST like
LAST like
PHONE like
ORDER BY last ASC";   		//this puts the search in order of last name

//run SQL statement
$result=mysql_query($sql, $db) or die(mysql__error());

//print search results

<table cellpadding="15"> //15 is a random number
HERE;

//loop through results and get variables
while ($row=mysql_fetch_array($result))
{
$id=$row["id"]; //make sure the variable in the [] matches the "primary key"
$email=$row["email"];
$first=$row["first"];
$last=$row["last"];
$phone=$row["phone"];
}
