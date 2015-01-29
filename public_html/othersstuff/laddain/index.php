<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
</head>

<body>


<?php 
$searchthis = "<a target";  //$searchthis är variablen. 
							//$Searchthis är lika med "<a target".
							//vad innebär "<a target"?
							//Dollartecken betyder att det är en variabel.
							
$matches = array(); 		// Här defineras $matches som Array.

$handle = @fopen("larare.txt", "r"); //$handle betyder ("Öppna" lärare.text-textdokumentet och öppna "R". 
									 // fopen = öppna inläsningen
									 // @ = ?
if ($handle) 						 // Om $handle är true  
{
    while (!feof($handle)) 			 //Medan det går att köra "öppna" så körs följande
    { 								  
        $buffer = fgets($handle);    			   // $buffer "gets" info som returneras av $handle. 
        if(strpos($buffer, $searchthis) !== FALSE) // Om det går att läsa in info från $buffer och $searchthis (se nästa rad ...)
            $matches[] = $buffer;    			   // Då fylls arrayen "$matches" med returvärden från $buffer. 
    } 
    fclose($handle); // Avslutar inläsningen. 
}


foreach($matches as $match => $value) // as = ?
{

echo $value; // Hade visat alla. 
   	   // Här skriver den ut värdet, dvs namnet.
	
	
   $tabortkod = strrchr($value,'</a>'); 
   $namn = str_replace(",","",$tabortkod);
   
  
  echo '<br/>'; // Gör ett radbyte. 
}


?>

</body>
</html>



















  
// KOD FÖR ATT TA BORT ALLA ROWS mysql_query("DELETE FROM teachers WHERE name='Lars'");




<?php
// Insert a row of information into the table "example"
mysql_query("INSERT INTO teachers (name, id, office)
VALUES ('Lars', 'ax130', 'k82u40')") 
or die(mysql_error());  


echo "Data Inserted!";

?>

