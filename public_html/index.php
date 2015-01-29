<?php include('header.php'); ?> <!-- Allt från <html>-starttaggen ner till </head> finns  här. Så slipper man skriva om det varje gång. -->


<div id="index">
<h1><?php echo $homepageTitle ?></h1>
<p><?php echo $homepageDescription ?></p>
			<form action="search.php" method="GET" id="search"> <!-- <form> visar att detta är ett formulär -->
				<input id="input" required name="search" placeholder="<?php echo $homepageSearchbar ?>" x-webkit-speech /> <!-- <input> gör en textruta där användar ger input. required är det som gör att man måste skriva något i rutan för att kunna söka. -->
				<input id="button" type="submit" value="<?php echo $homepagesearchbutton ?>"> <!-- detta är knappen användaren klickar på för att söka -->
			</form>
</div>


<?php include('footer.php'); ?> <!-- Allt i footer finns  här. Så slipper man skriva om det varje gång. -->