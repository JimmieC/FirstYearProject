<?php 
$searchthis = "<a target";  //$searchthis är variablen. 
							//$Searchthis är lika med "<a target".
							//vad innebär "<a target"?
							//Dollartecken betyder att det är en variabel.
							
$matches = array(); 		// Här defineras $matches som Array.

$handle = @fopen("text/teachers_id.txt", "r"); //$handle betyder ("Öppna" lärare.text-textdokumentet och öppna "R". 
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
  
  echo '<br/>'; // Gör ett radbyte. 
}


?>
