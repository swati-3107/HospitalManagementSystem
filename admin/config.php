<?php
require_once('config/functions.php');
chk_uploaded_files();
filter_global_array();
session_start();
require_once('config/database.php');
$db = new mysqli($servername, $username, $password, $dbname);
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require_once('config/base_path.php');
?>






