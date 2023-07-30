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
        <div class="well">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="input-product">Product</label>
                <input type="text" name="filter_product" value="" placeholder="Product" id="input-product" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-author">Author</label>
                <input type="text" name="filter_author" value="" placeholder="Author" id="input-author" class="form-control" />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="input-status">Status</label>
                <select name="filter_status" id="input-status" class="form-control">
                  <option value="*"></option>
                                    <option value="1">Enabled</option>
                                                      <option value="0">Disabled</option>
                                  </select>
              </div>
              <div class="form-group">
                <label class="control-label" for="input-date-added">Date Added</label>
                <div class="input-group date">
                  <input type="text" name="filter_date_added" value="" placeholder="Date Added" data-format="YYYY-MM-DD" id="input-date-added" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>
              <button type="button" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> Filter</button>
            </div>
          </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" id="form-review">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example" width="100%">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><a href="">Product</a>
                    </td>
                  <td class="text-left"><a href="">Customer Name</a>
                    </td>
                  <td class="text-right"><a href="">Rating</a>
                    </td>
                  <td class="text-left"><a href="">Status</a>
                    </td>
                  <td class="text-left"><a href="" class="asc">Date Added</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
              <?php 
			  $sql_rev="SELECT *,(select CONCAT(oc.firstname,' ',oc.lastname)  from oc_customer oc where oc.customer_id=ore.customer_id) As customer_name From oc_review ore where ore.status=0";
			  $res_rev=$db->query($sql_rev) or die($db->error.__LINE__);
			  while($row_rev=$res_rev->fetch_assoc()){
			 	 $sql_pd="select name from oc_product_description where product_id='".$row_rev['product_id']."'";
				  $res_pd=$db->query($sql_pd) or die($db->error.__LINE__);
				  $row_pd=$res_pd->fetch_assoc();
				  $product_name=$row_pd['name'];
				  if($row_rev['status']==1){$status='Enabled';}else{ $status='Disabled';}
			  ?>
                <tr>
                <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row_rev['review_id']?>" /></td>
                <td class="text-center" ><?php echo $product_name;?></td>
                <td class="text-center" ><?php echo $row_rev['customer_name'];?></td>
                <td class="text-center" ><?php echo $row_rev['rating'];?></td>
                <td class="text-center" ><?php echo $status;?></td>
                <td class="text-center" ><?php echo date("d-m-Y",strtotime($row_rev['date_added']));?></td>
                <td class="text-right"><a href="<?php echo $base_path;?>admin/catalog/reviews-add?edit&id=<?php echo $row_rev['review_id']; ?>&path=1" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
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