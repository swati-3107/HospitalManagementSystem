<?php
include("../config.php");
//get sub category
if(!isset($_SESSION['admin_id']))
{
    die();
}
if(isset($_POST['action']))
{
    switch($_POST['action'])
    {
        case 'updateQuantity':
            
            $qty = $_POST['qty'];
            $id = $_POST['id'];
            
            $sql = "update  `store_products_stock`
            set product_quantity=$qty where id=$id
            ";
            
            if(mysqli_query($db,$sql))
            {
                echo "Quantity Updated";
            }
            
            break;
    }
}

?>
