<?php
include('../config.php');
$pg_title = " Menus";
include('../includes/head-js-css.php');
?>
<body>
<div id="container">
<?php include('../includes/header.php');
include('../includes/left-menu.php');
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
       <script>
        function deleteMenus()
        {
          var ret = confirm('Are you sure to delete');
          if(ret)
          {
           document.getElementById("form-menu").submit();
          }
        }
       </script>
       <button  type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete All" onclick="deleteMenus()">
        <i class="fa fa-trash"></i>
       </button>
        <a href="<?php echo $base_path;?>admin/menus/add-menu" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a></div>
      <h1>Menus</h1>
      <ul class="breadcrumb">
         <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
         <li><a href="<?php echo $base_path;?>admin/menus/menus">Menus</a></li>
       </ul>
    </div>
  </div>
  <div class="container-fluid">
     <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i>
         <?php
         if(isset($_GET['edit']))
         {
          echo "Update Menus";
         }elseif(isset($_GET['delete']))
         {
          echo "Delete Menus";
         }else{
          echo "Menus List";
         }
         
         ?>
        </h3>
      </div>
      <div class="panel-body">
       <?php
       if(isset($_POST['table']))
       {
        
        $count = count($_POST['selected']);
        $table = $_POST['table'];
     
         
        for($i=0;$i<$count;$i++)
        {
         $sql = "delete from $table where id=".$_POST['selected'][$i];
         
         $res = mysqli_query($db,$sql);
         
        }
       }
       
       
       
       ?>
       
       
       
       
       
       
       
       
       
       
       
       
       
       
                               <?php        
                // form action
                
                if(isset($_POST['edit']))
                {
                 //Array ( [menus_caption] => [menus_date_from] =>
                 //[menus_date_to] => [menus_description] =>
                 
                 $post = mysqli_escape_array($db,$_POST);
                
                 //Image upload action
                 
                 //Array ( [menus_image] => Array ( [name] => Chrysanthemum.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\php75DC.tmp [error] => 0 [size] => 879394 ) )
                 
                 extract($post);
                 
                  if($menu_level==1)
                 {
                  $has_parent="none";
                  $child_menu_name="none";
                 }elseif($menu_level==2)
                 {
                  $child_menu_name = $parent_menu;
                  $has_parent = $child_menu_name;
                  
                 }elseif($menu_level==3)
                 {
                  $child_menu_name = $child_menu;
                  $has_parent = $child_menu_name;
                 }
                 
                  $sql  = "
                 update `menus` set
                 menu_name=\"$menu_name\",
                 menu_link=\"$menu_link\",
                 menu_level=\"$menu_level\",
                 has_parent=\"$has_parent\",
                 meta_tags=\"$meta_tags\",
                 meta_description=\"$meta_description\",
                 child_menu_name=\"$child_menu_name\",
                 title=\"$title\"
                 where id=$id
                 ";
   
                     $res = mysqli_query($db,$sql);
                     
                     if($res)
                     {
                       ?>
                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong>Success !</strong>Menus Successfully updated.
                         </div>
                       <?php
                     }else{

                       ?>
                       <div class="alert alert-danger">
                           Something went wrong please try again.
                       </div>
                       <?php
                     }
                 
                }
                       
               ?>
       
       
       
       
       
       
       
       <?php
       if(!isset($_GET['edit']) && !isset($_GET['delete']))
       {
       ?>
        <form method="post" enctype="multipart/form-data" id="form-menu">
         
         <input type="hidden" name="table" value="menus">
        
          
        
        
         <div class="col-lg-12 col-xs-12 table-responsive">
            <table class="table  table-bordered table-hover" id="dataTables-example" style="width:100%;">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center">
                    <input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" />
                  </td>
                  <td class="text-right text-info">Menus ID</td>
                  <td class="text-left text-info">Menus Name</td>
                  <td class="text-right text-info">Menus Link </td>
                  <td class="text-left text-info">Menu Level</td>
                  <td class="text-left text-info">Page title</td>
                  <td class="text-right text-info">Meta tags</td>
                  <td class="text-right text-info">Meta description</td>
                  <td class="text-right text-info">Parent menu name</td>
                  <td class="text-right text-info">Action</td>
                </tr>
              </thead>
              <tbody>
               <?php
               $sql  = 'SELECT * FROM `menus`';
               $data = mysqli_query($db,$sql);
               $num = mysqli_num_rows($data);
               if($num>0)
               {
                 for($i=1;$i<=$num;$i++)
                 {
                  $row = mysqli_fetch_assoc($data);
                  ?>
                   <tr>
                       <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['id'];?>" />
                       <td class="text-right"><?php echo $row['id'];?></td>
                       <td class="text-left"><?php echo $row['menu_name'];?></td>
                       <td class="text-left"><?php echo $row['menu_link'];?></td>
                       <td class="text-left"><?php echo $row['menu_level'];?></td>
                       <td class="text-left"><?php echo $row['title'];?></td>
                       <td class="text-left"><?php echo $row['meta_tags'];?></td>
                       <td class="text-left"><?php echo $row['meta_description'];?></td>
                       <td class="text-left">
                       
                
                       
                       <?php
                        $sql = "select menu_name from menus where id=\"".$row['child_menu_name']."\"";
                       
                       $d = mysqli_query($db,$sql);
                       
                       $n = mysqli_num_rows($d);
                       
                       if($n>0)
                       {
                        $parentmenu = mysqli_fetch_assoc($d);
                        echo $parentmenu['menu_name']==''?'none':$parentmenu['menu_name'];
                       }else{
                         echo 'none';
                       }
                       
                       
                      
  
                       ?>
                       
                       
                       </td>
                       <td class="text-right">
                         <a href="<?php $base_path;?>admin/menus/menus?edit&id=<?php echo $row['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                         <a href="<?php $base_path;?>admin/menus/menus?delete&id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to Delete...?')" data-toggle="tooltip" title="Delete" class="btn btn-danger">
                         <i class="fa fa-trash-o"></i></a>
                       </td>
                   </tr>
               <?php
                 }
               }else{
                
               }
               
               
               ?>
             
                
                
                </tbody>
            </table>
          </div>
        </form>
        

       <?php
       }elseif(isset($_GET['edit']))
       {
//Edit form action statrs from here
       
        $id = isset($_GET['id'])?$_GET['id']:0;
        
        $sql = "select * from menus where id = $id";
        
        $data = mysqli_query($db,$sql);
        
        $num = mysqli_num_rows($data);
        
        if($num>0)
        {
         $row = mysqli_fetch_assoc($data);
         extract($row);
         
         $old_meta_tags = $meta_tags;
         $old_meta_description = $meta_description;
        }
        

        ?>
   <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    
     <input type="hidden" name="id" value="<?=$id?>">
        <div class="col-md-10 col-md-offset-2" style="padding: 0px;">
         
        
               
                        
                        
                        
        </div> 
    
    
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="menu_name">Menu Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="Enter Menu Name" value="<?=$menu_name?>">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="menu_link">Menu Link:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="menu_link" id="menu_link" placeholder="Enter Menu URL" value="<?=$menu_link?>" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="menu_level">Menu Type:</label>
    <div class="col-sm-10">
       <label class="radio-inline"><input type="radio" name="menu_level" checked id="menu_level" value="1" onchange="hideData(this);" <?=$menu_level==1?'checked':''?>>Parent Menu</label>
       <label class="radio-inline"><input type="radio" name="menu_level" value="2" onchange="hideData(this);" <?=$menu_level==2?'checked':''?>>Child Menu</label>
       <label class="radio-inline"><input type="radio" name="menu_level" value="3" onchange="hideData(this);" <?=$menu_level==3?'checked':''?>>Grand Child Menu</label>
    </div>
  </div>
  
  <div class="form-group" id="parent" <?php if($menu_level==1 || $menu_level==3){ echo 'style="display: none"';}?>>
    <label class="control-label col-sm-2">Choose Parent Menu</label>
    <div class="col-sm-10">
       <select name="parent_menu" class="form-control">
           <?php
            $sql  = "SELECT * FROM `menus` WHERE `menu_level`=1";
            
            $data = mysqli_query($db,$sql);
            
            $num = mysqli_num_rows($data);
            
            if($num>0)
            {
             for($i=1;$i<=$num;$i++)
             {
              $row = mysqli_fetch_assoc($data);
              //print_r($row);
              extract($row);
              
              if($child_menu_name==$id)
              {
              echo "<option value='$id' selected>$menu_name</option>";
              }else{
              echo "<option value='$id'>$menu_name</option>";
              }
              
              
             }
            }

           
           ?>
       </select>
    </div>
  </div> 
  
  <div class="form-group" id="child"  <?php if($menu_level==1 || $menu_level==2){ echo 'style="display: none"';}?>>
    <label class="control-label col-sm-2">Choose Parent Menu</label>
    <div class="col-sm-10">
       <select name="child_menu" class="form-control">
           <?php
           $sql  = "SELECT * FROM `menus` WHERE `menu_level`=2";
            
            $data = mysqli_query($db,$sql);
            
            $num = mysqli_num_rows($data);
            
            if($num>0)
            {
             for($i=1;$i<=$num;$i++)
             {
              //print_r($row);
              $row = mysqli_fetch_assoc($data);
              extract($row);
              if($has_parent==$menu_name)
              {
               echo "<option selected>$menu_name</option>";
              }else{
               echo "<option>$menu_name</option>";
              }
             }
            }

           
           ?>

       </select>
    </div>
  </div> 
    
   <div class="form-group">
    <label class="control-label col-sm-2" for="title">Page title:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="title" placeholder="Page title" value="<?=$title?>">
    </div>
  </div>  
  
    
   <div class="form-group">
    <label class="control-label col-sm-2" for="meta_tags">Meta Tags:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="meta_tags" id="meta_tags" placeholder="Meta Tags" value="<?=$old_meta_tags?>">
    </div>
  </div>
  
  
    <div class="form-group">
    <label class="control-label col-sm-2" for="meta_description">Description:</label>
    <div class="col-sm-10"> 
      <textarea class="form-control" id="meta_description" name="meta_description" rows="6" placeholder="Meta Description"><?=$old_meta_description?></textarea>
    </div>
  </div>

  
  <div class="form-group">
    <div class="control-label col-sm-2"></div>
    <div class="col-sm-10">
     <button type="submit" class="btn btn-primary" name="edit">Update</button>
    </div>
  </div>
  
</form>       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
 
        
        
        
        
        
        
        
        
        
        
        <?php
 //Edit form action ends here
       }elseif(isset($_GET['delete']))
       {
                        $id = isset($_GET['id'])?$_GET['id']:0;
                        
                         $sql = "delete from menus where id = $id";
                          
                         $res = mysqli_query($db,$sql);
                          
                          
                           if($res)
                           {
                            
                             ?>
                               <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Success !</strong>  Menus  Successfully removed from website.
                               </div>
                             
                             <?php
                             }else{
                              ?>
                               <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Warning !</strong>  Something went wrong.
                               </div>
                             <?php
                             }
                           
                         
                          
                         }
       ?>
      </div>
    </div>
  </div>
  <script src="<?php echo $base_path;?>admin/view/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo $base_path;?>admin/view/datatables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript"><!--
  $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
                aaSorting: []
        });
    });

$('#button-filter').on('click', function() {
	url = 'index?route=sale/order&token=281529591044070afa4f37ec0ceca0b0';
	
	var filter_order_id = $('input[name=\'filter_order_id\']').val();
	
	if (filter_order_id) {
		url += '&filter_order_id=' + encodeURIComponent(filter_order_id);
	}
	
	var filter_customer = $('input[name=\'filter_customer\']').val();
	
	if (filter_customer) {
		url += '&filter_customer=' + encodeURIComponent(filter_customer);
	}
	
	var filter_order_status = $('select[name=\'filter_order_status\']').val();
	
	if (filter_order_status != '*') {
		url += '&filter_order_status=' + encodeURIComponent(filter_order_status);
	}	

	var filter_total = $('input[name=\'filter_total\']').val();

	if (filter_total) {
		url += '&filter_total=' + encodeURIComponent(filter_total);
	}	
	
	var filter_date_added = $('input[name=\'filter_date_added\']').val();
	
	if (filter_date_added) {
		url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
	}
	
	var filter_date_modified = $('input[name=\'filter_date_modified\']').val();
	
	if (filter_date_modified) {
		url += '&filter_date_modified=' + encodeURIComponent(filter_date_modified);
	}
				
	location = url;
});
//-->
  </script> 
  <script type="text/javascript"><!--
$('input[name=\'filter_customer\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index?route=sale/customer/autocomplete&token=281529591044070afa4f37ec0ceca0b0&filter_name=' +  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['customer_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'filter_customer\']').val(item['label']);
	}	
});
//--></script> 
<script type="text/javascript">
<!--
$('input[name^=\'selected\']').on('change', function() {
	$('#button-shipping, #button-invoice').prop('disabled', true);
	
	var selected = $('input[name^=\'selected\']:checked');
	
	if (selected.length) {
		$('#button-invoice').prop('disabled', false);
	}
	
	for (i = 0; i < selected.length; i++) {
		if ($(selected[i]).parent().find('input[name^=\'shipping_code\']').val()) {
			$('#button-shipping').prop('disabled', false);
			
			break;
		}
	}
});

$('input[name^=\'selected\']:first').trigger('change');

$('a[id^=\'button-delete\']').on('click', function(e) {
	e.preventDefault();
	
	if (confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?')) {
		location = $(this).attr('href');
	}
});
//-->
 </script> 
  <script src="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <link href="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
  <script type="text/javascript">
$('.date').datetimepicker({
	pickTime: false
});
</script></div>
<?php include('../includes/footer.php');?>
<script type="text/javascript"><!--
$('#description').summernote({height: 300});
//--></script>
<script>
 function hideData(radio)
 {
  if(radio.value=="1")
  {
   document.getElementById("parent").style.display = "none";
   document.getElementById("child").style.display = "none";
  }else if(radio.value=="2")
  {
   document.getElementById("parent").style.display = "block";
   document.getElementById("child").style.display = "none";
  }else
  {
   document.getElementById("parent").style.display = "none";
   document.getElementById("child").style.display = "block";
  }
 }
</script>
  

</body></html>