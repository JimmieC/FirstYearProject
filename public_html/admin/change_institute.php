<?php
session_start();
if(session_is_registered(myusername)){
}

else
{
header("location:../index.php");
}
?>



<div id="changeInstituteform">
<form method="post" name="update" action="admin/change_institute_exec.php" />
<p><?php echo $menuEnternewinstitute; ?></p>     
<input type="text" name="userinstitute" />


<input type="submit" name="Submit" value="<?php echo $profileMenuUpdate ?>" />

</form>
</div>