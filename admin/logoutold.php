<?php
ob_start();

session_id();

$_SESSION["admin_name"]=NULL;
$_SESSION['admin_name']=NULL;

unset($_SESSION['admin_name']); 
unset($_SESSION['admin_name']); 


//session_unset(); // unset all the sessions

if (!isset($_SESSION["admin_name"]))
{
echo '<script type="text/javascript">window,location = "index.php";</script>';
} 

?>