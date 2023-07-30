<?php

 include('../config.php');
$pg_title = "Category List";
$errormsg='';
	$histories=array(0);
	$rewards=array(0);
	$ips=array();
include('../includes/head-js-css.php');

/***************************************************/
$doctor_id=$doctor_group_id='';
$store_id='';
$firstname= $lastname= $email='';
$mobile= $password='';
$department=$degree='';
$experience="";
$about_doctor="";
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
if(isset($_POST['update-doctor']))
//if(isset($_REQUEST['update-doctor']))
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
 elseif(empty($_REQUEST['mobile']))
 {
  $errormsg='General : Fill mobile';
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
    $post = mysqli_escape_array($db,$_POST);

                 $name = $_FILES['photo']['name'];

                 $photo= time().substr($name,strlen($name)-4,4);

                 $path = "../../doctor-images/".$photo;

                 $old_path = $_FILES['photo']['tmp_name'];


 
     $errormsg='';
     $doctor_id=$_REQUEST['cust_id']; $address_id=$_REQUEST['address_id'];
     $db->query("UPDATE doctor SET doctor_group_id = '" . (int)$_REQUEST['doctor_group_id'] . "', firstname = '" . $_REQUEST['firstname'] . "', lastname = '" . $_REQUEST['lastname'] . "', email = '" . $_REQUEST['email'] . "', mobile = '" . $_REQUEST['mobile'] . "',degree = '" . $_REQUEST['degree'] . "',department = '" . $_REQUEST['department'] . "',experience = '" . $_REQUEST['experience'] . "',about_doctor = '" . $_REQUEST['about_doctor'] . "',    password = '" . $_REQUEST['password'] . "',  date_added = NOW() WHERE doctor_id = '" . (int)$doctor_id . "'" ) or die ($db->error.__LINE__);
     if($address_id!='')
      {
		     $db->query("UPDATE oc_address SET customer_id = '" . (int)$doctor_id . "', firstname = '" . $_REQUEST['firstname'] . "', lastname = '" . $_REQUEST['lastname'] . "', company = '" . $_REQUEST['company'] . "', address_1 = '" . $_REQUEST['address_1'] . "', address_2 = '" . $_REQUEST['address_2'] . "', city = '" . $_REQUEST['city'] . "', postcode = '" . $_REQUEST['postcode'] . "', country_id = '" . (int)$_REQUEST['country_id'] . "' WHERE address_id = '" . (int)$address_id . "'") or die ($db->error.__LINE__);
		     
      }
      else
       {
		       $db->query("INSERT INTO oc_address SET customer_id = '" . (int)$doctor_id . "', firstname = '" . $_REQUEST['firstname'] . "', lastname = '" . $_REQUEST['lastname'] . "', company = '" . $_REQUEST['company'] . "', address_1 = '" . $_REQUEST['address_1'] . "', address_2 = '" . $_REQUEST['address_2'] . "', city = '" . $_REQUEST['city'] . "', postcode = '" . $_REQUEST['postcode'] . "', country_id = '" . (int)$_REQUEST['country_id'] . "', zone_id = '" . (int)$_REQUEST['zone_id'] . "'") or die ($db->error.__LINE__);
		       $address_id = $db->insert_id;
		     }
	    	  $db->query("UPDATE doctor SET address_id = '" . (int)$address_id . "' WHERE doctor_id = '" . (int)$doctor_id . "'")or die ($db->error.__LINE__);

     	  echo '<script>alert("Updated")</script>';

           if(!empty($_FILES['photo']['name'])){
            //replace image      
            $id = isset($_GET['id'])?$_GET['id']:0;
            $sql = "select * from doctor where doctor_id = $doctor_id";
            $data = mysqli_query($db,$sql);
            $num = mysqli_num_rows($data);
            if($num>0){
             $row = mysqli_fetch_assoc($data);
             $photo = $row['photo'];
             $path = "../../doctor-images/".$photo;
             if(unlink($path)){
               $name = $_FILES['photo']['name'];
              $photo= time().substr($name,strlen($name)-4,4);
              $path = "../../doctor-images/".$photo;
              $old_path = $_FILES['photo']['tmp_name'];
                if(move_uploaded_file($old_path,$path)){
                  $sql = "update doctor set photo = \"$photo\" where doctor_id = $doctor_id";
                  if(mysqli_query($db,$sql)){
                      ?>
                        <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Success !</strong>  Image Successfully replaced..
                        </div>
                <?php
                  }
                }
             }else {
                $name = $_FILES['photo']['name'];
                $photo= time().substr($name,strlen($name)-4,4);
                $path = "../../doctor-images/".$photo;
                $old_path = $_FILES['photo']['tmp_name'];
                  if(move_uploaded_file($old_path,$path)){
                    $sql = "update doctor set photo = \"$photo\" where doctor_id = $doctor_id";
                    if(mysqli_query($db,$sql)){
                        ?>
                          <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Success !</strong>  Image Successfully Added..
                          </div>
                  <?php
                    }
                  }
             }
            }
           }else{
            //keep as it
           }
        // echo '<script>window.location.assign("admin/doctors/doctor.php")</script>';
     // }//end required field validation else statement.   

 
}
elseif(isset($_REQUEST['edit']))
{
$doctor_id=$_REQUEST['id'];
$company='';
$sql_ed="SELECT * FROM `doctor` WHERE `doctor_id`='$doctor_id'";
$res_ed=$db->query($sql_ed) or die($db->error.__LINE__);
$row_ed=$res_ed->fetch_assoc();

$doctor_id=$row_ed['doctor_id']; $doctor_group_id=$row_ed['doctor_group_id'];
$photo = $row_ed['photo'];


$firstname=$row_ed['firstname']; $lastname=$row_ed['lastname']; $email=$row_ed['email'];
$mobile=$row_ed['mobile'];  $password=$row_ed['password'];
$department=$row_ed['department'];  $degree=$row_ed['degree'];
$about_doctor=$row_ed['about_doctor'];  
$experience=$row_ed['experience'];  
$address_id=$row_ed['address_id']; $status=$row_ed['status'];
$approved=$row_ed['approved']; $date_added=$row_ed['date_added']; 


$sql_ad="SELECT * FROM `oc_address` WHERE `address_id`='$address_id'";

$res_ad=$db->query($sql_ad) or die($db->error.__LINE__);
$row_ad=$res_ad->fetch_assoc();
$address_id=$row_ad['address_id']; $company=$row_ad['company'];
$address_1=$row_ad['address_1'];$address_2=$row_ad['address_2'];
$city=$row_ad['city'];$postcode=$row_ad['postcode'];$country_id=$row_ad['country_id'];
$zone_id=$row_ad['zone_id'];

 
	//$histories=array();
// $histories=(array)null;
	
 
	
	
	//$ips=array();
// $ips=(array)null;
 
	
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
       
        <button type="submit" form="form-customer" data-toggle="tooltip" title="Update" name="update-doctor" class="btn btn-primary"><i class="fa fa-save"></i></button>
        
        <a href="<?php echo $base_path;?>admin/doctors/doctor" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>doctors</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/doctors/doctor-edit?edit&id=<?php echo $doctor_id;?>">doctors</a></li>
              </ul>
    </div>
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
             <div class="col-md-3">
               <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit doctor</h3>
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
                 <!--<button type="submit" form="form-doctor" data-toggle="tooltip" title="Update" name="update-doctor" class="btn btn-primary"><i class="fa fa-save"></i></button>-->
                  </div>
                </div>
               </div>
               
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
                    <li><a href="#tab-address" data-toggle="tab">Address</a></li>
                     
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-general">
                        <div class="form-group">
                        	<label class="col-sm-2 control-label" for="input-doctor-group">doctor Group</label>
                            <div class="col-sm-10">
                                <select name="doctor_group_id" id="input-doctor-group" class="form-control">
                                <?php
                                $sql_cg="SELECT * FROM `doctor_group_description`";
                                $res_cg=$db->query($sql_cg) or die($db->error.__LINE__);
                                while($row_cg=$res_cg->fetch_assoc()){
                                ?>
                                	<option value="<?php echo $row_cg['doctor_group_id']; ?>" <?php if($doctor_group_id== $row_cg['doctor_group_id']) { echo 'selected';}?>><?php echo $row_cg['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                            <div class="col-sm-10">
                            <input type="text" name="firstname" value="<?php echo $firstname;?>" placeholder="First Name" id="input-firstname" class="form-control" required />
                            <input type="hidden" name="cust_id" value="<?php echo $doctor_id;?>"  class="form-control" />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                            <div class="col-sm-10">
                            <input type="text" name="lastname" value="<?php echo $lastname;?>" placeholder="Last Name" id="input-lastname" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="control-label col-sm-2" for="photo">Upload Photo:</label>
                      
                            <div class="col-sm-5"> 

                            <input type="file" class="form-control" id="photo" name="photo" value="<?=$photo?>" >
                                <small>Choosing new image will replace old image </small>

                            </div>
                            <div class="col-sm-5"> 

                            <a target="_blank" href="<?php $base_path;?>doctor-images/<?php echo $row_ed['photo'];?>"> <img style="width:10%" src="<?php $base_path;?>doctor-images/<?php echo $row_ed['photo'];?>" alt="not "><?=$photo?> </a>

                            </div>

                            </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                            <div class="col-sm-10">
                            <input type="text" name="email" value="<?php echo $email;?>" placeholder="E-Mail" id="input-email" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-mobile">Mobile</label>
                            <div class="col-sm-10">
                            <input type="text" name="mobile" value="<?php echo $mobile;?>" placeholder="mobile" id="input-mobile" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-degree">Education</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="degree" value="<?php echo $degree;?>" placeholder="MBBS,DCH etc" id="input-degree" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-department">Department</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="department" value="<?php echo $department;?>" placeholder="department" id="input-department" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-experience">Experience</label>
                                    <div class="col-sm-10">
                                    <input type="number" max="99" name="experience" value="<?php echo $experience;?>" placeholder="experience" id="input-experience" class="form-control" />
                                    </div>
                                </div>

                        <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-description1">About Doctor</label>
                                    <div class="col-sm-10">
                                    <div class="input-group w-100" style="width: 100%;">
                                        <textarea name="about_doctor"  rows="5" placeholder="Description" id="input-description1" class="form-control w-100"><?php echo $about_doctor;?></textarea>
                                    </div>
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
                            	<input type="text" name="password" value="<?php echo $password;?>" placeholder="Password" id="input-password" class="form-control" autocomplete="off"/>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-newsletter">Newsletter</label>
                            <div class="col-sm-10">
                                <select name="newsletter" id="input-newsletter" class="form-control">
                                    <option value="1"  <?php if($newsletter=='1'){?>selected="selected"<?php }?>>Enabled</option>
                                    <option value="0" <?php if($newsletter=='0'){?>selected="selected"<?php }?>>Disabled</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-status">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="input-status" class="form-control">
                                <option value="1" <?php if($status=='1'){?>selected="selected"<?php }?>>Enabled</option>
                                <option value="0" <?php if($status=='0'){?>selected="selected"<?php }?>>Disabled</option>
                                <option value="2" <?php if($status=='2'){?>selected="selected"<?php }?>>Rejected</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-safe">Safe</label>
                            <div class="col-sm-10">
                                <select name="safe" id="input-safe" class="form-control">
                                <option value="1" <?php if($safe=='1'){?>selected="selected"<?php }?>>Enabled</option>
                                <option value="0" <?php if($safe=='0'){?>selected="selected"<?php }?>>Disabled</option>
                                </select>
                            </div>
                        </div> -->
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
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-city">City</label>
                            <div class="col-sm-10">
                            <input type="text" name="city" value="<?php echo $city;?>" placeholder="City" id="input-city" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-postcode">Postcode</label>
                            <div class="col-sm-10">
                            <input type="text" name="postcode" value="<?php echo $postcode;?>" placeholder="Postcode" id="input-postcode" class="form-control"  />
                            </div>
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-zone1">Region / State</label>
                            <div class="col-sm-10">
                                <select name="zone_id" id="input-zone" class="form-control">
                                <option value="">select</option>
                                </select>
                            </div>
                        </div>
                    </div>
             
                </div>
            </form>
        </div>
    </div>
</div>
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
  
  
<script type="text/javascript">

$(document).ready(function(){
$("#input-zone").val('<?php echo $zone_id;?>').prop('selected',true);
country();
});

	



</script></div>
<?php include('../includes/footer.php');?></div>
</body>
</html>