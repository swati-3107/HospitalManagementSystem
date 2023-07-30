<?php

 include('../config.php');
$pg_title = " contacts";
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
      <h1>contacts</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/contact/contacts">contacts</a></li>
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
          echo "Update contacts";
         }elseif(isset($_GET['delete']))
         {
          echo "Delete contacts";
         }else{
          echo "contacts List";
         }
         
         ?>
        </h3>
      </div>
      <div class="panel-body">
       <?php
       if(!isset($_GET['edit']) && !isset($_GET['delete']))
       {
       ?>
        <form method="post" enctype="multipart/form-data" target="_blank" id="form-order">
         <div class="col-lg-12 col-xs-12 table-responsive">
            <table class="table  table-bordered table-hover" id="dataTables-example" style="width:100%;">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center">
                    <input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" />
                  </td>
                  <td class="text-right text-info">Sr. No.</td>
                  <td class="text-left text-info">Name</td>
                  <td class="text-right text-info">Email </td>
                  <td class="text-right text-info">Phone </td>
                  <td class="text-right text-info">Subject </td>
                  <td class="text-right text-info">Message </td>
                  <td class="text-left text-info">Date Added</td>
                  <td class="text-right text-info">Action</td>
                </tr>
              </thead>
              <tbody>
               <?php
               $sql  = 'SELECT * FROM `contact`';
               $data = mysqli_query($db,$sql);
               $num = mysqli_num_rows($data);
               if($num>0)
               {
                 for($i=1;$i<=$num;$i++)
                 {
                  $row = mysqli_fetch_assoc($data);
//id	video_title	video_description	video_date	video_embed_code
                  ?>
                   <tr>
                       <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['id'];?>" />
                       <td class="text-right"><?php echo $i;?></td>
                       <td class="text-left"><?php echo $row['name'];?></td>
                       <td class="text-left"><?php echo $row['email'];?></td>
                       <td class="text-left"><?php echo $row['mobile'];?></td>
                       <td class="text-left"><?php echo $row['subject'];?></td>
                       <td class="text-left"><?php echo $row['text'];?></td>
                       <td class="text-left"><?php echo date("m-d-Y",strtotime($row['date_added']));?></td>
                       <td class="text-right">
                         <a href="<?php $base_path;?>admin/contact/contacts?delete&id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to Delete...?')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
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
        
        $sql = "select * from videos where id = $id";
        
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
                 //Array ( [videos_caption] => [videos_date_from] =>
                 //[videos_date_to] => [videos_description] =>
                 
                 $post = mysqli_escape_array($db,$_POST);
                 
                 //Image upload action
                 
                 //Array ( [videos_image] => Array ( [name] => Chrysanthemum.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\php75DC.tmp [error] => 0 [size] => 879394 ) )
               
                 
                 
                
                 
                 extract($post);
                 $sql  = "update `videos` set video_title=\"$video_title\",
                 video_description = \"$video_description\",video_embed_code=\"$video_embed_code\" where id=$id";
                     
                     $res = mysqli_query($db,$sql);
                     
                     if($res)
                     {
                       ?>
                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong>Success !</strong>  contacts Successfully updated.
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
               
                        
                        
                        
        </div> 
    
    
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="caption">contacts Title:</label>
    <div class="col-sm-10">
      <input type="hidden" name="id" value="<?=isset($id)?$id:""?>">
      <input type="text" class="form-control" name="video_title" id="video_title" placeholder="Enter contacts title" value="<?=isset($video_title)?"$video_title":''?>">
    </div>
  </div>
  
 <div class="form-group">
    <label class="control-label col-sm-2" for="video_description">Description:</label>
    <div class="col-sm-10"> 
      <textarea class="form-control" id="video_description " name="video_description" rows="6" placeholder="Short description about video"><?=isset($video_description)?$video_description:''?></textarea>
    </div>
  </div>

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="video_embed_code">contacts Embed Code:</label>
    <div class="col-sm-10"> 
      <textarea class="form-control" id="video_embed_code" name="video_embed_code" rows="6" placeholder="Copy Youtube embed code here"><?=isset($video_embed_code)?$video_embed_code:''?></textarea>
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
                        
                         $sql = "delete from contact where id = $id";
                          
                         $res = mysqli_query($db,$sql);
                          
                          
                           if($res)
                           {
                            
                             ?>
                               <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Success !</strong>  Message deleted.
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
  <script type="text/javascript">
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
  <script type="text/javascript">
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
<script type="text/javascript">
$('#description').summernote({height: 300});
//--></script>
</body></html>