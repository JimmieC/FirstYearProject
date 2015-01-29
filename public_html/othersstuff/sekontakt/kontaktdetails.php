<!DOCTYPE html>
 <html>
 <body>

<?php
$sourcecode = file_get_contents('codeks.html');


$pattern = '/\/id.*"/';
preg_match_all($pattern, $sourcecode, $matchesName);

$patternTel = '/040.*</'; 
preg_match_all($patternTel, $sourcecode, $matchesTel);

$patternMail = '/email.*</';
preg_match_all($patternMail, $sourcecode, $matchesMail);




for($i=0;$i<=count($matchesMail[0]);$i++)
{

//ID

	$id = substr($matchesName[0][$i],4);
	echo $finalId = str_replace('"','',$id);
	
	if (empty($finalId))
	{
	echo'Empty slot';
	}
	
	echo '<br/>';
	
	//EMA


	$finalMail = substr($matchesMail[0][$i],6);
	$finalMail2 = str_replace('<','',$finalMail);
	$finalMail3 = str_replace('/SPAN>/SPAN>/TD>/TR>/TBODY>/TABLE>','',$finalMail2);
	$finalMail4 = str_replace('/SPAN>/TD>','',$finalMail3);
	echo $finalMail5 = str_replace('/TR>/TBODY>/TABLE>','',$finalMail4);
	
		if (empty($finalMail5))
	{
	echo'Empty slot';
	}
	
	echo '<br/>';
	
//TEL

	$finalTel = str_replace('<','',$matchesTel[0][$i]);
	$finalTel2 = str_replace('/SPAN>/SPAN>/TD>/TR>/TBODY>/TABLE>','',$finalTel);
	echo $finalTel3 = str_replace('/SPAN>/SPAN>/TD>','',$finalTel2);
	
	if (empty($finalTel3))
	{
	echo'Empty slot';
	}
	
	echo '<br/><br/>';
	

	
	
	
}





 ?>


 </body>
 </html> 