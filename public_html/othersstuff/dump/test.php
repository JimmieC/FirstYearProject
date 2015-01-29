<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
</head>
<body>


<?php
// Make a MySQL Connection
mysql_connect("mysql2.000webhost.com", "a9600570_admin", "pass123") or die(mysql_error());
mysql_select_db("a9600570_larare") or die(mysql_error());

?>


<h1>Hej, nu bör vi kopplat mot databasen (?)</h1>


<?php

// $sql = 'CREATE TABLE `a9600570_larare`.`table` (`password` VARCHAR(80) NOT NULL) ENGINE = MyISAM';
?>


<?php

$firstname = $_POST["name"];

// Insert a row of information into the table "example"
mysql_query("INSERT INTO event 
(Firstname) VALUES('$firstname') ") 
or die(mysql_error());  


echo "Data Inserted!";

?>




</body>
</html>