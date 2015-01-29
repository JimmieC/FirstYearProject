<?php include('header.php'); ?> <!-- Allt från <html>-starttaggen ner till </header> finns  här. Så slipper man skriva om det varje gång. -->


		<form action="search.php" method="GET" id="resultsearch"> <!-- <form> visar att detta är ett formulär -->
			<input id="input" required name="search" placeholder="<?php echo $homepageSearchbaragain; ?>" x-webkit-speech /> <!-- <input> gör en textruta där användar ger input. required är det som gör att man måste skriva något i rutan för att kunna söka. -->
			<input id="button" type="submit" value="<?php echo $homepagesearchbutton; ?>"> <!-- detta är knappen användaren klickar på för att söka -->
		</form>
		
		<div id="results"> <!-- innanför denna <div> finns resultatet på sökningen. Allting innanför denna <div> är PHP. -->

<?php
// Ansluta till databasen så att vi kan ändra saker. 
mysql_connect("mysql2.000webhost.com", "a9600570_admin", "pass123") or die(mysql_error());  //Anslut till databas-servren med användarnamn och lösenord.
mysql_select_db("a9600570_larare") or die(mysql_error()); //Anslut till specifik databas

mysql_set_charset("utf8");  //Svenska tecken.

$felmedelande = $searchresultNomatches;

if ($searchword = preg_replace("[^a-z0-9:]", "", $_GET[search])) //Ska inte ta bort mellanslag!!!  // Vi säger att searchword är Det vi sökte efter fast utan konstiga tecken.
	{
		if ($searchword) // Om det är något kvar i den efter att vi tagit bort alla konstiga tecken
		{
		$q = "SELECT * FROM teachers   
		WHERE name  LIKE '$searchword%' OR     
		id LIKE '$searchword%' OR
		courses LIKE '$searchword%'";

								// % = Wildcard. Betyder att man inte behöver skriva exakt..
      	$sql = mysql_query($q); // Sök i MYSQL- välj från table som heter "teachers" 			
      							// och gå sedan efter namn som liknar det som fördes in i sökfältet. 

			$i = 0;  // Används för att räkna antal iterationer inom while-loopen nedan. Dvs hur många lärare som visas i sökresultatet. 

				while($ser = mysql_fetch_array($sql))   // Så länge sökresultatet motsvarar det som finns i databasen...
				{
				$i = $i + 1; // Lägger till. 
				
				echo "<a href=", 'profile.php?user=', $ser[id], '>';  // Länk
				
				echo '<div class="teacherbox">';
								
					if (!empty($ser[photo]))
						{
						echo '<img class="teacherphoto" style="';
						echo "background-image:url('";
						echo $ser['photo'];
						echo "');";
						echo '">'; 
						}
				
					echo"<p>", $ser[name], "</p>";
						
						if (!empty($ser[fakultet]))
						{
						echo '<p class="fakultet"> <i>' , $ser[fakultet], "</i> </p>";	
						}
										
				#	echo $ser[fakultet], ' ', $ser[id], ' ', $ser[email], ' ', $ser[phone];
								
				echo '</div>';
				
				echo"</a>";   // Skriv ut namnet på de som söks. 
				
				echo'<a href="mailto:', $ser[email], '"><img src="img/email.png" class="email-icon"></p>';
					echo'<a href="tel:', $ser[phone], '"><img src="img/call.png" class="phone-icon"></p>';	

				
				}
			

			if ($i == 0) // Om det inte hittades några lärare
			{
			echo $felmedelande;
			}
	}

	else // Om inget fylldes i i sökrutan
	{
	echo $felmedelande;
	}

}

else // Om det fylldes i konstiga tecken endast
{
echo $felmedelande;
}





?>


		</div> <!-- <div> avslutas. -->
		</div> <!-- <div> avslutas. -->

<?php include('footer.php'); ?>
