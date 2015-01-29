<?php
session_start();
if(session_is_registered(myusername)){
}

else
{
header("location:../index.php");
}
?>



<div id="addOfficeform">
<form method="post" name="update" action="admin/add_office_exec.php" />
<p><?php echo $menuOfficeLocationUpdate; ?></p>     
<input type="text" name="useroffice" />


<input type="submit" name="Submit" value="<?php echo $profileMenuUpdate; ?>" />

</form>
</div>