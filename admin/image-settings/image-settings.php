<?php
include('../config.php');
$pg_title = " Website Image Settings";
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
      <div class="pull-left">
      <h1>Website Image Settings</h1>
      <ul class="breadcrumb">
        <li><a href="<?=$base_path;?>admin/access">Home</a></li>
        <li><a href="<?=$base_path;?>admin/image-settings/image-settings">Website Image Settings</a></li>
      </ul>
    </div>
      <div class="pull-right">
       <script>
        function deleteAll()
        {
          var ret = confirm('Are you sure to delete');
          if(ret)
          {
           document.getElementById("form-image_config").submit();
          }
        }
       </script>
       <a href="<?=$base_path?>admin/image-settings/add-new-section.php"  class="btn btn-primary" data-toggle="tooltip" title="Add New Section">
        <i class="fa fa-plus"></i>
       </a>
       <button  type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete All" onclick="deleteAll()">
        <i class="fa fa-trash"></i>
       </button>
      </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i>
         <?php
         if(isset($_GET['edit']))
         {
          echo "Update Website Image Settings";
         }elseif(isset($_GET['delete']))
         {
          echo "Delete Website Image Settings";
         }else{
          echo "Website Image Settings List";
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
       if(!isset($_GET['edit']) && !isset($_GET['delete']))
       {
       ?>
        <form method="post" enctype="multipart/form-data" id="form-image_config">
                  
            <input type="hidden" name="table" value="image_config">

         
         
         
         
         <div class="col-lg-12 col-xs-12 table-responsive">
            <table class="table  table-bordered table-hover" id="dataTables-example" style="width:100%;">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center">
                    <input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" />
                  </td>
                  <td class="text-right text-info">Sr. No.</td>
                  <td class="text-left text-info">Section</td>
                  <td class="text-right text-info">Width </td>
                  <td class="text-right text-info">Height </td>
                  <td class="text-right text-info">Action</td>
                </tr>
              </thead>
              <tbody>
               <?php
               $sql  = 'SELECT * FROM `image_config`';
               $data = mysqli_query($db,$sql);
               $num = mysqli_num_rows($data);
               if($num>0)
               {
                 for($i=1;$i<=$num;$i++)
                 {
                  $row = mysqli_fetch_assoc($data);
                  extract($row);
                    /*
                    id
                    section
                    width
                    height
                    */
                  ?>
                   <tr>
                       <td class="text-center"><input type="checkbox" name="selected[]" value="<?=$id;?>" />
                       <td class="text-right"><?=$i;?></td>
                       <td class="text-left"><?=$section;?></td>
                       <td class="text-left"><input type="number" value="<?=$width?>" onchange="updateMe(this,'image_config','width',<?=$id;?>);" class="form-control"></td>
                       <td class="text-left"><input type="number" value="<?=$height?>" onchange="updateMe(this,'image_config','height',<?=$id;?>);" class="form-control"></td>
                       <td class="text-right">
                         <a href="<?php $base_path;?>admin/image-settings/image-settings?delete&id=<?=$id;?>" onClick="javascript:return confirm('Do you really want to Delete...?')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
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
       }elseif(isset($_GET['delete']))
       {
                        $id = isset($_GET['id'])?$_GET['id']:0;
                        
                         $sql = "delete from image_config where id = $id";
                          
                         $res = mysqli_query($db,$sql);
                          
                          
                           if($res)
                           {
                            
                             ?>
                               <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong>Success !</strong>   deleted.
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
  <script src="<?=$base_path;?>admin/view/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?=$base_path;?>admin/view/datatables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript"><!--
  $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
                aaSorting: []
        });
    });
  </script>
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
<script>
    function updateMe(input,table,column,id)
    {
        var input = input.value;
        var ajax = new XMLHttpRequest();
        ajax.open("POST","admin/ajax/update-ajax.php");
        
        var formdata = new FormData();
        formdata.append("value",input);
        formdata.append("table",table);
        formdata.append("column",column);
        formdata.append("id",id);
        
        ajax.onload = function()
        {
            alert(ajax.responseText);
        }
        
        ajax.send(formdata);
        
        
    }
</script>
</body></html>