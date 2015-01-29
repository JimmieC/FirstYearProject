<?php
session_start();
if(session_is_registered(myusername)){
}

else
{
header("location:../index.php");
}
?>



<div id="updateemailtelephoneform">
<form method="post" name="update" action="admin/update_email_telephone_exec.php" />
<p><?php echo $profileMenuNewEmail; ?></p>     
<input type="text" name="useremail" />

<p><?php echo $profileMenuNewTel; ?></p>      
<input type="text" name="usertelephone" /> 

<input type="submit" name="Submit" value="<?php echo $profileMenuUpdate; ?>" />

</form>
</div>