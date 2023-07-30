<?php

include('../config.php');
$pg_title = "doctor Group List";
include('../includes/head-js-css.php');
if(isset($_REQUEST['delete'])){
$group_selected_id=$_REQUEST['selected'];
foreach($group_selected_id as $doctor_group_id){
		$db->query("DELETE FROM doctor_group WHERE doctor_group_id = '" . (int)$doctor_group_id . "'");
		$db->query("DELETE FROM doctor_group_description WHERE doctor_group_id = '" . (int)$doctor_group_id . "'");
	
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
      <div class="pull-right"><a href="<?php $base_path;?>admin/doctors/doctor-group-add" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="submit" form="form-doctor-group" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="javascript:return confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?')" name="delete"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>doctor Groups</h1>
      <ul class="breadcrumb">
               <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/doctors/doctor-group-list">doctor Groups</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> doctor Group List</h3>
      </div>
      <div class="panel-body">
        <form action="" enctype="multipart/form-data" id="form-doctor-group">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><a href="" class="asc">doctor Group Name</a></td>
                  <td class="text-left"><a href="">Description</a></td>
                  <td class="text-right"><a href="">Sort</a></td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql="SELECT * FROM doctor_group cg LEFT JOIN doctor_group_description cgd ON (cg.doctor_group_id = cgd.doctor_group_id) order by  cg.doctor_group_id DESC";
			   $res=$db->query($sql) or die($db->error.__LINE__);
			  while($row=$res->fetch_assoc()){
			  ?>
              
				<tr>
                  <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['doctor_group_id'];?>" /></td>
                  <td class="text-left"><?php echo $row['name'];?></td>
                  <td class="text-left"><?php echo $row['description'];?></td>
                  <td class="text-right"><?php echo $row['sort_order'];?></td>
                  <td class="text-right"><a href="<?php $base_path;?>admin/doctors/doctor-group-add?edit&id=<?php echo $row['doctor_group_id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                 <?php }?>              
				</tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"></div>
          <div class="col-sm-6 text-right">Showing 1 to 2 of 2 (1 Pages)</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php');?>
</body></html> 