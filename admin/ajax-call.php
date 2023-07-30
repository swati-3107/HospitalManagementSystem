<?php
session_start();
include('config.php');
if(isset($_REQUEST['autocomplet'])){

if($_REQUEST['autocomplet']=='category'){

$filter_name=$_REQUEST['filter_name'];
$array = '[';
$sql="SELECT cp.category_id AS category_id, GROUP_CONCAT(cd1.name ORDER BY cp.level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') AS name, c1.parent_id, c1.sort_order FROM oc_category_path cp LEFT JOIN oc_category c1 ON (cp.category_id = c1.category_id) LEFT JOIN oc_category c2 ON (cp.path_id = c2.category_id) LEFT JOIN oc_category_description cd1 ON (cp.path_id = cd1.category_id) LEFT JOIN oc_category_description cd2 ON (cp.category_id = cd2.category_id) WHERE cd1.language_id = 1 AND cd2.language_id = 1 ";
if(!empty($_REQUEST['filter_name'])){

$sql .=" AND cd2.name LIKE '" . $_REQUEST['filter_name'] . "%'";
}

$sql .="GROUP BY cp.category_id";
$result->$db->query($sql) or die($db->error.__LINE__);
while($row = $result->fetch_assoc()) {
            $array .= '{"name":"'.$row['name'].'","category_id":"'.$row['category_id'].'"},';
	}

 $array =trim($array,",").']';
 header('Content-type: application/json');
echo json_encode( $array );
}
}



?>