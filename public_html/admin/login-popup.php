<div id="loginpopup" title="Logga in">

	<form method="post" action="../admin/checklogin.php">

	<p> <?php echo $menuLoginId; ?> </p>
	<input name="myusername" type="text" id="myusername">
	<p> <?php echo $menuLoginPassword; ?> </p>
	<input name="mypassword" type="password" id="mypassword">

	<input type="submit" name="Submit" value="<?php echo $menuLogin; ?>">

	</form>

</div>

