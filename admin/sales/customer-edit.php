<?php

 include('../config.php');
$pg_title = "Category List";
$errormsg='';
	$histories=array(0);
	$rewards=array(0);
	$ips=array();
include('../includes/head-js-css.php');

/***************************************************/
$customer_id=$customer_group_id='';
$store_id='';
$firstname= $lastname= $email='';
$telephone=$fax= $password='';
$newsletter=$address_id=$status='';
$approved=$safe=$date_added='';
/*********tab2 ********/
$address_id=$company='';
$address_1=$address_2='';
$city=$postcode=$country_id='';
$zone_id='';
$tmpcompany=$company='';
/**************************************************/

//action method 
if(isset($_POST['update-customer']))
//if(isset($_REQUEST['update-customer']))
{
/***********Required field validtion add by Akash K. 24092020*****************************/
///echo '<script>alert("Hello")</script>';
/*General Tab*/
 /*if(empty($_REQUEST['firstname']))
 {
   $errormsg='Fill First Name';
 }
 elseif(empty($_REQUEST['lastname']))
 {
  $errormsg='General : Fill Last Name';
 }
 elseif(empty($_REQUEST['email']))
 {
  $errormsg='General : Fill E-Mail';
 }
 elseif(empty($_REQUEST['telephone']))
 {
  $errormsg='General : Fill Telephone';
 }
 elseif(empty($_REQUEST['password']))
 {
  $errormsg='General : Fill Password';
 }*/

 /*Address Tab*/
 /*elseif(empty($_REQUEST['address_1']))
 {
  $errormsg='Address : Fill Address 1';
 }
 elseif(empty($_REQUEST['city']))
 {
   $errormsg='Address : Fill City';
 }
 elseif(empty($_REQUEST['postcode']))
 {
   $errormsg='Address : Fill Postal Code';
 }
 elseif(empty($_REQUEST['country_id']))
 {
   $errormsg='Address : Fill Country';
 }
 elseif(empty($_REQUEST['zone_id']))
 {
   $errormsg="Address : Fill Zone";
 }
 else
 {*/
 
     $errormsg='';
     $customer_id=$_REQUEST['cust_id']; $address_id=$_REQUEST['address_id'];
     $db->query("UPDATE oc_customer SET customer_group_id = '" . (int)$_REQUEST['customer_group_id'] . "', firstname = '" . $_REQUEST['firstname'] . "', lastname = '" . $_REQUEST['lastname'] . "', email = '" . $_REQUEST['email'] . "', telephone = '" . $_REQUEST['telephone'] . "', fax = '" . $_REQUEST['fax'] . "',  newsletter = '" . (int)$_REQUEST['newsletter'] . "',  password = '" . $_REQUEST['password'] . "', status = '" . (int)$_REQUEST['status'] . "', safe = '" . (int)$_REQUEST['safe'] . "', date_added = NOW() WHERE customer_id = '" . (int)$customer_id . "'" ) or die ($db->error.__LINE__);
     if($address_id!='')
      {
		     $db->query("UPDATE oc_address SET customer_id = '" . (int)$customer_id . "', firstname = '" . $_REQUEST['firstname'] . "', lastname = '" . $_REQUEST['lastname'] . "', company = '" . $_REQUEST['company'] . "', address_1 = '" . $_REQUEST['address_1'] . "', address_2 = '" . $_REQUEST['address_2'] . "', city = '" . $_REQUEST['city'] . "', postcode = '" . $_REQUEST['postcode'] . "', country_id = '" . (int)$_REQUEST['country_id'] . "', zone_id = '" . (int)$_REQUEST['zone_id'] . "' WHERE address_id = '" . (int)$address_id . "'") or die ($db->error.__LINE__);
		     
      }
      else
       {
		       $db->query("INSERT INTO oc_address SET customer_id = '" . (int)$customer_id . "', firstname = '" . $_REQUEST['firstname'] . "', lastname = '" . $_REQUEST['lastname'] . "', company = '" . $_REQUEST['company'] . "', address_1 = '" . $_REQUEST['address_1'] . "', address_2 = '" . $_REQUEST['address_2'] . "', city = '" . $_REQUEST['city'] . "', postcode = '" . $_REQUEST['postcode'] . "', country_id = '" . (int)$_REQUEST['country_id'] . "', zone_id = '" . (int)$_REQUEST['zone_id'] . "'") or die ($db->error.__LINE__);
		       $address_id = $db->insert_id;
		     }
	    	  $db->query("UPDATE oc_customer SET address_id = '" . (int)$address_id . "' WHERE customer_id = '" . (int)$customer_id . "'")or die ($db->error.__LINE__);
     	  echo '<script>alert("Updated")</script>';
        echo '<script>window.location.assign("admin/sales/customer.php")</script>';
     // }//end required field validation else statement.   

 
}
elseif(isset($_REQUEST['edit']))
{
$customer_id=$_REQUEST['id'];
$company='';
$sql_ed="SELECT * FROM `oc_customer` WHERE `customer_id`='$customer_id'";
$res_ed=$db->query($sql_ed) or die($db->error.__LINE__);
$row_ed=$res_ed->fetch_assoc();

$customer_id=$row_ed['customer_id']; $customer_group_id=$row_ed['customer_group_id'];
$store_id=$row_ed['store_id'];
$firstname=$row_ed['firstname']; $lastname=$row_ed['lastname']; $email=$row_ed['email'];
$telephone=$row_ed['telephone']; $fax=$row_ed['fax']; $password=$row_ed['password'];
$newsletter=$row_ed['newsletter']; $address_id=$row_ed['address_id']; $status=$row_ed['status'];
$approved=$row_ed['approved']; $safe=$row_ed['safe'];$date_added=$row_ed['date_added']; 


$sql_ad="SELECT * FROM `oc_address` WHERE `address_id`='$address_id'";

$res_ad=$db->query($sql_ad) or die($db->error.__LINE__);
$row_ad=$res_ad->fetch_assoc();
$address_id=$row_ad['address_id']; $company=$row_ad['company'];
$address_1=$row_ad['address_1'];$address_2=$row_ad['address_2'];
$city=$row_ad['city'];$postcode=$row_ad['postcode'];$country_id=$row_ad['country_id'];
$zone_id=$row_ad['zone_id'];

 
	//$histories=array();
// $histories=(array)null;
	$sql_his="SELECT * FROM `oc_customer_history` WHERE `customer_id`='$customer_id'";
	$res_his=$db->query($sql_his) or die($db->error.__LINE__);
 $num=mysqli_num_rows($res_his);
 
   if($num>0)
   {
	    while($row_his=$res_his->fetch_assoc()){
	  	  $histories[]=$row_his;
	  }
 }
 
	$rewards=array(0);
	$sql_cre="SELECT * FROM `oc_customer_reward` WHERE `customer_id`='$customer_id'";
 
	$res_cre=$db->query($sql_cre) or die($db->error.__LINE__);
	while($row_cre=$res_cre->fetch_assoc()){
		$rewards[]=$row_cre;
	}
	
	//$ips=array();
// $ips=(array)null;
 
	$sql_ip="SELECT *,(SELECT b.ip from oc_customer_ban_ip b where b.ip=a.ip ) As ban_ip FROM `oc_customer_ip` a WHERE a.customer_id='$customer_id'";
	$res_ip=$db->query($sql_ip) or die($db->error.__LINE__);
	while($row_ip=$res_ip->fetch_assoc()){
		$ips[]=$row_ip;
	}
	  $tmpcompany=(string)($company);

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
       
        <button type="submit" form="form-customer" data-toggle="tooltip" title="Update" name="update-customer" class="btn btn-primary"><i class="fa fa-save"></i></button>
        
        <a href="<?php echo $base_path;?>admin/sales/customer" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Customers</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/sales/customer-edit?edit&id=<?php echo $customer_id;?>">Customers</a></li>
              </ul>
    </div>
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
             <div class="col-md-3">
               <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Customer</h3>
             </div>
             <div class="col-md-9">
               <?php $errormsg; ?>
             </div>
          </div>
        
        </div>
        <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data" id="form-customer" class="form-horizontal">
               <div class="row">
                <div class="col-md-10">
                 
                </div>
                <div class="col-md-2">
                 <div class="left">
                 <!--<button type="submit" form="form-customer" data-toggle="tooltip" title="Update" name="update-customer" class="btn btn-primary"><i class="fa fa-save"></i></button>-->
                  </div>
                </div>
               </div>
               
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
                    <li><a href="#tab-address" data-toggle="tab">Address</a></li>
                      	<li><a href="#tab-history" data-toggle="tab">History</a></li>
                   <!-- <li><a href="#tab-transaction" data-toggle="tab">Transactions</a></li>-->
                    <li><a href="#tab-reward" data-toggle="tab">Reward Points</a></li>
                    <li><a href="#tab-ip" data-toggle="tab">IP Addresses</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-general">
                        <div class="form-group">
                        	<label class="col-sm-2 control-label" for="input-customer-group">Customer Group</label>
                            <div class="col-sm-10">
                                <select name="customer_group_id" id="input-customer-group" class="form-control">
                                <?php
                                $sql_cg="SELECT * FROM `oc_customer_group_description`";
                                $res_cg=$db->query($sql_cg) or die($db->error.__LINE__);
                                while($row_cg=$res_cg->fetch_assoc()){
                                ?>
                                	<option value="<?php echo $row_cg['customer_group_id']; ?>" <?php if($customer_group_id== $row_cg['customer_group_id']) { echo 'selected';}?>><?php echo $row_cg['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                            <div class="col-sm-10">
                            <input type="text" name="firstname" value="<?php echo $firstname;?>" placeholder="First Name" id="input-firstname" class="form-control" required />
                            <input type="hidden" name="cust_id" value="<?php echo $customer_id;?>"  class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                            <div class="col-sm-10">
                            <input type="text" name="lastname" value="<?php echo $lastname;?>" placeholder="Last Name" id="input-lastname" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                            <div class="col-sm-10">
                            <input type="text" name="email" value="<?php echo $email;?>" placeholder="E-Mail" id="input-email" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-telephone">Mobile</label>
                            <div class="col-sm-10">
                            <input type="text" name="telephone" value="<?php echo $telephone;?>" placeholder="Telephone" id="input-telephone" class="form-control" required />
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-fax">Fax</label>
                            <div class="col-sm-10">
                            	<input type="text" name="fax" value="<?php echo $fax;?>" placeholder="Fax" id="input-fax" class="form-control" />
                            </div>
                        </div> -->
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-password">Password</label>
                            <div class="col-sm-10">
                            	<input type="text" name="password" value="<?php echo $password;?>" placeholder="Password" id="input-password" class="form-control" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-newsletter">Newsletter</label>
                            <div class="col-sm-10">
                                <select name="newsletter" id="input-newsletter" class="form-control">
                                    <option value="1"  <?php if($newsletter=='1'){?>selected="selected"<?php }?>>Enabled</option>
                                    <option value="0" <?php if($newsletter=='0'){?>selected="selected"<?php }?>>Disabled</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-status">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="input-status" class="form-control">
                                <option value="1" <?php if($status=='1'){?>selected="selected"<?php }?>>Enabled</option>
                                <option value="0" <?php if($status=='0'){?>selected="selected"<?php }?>>Disabled</option>
                                <option value="2" <?php if($status=='2'){?>selected="selected"<?php }?>>Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-safe">Safe</label>
                            <div class="col-sm-10">
                                <select name="safe" id="input-safe" class="form-control">
                                <option value="1" <?php if($safe=='1'){?>selected="selected"<?php }?>>Enabled</option>
                                <option value="0" <?php if($safe=='0'){?>selected="selected"<?php }?>>Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-address">
                    	<input type="hidden" name="address_id" value="<?php echo $address_id;?>" />
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-company">Company</label>
                            <div class="col-sm-10">
                            
                            <input type="text" name="company" placeholder="Company" id="input-company" class="form-control" value='<?php  echo (string)($tmpcompany); ?>' />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-address">Address 1</label>
                            <div class="col-sm-10">
                            <input type="text" name="address_1" value="<?php echo $address_1;?>" placeholder="Address 1" id="input-address" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-address">Address 2</label>
                            <div class="col-sm-10">
                            <input type="text" name="address_2" value="<?php echo $address_2;?>" placeholder="Address 2" id="input-address" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-city">City</label>
                            <div class="col-sm-10">
                            <input type="text" name="city" value="<?php echo $city;?>" placeholder="City" id="input-city" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-postcode">Postcode</label>
                            <div class="col-sm-10">
                            <input type="text" name="postcode" value="<?php echo $postcode;?>" placeholder="Postcode" id="input-postcode" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-country">Country</label>
                            <div class="col-sm-10">
                                <select name="country_id" id="input-country" onChange="country();" class="form-control">
                                <option value=""> --- Please Select --- </option>
                                <?php
                                $sql_ad="SELECT * FROM `oc_country`";
                                $res_ad=$db->query($sql_ad) or die($db->error.__LINE__);
                                while($row_ad=$res_ad->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row_ad['country_id']; ?>" <?php if($country_id==$row_ad['country_id']){echo 'selected';} ?>><?php echo $row_ad['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-zone1">Region / State</label>
                            <div class="col-sm-10">
                                <select name="zone_id" id="input-zone" class="form-control">
                                <!-- <option value="1">Maharashtra</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
              <div class="tab-pane" id="tab-history">
                <div id="history"></div>
                <div class="table-responsive">
                	<table class="table table-bordered"  id="dataTables-example" style="width:100%;" >
                      <thead>
                        <tr>
                          <td class="text-left">date added</td>
                          <td class="text-left">Comment</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  if ($histories !='') { ?>
                        <?php foreach ($histories as $history) { ?>
                        <tr>
                          <td class="text-left"><?php echo $history['date_added']; ?></td>
                          <td class="text-left"><?php echo $history['comment']; ?></td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <tr>
                          <td class="text-center" colspan="2"> No results</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                
                </div>
                
                <br />
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-comment">Comment</label>
                <div class="col-sm-10">
                <textarea name="comment" rows="8" placeholder="Comment" id="input-comment" class="form-control"></textarea>
                </div>
                </div>
                <div class="text-right">
                <button id="button-history" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add History</button>
                </div>
                </div>
                     <!-- <div class="tab-pane" id="tab-transaction">
                    <div id="transaction"></div>
                    <br />
                    <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-transaction-description">Description</label>
                    <div class="col-sm-10">
                    
                    <input type="text" name="description" value="" placeholder="Description" id="input-transaction-description" class="form-control" />
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-amount">Amount</label>
                    <div class="col-sm-10">
                    <input type="text" name="amount" value="" placeholder="Amount" id="input-amount" class="form-control" />
                    </div>
                    </div>
                    <div class="text-right">
                    <button type="button" id="button-transaction" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Transaction</button>
                    </div>
                    </div>-->
                    <div class="tab-pane" id="tab-reward">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td class="text-left">Date Added</td>
                                        <td class="text-left">Description</td>
                                        <td class="text-right">Point</td>
                                    </tr>
                                </thead>
                                <tbody>
									<?php if ($rewards) {  $balance=0; ?>
                                    <?php foreach ($rewards as $reward) { ?>
                                    <tr>
                                        <td class="text-left"><?php echo $reward['date_added']; ?></td>
                                        <td class="text-left"><?php echo $reward['description']; ?></td>
                                        <td class="text-right"><?php echo $reward['points']; ?></td>
                                    </tr>
                                    <?php $balance=$balance+ $reward['points'];} ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-right"><b>Balance</b></td>
                                        <td class="text-right"><?php echo $balance; ?></td>
                                    </tr>
                                    <?php } else { ?>
                                    <tr>
                                    	<td class="text-center" colspan="3"><?php echo 'no_results'; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-reward-description">Description</label>
                            <div class="col-sm-10">
                            <input type="text" name="description" value="" placeholder="Description" id="input-reward-description" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-points"><span data-toggle="tooltip" title="Use minus to remove points">Points</span></label>
                            <div class="col-sm-10">
                            <input type="text" name="points" value="" placeholder="Points" id="input-points" class="form-control" />
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" id="button-reward" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Reward Points</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-ip">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td class="text-left">Ip</td>
                                       <!-- <td class="text-right">Total</td> -->
                                        <td class="text-left">Date Added</td>
                                        <td class="text-right">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
									<?php if ($ips) { ?>
                                    <?php foreach ($ips as $ip) { ?>
                                    <tr>
                                        <td class="text-left"><a href="http://www.geoiptool.com/en/?IP=<?php echo $ip['ip']; ?>" target="_blank"><?php echo $ip['ip']; ?></a></td>
                                        <!-- <td class="text-right"><a href="<?php //echo $ip['filter_ip']; ?>" target="_blank"><?php //echo $ip['total']; ?></a></td> -->
                                        <td class="text-left"><?php echo $ip['date_added']; ?></td>
                                        <td class="text-right"><?php if ($ip['ban_ip']) { ?>
                                        <button type="button" value="<?php echo $ip['ip']; ?>" data-loading-text="" class="btn btn-danger btn-xs button-ban-remove"><i class="fa fa-minus-circle"></i> Remove ban ip</button>
                                        <?php } else { ?>
                                        <button type="button" value="<?php echo $ip['ip']; ?>" data-loading-text="" class="btn btn-success btn-xs button-ban-add"><i class="fa fa-plus-circle"></i> Add ban ip</button>
                                        <?php } ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } else { ?>
                                    <tr>
                                    	<td class="text-center" colspan="4"><?php echo 'no results'; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
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
</script> 
  
  
<script type="text/javascript">

$(document).ready(function(){
$("#input-zone").val('<?php echo $zone_id;?>').prop('selected',true);
country();
});
 function country(){
        $('#input-zone').html(null);
        country_id = $("#input-country").val();
		var data="<?php echo $base_path;?>admin/sales/ajax-call?mode=zone&country_id="+country_id;
		//alert(data);
		$.ajax({
			url:data,
			cache:true,
			type: 'GET',
			dataType: 'JSON',
			contentType: 'application/json',
			success: function (data) {
				$('<option value="">Maharashtra</option>').appendTo('#input-zone');
				for (var i in data) {
					$('<option value="' +data[i].zone_id+ '">' + data[i].name + '</option>').appendTo('#input-zone');
				}
			 $("#input-zone").val('<?php echo $zone_id;?>').prop('selected',true);
			}
		});
        
    }
	
 $('#button-reward').on('click', function() {
  var description=$('#input-reward-description').val();
  var points=$('#input-points').val();
  alert(points);
  var data="<?php echo $base_path;?>admin/sales/ajax-call?mode=CustomerReward&customer_id=<?php echo $customer_id;?>&description="+description+"&points="+points;
  alert(data);
		$.ajax({
		url:data,
		cache:true,
		type: 'GET',
		//dataType: 'JSON',
		contentType: 'application/json',
		success: function (response) {
		alert(response);
		location.reload();
		}
	});
});

 $('.button-ban-add').on('click', function() {
  var ip=$('.button-ban-add').val();
  var data="<?php echo $base_path;?>admin/sales/ajax-call?mode=AddBanIP&ip="+ip;
		$.ajax({
		url:data,
		cache:true,
		type: 'GET',
		//dataType: 'JSON',
		contentType: 'application/json',
		success: function (response) {
		alert(response);
		location.reload();
		}
	});
});

$('.button-ban-remove').on('click', function() {
  var ip=$('.button-ban-remove').val();
  var data="<?php echo $base_path;?>admin/sales/ajax-call?mode=RemoveBanIP&ip="+ip;
		$.ajax({
		url:data,
		cache:true,
		type: 'GET',
		//dataType: 'JSON',
		contentType: 'application/json',
		success: function (response) {
		alert(response);
		location.reload();
		}
	});
});
</script></div>
<?php include('../includes/footer.php');?></div>
</body>
</html>