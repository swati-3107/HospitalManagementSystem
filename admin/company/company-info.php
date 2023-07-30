<?php
include('../config.php');
$pg_title = "Company information";
include('../includes/head-js-css.php');
?>
<body>
<div id="container">
<?php include('../includes/header.php');
include('../includes/left-menu.php');
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
        <h1>Company</h1>
      <div class="pull-right">
        <ul class="breadcrumb">
           <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
           <li><a href="<?php echo $base_path;?>admin/company/company-info">Company</a></li>
         </ul>
      </div>
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo '';}?> Company Information</h3>
      </div>
      <div class="panel-body">
<!-- HTML forms startes from here ---------------------->
 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
 <div class="col-md-10 col-md-offset-2" style="padding: 0px;">
        <?php
// form action
if(isset($_POST['add']))
{
 $del = false;//delete image
 $post = mysqli_escape_array($db,$_POST);
 extract($post);
//check info already exist
$sql = "select * from oc_master_company";
$data = mysqli_query($db,$sql);
$num = mysqli_num_rows($data);
 if($num>0)
 {
  $sql = "update oc_master_company set
   company_name=\"$company_name\",
   address1=\"$address1\",
   address2=\"$address2\",
   area=\"$area\",
   city=\"$city\",
   pincode=\"$pincode\",
   state=\"$state\",
   contact_person=\"$contact_person\",
   gstn=\"$gstn\",
   pan=\"$pan\",
   email=\"$email\",
   mobile=\"$mobile\",
   sms_url=\"$sms_url\",
   sms_username=\"$sms_username\",
   sms_password=\"$sms_password\",
   sms_sender_id=\"$sms_sender_id\",
   email_url=\"$email_url\",
   email_username=\"$email_username\",
   email_password=\"$email_password\",
   date_updated=CURRENT_TIMESTAMP
   ";
    //extract(mysqli_fetch_assos($data));
    
$sql = "select logo from oc_master_company limit 0,1";
$data = mysqli_query($db,$sql);
$num = mysqli_num_rows($data);
 if($num>0)
 {
  $row = mysqli_fetch_assoc($data);
  $old_logo = $row['logo'];
  $del = true;
 }
    
    
    
 }else{
   $sql = "INSERT INTO `oc_master_company`
  (`id`, `company_name`, `address1`, `address2`, `area`, `city`, `pincode`, `state`, `contact_person`, `email`,
  `mobile`, `gstn`, `pan`, `sms_url`, `sms_username`, `sms_password`, `sms_sender_id`, `email_url`, `email_username`,
  `email_password`, `date_updated`)
  VALUES (NULL, \"$company_name\", \"$address1 \", \"$address2\", \"$area \", \"$city \",
  \"$pincode\", \"$state \", \"$contact_person\", \"$email\", \"$mobile\",
  \"$gstn\", \"$pan\", \"$sms_url\", \"$sms_username\", \"$sms_password\", \"$sms_sender_id\", \"$email_url\",
  \"$email_username\", \"$email_password\", CURRENT_TIMESTAMP);";
 }
 $res = mysqli_query($db,$sql) or die(mysqli_error($db));
 if($res)
 {
  //Compress and update logo
  if($_FILES['logo']['name']!='')
  {
   //Update logo
   //Fetch Id
   
   extract(mysqli_fetch_assoc(mysqli_query($db,"select id from oc_master_company limit 0,1")));
   
   
   $image_path=$_FILES['logo']['tmp_name'];
   $save_image_path="../uploads/logo";
   $table_name="oc_master_company";
   $column_name="logo";
   $id_column_name="id";
   $id_column_value=$id;
   $resize=true;
   $section="admin_logo";
   $result = create_compressed_image($image_path,$save_image_path,$db,$table_name,$column_name,$id_column_name,$id_column_value,$resize,$section);
                      
  if($result)
   {
    if($del && !is_dir('../uploads/logo/'.$old_logo) && file_exists('../uploads/logo/'.$old_logo))
    {
     unlink('../uploads/logo/'.$old_logo);
    }
   }

  }
  
  
  
  
  
  
   ?>
     <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <strong>Success !</strong>  Company information updated.
     </div>
   <?php
 }else{
   ?>
   <div class="alert alert-danger">
       Something went wrong please try again.
   </div>
   <?php
 }
}else{
$sql = "select * from oc_master_company";
$data = mysqli_query($db,$sql);
$num = mysqli_num_rows($data);
 if($num>0)
 {
  $row = mysqli_fetch_assoc($data);
   extract($row);
 }
}
?>
        </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="company_name">Company Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter company name" value="<?=isset($company_name)?$company_name:''?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="logo">Company Logo:</label>
    <div class="col-sm-5">
      <input type="file" class="form-control-file" name="logo" id="logo" onchange="loadFile(event);">
      <script>
 function loadFile(event) {
    var output = document.getElementById('logo-perview');
    output.src = URL.createObjectURL(event.target.files[0]);
  }
</script>
    </div>
    <div class="col-sm-5">
      <?php
      if(isset($logo) && $logo!='')
      {
       ?>
        <img src="<?=$base_path?>admin/uploads/logo/<?=$logo?>" class="img img-thumbnail" style="height: 40px" id="logo-perview">
       <?php
      }else{
       ?>
       <img src="<?=$base_path?>admin/images/cache/no_image-100x100.png" class="img img-thumbnail" style="height: 40px" id="logo-perview">
       <?php
      }
      ?>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="address1" >Address1:</label>
    <div class="col-sm-10">
      <textarea name="address1" class="form-control" id="address1" rows="4" placeholder="Address1"><?=isset($address1)?$address1:''?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="address2">Address2:</label>
    <div class="col-sm-10">
      <textarea name="address2" class="form-control" id="address2" rows="4" placeholder="Address2"><?=isset($address2)?$address2:''?></textarea>
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="area">Area</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="area" name="area" placeholder="Area" value="<?=isset($area)?$area:''?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="city">City:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?=isset($city)?$city:''?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pincode" >Pincode:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?=isset($pincode)?$pincode:''?>">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="state" >State:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?=isset($state)?$state:''?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="contact_person" >Contact Person:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Peroson Name" value="<?=isset($contact_person)?$contact_person:''?>">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="mobile">Mobile Number:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="pincode" name="mobile" placeholder="Mobile Number" value="<?=isset($mobile)?$mobile:''?>">
    </div>
    </div>
     <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=isset($email)?$email:''?>">
    </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="gstn" >GST Number:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="gstn" name="gstn" placeholder="GST Number" value="<?=isset($gstn)?$gstn:''?>">
    </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gstn">PAN Number:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pan" name="pan" placeholder="PAN Card Number" value="<?=isset($pan)?$pan:''?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gstn">SMS Url:</label>
    <div class="col-sm-10">
      <input type="url" class="form-control" id="sms_url" name="sms_url" placeholder="SMS Url" value="<?=isset($sms_url)?$sms_url:''?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="sms_username">SMS Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sms_username" name="sms_username" placeholder="SMS Username" value="<?=isset($sms_username)?$sms_username:''?>">
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="sms_password">SMS Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="sms_password" name="sms_password" placeholder="SMS Password" value="<?=isset($sms_password)?$sms_password:''?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="sms_sender_id">SMS Sender ID:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sms_sender_id" name="sms_sender_id" placeholder="SMS Sender Id" value="<?=isset($sms_sender_id)?$sms_sender_id:''?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email_url">Email URL:</label>
    <div class="col-sm-10">
      <input type="url" class="form-control" id="email_url" name="email_url" placeholder="Email URL" value="<?=isset($email_url)?$email_url:''?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email_username">Email Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email_username" name="email_username" placeholder="Email Username" value="<?=isset($email_username)?$email_username:''?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email_password">Email Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="email_password" name="email_password" placeholder="Email Password" value="<?=isset($email_password)?$email_password:''?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="add">
        <span class="fa fa-send"></span>
        Submit</button>
      <button type="reset" class="btn btn-danger">
       <span class="fa fa-close"></span>
        Reset</button>
    </div>
  </div>
</form>
<!--- HTML form end --->
      </div>
    </div>
</div>
</div>
<?php include('../includes/footer.php');?>
  <script type="text/javascript"><!--
$('#description').summernote({height: 300});
//--></script>
</body>
</html>