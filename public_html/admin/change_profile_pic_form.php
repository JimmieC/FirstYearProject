<?php
session_start();
if(session_is_registered(myusername)){
}

else
{
header("location:../index.php");
}
?>


<div id="updatePic">
<form method="post" name="update" action="admin/change_profile_pic.php" />
<p><?php echo $profileMenuUpdateNewPicture; ?></p>     
<input type="text" name="userimage" />

<input type="submit" name="Submit" value="Uppdatera" />

</form>
</div>
