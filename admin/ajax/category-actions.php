<?php
include("../config.php");
//get sub category

if(isset($_POST['action']))
{
    switch($_POST['action'])
    {
        case 'getSubCategory':
            
            
                       $sql_pt = "select * from product_categories where category_level=2 and parent_category_id=".$_POST['catid'] ; 
					  
					   $res_pt =$db->query($sql_pt) or die($db->error.__LINE__);
                        while($row_pt=$res_pt->fetch_assoc()){
					    extract($row_pt);
                        //id	category_name	category_level	has_parent	meta_tags	meta_description	child_category_name	title

					  ?>
					<option value="<?=$id?>" <?=isset($product_type) && $product_type==$id?"selected":''?>>
                    <?=$category_name?>
                    </option>
                    <?php
					}
        break;
    
        case 'filterCategoy':
          
            switch($_POST['catid'])
            {
                case 'all':
                 $sql  = 'SELECT * from product_categories order by parent_category_id asc';
   
                    break;
                case 'parent':
                 $sql  = 'SELECT * from product_categories WHERE category_level=1 order by sort asc';
   
                    break;
                default:
                $sql  = 'SELECT * from product_categories WHERE parent_category_id='.$_POST['catid'].' order by sort asc';
   
                    break;
                    
            }
            
           $data = mysqli_query($db,$sql);
           $num = mysqli_num_rows($data);
           ?>
            <table class="table  table-bordered table-hover" id="dataTables-example" style="width:100%;">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center">
                    <input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" />
                  </td>
                  <td class="text-right text-info">Categories ID</td>
                  <td class="text-left text-info">Categories Name</td>
                  <td class="text-right text-info">Parent Category name</td>
                     <td class="text-right text-info">Sort</td>
                  <td class="text-right text-info">Action</td>
                </tr>
              </thead>
              <tbody>
           
           
           
           <?php
            for($i=1;$i<=$num;$i++)
                 {
                  $row = mysqli_fetch_assoc($data);
                  ?>
                     <tr>
                       <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['id'];?>" />
                       <td class="text-right"><?php echo $row['id'];?></td>
                       <td class="text-left"><?php echo $row['category_name'];?></td>
                       
                       <td class="text-left">
                        <?php
                        //fetch Parent menu Name
                        
                        //$row['parent_category_id']==''?0:$row['parent_category_id'];
                        
                        if($row['parent_category_id']!=0)
                        {
                          $pnamedata = mysqli_query($db,"SELECT category_name as parent_category_name FROM `product_categories` where category_level=1 and id=".$row['parent_category_id']);
                          $prow = mysqli_fetch_assoc($pnamedata);
                          echo $prow['parent_category_name'];
                        }else{
                          ?>
                          None
                          <?php
                        }
                        
                        ?>
                       </td>
                       <td class="text-left">
                        <input type="text" class="sort" data-toggle="tooltip" onkeypress="return isNumber(event)" value="<?php echo $row['sort'];?>" title="Click to change sort order" onchange="updateSort('<?=$row['id']?>',this,'<?php echo $row['sort'];?>')" style="max-width:50px;padding-left: 5px;" autocomplete="off">
                      </td>
                       <td class="text-right">
                         <a href="<?php $base_path;?>admin/category/category-list?edit&id=<?php echo $row['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                         <a href="<?php $base_path;?>admin/category/check-category-before-delete?delete&id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to Delete...?')" data-toggle="tooltip" title="Delete" class="btn btn-danger">
                         <i class="fa fa-trash-o"></i></a>
                       </td>
                   </tr>
               <?php
                 }
            ?>     
                 
                </tbody>
            </table> 
                 
           <?php      
        break;
       
       case 'updateSortOrder':
       $catid = mysqli_real_escape_string($db,$_POST['catid']);
       $sort_value = mysqli_real_escape_string($db,$_POST['sort_value']);
      
      if(mysqli_query($db,"update product_categories set sort=$sort_value where id =$catid"))
      {
       echo 1;    
      }else{
      echo 0;
      }
        
        
       break;
    
    
    }
}


?>