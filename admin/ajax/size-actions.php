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
        case 'deleteSizeRecord':
            $id = (int)$_POST['id'];
            if(mysqli_query($db,'DELETE from oc_product_avail_sizes where id='.$id));
            {
            echo 1; 
            }

        break;
       
       
       //Update value of weight
       
       case 'updateWeight':
            $size_id = (int)$_POST['size_id'];
            $weightValue = $_POST['weightValue'];
           $sql = "UPDATE `oc_product_avail_sizes` SET `product_weight` = '$weightValue' WHERE `oc_product_avail_sizes`.`id` = $size_id";
          if(mysqli_query($db,$sql))
          {
            echo '1';
          }
        break;
       
       
       //Update value of Price
       
       case 'updatePrice':
            $size_id = (int)$_POST['size_id'];
            $priceValue = $_POST['priceValue'];
           $sql = "UPDATE `oc_product_avail_sizes` SET `product_price` = '$priceValue' WHERE `oc_product_avail_sizes`.`id` = $size_id";
          if(mysqli_query($db,$sql))
          {
            echo '1';
          }
        break;
       
       case 'addQuantity':
            $sid = (int)$_POST['sid'];
            $qty = (int)$_POST['qty'];
            if(mysqli_query($db,"update oc_product_avail_sizes set product_quantity = product_quantity+$qty where id=".$sid))
            {
             
             $sql = "select * from oc_product_avail_sizes where id=$sid";
             $data = mysqli_query($db,$sql);
             $num = mysqli_num_rows($data);
             if($num>0)
             {
                $r = mysqli_fetch_assoc($data);
                echo $r['product_quantity'];
             }
            }else{
                echo -1;
            }

        break;
    
       case 'add_unit':
        
        $unit_name = mysqli_real_escape_string($db,$_POST['un']);
        
        $sql  = "INSERT INTO `product_size_units` (`id`, `unit_name`) VALUES (NULL, \"$unit_name\")";
        
        if(mysqli_query($db,$sql))
        {
          echo 1;
        }else{
          echo 0;
        }
        
       break;
    }
}

?>
