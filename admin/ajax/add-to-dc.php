<?php
//print_r($_POST);
include('../config.php');

if(!isset($_SESSION['admin_id']))
{
    die('Direct access not allowed');
}

if(isset($_POST['action']))
{
    switch($_POST['action'])
    {
        case 'addToDC':
            $user_id = $_SESSION['admin_id'];
          
            $post = mysqli_escape_array($db,$_POST);
            $store_id= (int)$post['store'];
             $purchase_orders = implode(',',$_POST['selected']);
            //$purchase_orders;
    
           $sql = "INSERT INTO admin_store_invoice_temp SELECT '' as id, $store_id as store_id, purchase_indent_products.product_id, purchase_indent_products.quantity, purchase_indent_products.size_id, 0 as invoice_id, CURRENT_TIMESTAMP as timestamp, '$user_id' as user_id, purchase_indent_products.id as barcode FROM `purchase_indent_products` INNER JOIN purchase_indent on purchase_indent.id = purchase_indent_products.indent_id WHERE purchase_indent_products.indent_id in ($purchase_orders)";
           
           if(mysqli_query($db,$sql))
           {
             echo 1;
           }
           
            
        break;
    }
}