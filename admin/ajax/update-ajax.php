<?php
include("../config.php");
if(!isset($_SESSION['admin_id']))
{
 die('Direct access not allowed.Login to proceed');    
}

$post = mysqli_escape_array($db,$_POST);
extract($post);
if(mysqli_query($db,"update $table set $column=\"$value\" where id=$id"))
echo "Updated";
else
echo "Not updated";
?>