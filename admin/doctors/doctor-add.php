<style>

 .errorstyle{
    color: red;
    font-style: initial;
    font-size: 14px;
 };
 .w-100{width:100%}

</style>

<?php

 include('../config.php');
$pg_title = "Category List";
$errormsg="";
include('../includes/head-js-css.php');



if(isset($_REQUEST['add-doctor'])){
 
 
 /**********VALIDATION ADD BY AKASH K. 23092020**********************************/
 /*Validation for Tab :1*/
 
 /*if(empty($_REQUEST['add-doctor_group_id']))
 {
  $errormsg="General : Select doctor Group";
  echo '<script>alert("'. $errormsg .'")</script>';
 }
 elseif(empty($_REQUEST['firstname']))
 {
  $errormsg="General : Fill First Name";
   echo '<script>alert("'. $errormsg .'")</script>';
 }
 elseif(empty($_REQUEST['lastname']))
 {
  $errormsg="General : Fill Last Name";
  echo '<script>alert("'. $errormsg .'")</script>';
 }
 elseif(empty($_REQUEST['email']))
 {
  $errormsg="General : Fill E-Mail";
  echo '<script>alert("'. $errormsg .'")</script>';
 }
 elseif(empty($_REQUEST['mobile']))
 {
  $errormsg="General : Fill mobile";
  echo '<script>alert("'. $errormsg .'")</script>';
 }
 elseif(empty($_REQUEST['password']))
 {
  $errormsg="General : Fill Password";
  echo '<script>alert("'. $errormsg .'")</script>';
 }
  /*Validation for Tab :2*/
/*  elseif(empty($_REQUEST['address_1']))
 {
  $errormsg="Add Address : Fill Address 1";
  echo '<script>alert("'. $errormsg .'")</script>';
 }
 elseif(empty($_REQUEST['city']))
 {
  $errormsg="Add Address : Fill City";
  echo '<script>alert("'. $errormsg .'")</script>';
 } 
  elseif(empty($_REQUEST['postcode']))
 {
  $errormsg="Add Address : Fill Postal Code";
  echo '<script>alert("'. $errormsg .'")</script>';
 }
 elseif(empty($_REQUEST['country_id']))
 {
  $errormsg="Add Address : Select Country";
  echo '<script>alert("'. $errormsg .'")</script>';
 }
  elseif(empty($_REQUEST['zone_id']))
 {
  $errormsg="Add Address : Select Zone";
  echo '<script>alert("'. $errormsg .'")</script>';
 }
 else
 {

    about_doctor


 */
$photo = '';
if(!empty($_FILES['photo']['name'])){
                            $post = mysqli_escape_array($db,$_POST);

                           $name = $_FILES['photo']['name'];

                           $photo= time().substr($name,strlen($name)-4,4);

                           $path = "../../doctor-images/".$photo;

                           $old_path = $_FILES['photo']['tmp_name'];
                           if(move_uploaded_file($old_path,$path))

                           {?>

                            <div class="alert alert-success">
                        
                               Image Upload Successfully
                        
                            </div><?php
                        
                        }  else{?>

                            <div class="alert alert-danger">
                        
                                Problem occured while uploading image.Please try again.
                        
                            </div><?php
                        
                          }
                        }


$db->query("INSERT INTO doctor SET doctor_group_id = '" . (int)$_REQUEST['doctor_group_id'] . "', firstname = '" . $_REQUEST['firstname'] . "', lastname = '" . $_REQUEST['lastname'] . "',photo = '" . $photo. "', email = '" . $_REQUEST['email'] . "', mobile = '" . $_REQUEST['mobile'] . "' , degree = '" . $_REQUEST['degree'] . "', department = '" . $_REQUEST['department'] . "', experience = '" . $_REQUEST['experience'] . "', about_doctor = '" . $_REQUEST['about_doctor'] . "',  password = '" . $_REQUEST['password'] . "', date_added = NOW()") or die ($db->error.__LINE__);

		$doctor_id = $db->insert_id;
		
		$db->query("INSERT INTO oc_address SET customer_id = '" . (int)$doctor_id . "', firstname = '" . $_REQUEST['firstname'] . "', lastname = '" . $_REQUEST['lastname'] . "', company = '" . $_REQUEST['company'] . "', address_1 = '" . $_REQUEST['address_1'] . "', address_2 = '" . $_REQUEST['address_2'] . "', city = '" . $_REQUEST['city'] . "', postcode = '" . $_REQUEST['postcode'] . "', country_id = '" . (int)$_REQUEST['country_id'] . "'") or die ($db->error.__LINE__);

				
		$address_id = $db->insert_id;

		$db->query("UPDATE doctor SET address_id = '" . (int)$address_id . "' WHERE doctor_id = '" . (int)$doctor_id . "'")or die ($db->error.__LINE__);
				//}//validation else statement is end here 
?>
                <div class="alert alert-success">
                        
                Doctor Data added  Successfully
         
             </div><?php
			

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
        <button type="submit" form="form-customer" data-toggle="tooltip" title="Save" name="add-doctor" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $base_path;?>admin/doctors/doctor" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
         <div class="row">
          <div class="col-md-3">
            <h3 class="panel-title"><i class="fa fa-pencil"></i> Add doctor</h3>
          </div>
          <div class="col-md-9" style="visibility: hidden;">
            <?php/*echo '<span class="errorstyle">'. $errormsg . '</span>';*/?> 
          </div>
         </div>
        
        </div>
        <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data" id="form-customer" class="form-horizontal">
                <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
                <li ><a  href="#tab-address" data-toggle="tab"> Add Address</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-general">
                        <div class="row">
                            <div class="col-sm-10">                            
                                <div class="form-group">
                                	<label class="col-sm-2 control-label" for="input-customer-group">doctor Group</label>
                                    <div class="col-sm-10">
                                    <select name="doctor_group_id" id="input-customer-group" class="form-control">
                                     <?php
									$sql_cg="SELECT * FROM `doctor_group_description`";
									$res_cg=$db->query($sql_cg) or die($db->error.__LINE__);
									while($row_cg=$res_cg->fetch_assoc()){
									?>
									<option value="<?php echo $row_cg['doctor_group_id']; ?>"><?php echo $row_cg['name']; ?></option>
									<?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">

<label class="control-label col-sm-2" for="photo">Upload Photo:</label>

<div class="col-sm-10"> 

  <input type="file" class="form-control" id="photo" name="photo">

</div>

</div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-mobile">mobile</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="mobile" value="" placeholder="mobile" id="input-mobile" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-degree">Education</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="degree" value="" placeholder="MBBS,DCH etc" id="input-degree" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-department">Department</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="department" value="" placeholder="department" id="input-department" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-experience">Experience</label>
                                    <div class="col-sm-10">
                                    <input type="number" name="experience" value="" placeholder="experience" id="input-experience" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-description1">About Doctor</label>
                                    <div class="col-sm-10">
                                    <div class="input-group w-100" style="width: 100%;">
                                        <textarea name="about_doctor" rows="5" placeholder="Description" id="input-description1" class="form-control w-100"></textarea>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-password">Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" autocomplete="off" />
                                    </div>
                                </div>
                               <!-- <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-confirm">Confirm</label>
                                    <div class="col-sm-10">
                                    <input type="password" name="confirm" value="" placeholder="Confirm" autocomplete="off" id="input-confirm" class="form-control" />
                                    </div>
                                </div>-->
                                <!-- <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-newsletter">Newsletter</label>
                                    <div class="col-sm-10">
                                    <select name="newsletter" id="input-newsletter" class="form-control">
                                    <option value="1">Enabled</option>
                                    <option value="0" selected="selected">Disabled</option>
                                    </select>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-status">Status</label>
                                    <div class="col-sm-10">
                                    <select name="status" id="input-status" class="form-control">
                                    <option value="1" selected="selected">Enabled</option>
                                    <option value="0">Disabled</option>
                                    <option value="2">Blocked</option>
                                    </select>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-safe">Safe</label>
                                    <div class="col-sm-10">
                                    <select name="safe" id="input-safe" class="form-control">
                                    <option value="1" selected="selected">Enabled</option>
                                    <option value="0">Disabled</option>
                                    </select>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>   
                <div class="tab-pane" id="tab-address">
                
                   <!-- <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="firstname" value="" placeholder="" id="input-firstname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="lastname" value="" placeholder="" id="input-lastname" class="form-control" />
                        
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-company">Company Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="company" value="" placeholder="Company Name" id="input-company" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-address-1">Address 1</label>
                        <div class="col-sm-10">
                        <input type="text" name="address_1" value="" placeholder="Address 1" id="input-address-1" class="form-control"/>
                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-address-2">Address 2</label>
                        <div class="col-sm-10">
                        <input type="text" name="address_2" value="" placeholder="" id="input-address-2" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-city">City</label>
                        <div class="col-sm-10">
                        <input type="text" name="city" value="" placeholder="City" id="input-city" class="form-control" />
                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                        <div class="col-sm-10">
                        <input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-country">Country</label>
                        <div class="col-sm-10">
                        <select name="country_id" id="input-country" value="india" class="form-control">
                        <option value="">Select</option>
                        <?php
                        $sql_ad="SELECT * FROM `oc_country`";
                        $res_ad=$db->query($sql_ad) or die($db->error.__LINE__);
                        while($row_ad=$res_ad->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row_ad['country_id']; ?>"><?php echo $row_ad['name']; ?></option>
                        <?php } ?>
                        </select>
                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-zone">Zone</label>
                        <div class="col-sm-10">
                        <select name="zone_id" id="input-zone" class="form-control" >
                            <option value="431133">431133</option>
                        </select>
                        
                        </div>
                    </div>
                    
                </div>
                
                </div>
            </form>
        </div>
    </div>
</div>
  
<script type="text/javascript">

 function country(){
        $('#input-zone').html(null);
        country_id = $("#input-country").val();
		
		var data="<?php echo $base_path;?>admin/doctors/ajax-call?mode=zone&country_id="+country_id;
		//alert(data);
		$.ajax({
			url:data,
			cache:true,
			type: 'GET',
			dataType: 'JSON',
			contentType: 'application/json',
			success: function (data) {
				$('<option value="">Any</option>').appendTo('#input-zone');
				for (var i in data) {
					$('<option value="' +data[i].zone_id+ '">' + data[i].name + '</option>').appendTo('#input-zone');
				}
			  
			}
		});
        
    }
	

</script> 
 
  
  </div>
<?php include('../includes/footer.php');?></div>
</body></html>