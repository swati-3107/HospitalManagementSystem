<?php

 include('../config.php');
$pg_title = "Category List";
include('../includes/head-js-css.php');
if(isset($_REQUEST['delete'])){
$doctor_selected_id=$_REQUEST['selected'];
foreach($doctor_selected_id as $doctor_id){
		$db->query("DELETE FROM doctor WHERE doctor_id = '" . (int)$doctor_id . "'");
	
		$db->query("DELETE FROM oc_address WHERE doctor_id = '" . (int)$doctor_id . "'");

}

}
?>
<body>
<div id="container">
<?php include('../includes/header.php');
include('../includes/left-menu.php');
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php $base_path;?>admin/doctors/doctor-add" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="submit" form="form-customer" data-toggle="tooltip" title="Delete"  class="btn btn-danger" onClick="javascript:return confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?')" name="delete"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>doctors</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/doctors/doctor">doctors</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> doctor List</h3>
      </div>
      <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data" id="form-customer">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><a href="" class="asc">doctor Name</a></td>
                  <td class="text-left"><a href="">E-Mail</a></td>
                  <td class="text-left"><a href="">doctor Group</a></td>
                  <td class="text-left"><a href="">Department</a></td>
                  <td class="text-left"><a href="">Date Added</a></td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql="SELECT *, CONCAT(c.firstname, ' ', c.lastname) AS name, cgd.name AS doctor_group FROM doctor c LEFT JOIN doctor_group_description cgd ON (c.doctor_group_id = cgd.doctor_group_id) order by c.doctor_id DESC";
			   $res=$db->query($sql) or die($db->error.__LINE__);
			  while($row=$res->fetch_assoc()){
			   
              ?>
                <tr>
                  <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['doctor_id']?>" /></td>
                  <td class="text-left"><?php echo ucwords(strtolower($row['name']));?></td>
                  <td class="text-left"><?php echo $row['email'];?></td>
                  <td class="text-left"><?php echo $row['doctor_group'];?></td>
                  <td class="text-left"><?php echo $row['department'];?></td>
                  <td class="text-left"><?php echo date("d-m-Y",strtotime($row['date_added']));?></td>
                  <td class="text-right"><button type="button" class="btn btn-success" disabled><i class="fa fa-thumbs-o-up"></i></button>
                                        
                    <a href="<?php $base_path;?>admin/doctors/doctor-edit?edit&id=<?php echo $row['doctor_id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                <?php } ?>
               </tbody>
            </table>
          </div>
        </form>
        
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--

$('input[name=\'filter_email\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index?route=sale/customer/autocomplete&token=f01cb4ca12fadddc17f9c3f303633132&filter_email=' +  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['email'],
						value: item['doctor_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'filter_email\']').val(item['label']);
	}	
});
//--></script> 
  <script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});
//--></script></div>
<?php include('../includes/footer.php');?>
</div>
</body></html> 