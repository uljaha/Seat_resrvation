<?php
session_start();
session_destroy();
echo '<meta http-equiv="refresh" content="0.1; URL=logout.php">';

if(!$_SESSION['new']) 
{
header('Location:admin.php');
}

?>
