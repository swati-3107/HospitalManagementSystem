<?php
 include('../config.php');
$pg_title ='Reviews List';
include('../includes/head-js-css.php');
if(isset($_REQUEST['delete'])){
$review_selected_id=$_REQUEST['selected'];
foreach($review_selected_id as $review_id){

$db->query("DELETE FROM oc_review WHERE review_id = '" . (int)$review_id . "'");
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
      <div class="pull-right"><a href="<?php $base_path;?>admin/catalog/reviews-add" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
         <button type="submit" form="form-review" data-toggle="tooltip" title="Delete"  class="btn btn-danger" onClick="confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?');" name="delete"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Reviews</h1>
      <ul class="breadcrumb">
                <li><a href="<?php $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php $base_path;?>admin/reviews-list">Reviews</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Review List</h3>
      </div>
      <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data" id="form-review">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example" width="100%">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  
                  <td class="text-left"><a href="">Customer Name</a>
                    </td>
                  <td class="text-right"><a href="">Rating</a>
                    </td>
                  <td class="text-left"><a href="">Status</a>
                    </td>
                  <td class="text-left"><a href="">Message</a>
                    </td>
                  <td class="text-left"><a href="" class="asc">Date Added</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
              <?php 
			  $sql_rev="SELECT oc_review.review_id,oc_review.customer_id,oc_review.author,oc_review.text,oc_review.rating,oc_review.status ,oc_review.date_added, oc_customer.firstname,oc_customer.lastname FROM oc_review , oc_customer where oc_customer.customer_id = oc_review.customer_id";
			  // $sql_rev="SELECT *,(select CONCAT(oc.firstname,' ',oc.lastname) from oc_customer where oc.customer_id=ore.customer_id) As customer_name From oc_review ore";
			  $res_rev=$db->query($sql_rev) or die($db->error.__LINE__);
			  while($row_rev=$res_rev->fetch_assoc()){
					  if($row_rev['status']==1){$status='Enabled';}else{ $status='Disabled';}
			  ?>
                <tr>
                <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row_rev['review_id']?>" /></td>
                <td class="text-center" ><?php echo $row_rev['firstname'];echo " "; echo $row_rev['lastname'];?></td>
                <td class="text-center" ><?php echo $row_rev['rating'];?></td>
                <td class="text-center" ><?php echo $status;?></td>
                <td class="text-center" ><?php echo $row_rev['text'];?></td>
                <td class="text-center" ><?php echo date("d-m-Y",strtotime($row_rev['date_added']));?></td>
                <td class="text-right"><a href="<?php echo $base_path;?>admin/catalog/reviews-add?edit&id=<?php echo $row_rev['review_id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
               <?php }?>
              </tbody>
            </table>
          </div>
        </form>
        
      </div>
    </div>
  </div><script src="<?php echo $base_path;?>admin/view/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $base_path;?>admin/view/datatables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript"><!--
  $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
                aaSorting: []
        });
    });
    </script> 
  <script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});
//--></script></div>
<?php include('../includes/footer.php');?>
</body></html>