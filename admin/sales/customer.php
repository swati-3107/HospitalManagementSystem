<?php

 include('../config.php');
$pg_title = "Category List";
include('../includes/head-js-css.php');
if(isset($_REQUEST['delete'])){
$customer_selected_id=$_REQUEST['selected'];
foreach($customer_selected_id as $customer_id){
		$db->query("DELETE FROM oc_customer WHERE customer_id = '" . (int)$customer_id . "'");
		$db->query("DELETE FROM oc_customer_reward WHERE customer_id = '" . (int)$customer_id . "'");
		$db->query("DELETE FROM oc_customer_transaction WHERE customer_id = '" . (int)$customer_id . "'");
		$db->query("DELETE FROM oc_customer_ip WHERE customer_id = '" . (int)$customer_id . "'");
		$db->query("DELETE FROM oc_address WHERE customer_id = '" . (int)$customer_id . "'");
		$db->query("DELETE FROM confirmation_email WHERE customer_id = '" . (int)$customer_id . "'");
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
      <div class="pull-right"><a href="<?php $base_path;?>admin/sales/customer-add" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="submit" form="form-customer" data-toggle="tooltip" title="Delete"  class="btn btn-danger" onClick="javascript:return confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?')" name="delete"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Customers</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/sales/customer">Customers</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Customer List</h3>
      </div>
      <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data" id="form-customer">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><a href="" class="asc">Customer Name</a></td>
                  <td class="text-left"><a href="">E-Mail</a></td>
                  <td class="text-left"><a href="">Customer Group</a></td>
                  <td class="text-left"><a href="">Status</a></td>
                  <td class="text-left"><a href="">Date Added</a></td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql="SELECT *, CONCAT(c.firstname, ' ', c.lastname) AS name, cgd.name AS customer_group FROM oc_customer c LEFT JOIN oc_customer_group_description cgd ON (c.customer_group_id = cgd.customer_group_id) order by c.customer_id DESC";
			   $res=$db->query($sql) or die($db->error.__LINE__);
			  while($row=$res->fetch_assoc()){
			   if($row['status']==1){$status='Enabled';}else{ $status='Disabled';}
              ?>
                <tr>
                  <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['customer_id']?>" /></td>
                  <td class="text-left"><?php echo ucwords(strtolower($row['name']));?></td>
                  <td class="text-left"><?php echo $row['email'];?></td>
                  <td class="text-left"><?php echo $row['customer_group'];?></td>
                  <td class="text-left" id="status<?=$row['customer_id']?>"><?php echo $status;?></td>
                  <td class="text-left"><?php echo date("d-m-Y",strtotime($row['date_added']));?></td>
                  
                  <td class="text-right">
                    <button type="button" class="btn btn-success" onclick="updateStatus('<?=$row['customer_id']?>','<?php echo $row['status'];?>')">
                      <i class="fa fa-thumbs-o-up"></i>
                    </button>
                                        
                    <a href="<?php $base_path;?>admin/sales/customer-edit?edit&id=<?php echo $row['customer_id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
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
						value: item['customer_id']
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

<script>
    function updateStatus(custtomerid,status){
      custtomerid = parseInt(custtomerid);
      status = parseInt(status);
       var statusTD = document.getElementById("status"+custtomerid);
          statusTD.innerText  = 'Updating';
          // statusTD.innerText  = status==0?'Enabled':'Disabled';
      let upstatus = 0;
      upstatus = status==0?1:0;
      
      var ajax= new XMLHttpRequest();

      var formdata = new FormData();

      formdata.append('custtomerid',custtomerid);

      formdata.append('upstatus',upstatus);

      formdata.append('action','updateStatus');

      ajax.open("POST","admin/ajax/customer-action.php");

        ajax.onload = function ()

        {

          var ret = ajax.responseText.trim();

          if(ret==1)

          {
           var str = ajax.responseText;
            var statusTD = document.getElementById("status"+custtomerid);
            statusTD.innerText  = upstatus==1?'Enabled':'Disabled';
            alert("Customer Status Updated")
         
          }

        };

      ajax.send(formdata);



    }




</script>

<?php include('../includes/footer.php');?>
</div>
</body></html> 