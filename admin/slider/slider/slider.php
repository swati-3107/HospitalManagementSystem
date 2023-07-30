<?php
session_start();
 include('../config.php');
$pg_title = "Homepage Slider";
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
           document.getElementById("form-slider").submit();
          }
        }
       </script>
       
         <button  type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete All" onclick="deleteMenus()">
        <i class="fa fa-trash"></i>
       </button>
       
       
       
        <a href="<?php echo $base_path;?>admin/slider/add-new-slider" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a></div>
      <h1>Slider</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/slider/slider">Slider</a></li>
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
          echo "Update Slider";
         }elseif(isset($_GET['delete']))
         {
          echo "Delete Slider";
         }else{
          echo "Slider List";
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
        $file_col_name = $_POST['file_col_name'];
        $path = $_POST['path'];
         
        for($i=0;$i<$count;$i++)
        {
         $id = $_POST['selected'][$i];
         $sql = "select $file_col_name from $table where id=$id ";
         $data = mysqli_query($db,$sql);
         
         
         $file = mysqli_fetch_assoc($data);
         
         $file = $file[$file_col_name];
         
         if(file_exists($path.$file))
         {
           unlink($path.$file);
         }
         
         $sql = "delete from $table where id=".$id;
         $res = mysqli_query($db,$sql);
         
        }
       }
       
       
       
       ?>     
       
       
       
       
       
       
       
       
       <?php
       if(!isset($_GET['edit']) && !isset($_GET['delete']))
       {
       ?>
        <form method="post" enctype="multipart/form-data" id="form-slider">
         <input type="hidden" name="table" value="index_slider">
         <input type="hidden" name="path" value="../../slider_images/">
         <input type="hidden" name="file_col_name" value="slider_image">
         
         
         <div class="col-lg-12 col-xs-12 table-responsive">
            <table class="table  table-bordered table-hover" id="dataTables-example" style="width:100%;">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center">
                    <input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" />
                  </td>
                  <td class="text-right text-info">Slider ID</td>
                  <td class="text-left text-info">Slider Caption</td>
                  <td class="text-left text-info">Date From</td>
                  <td class="text-left text-info">Date To</td>
                  <td class="text-right text-info">Slider Image </td>
                  <td class="text-left text-info">Date Added</td>
                  <td class="text-right text-info">Action</td>
                </tr>
              </thead>
              <tbody>
               <?php
               $sql  = 'SELECT * FROM `index_slider`';
               $data = mysqli_query($db,$sql);
               $num = mysqli_num_rows($data);
               if($num>0)
               {
                 for($i=1;$i<=$num;$i++)
                 {
                  $row = mysqli_fetch_assoc($data);
                  //`id`, `slider_caption`, `slider_date_from`, `slider_date_to`, `slider_description`, `slider_image`, `slider_date_added`
                  ?>
                   <tr>
                       <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['id'];?>" />
                       <td class="text-right"><?php echo $row['id'];?></td>
                       <td class="text-left"><?php echo $row['slider_caption'];?></td>
                       <td class="text-left"><?php echo date('d-m-Y',strtotime($row['slider_date_from']));?></td>
                       <td class="text-left"><?php echo date('d-m-Y',strtotime($row['slider_date_to']));?></td>
                       <td class="text-left"><img height="40px" src="<?php $base_path;?>slider_images/<?php echo $row['slider_image'];?>" target="_blank"></td>
                       <td class="text-left"><?php echo date("m-d-Y",strtotime($row['date_added']));?></td>
                       <td class="text-right">
                         <a href="<?php $base_path;?>admin/slider/slider.php?edit&id=<?php echo $row['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                         <a href="<?php $base_path;?>admin/slider/slider.php?delete&id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to Delete...?')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
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
        
        $sql = "select * from index_slider where id = $id";
        
        $data = mysqli_query($db,$sql);
        
        $num = mysqli_num_rows($data);
        
        if($num>0)
        {
         $row = mysqli_fetch_assoc($data);
         extract($row);
        }
        

        ?>
   <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    
    
        <div class="col-md-10 col-md-offset-2" style="padding: 0px;">
         
                        <?php        
                // form action
                
                if(isset($_POST['edit']))
                {
                 //Array ( [slider_caption] => [slider_date_from] =>
                 //[slider_date_to] => [slider_description] =>
                 
                 $post = mysqli_escape_array($db,$_POST);
                 
                 //Image upload action
                 
                 //Array ( [slider_image] => Array ( [name] => Chrysanthemum.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\php75DC.tmp [error] => 0 [size] => 879394 ) )
               
                 
                 
                 $name = $_FILES['slider_image']['name'];
                 
                 $slider_image= time().substr($name,strlen($name)-4,4);
                 
                 $path = "../../slider_images/".$slider_image;
                 $old_path = $_FILES['slider_image']['tmp_name'];
                 
                 extract($post);
                 $sql  = "update `index_slider` set slider_caption=\"$slider_caption\", slider_date_from = \"$slider_date_from\",slider_date_to=\"$slider_date_to\" where id=$id";
                     
                     
                     
                     
                     
                     $res = mysqli_query($db,$sql);
                     
                     if($res)
                     {
                       ?>
                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong>Success !</strong>  Slider Successfully updated.
                         </div>
                       <?php
                       //Take decion about replacing image
                       
                       //Array ( [slider_image] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) )
                       //print_r($_FILES);
                       
                       if(!empty($_FILES['slider_image']['name']))
                       {
                        //replace image
                        
                        $id = isset($_GET['id'])?$_GET['id']:0;
                        
                        $sql = "select slider_image from index_slider where id = $id";
                        
                        $data = mysqli_query($db,$sql);
                        
                        $num = mysqli_num_rows($data);
                        
                        if($num>0)
                        {
                         $row = mysqli_fetch_assoc($data);
                         $slider_image = $row['slider_image'];
                         $path = "../../slider_images/".$slider_image;
                         if(unlink($path))
                         {
                           $name = $_FILES['slider_image']['name'];
                 
                          $slider_image= time().substr($name,strlen($name)-4,4);
                          
                          $path = "../../slider_images/".$slider_image;
                          $old_path = $_FILES['slider_image']['tmp_name'];
                          
                            if(move_uploaded_file($old_path,$path))
                            {
                                   
                              $sql = "update index_slider set slider_image = \"$slider_image\" where id=$id";
                              
                              if(mysqli_query($db,$sql))
                              {
                               ?>
                              <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Success !</strong>  Image Successfully replaced..
                              </div>
                            <?php
                              }
                              
                            }
                          
                          
                         }
                         
                         
                         
                        }
                        
                                        
                                        
                        
                       }else{
                        //keep as it
                       }
                       
                       
                       
                       
                       
                       
                     }else{

                       ?>
                       <div class="alert alert-danger">
                           Something went wrong please try again.
                       </div>
                       <?php
                     }
                     
                 
                
                 
                 
                 
                }
                
                
                
                       
               ?>        
               
                        
                        
                        
        </div> 
    
    
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="caption">Slider Caption:</label>
    <div class="col-sm-10">
     <input type="hidden" name="id" value="<?=isset($id)?$id:""?>">
      <input type="text" class="form-control" name="slider_caption" value ="<?=isset($slider_caption)?$slider_caption:""?>" id="caption" placeholder="Enter offer caption" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="from">Slider date from:</label>
    <div class="col-sm-10"> 
      <input type="date" class="form-control" id="from" name="slider_date_from" value ="<?=isset($slider_date_from)?$slider_date_from:""?>"> 
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="to">Slider date to:</label>
    <div class="col-sm-10"> 
      <input type="date" class="form-control" id="to" name="slider_date_to" value ="<?=isset($slider_date_to)?$slider_date_to:""?>"> 
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="image">Upload Image:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="image" name="slider_image">
      <small>Uploading new image will replace <a href="<?php $base_path;?>slider_images/<?=isset($slider_image)?$slider_image:""?>" target="_blank"><?=isset($slider_image)?$slider_image:""?>.</a>If you dont want to replace image  then leave   it blank</small>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="edit">
        <span class="fa fa-pencil"></span>
        Update</button>
      
    </div>
  </div>
</form>       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
 
        
        
        
        
        
        
        
        
        
        
        <?php
 //Edit form action ends here
       }elseif(isset($_GET['delete']))
       {
                        $id = isset($_GET['id'])?$_GET['id']:0;
                        
                        $sql = "select slider_image from index_slider where id = $id";
                        
                        $data = mysqli_query($db,$sql);
                        
                        $num = mysqli_num_rows($data);
                        
                        if($num>0)
                        {
                         $row = mysqli_fetch_assoc($data);
                         $slider_image = $row['slider_image'];
                         $path = "../../slider_images/".$slider_image;
                         
                         $sql = "delete from index_slider where id = $id";
                          
                         $res = mysqli_query($db,$sql);
                          
                          
                           if($res)
                           {
                            if(unlink($path))
                            {
                            
                             ?>
                               <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Success !</strong>  Slider and Image Successfully removed from website.
                               </div>
                             
                             <?php
                             }else{
                              ?>
                               <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Success !</strong>  Slider Successfully removed from website.
                               </div>
                             
                             <?php
                             }
                           }else{
                            ?>
                               <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Warning !</strong>  Cant delete offer.Please try again.
                               </div>
                             
                             <?php
                           }
                         
                          
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
</body></html>