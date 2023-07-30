<style>

 .errorstyle{
    color: red;
    font-style: initial;
    font-size: 14px;
 };

</style>
<?php

 include('../config.php');
$pg_title = "doctor Group List";
include('../includes/head-js-css.php');

$errormsg='';
if(isset($_REQUEST['add-group'])){

/***********VALIDATION CODE AKASH K. 23092020***********************/ 
if(empty($_REQUEST['name']))
{
 $errormsg="Fill doctor Group Name";
}
elseif(empty($_REQUEST['description']))
{
  $errormsg="Fill Description";
}
/*elseif(isset($_REQUEST['approval']))
{
  echo '<script>alert("fill approval")</script>';
}*/
elseif(empty($_REQUEST['sort_order']))
{
  $errormsg="Fill Sort Order";
}
else
{
 $db->query("INSERT INTO doctor_group SET approval = '" . (int)$_REQUEST['approval'] . "', sort_order = '" . (int)$_REQUEST['sort_order'] . "'") or die($db->error.__LINE__);
	$doctor_group_id = $db->insert_id;
	$db->query("INSERT INTO doctor_group_description SET doctor_group_id = '" . (int)$doctor_group_id . "', language_id = '1', name = '" . $_REQUEST['name'] . "', description = '" . $_REQUEST['description'] . "'") or die($db->error.__LINE__);
		echo '<script>window.location.assign("admin/doctors/doctor-group-list.php")</script>';
}



}
if(isset($_REQUEST['edit'])){
 
 
$doctor_group_id=$_REQUEST['id'];
$sql_ed="SELECT DISTINCT * FROM doctor_group cg LEFT JOIN doctor_group_description cgd ON (cg.doctor_group_id = cgd.doctor_group_id) WHERE cg.doctor_group_id = '" . (int)$doctor_group_id . "'";
$res_ed=$db->query($sql_ed) or die($db->error.__LINE__);
$row_ed=$res_ed->fetch_assoc();
$doctor_group_name=$row_ed['name']; $description=$row_ed['description']; $approval=$row_ed['approval'];$sort_order=$row_ed['sort_order'];
$doctor_group_id=$row_ed['doctor_group_id'];
}
else{
$doctor_group_name=''; $description=''; $approval='';$sort_order='';$doctor_group_id='';
}
if(isset($_REQUEST['update-group'])){
 
 /***********VALIDATION CODE AKASH K. 23092020***********************/ 
if(empty($_REQUEST['name']))
{
 $errormsg="Fill doctor Group Name";
}
elseif(empty($_REQUEST['description']))
{
  $errormsg="Fill Description";
}
/*elseif(isset($_REQUEST['approval']))
{
  echo '<script>alert("fill approval")</script>';
}*/
elseif(empty($_REQUEST['sort_order']))
{
  $errormsg="Fill Sort Order";
}
 else{
  $doctor_group_id=$_REQUEST['cust_grp_id'];
  $db->query("UPDATE doctor_group SET approval = '" . (int)$_REQUEST['approval'] . "', sort_order = '" . (int)$_REQUEST['sort_order'] . "' WHERE doctor_group_id = '" . (int)$doctor_group_id . "'") or die($db->error.__LINE__);
		$db->query("UPDATE doctor_group_description SET language_id = '1', name = '" . $_REQUEST['name'] . "', description = '" . $_REQUEST['description'] . "' WHERE doctor_group_id = '" . (int)$doctor_group_id . "'") or die($db->error.__LINE__);
		echo '<script>window.location.assign("admin/doctors/doctor-group-list.php")</script>';
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
      <div class="pull-right">
      <?php if(isset($_REQUEST['edit'])){ ?>
        <button type="submit" form="form-doctor-group" data-toggle="tooltip" title="Update" name="update-group" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <?php }else{?>
         <button type="submit" form="form-doctor-group" data-toggle="tooltip" title="save" name="add-group" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <?php }?>
        <a href="<?php echo $base_path;?>admin/doctors/doctor-group-list" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>doctor Groups</h1>
      <ul class="breadcrumb">
               <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/doctors/doctor-group-add">doctor Groups</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
       <div class="row">
         <div class="col-md-3">
           <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){ ?> Edit <?php }else{?>Add <?php }?> doctor Group</h3>
         </div>
         <div class="col-md-9">
           <?php echo '<span class="errorstyle">'.$errormsg .'</span>'; ?>
         </div>
       </div>
        
        
      </div>
      <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data" id="form-doctor-group" class="form-horizontal">
          <div class="form-group required">
            <label class="col-sm-2 control-label">doctor Group Name</label>
            <div class="col-sm-10">
                <div class="input-group"><span class="input-group-addon"><img src="view/image/flags/gb.png" title="English" /></span>
                <input type="text" name="name" value="<?php echo $doctor_group_name;?>" placeholder="doctor Group Name" class="form-control" />
                <input type="hidden" name="cust_grp_id" value="<?php echo $doctor_group_id;?>"  class="form-control" />
            </div>
			</div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-description1">Description</label>
            <div class="col-sm-10">
              <div class="input-group"><span class="input-group-addon"><img src="view/image/flags/gb.png" title="English" /></span>
                <textarea name="description" rows="5" placeholder="Description" id="input-description1" class="form-control"><?php echo $description;?></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="doctors must be approved by an administrator before they can login.">Approve New doctors</span></label>
            <div class="col-sm-10">
              <label class="radio-inline">
                                <input type="radio" name="approval" value="1" <?php if($approval==1){?>checked="checked"<?php }?> />Yes</label>
              <label class="radio-inline">
                                <input type="radio" name="approval" value="0" <?php if($approval==0){?>checked="checked"<?php }?> />No</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
            <div class="col-sm-10">
              <input type="text" name="sort_order" value="<?php echo $sort_order?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php');?>
</body></html>