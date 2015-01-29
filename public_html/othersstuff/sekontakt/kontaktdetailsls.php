<!DOCTYPE html>
 <html>
 <body>
 		<meta charset="utf-8">

<?php
$sourcecode = file_get_contents('infols.txt');




$pattern = "/(namn|tel).*a>/i";
preg_match_all($pattern, $sourcecode, $matchesName);


for($i=0;$i<=count($matchesName[0]);$i++)
{

echo $matchesName[0][$i];
echo '<br/>';

	
}





 ?>


 </body>
 </html> 