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
							
$matches = array(); 		// Här defineras $matches som Array.

$handle = @fopen("../text/teachers_id.txt", "r"); //$handle betyder ("Öppna" lärare.text-textdokumentet och öppna "R". 
									 // fopen = öppna inläsningen
									 // @ = ?
if ($handle) 						 // Om $handle är true  
{
    while (!feof($handle)) 			 //Medan det går att köra "öppna" så körs följande
    { 								  
        $buffer = fgets($handle);    			   // $buffer "gets" info som returneras av $handle. 
            $matches[] = $buffer;    			   // Då fylls arrayen "$matches" med returvärden från $buffer. 
    } 
    fclose($handle); // Avslutar inläsningen. 
}


foreach($matches as $match => $value) // as = ?
{

$arr2 = str_split($value, 7); // Skapar en array där vi delar upp value i bitar om sex bokstäver. (Koden är 6 bokstäver)

$arr3 = str_split($value, 7); // Skapar en array där vi delar upp value i bitar om sex bokstäver. (Koden är 6 bokstäver)

$code = ($arr2[0]);  // Plats 0 i arrayn åvan är endast koden. Här bestämemr vi att $code är den första platsen (Koden)

$code2 = ($arr3[0]);  // Plats 0 i arrayn åvan är endast koden. Här bestämemr vi att $code är den första platsen (Koden)

$name = substr($value, 8); // Här säger vi att name är $value förutom att vi tar bort de 8 första bokstäverna (så vi slipper koden)


$fixname = str_replace(",","",$name);

$code2 = str_replace(" ","",$code2);

$code2 = str_replace(",","",$code2);

$code = str_replace(" ","",$code);

$code = str_replace(",","",$code);

echo $code; // Här outputtar vi $code.
echo $code2;

echo ' '; // Mellanslag. 

echo $fixname;  // Outputter name. 


echo '<br/>'; // Gör ett radbyte. 
  
  
// KOD FÖR ATT TA BORT ALLA LÄRARE MED TELEFONNUMMER "0"

// mysql_query("DELETE FROM teachers WHERE phone='0'");

mysql_set_charset("utf8");  //Svenska tecken.

// KOD FÖR ATT LÄGGA TILL LÄRARE
  
#   mysql_query("UPDATE teachers SET id='$code2' WHERE id='$code' ");
  
// mysql_query("INSERT INTO teachers (name, id)
// VALUES ('$fixname', '$fixcode')") 
// or die(mysql_error());  


echo "Data Inserted!";


  
}


?>



</body>
</html>




