<?php 

session_start();

$inputlanguage = $_POST['language']; 

if (($_SESSION['currlang'] == 1) && $inputlanguage == 0)
{
$_SESSION['currlang'] = 0;
}

if (($_SESSION['currlang'] == 0) && $inputlanguage == 0)
{
$_SESSION['currlang'] = 1;
}

if (($_SESSION['currlang'] == 1) && $inputlanguage == 1)
{
$_SESSION['currlang'] = 0;
}

if (($_SESSION['currlang'] == 0) && $inputlanguage == 0)
{
$_SESSION['currlang'] = 1;
}

header('location:'.$_SERVER['HTTP_REFERER']);

?>




