<?php
include('../config.php');
$pg_title = "admin users";
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
      <div class="pull-right">
       <?php $path = isset($_GET['edit'])?$base_path.'admin/users/users-list?store&id='.$_GET['id']:$base_path.'admin/store/store-list'?>
       <a href="<?=$path?>" class="btn btn-default" title="<?=isset($_GET['edit'])?'User List':'Store List' ?>" data-toggle="tooltip">
        <span class="fa fa-mail-reply"></span>
       </a>
       
       <a href="<?=$base_path?>admin/users/add-user?storeid=<?=$_GET['id']?>" class="btn btn-primary" title="Add user" data-toggle="tooltip">
        <span class="fa fa-plus"></span>
       </a>
       
      </div>
      <h1>Store Users</h1>
      <ul class="breadcrumb">
        <li><a href="<?=$base_path;?>store/access">Home</a></li>
        <li><a href="<?=str_replace('.php','',$_SERVER['PHP_SELF']);?>?store&id=<?=$_GET['id']?>">Users List</a></li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
     <div class="panel panel-default">
   <?php

   if(isset($_GET['store']) && isset($_GET['id']))
   {
    ?>
       <div class="panel-heading">
        <?php
        if(isset($_GET['edit']))
        {
          ?>
          <h3 class="panel-title"><i class="fa fa-edit"></i>
            Edit user information
           </h3>
          <?php
        }else{
          ?>
          <h3 class="panel-title"><i class="fa fa-list"></i>
            Users List
           </h3>
          
          <?php
        }
        
        ?>
      </div>
      <div class="panel-body">
       <?php
       $sql ="SELECT * FROM `oc_user` where id=".$_GET['id'];
       $data = mysqli_query($db,$sql);
       $num = mysqli_num_rows($data);
       if($num>0)
       {
         $store_details = mysqli_fetch_assoc($data);
       }
       ?>
       <div class="alert alert-info">
        <span class="fa fa-info-circle"></span> Selcted store : <?=$store_details['store_name']?> (Address:<?=$store_details['store_address']?>)
       </div>
       
       
        <?php
        if(isset($_POST['update']))
        {
          //Safe dqata
          $post = mysqli_escape_array($db,$_POST);
          extract($post);
// update details

/*
[name] => AV KARMALKAR
[mobile] => 9049207674
[email] => orders@bigmarkretail.com
[password] => 123
[role] => admin
*/

 $sql = "update oc_user set name='$name',mobile='$mobile',email='$email',password='$password',role='$role' where id=".$_POST['id'];
$ret = mysqli_query($db,$sql) or die(mysqli_error($db));
if($ret)
{
 ?>
 <div class="alert alert-success">
  User information updated.....
 </div>
 <?php
}else{
  ?>
  <div class="alert alert-danger">
    Cant update user information.Please try again.
  </div>
  
  <?php
}

        }
       
        ?>
        
   <?php
        if(!isset($_GET['edit']))
        {
          ?>     
      <table  id="dataTables-example" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th> Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

$sql ="select * from oc_user where store_id=".$_GET['id'];
$data = mysqli_query($db,$sql);
$num = mysqli_num_rows($data);

if($num>0)
{
    for($i=1;$i<=$num;$i++)
    {
        $row = mysqli_fetch_assoc($data);
        extract($row);
        /*
          id
          name
          email
          mobile
          role
          password
          store_id
        */    
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$name?></td>
            <td><?=$email?></td>
            <td><?=$mobile?></td>
            <td><?=$role?></td>
            <td><?=$password?></td>
            <td>
              <a href="<?=str_replace('.php','',$_SERVER['PHP_SELF']);?>?store&id=<?=$_GET['id']?>&edit=<?=$id?>" class="btn btn-sm btn-primary">
                <span class="fa fa-edit"></span> 
              </a>
            </td>
        </tr>
        
        <?php
    }
}
            
            ?>
           
        </tbody>
      </table>
   <?php
        }else{
 //Fetch all data from oc_user using id
 $sql = "select * from oc_user where id=".$_GET['edit'];
 $data = mysqli_query($db,$sql);
 $row = mysqli_fetch_assoc($data);
 extract($row);
          //Edit form will here
          ?>
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="id" value="<?=(int)$_GET['edit']?>">
    
 <div class="col-md-10 col-md-offset-2 required"  style="padding: 0px; ">
      <div class="form-group">
    <label class="control-label col-sm-2" for="name"> Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="name" value="<?=$name?>" placeholder=" Name" required>
    </div>
  </div>
  
     
  <div class="form-group">
    <label class="control-label col-sm-2" for="mobile"> Mobile:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="mobile" value="<?=$mobile?>" id="mobile" placeholder="Mobile" required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"> Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" value="<?=$email?>" id="email" placeholder="Email" required>
      
    </div>
  </div>
  
  
<div class="form-group">
    <label class="control-label col-sm-2" for="password"> Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" value="<?=$password?>" id="password" placeholder="Password" min="4" required>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="role"> User Type:</label>
    <div class="col-sm-10">
      <label class="radio-inline"><input type="radio" name="role" value="staff" <?=$role=='staff'?"checked":''?>>Staff</label>
      <label class="radio-inline"><input type="radio" name="role" value="admin" <?=$role=='admin'?"checked":''?>>Admin</label>
    </div>
</div>  
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="update">
        <span class="fa fa-save"></span>
        Update</button>
    </div>
  </div>
       
      
      
      
      
      
      
      
      
      
      
      
 </form>       

        
<!--- HTML form end ---> 
      </div>    
          
          <?php
          
          
        }
   
   ?>
   
   
    
    
    <?php
    
   }else{
    ?>
    <div class="alert alert-warning" style="margin: 20px;">
     <p><span class="fa fa-info-circle"></span> Direct access to this page is  not allowed. Click below button to go back</p><br>
     <a href="<?=$base_path?>admin/store/store-list" class="btn btn-primary btn-sm">
      <span class="fa fa-mail-reply"></span> Back
     </a>
    </div>
    <?php
   }
   ?>
   
   
   
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

</body></html>