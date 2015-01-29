	<?php
session_start();
if(session_is_registered(myusername)){

	if($_SESSION['myusername'] == "##")
		{
		echo 'Hej, du är inloggad med Adminkonto.: ', $_SESSION['myusername'];
		}
		
		else
		{
		header("location:../index.php");
		// Inloggad men inte admin... 
		}
	}
else
{
header("location:../index.php");
}
?>



<html>

<form method="post" name="adduser" action="add_user_exec.php" />
<h1>Add Teacher</h1>
<p>  Teacher name: </p>
<input type="text" name="teachername" />

<p>  Teacher ID: </p>
<input type="text" name="teacherid" />

<p>  Teacher password: </p>
<input type="text" name="teacherpassword" />

<p>  Teacher email: </p>
<input type="text" name="teacheremail" />

<p>  Teacher fakultet: </p>
<input type="text" name="teacherfakultet" />

<p>  Teacher calLink: </p>
<input type="text" name="teachercalLink" />

<p>  Teacher phone: </p>
<input type="text" name="teacherphone" />

 <input type="submit" name="Submit" value="add" />

</form>



<form method="post" name="deleteuser" action="delete_user_exec.php" />
Delete user:   
<input type="text" name="id" /> <input type="submit" name="Submit" value="remove" />
</form>

</html> 