<?php
session_start();
if(session_is_registered(myusername)){
}

else
{
header("location:../index.php");
}
?>

<div id="changepasswordform">
<form method="post" name="update" action="admin/update_password_exec.php" />
<p><?php echo $profileMenuNewPassword?></p>   
<input type="password" name="userpassword" /> <input type="submit" name="Submit" value="<?php echo $profileMenuUpdate; ?>" />
</form>
</div>

