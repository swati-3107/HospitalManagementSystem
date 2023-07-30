<?php
include('../config.php');
//

if(!isset($_SESSION['admin_id']))
{
   die('Direct access not allowed');
}else{
   $user_id = $_SESSION['admin_id'];
}


//Autoadd product into invoice using barcode
if(isset($_POST['action']) && $_POST['action']=='addProductByBarcode')
{
  $barcode = (int) mysqli_real_escape_string($db,$_POST['barcode']);
  $qty = (int) mysqli_real_escape_string($db,$_POST['qty']);

  if($qty<=0)
  {
    ?>
    <div class="alert alert-danger">
      Invalid value for Quantity.
    </div>
    <?php
    die();
  }
  
//Barcode means purchase_indent_products.id
//$user_id;
  
  $sql = "SELECT
purchase_indent_products.id,
purchase_indent_products.product_id,
purchase_indent_products.size_id,
purchase_indent_products.purchse_price,
purchase_indent_products.mrp,
purchase_indent_products.quantity,
purchase_indent_products.expiry_date,
purchase_indent_products.indent_id,
oc_product_description.name,
oc_product_avail_sizes.product_weight, 
oc_product_avail_sizes.product_weight_unit, 
oc_product_avail_sizes.product_price,
admin_products_stock.quantity as product_quantity 

FROM purchase_indent_products
INNER JOIN admin_products_stock on admin_products_stock.barcode = purchase_indent_products.id
INNER JOIN oc_product_description on oc_product_description.product_id = purchase_indent_products.product_id
INNER JOIN oc_product_avail_sizes on oc_product_avail_sizes.id = purchase_indent_products.size_id
 WHERE
 purchase_indent_products.id=$barcode and admin_products_stock.quantity>0";
  
$data = mysqli_query($db,$sql);
$num = mysqli_num_rows($data);
  

  
  
  if($num>0)
  {
   $row = mysqli_fetch_assoc($data);
   extract($row);
    /*
      [id] => 27
      [user_id] => 1
      [product_id] => 38
      [size_id] => 38
      [purchse_price] => 50
      [quantity] => 250
      [expiry_date] => 2019-06-14
      [indent_id] => 3
      [role] => 
      [name] => DA-099-A-28-ECO FRIENDLY PAD PEN
      [product_weight] => 1
      [product_weight_unit] => Unit
      [product_price] => 70
      [product_quantity] => 250
    */                
     //Check if product is already in invoice table
    $user_id = $_SESSION['admin_id'];
    $store_id = $_POST['store_id'];
    $sql = "select * from admin_store_invoice_temp where barcode=$barcode and store_id=$store_id  and user_id=$user_id";

    $data = mysqli_query($db,$sql);
    $num = mysqli_num_rows($data);
    
    
   if($num>0)
   {
    $temp = mysqli_fetch_assoc($data);
    
    $added_qty = $temp['quantity'];
   
    //Check available stock
   
   $qty_to_add = $added_qty+1;
   if($qty_to_add<=$product_quantity)
   {
          $sql  = "update `admin_store_invoice_temp` SET quantity=quantity+1 WHERE product_id=\"$product_id\" and store_id=$store_id and user_id=$user_id and size_id=$size_id and barcode=$barcode";
         $ret = mysqli_query($db,$sql) or die(mysqli_error($db));
          if($ret)
          {
            ?>
          <div class="alert alert-success">
            <p>Quantity successfully updated.</p>
          </div>
          <?php
          }else{
            ?>
          <div class="alert alert-danger">
            <p>Problem occured while updateing quantity.</p>
          </div>
          <?php
          }
    
   }else{
    //Not sufficient stock
    
     ?>
     <div class="alert alert-danger">
      <span class="fa fa-close"></span>
      Only <?=$product_quantity?> quantity avaiable in stock which are already added for DC. So, Cant add
      extra quantity for DC.
     </div>
     <?php
    
    
   }
   
   
    
   }else{
     //Product not present in DC temp
    
    if($qty<=$product_quantity)
    {
      //Can add
    $sql  = "INSERT INTO `admin_store_invoice_temp`(`id`, `store_id`, `product_id`, `quantity`, `mrp`,`size_id`, `invoice_id`, `timestamp`,`user_id`,`barcode`)
     VALUES (NULL, \"$store_id\", \"$product_id\", \"$qty\", \"$mrp\", \"$size_id\", \"0\", CURRENT_TIMESTAMP,\"".$_SESSION['admin_id']."\",\"$barcode\")";
     
    $res =mysqli_query($db,$sql);
    
    if($res)
    {
        echo 1;
    }
      
      
    }else{
      
      if($product_quantity>0)
      {
        //Have some quantity
        
      $sql  = "INSERT INTO `admin_store_invoice_temp`(`id`, `store_id`, `product_id`, `quantity`, `mrp`,`size_id`, `invoice_id`, `timestamp`,`user_id`,`barcode`)
     VALUES (NULL, \"$store_id\", \"$product_id\", \"$product_quantity\",\"$mrp\", \"$size_id\", \"0\", CURRENT_TIMESTAMP,\"".$_SESSION['admin_id']."\",\"$barcode\")";
     
    $res =mysqli_query($db,$sql);
    
    if($res)
    {
        ?>
        <div class="alert alert-warning">
          Only <?=$product_quantity?> quantity available in stock and added
          for purchase entry.
          Need extra <?=$qty-$product_quantity?>  more quantity to satisfy store requirement.
        </div>
        <?php
    }
      
        
        
      }else{
        //Out of stock
        
        ?>
        <div class="alert alert-danger">
          <span class="alert alert-close"></span>
          Warning : Out of Stock product.
        </div>
        
        <?php
        
      }
      
      
      
      
    }
   
     
       
       
       
   }
   
   
   
   
  }else{
   
  ?>
  <div class="alert alert-danger">
   No product found for this barcode.(If barcode exist then Please check quantity available in stock. )
  </div>
  
  
  <?php
   
  }

}
//Get product size details

if(isset($_POST['action']) && $_POST['action']=='getProductSize')
{
   $product_id = $_POST['pid'];
   $sql  = 'SELECT * FROM `oc_product_avail_sizes` WHERE product_id='.$product_id;
   
    $data = mysqli_query($db,$sql);
    
    $num = mysqli_num_rows($data);
    $sub_total=0;
    if($num>0)
    {
      echo "<option value='1'>Choose Size</option>";
       for($i=1;$i<=$num;$i++)
       {
         $row = mysqli_fetch_assoc($data);
         extract($row);
         /*
   id
   product_id
   product_weight
   product_weight_unit
   product_price
         
         */
         echo "<option value='$id'> $product_weight ($product_weight_unit) => Rs. $product_price/- </option>";
      
       }
    }else{
     
     echo "<option value=''>No size available</option>";
    }
      
      
}

//Get Barcode by product_id and size_id 

if(isset($_POST['action']) && $_POST['action']=='getProductBarcodeDetails')
{
  
  //print_r($_POST);
   $product_id = $_POST['product_id'];
   $size_id = $_POST['size_id'];
   
    $sql  = "SELECT barcode FROM `admin_products_stock` WHERE product_id=$product_id and quantity>0";
   
    $data = mysqli_query($db,$sql);
    
    if($data)
    {
      $num = mysqli_num_rows($data);
    }else{
      $num=0;
    }
    
    if($num>0)
    {

     $found_barcodes = array();
     for($barcode=0;$barcode<$num;$barcode++)
     {
        $row=mysqli_fetch_assoc($data);
        $found_barcodes[$barcode] = $row['barcode'];
     }
     
      $data = array(
                   'barcode_found'=>true,
                   'number_of_barcodes'=>$num,
                   'barcodes'=>$found_barcodes
                   );
     
    }else{
     
     $data = array(
                   'barcode_found'=>false,
                   'number_of_barcodes'=>0,
                   'barcodes'=>array()
                   );
     
     
    }
      
     echo json_encode($data); 
}

/**************************** fetch Availabel Quantity *******************/

if(isset($_POST['action']) && $_POST['action']=='getProductAvailQty')
{
   $sql = "select product_quantity from oc_product_avail_sizes where id =".(int)$_POST['size_id'];
   $data = mysqli_query($db,$sql);
   $row = mysqli_fetch_assoc($data);
   echo $row['product_quantity'];

}

/**************************** fetch Availabel Quantity *******************/

if(isset($_POST['action']) && $_POST['action']=='getProductAvailQtyByBarcode')
{
   $sql = "select quantity from admin_products_stock where barcode =".(int)$_POST['barcode'];
   $data = mysqli_query($db,$sql);
   $row = mysqli_fetch_assoc($data);
   echo $row['quantity'];

}

//Get Product details by Product Id
if(isset($_POST['action']) && $_POST['action']=='get-details')
{
    $product_id = $_POST['pid'];
    $sql  = 'select oc_product.price,oc_product_description.name from oc_product,oc_product_description WHERE oc_product.product_id=oc_product_description.product_id and oc_product.product_id='.$product_id;
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

//Get product details by UPC code
if(isset($_POST['action']) && $_POST['action']=='get-details-by-upc')
{
    $upc = $_POST['upc'];
    $sql  = 'select oc_product.product_id,oc_product.price,oc_product_description.name from oc_product,oc_product_description WHERE oc_product.product_id=oc_product_description.product_id and oc_product.upc='.$upc;
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



if(isset($_POST['action']) && $_POST['action']=='add-product')
{
    /*
        [pid] => 295
        [size_id] => 
        [qty] => 5
        [action] => add-product
        storeid
    */
    
    
  //Check if product is already in invoice table
  
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    
    $store_id = $_POST['storeid'];
    // $store_id = $_SESSION['store_id'];
    
    $sql = "select * from admin_store_invoice_temp where product_id=$pid and store_id=$store_id  and user_id=$user_id";

    $data = mysqli_query($db,$sql);
    
    $num = mysqli_num_rows($data);
    
    
   if($num>0)
   {
    
    ?>
    <div class="alert alert-danger">
      <p>Product already added.Please change quantity only.</p>
    </div>
    <?php
   }else{
        
     $sql  = "INSERT INTO `admin_store_invoice_temp`(`id`, `store_id`, `product_id`, `quantity`,`mrp`,`size_id`, `invoice_id`, `timestamp`,`user_id`)
     VALUES (NULL, \"$store_id\", \"$pid\", \"$qty\", \"$price\",\"$size_id\", \"0\", CURRENT_TIMESTAMP,\"".$_SESSION['admin_id']."\")";

      
       $res =mysqli_query($db,$sql);
       if($res)
       {
        ?>
            <div class="alert alert-success">
              <p>Product added.</p>
            </div>
            <?php
       }
   }
}

if(isset($_POST['action']) && $_POST['action']=='get-all-products')
{
   
   
    $sql  = 'SELECT admin_store_invoice_temp.barcode,admin_store_invoice_temp.size_id,admin_store_invoice_temp.quantity,admin_store_invoice_temp.mrp,
    admin_store_invoice_temp.product_id, oc_product_description.name,oc_product_avail_sizes.product_weight,
    oc_product_avail_sizes.product_weight_unit,oc_product_avail_sizes.product_price as price FROM
    `admin_store_invoice_temp`,oc_product_description,oc_product_avail_sizes where
    admin_store_invoice_temp.product_id = oc_product_description.product_id and
    oc_product_avail_sizes.id = admin_store_invoice_temp.size_id and
    admin_store_invoice_temp.user_id='.$user_id.' and
    admin_store_invoice_temp.store_id ='.$_POST['store_id'];
   
  
        $data = mysqli_query($db,$sql);
        
        $num = mysqli_num_rows($data);
        
        if($num>0)
        {
         
        
             $sub_total=0;
              for($i=1;$i<=$num;$i++)
              {
                $row = mysqli_fetch_assoc($data);
                extract($row);
                /*
                  id
                  store_id
                  product_id
                  quantity
                  name
                  price
                  amount
                  timestamp
                */
                ?>
                <tr>
                  <td><?=$barcode?></td>
                  <td><?=$name?></td>
                  <td>none</td>
                  <td><?=$mrp?></td>
                  <td><input type="text" class="qty" data-toggle="tooltip" onkeypress="return isNumber(event)" value="<?=$quantity?>" title="Click to change quantity " onfocus="this.select()"  onchange="updateQuantity(this,<?=$product_id?>,<?=$barcode?>,<?=$quantity?>);" style="max-width:50px;padding-left: 5px;"></td>
                  <td><span class="fa fa-inr"></span><?=$mrp*$quantity?>.00</td>
                  <td>
                    <button class="btn btn-sm btn-danger" onclick='removeProduct(<?=$product_id?>,<?=$barcode?>);'  title="Remove product" data-toggle="tooltip">
                    <span class="fa fa-trash" ></span>
                    </button>
                   
                  </td>
                </tr>
                
                <?php
                 $sub_total+=($mrp*$quantity);
              }
             ?>
            <tr>
             <th colspan="5" class="text-right">
                 <i>Total Amount:</i>
             </th>
             <td>
                 <span class="fa fa-inr"></span> <span id="ogramt"><?=$sub_total?></span>.00
             </td>
             
            </tr>
            <?php
        }
}


/*********************************** Update Qty ************************/
if(isset($_POST['action']) && $_POST['action']=='update-qty')
{
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    $store_id = $_POST['storeid'];
    $barcode = $_POST['barcode'];
    
    
    //Check if quantity are not greater thant stock quantity
    $sql = "SELECT quantity FROM `admin_products_stock` WHERE barcode=$barcode";
    
    $qty_data = mysqli_query($db,$sql);
    if($qty_data)
    {
      //Query executed
      if(mysqli_num_rows($qty_data)>0)
      {
        //
        $qty_row = mysqli_fetch_assoc($qty_data);
        
        if($qty<=$qty_row['quantity'])
        {
          
          $sql  = "update `admin_store_invoice_temp` SET quantity=$qty WHERE product_id=\"$pid\" and barcode=$barcode and user_id=$user_id and store_id=$store_id";
          $ret = mysqli_query($db,$sql) or die(mysqli_error($db));
           
           if($ret)
           {
             ?>
           <div class="alert alert-success">
             <p>Quantity successfully updated...</p>
           </div>
           <?php
           }else{
             ?>
           <div class="alert alert-danger">
             <p>Problem occured while updateing quantity.</p>
           </div>
           <?php
           }
        }else{
          //Quantity need to check
          if($qty_row['quantity']>0)
          {
            //Can add availble quantity
            
          $avaiable_quantity =$qty_row['quantity'];
          $sql  = "update `admin_store_invoice_temp` SET quantity=$avaiable_quantity WHERE product_id=\"$pid\" and barcode=$barcode and user_id=$user_id and store_id=$store_id";
          $ret = mysqli_query($db,$sql) or die(mysqli_error($db));
           
            ?>
           <div class="alert alert-warning">
            <span class="fa fa-info-square"></span>
             <p>Only <?=$avaiable_quantity?> quantity avaiable in stock and  added for DC. Need <?=$qty-$avaiable_quantity?> more quantity to satisfy store requirements.</p>
           </div>
           <?php
            
          }else{
            ?>
            <div class="alert alert-danger">
              Out of stock product. Please update stock by creating purchase entry first.
            </div>
            
            <?php
          }
          
          
        }
        
      }else{
        ?>
        <div class="alert alert-danger">
          Product is not available in DC.
        </div>
        <?php
      }
      
      
      
      
    }else{
      ?>
      <div class="alert alert-danger">
        Database error occured. Refresh page and try again.
      </div>
      <?php
    }
    
    
   
 
   
}
   
if(isset($_POST['action']) && $_POST['action']=='remove-product')
{
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    $store_id = $_POST['storeid'];
    $barcode = $_POST['barcode'];
    $user_id = $_SESSION['admin_id'];
    
    $sql  = "delete from  `admin_store_invoice_temp` WHERE product_id=\"$pid\"  and barcode=$barcode and user_id=$user_id";
    
    if(mysqli_query($db,$sql))
    {
      ?>
    <div class="alert alert-success">
      <p>Product successfully removed.</p>
    </div>
    <?php
    }else{
      ?>
    <div class="alert alert-danger">
      <p>Problem occured while removing product.</p>
    </div>
    <?php
    }

   
}




?>


