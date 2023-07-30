<?php
error_reporting(0);
include('config.php');
if(isset($_SESSION['admin_id']))
{
  ?>
  <script>window.location.replace('access.php');</script>
  <?php
}
$errMSG = "";
if(isset($_POST['submit']))
{
	 $uname = trim(addslashes(mysqli_real_escape_string($db,$_REQUEST["username"])));
	 $pass = trim(addslashes(mysqli_real_escape_string($db,$_REQUEST["password"]))); 
	
		$sql = "SELECT * FROM `oc_user` where username = '$uname'";
		$usernameRS = $db->query($sql) or die($db->error.__LINE__);
		if($usernameRS->num_rows > 0) 
		{ 
			// user exist
			$sql = "SELECT * FROM oc_user where username = '$uname' AND password = '".$pass."'";
			$result = $db->query($sql) or die($db->error.__LINE__);
			$userRS = $result->fetch_assoc();
			if($result->num_rows > 0) 
			{
				// user exist 
				// now check if the status of the user
				if ($userRS["status"] == 1)
				{
					$_SESSION["admin_name"] = $userRS["username"];
					//$_SESSION['user_type'] = $userRS['user_type'];
					$_SESSION['admin_id'] = $userRS['user_id'];
					echo '<script type="text/javascript">window.location = "access.php";</script>';
				}
			}else
			{
				$errMSG = "<div class='alert alert-info'><span class='fa fa-info-circle'></span> Sorry! Either the username or the password mismatch.</div>";
			}
		}
		else
		{
			// user exist but the status is inactive
			$errMSG = "<div class='alert alert-danger'><span class='fa fa-info-circle'></span> Sorry! No user with such name exist.</div>";
		}
} 
$pg_title = "Admin Login";
include('includes/head-js-css.php');
/* Get compay feeld */
$sql = "select * from oc_master_company";
$data = mysqli_query($db,$sql);
$num = mysqli_num_rows($data);
 if($num>0)
 {
  $company = mysqli_fetch_assoc($data);
 }
?>
<body>
<div id="container">
<div id="content">
  <div class="container-fluid"><br />
    <br />
    <!--<img src="<?//=$base_path;?><?//=isset($company) && $company['logo']!=''?'admin/uploads/logo/'.$company['logo']:'admin/images/logo.png'?>"" alt="Sohum Spices" title="Sohum Spices" height="60px;" style="margin: auto !important;display: block;
    margin-bottom: 10px !important" />-->
    
    <!-- <img src="<?=$base_path;?><?=isset($company) && $company['logo']!=''?'admin/uploads/logo/'.$company['logo']:''?>"" alt="Sohum Spices" title="Sohum Spices" height="60px;" style="margin: auto !important;display: block;
    margin-bottom: 10px !important" /> -->
    <h1 class=" logo me-auto  d-inline-block"><a href="index.php" class="bg-dark justify-content-center text-center d-flex" >DR SWAPNIL PATNOORKAR</a></h1>
    
    <div class="row">
      <div class="col-sm-offset-4 col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="panel-title text-center"><i class="fa fa-lock pull-left"></i> ADMIN PANEL LOGIN</h1>
          </div>
          <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <?=isset($errMSG)?$errMSG:''?>
              </div>
              <div class="form-group">
                <label for="input-username">Username</label>
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" name="username" value="" placeholder="Username" id="input-username" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label for="input-password">Password</label>
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                </div>
              </div>
              <div class="text-right">
                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-key"></i> Login</button>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php')?>