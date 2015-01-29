<!DOCTYPE html>
 <html>
 <body>
 		<meta charset="utf-8">
 		
 		
<?php
$sourcecode = file('allinfo.txt');

$userinformationarray = array();


for($i=0;$i<=count($sourcecode);$i++)
{

$x = $x + 1;
if ($x % 4)
{

if (strpos($sourcecode[$i],'@') !== false) {

	$email= preg_replace('/\s+/', '', $sourcecode[$i]);    
    $userinformationarray[$i] =  $email;
}

if (strpos($sourcecode[$i],'040') !== false) {
   
    $phone= preg_replace('/\s+/', '', $sourcecode[$i]);    
     $userinformationarray[$i] =  $phone;
   }

if (substr($sourcecode[$i], 11))
{

}
else
{
  $id= preg_replace('/\s+/', '', $sourcecode[$i]);    
     $userinformationarray[$i] =  $id;
}

	// Not empty
}

else
{
// Empty
}


// mysql_query("UPDATE teachers SET email='$globalemail' WHERE id='$globalid' "); // Updaterar databasen.  
 	




	

}



// for($y=0;$y<=count($userinformationarray);$y = $y +4)
#{

#echo $insertid = $userinformationarray[$y];
#echo $insertemail = $userinformationarray[$y+1];
#echo $inserttel = $userinformationarray[$y+2];

#}



$userinformationarray = array_filter( $userinformationarray );
$userinformationarray = array_slice( $userinformationarray, 0 );



// Ansluta till databasen så att vi kan ändra saker. 
mysql_connect("mysql2.000webhost.com", "a9600570_admin", "pass123") or die(mysql_error());  //Anslut till databas-servren med användarnamn och lösenord.
mysql_select_db("a9600570_larare") or die(mysql_error()); //Anslut till specifik databas


$query = "SELECT * FROM teachers"; 

mysql_set_charset("utf8");  //Svenska tecken.

$result = mysql_query($query) or die(mysql_error());

$x = 0;
while($row = mysql_fetch_array($result)){ 


$id = (string)str_replace(" ","",$row['id']);
$id= preg_replace('/\s+/', '', $id);

$id2 = (string)str_replace(" ","",$userinformationarray[$x]);

$id2= preg_replace('/\s+/', '', $id2);

echo $row['name'];
echo $id;
echo '<br/>';
#echo $id2;


if (in_array($id, $userinformationarray)) {
    echo 'Denna finns i arrayn med telefonnummer etc!';
    echo ' Plats nr: ';
    echo $arrayplats = array_search($id, $userinformationarray); // $key = 2;
    echo '. <br/> Detta borde vara samma id: ', $userinformationarray[$arrayplats];
    
    $email = $userinformationarray[$arrayplats+1];
    
    echo '<br/> Med email: ', $email;
    
    $phone = $userinformationarray[$arrayplats+2];
    
     echo '<br/> och fön: ', $phone;
     
  # mysql_query("UPDATE teachers SET phone='$phone' WHERE id='$id' ");
    		

}

else
{
echo'Finns inte i arrayn..';
}


echo '<br/><br/>';
$x = $x +3;

}











 ?>







 </body>
 </html> 