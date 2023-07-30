<?php
if(!isset($_SESSION['admin_id']))
{
  echo 'No direct access allowed <br>';
  echo "<a href='".$base_path."admin/'>Click here to login</a>";
  die();
}
include("functions.php");


//Fetching Company Details
/* Get compay feeld */
$sql = "select * from oc_master_company";
$data = mysqli_query($db,$sql);
$num = mysqli_num_rows($data);
 if($num>0)
 {
  $company = mysqli_fetch_assoc($data);
 }
?>
<header id="header" class="navbar navbar-static-top">
  <div class="navbar-header">
        <a type="button" id="button-menu" class="pull-left"><i class="fa fa-indent fa-lg"></i></a>
        <!-- <a href="<?=$base_path?>admin" class="navbar-brand" style="color:#373A3A; font-size:22px ; font-weight: 100;"> -->
        <!-- <h2 class="">DR MAYURA KALE</h2> -->
            <!-- <img src="<?=$base_path;?><?=isset($company) && $company['logo']!=''?'admin/uploads/logo/'.$company['logo']:'admin/images/logo.png'?>"  title="<?=$base_path?>admin" style="float: left;height: 25px;margin-right: 10px;" /> -->
            <!-- <?=isset($company) && $company['company_name']!=''?strtoupper($company['company_name']):'Master Admin Panel'?> -->
        </a>
  </div>
    <ul class="nav pull-right">
   
    
     <li>
       <a href="#">
        <i class="fa fa-user fa-lg text-success"></i>  <?=ucfirst($_SESSION['admin_name'])?> 
       </a>
    </li>
    <li><a href="<?php echo $base_path;?>admin/logout"><span class="hidden-xs hidden-sm hidden-md">Logout</span> <i class="fa fa-sign-out fa-lg"></i></a></li>
  </ul>
  </header>