<?php
include('../config.php');

//Get product size details

if(isset($_POST['action']) && $_POST['action']=='addProduct')
{
     /******************************************
   *   We need
   *   -> Product name
   *   -> Product ID
   *   -> Product Price
   ******************************************/
   
    $product_id = $_POST['pid'];
    $sql  = 'select oc_product_description.product_id,oc_product_description.name,oc_product_avail_sizes.product_price from oc_product,oc_product_description,oc_product_avail_sizes WHERE oc_product.product_id=oc_product_description.product_id and oc_product.product_id='.$product_id.' and oc_product_avail_sizes.id='.$_POST['size_id'];
    $data = mysqli_query($db,$sql);
    $num = mysqli_num_rows($data);
    if($num>0)
    {
      $row = mysqli_fetch_assoc($data);
      echo $data = json_encode($row);
    }else{
      echo '-1';
    }
   
   
   
   
}



?>


