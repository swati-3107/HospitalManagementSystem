<?php

// session_start(); 

include('config.php');

$pg_title = "Notification List";

include('includes/head-js-css.php');

$notify_text=''; $btn = 'Add New'; $notify_id=''; $msg=''; $fromdate=''; $todate='';

if(isset($_REQUEST['Add_New'])){

    $notify_text = trim($_REQUEST['notify_text']);
	$fromdate = $_REQUEST['fromdate'];
	$todate = $_REQUEST['todate'];

    $sql = "SELECT * FROM `notification_list` WHERE `notify_text`='$notify_text'";

    $result = $db->query($sql) or die($db->error.__LINE__);
	

    if($result->num_rows > 0) {

    echo '<script>alert("Already exist")</script>';}

    else{

    $sql = "insert ignore into `notification_list` (`notify_text`,`fromdate`,`todate`) values ('$notify_text' , '$fromdate', '$todate')";

    $result = $db->query($sql) or die($db->error.__LINE__);

    echo '<script>alert("Inserted Successfully!!")</script>';

    $notify_text='';

    }

}else if(isset($_REQUEST['edit'])){

    $btn = 'Update'; $notify_id = $_REQUEST['id']; 

    $sql = "SELECT * FROM `notification_list` WHERE `notify_id`=$notify_id";

    $result = $db->query($sql) or die($db->error.__LINE__);

        $row = $result->fetch_assoc();

        $notify_text=trim($row['notify_text']);

}else if(isset($_REQUEST['delete'])){

    $notify_id = $_REQUEST['id'];

    $sql = "DELETE FROM `notification_list` WHERE `notify_id`=$notify_id";

    $result = $db->query($sql) or die($db->error.__LINE__);

   echo '<script>alert("Deleted Successfully!!")</script>';

   echo '<script>window.location.assign("admin/notification-list.php")</script>';

}

else if(isset($_REQUEST['Update'])){

    $notify_text = trim($_REQUEST['notify_text']);

    $sql = "SELECT count(*) FROM `notification_list` WHERE `notify_text`='$notify_text' AND notify_id!='".$_REQUEST['notify_id']."'";

    $result = $db->query($sql) or die($db->error.__LINE__);

    $row = $result->fetch_assoc();

    if($row['count(*)'] == 1) {

    echo '<script>alert("Already exist")</script>';

    $btn = 'Update';

    }

    else{

    $sql = "UPDATE `notification_list` SET `notify_text`='$notify_text' WHERE notify_id='".$_REQUEST['notify_id']."'";

    $result = $db->query($sql) or die($db->error.__LINE__);

    echo '<script>alert("Updated Successfully!!")</script>';

    $notify_text='';

	echo '<script>window.location.assign("admin/notification-list.php")</script>';

    }

}

/*if(isset($_REQUEST['delete'])){

$notification_selected_id=$_REQUEST['selected'];

foreach($notification_selected_id as $notification_id){

	$db->query("DELETE FROM  notification_details WHERE notification_id = '" . (int)$notification_id . "'");

}

echo '<script>window.location.assign(<?php echo $base_path;?>"admin/feedback-list.php")</script>';

}*/

?>

<body>

<div id="container">

<?php include('includes/header.php');

include('includes/left-menu.php');

?>

<div id="content">

  <div class="page-header">

    <div class="container-fluid">

      <div class="pull-right">

         <!--<button type="submit" form="form-notification" data-toggle="tooltip" title="Delete"  class="btn btn-danger" onClick="confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?');" name="delete"><i class="fa fa-trash-o"></i></button>-->

      </div>

      <h1>Notification</h1>

      <ul class="breadcrumb">

                <li><a href="<?php $base_path;?>admin/access.php">Home</a></li>

                <li><a href="<?php $base_path;?>admin/Notification-list.php">Notification</a></li>

              </ul>

    </div>

  </div>

  <div class="container-fluid">

            <div class="panel panel-default">

      <div class="panel-heading">

        <h3 class="panel-title"><i class="fa fa-list"></i> Notification List</h3>

      </div>

      <div class="panel-body">

       <div class="well">

        <form id="notification_frm" class="form-horizontal" role="form" action="" method="get">

                            <input type="hidden" name="notify_id" value="<?php echo $notify_id;?>">

                            <div class="form-group">

                                <label class="col-lg-2 control-label">Notification</label>

                                <div class="col-lg-8">

                                    <input type="text" name="notify_text" id="notify_text" class="form-control" value="<?php echo $notify_text;?>" required>

                                </div> <br><br>
								 <label class="col-lg-2 control-label">From Date</label>
								<div class="col-lg-8">

                                    <input type="date" name="fromdate" id="fromdate" class="form-control" value="<?php echo $fromdate;?>" required>

                                </div><br><br>
								 <label class="col-lg-2 control-label">To Date</label>
								<div class="col-lg-8">

                                    <input type="date" name="todate" id="todate" class="form-control" value="<?php echo $todate;?>" required>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-lg-2"></div>

                                <div class="col-lg-3">

                                    <button type="submit" class="btn btn-sm btn-info fa fa-check priv_btn" name="<?php echo $btn;?>"> <?php echo $btn;?></button>

                                    <a href="admin/notification-list.php"  class="btn btn-sm btn-danger fa fa-times"> Back</a>

                                </div>

                            </div>

                        </form>

        </div>

        <form action="" method="post" enctype="multipart/form-data" id="form-notification">

          <div class="col-lg-12 col-xs-12 table-responsive">

            <table class="table table-bordered table-hover" id="dataTables-example" style="width:100%;">

              <thead>

                <tr>

                  <td style="width: 1px;" class="text-center"><input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>

                  <td class="text-left">sr No</td>

                  <td class="text-left">Notification</td>
					<td class="text-left">From Date</td>
					<td class="text-left">To Date</td>

                  <td class="text-left">Action</td>                

                </tr>

              </thead>

              <tbody>

              <?php

              $sql_manu="SELECT * From  notification_list";

			  $res_manu=$db->query($sql_manu) or die($db->error.__LINE__);

			  $count =1;
        $nuum_row = 0;

			  while($row=$res_manu->fetch_assoc()){

						  $nuum_row++;

			  ?>

                  <tr>

                  <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['notify_id']?>" /></td>

                  <td class="text-left"><?php echo $nuum_row;?></td>

                  <td class="text-left"><?php echo $row['notify_text']?></td>
					  <td class="text-left"><?php echo $row['fromdate']?></td>
					  <td class="text-left"><?php echo $row['todate']?></td>

                  <td class="text-left"><a href="<?php echo $base_path;?>admin/notification-list.php?edit&id=<?php echo $row['notify_id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                  <a href="<?php echo $base_path;?>admin/notification-list.php?delete&id=<?php echo $row['notify_id']; ?>" onClick="javascript:return confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?');" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>

                  </td>

                  

                </tr>

                <?php }?>

                 

                 </tbody>

            </table>

          </div>

        </form>

        

      </div>

    </div>

  </div>

</div>

<?php include('includes/footer.php');?>

<script src="<?php echo $base_path;?>admin/view/datatables/datatables/media/js/jquery.dataTables.min.js"></script>

    <script src="<?php echo $base_path;?>admin/view/datatables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript"><!--

  $(document).ready(function() {

        $('#dataTables-example').DataTable({

                responsive: true,

                aaSorting: []

        });

    });

</script>

</body></html>