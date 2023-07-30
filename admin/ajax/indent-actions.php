<?php
include('../config.php');
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
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    
    $store_id = $_POST['storeid'];
    
    $sql  = "SELECT * FROM purchase_indent_products_temp WHERE product_id=$pid and user_id=".$_SESSION['admin_id'];
    // $sql  = "SELECT * FROM purchase_indent_products_temp WHERE product_id=$pid and size_id=$size_id and user_id=".$_SESSION['admin_id'];
    
    $data = mysqli_query($db,$sql);
    $num = mysqli_num_rows($data);
    
   if($num>0)
   {
    
    ?>
    <div class="alert alert-danger">
      <p>Product already added.Please change quantity or other details only.</p>
    </div>
    <?php
   }else{
        
        $user_id = $_SESSION['admin_id'];

$sql  = "INSERT INTO `purchase_indent_products_temp`
( `user_id`, `product_id`, `size_id`, `quantity`, `purchase_price`, `expiry_date`)
VALUES ( \"$user_id\", \"$pid\", \"$size_id\", \"$qty\", \"\", \"\")";

      
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
   

         $sql  = 'SELECT purchase_indent_products_temp.size_id,purchase_indent_products_temp.quantity,purchase_indent_products_temp.mrp,
         purchase_indent_products_temp.product_id, purchase_indent_products_temp.expiry_date,
         oc_product_description.name,oc_product_avail_sizes.product_weight,
         oc_product.gst_rate,
        
         oc_product_avail_sizes.product_weight_unit, purchase_indent_products_temp.purchase_price FROM `purchase_indent_products_temp`, oc_product_description, oc_product_avail_sizes, oc_product where purchase_indent_products_temp.product_id = oc_product.product_id and purchase_indent_products_temp.product_id = oc_product_description.product_id and oc_product_avail_sizes.id = purchase_indent_products_temp.size_id and purchase_indent_products_temp.user_id ='.$_SESSION['admin_id']." order by purchase_indent_products_temp.id desc";

        $data = mysqli_query($db,$sql);
        
        $num = mysqli_num_rows($data);
        
        if($num>0)
        {
             $sub_total=0;
              // for($i=$num;$i>=1;$i--)
              for($i=1;$i<=$num;$i++)
              {
                $row = mysqli_fetch_assoc($data);
                extract($row);
                /*
            size_id
             quantity
             product_id
             expiry_date
             name
             product_weight
             product_weight_unit
             product_price	
                */
                ?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$product_id?></td>
                  <td><?=$name?></td>
                  <td> none </td>
                  <td>
                  <select name="gst_rate" id="gst-rate" onchange="updateGstRate(this,<?=$product_id?>);">
                      <option>Choose</option>
                      <option value="5" <?php if($gst_rate==5){?> selected="selected" <?php }?>>5%</option>
                      <option value="12" <?php if($gst_rate==12){?> selected="selected" <?php }?>>12%</option>
                      <option value="18" <?php if($gst_rate==18){?> selected="selected" <?php }?>>18%</option>
                      <option value="28" <?php if($gst_rate==28){?> selected="selected" <?php }?>>28%</option>
                      <!-- <option value="5"> 5%   </option>
                      <option value="12"> 12%  </option> -->
                    </select>

                    <!-- <input type="text" class="qty" data-toggle="tooltip" onkeypress="return isNumber(event)" value="<?=$gst_rate?>" title="Click to change GST Rate "  onchange="updateGstRate(this,<?=$product_id?>);" style="max-width:50px;padding-left: 5px;"> -->
                  
                  </td>
                 
                
                  <!-- <td><input type="date" onfocusout="updateExpityDate(this.value,<?=$product_id?>,<?=$size_id?>)" class="form-control form-control-sm" style="width: 140px" value="<?=$expiry_date?>"></td> -->
                  <!-- <td><?=$mrp?></td> -->
                  <td><input type="text" class="qty" data-toggle="tooltip" onkeypress="return isNumber(event)" value="<?=$mrp?>" title="Click to change mrp "  onchange="updateMrpPrice(this,<?=$product_id?>,<?=$size_id?>);" style="max-width:50px;padding-left: 5px;"></td>
                  <!-- mrp added in dabase new filed by kartik 21-6-22 -->
                  <td><input type="text" class="qty" data-toggle="tooltip" onkeypress="return isNumber(event)" value="<?=$purchase_price?>" title="Click to change Purchase Price "  onchange="updatePurchasePrice(this,<?=$product_id?>,<?=$size_id?>);" style="max-width:50px;padding-left: 5px;"></td>
                  
                  <td><input type="text" class="qty" data-toggle="tooltip" onkeypress="return isNumber(event)" value="<?=$quantity?>" title="Click to change quantity "  onchange="updateQuantity(this,<?=$product_id?>,<?=$size_id?>);" style="max-width:50px;padding-left: 5px;"></td>
                  <td><span class="fa fa-inr"></span><?=$purchase_price*$quantity?></td>
                  <td>
                    <script>
                      var parts = location.pathname.split('/');
                      console.log();("fsfssdffadddddddddddddddddd")
                      var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash
                      if ( (lastSegment=='purchase-indent.php') || (lastSegment=='purchase-indent' )) {
                        var createPurchase = true;
                      
                      }
                      else{
                        alert("fsfssdff")
                        var createPurchase = false;
                       
                      }
                    </script>
                    <button class="btn btn-sm btn-danger" onclick='createPurchase?removeProduct(<?=$product_id?>,<?=$size_id?>):editRemoveProduct(<?=$quantity?>,<?=$product_id?>,<?=$size_id?>);  '  title="Remove product" data-toggle="tooltip">
                    <span class="fa fa-trash" ></span>
                    </button>
                  </td>
                </tr>
                
                <?php
                 $sub_total+=($purchase_price*$quantity);
              }
             ?>
            <tr>
             <th colspan="7" class="text-right">
                 <i>Total Amount:</i>
             </th>
             <td>
                 <span class="fa fa-inr"></span> <?=$sub_total?>
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
    $user_id = $_SESSION['admin_id'];
    $size_id = $_POST['size_id'];
    
   $sql  = "update `purchase_indent_products_temp` SET quantity=$qty WHERE product_id=\"$pid\" and user_id=$user_id and size_id=$size_id";

    
    if(mysqli_query($db,$sql) )
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

   
   
}
/*********************************** Update Qty for edit form ************************/
if(isset($_POST['action']) && $_POST['action']=='update-qty')
{
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    $user_id = $_SESSION['admin_id'];
    $size_id = $_POST['size_id'];
    
   $sql  = "update `purchase_indent_products_temp` SET quantity=$qty WHERE product_id=\"$pid\" and user_id=$user_id and size_id=$size_id";
   $admin_stock_sql  = "update `admin_products_stock` SET quantity=quantity+$qty WHERE product_id=\"$pid\" and user_id=$user_id";

    
    if(mysqli_query($db,$sql) and mysqli_query($db,$sql) )
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

   
   
}
 
/*********************************** Update mrp price ************************/
if(isset($_POST['action']) && $_POST['action']=='update-mrpprice')
{
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    
    $sql  = "update `purchase_indent_products_temp` SET mrp=$mrpprice WHERE product_id=\"$pid\" and user_id=".$_SESSION['admin_id']." and size_id=$size_id";
    
    if(mysqli_query($db,$sql))
    {
      ?>
    <div class="alert alert-success">
      <p>Mrp successfully updated.</p>
    </div>
    <?php
    }else{
      ?>
    <div class="alert alert-danger">
      <p>Problem occured while updating Purchase price.</p>
    </div>
    <?php
    }

   
   
}
 
/*********************************** Update Purchase price ************************/
if(isset($_POST['action']) && $_POST['action']=='update-purchaseprice')
{
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    $sql  = "select gst_rate from oc_product where product_id=\"$pid\"";
    $data = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($data);
    $cal_gst = $purchaseprice * $row['gst_rate']/100;
    $purchase_price_with_gst = $purchaseprice + $cal_gst;
    $purchase_price_with_gst = round($purchase_price_with_gst,2);
    
    $sql  = "update `purchase_indent_products_temp` SET purchase_price=$purchase_price_with_gst WHERE product_id=\"$pid\" and user_id=".$_SESSION['admin_id']." and size_id=$size_id";
    
    if(mysqli_query($db,$sql))
    {
      ?>
    <div class="alert alert-success">
      <p>Purchase price successfully updated.</p>
    </div>
    <?php
    }else{
      ?>
    <div class="alert alert-danger">
      <p>Problem occured while updating Purchase price.</p>
    </div>
    <?php
    }

   
   
}

 
/*********************************** Update gstRate price ************************/
if(isset($_POST['action']) && $_POST['action']=='update-gstrate')
{
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    
    $sql  = "update `oc_product` SET gst_rate=$gstrate WHERE product_id=\"$pid\"";
    
    if(mysqli_query($db,$sql))
    {
      ?>
    <div class="alert alert-success">
      <p>Gst Updated successfully</p>
    </div>
    <?php
    }else{
      ?>
    <div class="alert alert-danger">
      <p>Problem occured while updating Purchase price.</p>
    </div>
    <?php
    }

   
   
}


/*********************************** Update Purchase price ************************/
if(isset($_POST['action']) && $_POST['action']=='update-expirydate')
{
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    
     $sql  = "update `purchase_indent_products_temp` SET expiry_date=\"$expirydate\" WHERE product_id=\"$pid\" and user_id=".$_SESSION['admin_id']." and size_id=$size_id";
    
    if(mysqli_query($db,$sql))
    {
      ?>
    <div class="alert alert-success">
      <p>Expiry date successfully updated.</p>
    </div>
    <?php
    }else{
      ?>
    <div class="alert alert-danger">
      <p>Problem occured while updating Expiry date.</p>
    </div>
    <?php
    }

   
   
}  





if(isset($_POST['action']) && $_POST['action']=='remove-product')
{
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    $size_id = $_POST['size_id'];
    
    $sql  = "delete from  `purchase_indent_products_temp` WHERE product_id=\"$pid\"  and user_id=".$_SESSION['admin_id']." and size_id=$size_id";
    
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


if(isset($_POST['action']) && $_POST['action']=='edit-remove-product')
{
    $post = mysqli_escape_array($db,$_POST);
    extract($post);
    $size_id = $_POST['size_id'];
    $qty = $_POST['qty'];
    
    $sql  = "delete from  `purchase_indent_products_temp` WHERE product_id=\"$pid\"  and user_id=".$_SESSION['admin_id']." and size_id=$size_id";
   $admin_stock_sql  = "update `admin_products_stock` SET quantity=quantity-$qty WHERE product_id=$pid";
    
    
    if(mysqli_query($db,$sql) and mysqli_query($db,$admin_stock_sql))
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


