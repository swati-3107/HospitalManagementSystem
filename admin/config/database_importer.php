<?php
set_time_limit(0); // Time in seconds, max_execution_time
require_once('database.php');
$sql = file_get_contents('db.sql');
$mysqli = new mysqli("$servername", "$username", "$password", "$dbname");
if (mysqli_connect_errno()) { /* check connection */
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* execute multi query */
if ($mysqli->multi_query($sql)) {
    echo "success";
} else {
   echo "error";
}
