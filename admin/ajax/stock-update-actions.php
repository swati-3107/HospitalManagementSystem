<?php

include("../config.php");
if(!isset($_SESSION['admin_id']))
{

 die('Direct access not allowed.Login to proceed');    

}

if(isset($_POST['action']))
{

    $post = mysqli_escape_array($db,$_POST);

    extract($post);
    switch($action)
    {

        case 'delete':
$sql = "INSERT into purchase_indent_products_deleted SELECT * FROM `purchase_indent_products` where id=$barcode";
$sql = "INSERT into purchase_indent_products_deleted SELECT * FROM `purchase_indent_products` where id=$barcode";

if($sql)
{
 $sql = "delete from purchase_indent_products where id=$barcode";
 
 if(mysqli_query($db,$sql))
 {
  echo '1';
 }
}


         echo 'Deleted';
         
         
        break;
    
    
        case 'up':

            //Update purchase price

          $purchase_price= (float) $purchase_price;

          $barcode = (int)$barcode;

          

          $sql = "update purchase_indent_products set purchse_price=$purchase_price where id=$barcode";

          

          if(mysqli_query($db,$sql))

          {

            echo 'Purchase price updated';

          }else{

            echo 'Error occured while updating purchase price.';

          }

          

            

        break;

    

    

    case 'uq':

        //Update puchase quantity

        

          $quantity= (int) $quantity;

          $barcode = (int)$barcode;

          

          $sql = "update purchase_indent_products set quantity=$quantity where id=$barcode";

          

          if(mysqli_query($db,$sql))

          {

            echo 'Purchase Quantity updated';

          }else{

            echo 'Error occured while updating purchase quantity.';

          }

    break;

    case 'usq':
    //Add products to invoice
    $invoice_id = 46;
    
    $sql = "insert into `store_invoice_final` where invoice_id=46";
    
     $sql =  "INSERT INTO `store_invoice_final`
    (`id`, `store_id`, `product_id`, `quantity`, `invoice_id`, `size_id`, `timestamp`, `barcode`)
    VALUES (NULL,1,$product_id,$quantity,46,$size_id,CURRENT_TIMESTAMP,$barcode)
     ";
     
     $ret = mysqli_query($db,$sql) or die(mysqli_error($db));
     
     
     if($ret)
     {
      echo 'Quantity Updated';
     }else{
      echo 'Error while occured';
     }
     
     
    break;
    
    
    }

    

}







?>