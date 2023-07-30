<?php
include('../../admin/config.php');



if($_SESSION['role']=='staff')
{
 echo "<h1>You dont have access to this page</h1>";
 die();
}

$pg_title = "Customer information";
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
        
      <div class="pull-left">
            <h1>Add new User</h1>
            <ul class="breadcrumb">
              <li><a href="<?php echo $base_path;?>store/access">Home</a></li>
              <li><a href="<?php echo $base_path;?>store/users/users-list">Users List</a></li>
            </ul>
      </div>
      
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Add new User</h3>
      </div>
      <div class="panel-body">
<!-- HTML forms startes from here ---------------------->        
 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    
    
 <div class="col-md-10 col-md-offset-2" style="padding: 0px;">
<?php        
// form action
                
if(isset($_POST['add']))
{
            
 $post = mysqli_escape_array($db,$_POST);
 extract($post);

 /*
[name] => Ganesh
    [mobile] => 9049207674
    [email] => admin@gmail.com
    [address] => asdf
    [password] => 123
*/
 //Check if user is already exist
 $uid = $_SESSION['admin_id'];
 
 
 
 $sql = "select * from oc_user where email=\"$email\" and user_id=\"$uid\"";
 $data = mysqli_query($db,$sql);
 $num = mysqli_num_rows($data);
 
 if($num>0)
 {
    ?>
    <div class="alert alert-danger">
        User already exist please try with another email.
    </div>
    <?php
 }else
 {
    //User is not present
    
    
 
 $sql  = "INSERT INTO `oc_user` (`user_id`, `name`, `email`, `mobile`, `role`, `password`, `store_id`) VALUES
(NULL, \"$name\", \"$email\", \"$mobile\", \"$role\", \"$password\", \"$uid\")";

 
 $res = mysqli_query($db,$sql);
 
 if($res)
 {
   ?>
     <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <strong>Success !</strong>  New user added successfully.
     </div>
   <?php
 }else{
   
   ?>
   <div class="alert alert-danger">
       Something went wrong please try again.
       <?php print_r($db);?>
   </div>
   <?php
 }
    
    
    
    
    
 }
 
 
 
 
 
 
}
        
?>        
               
                        
                        
                        
        </div> 
    
  <!--
  	id	name	mobile	email	address	timestamp

  
  -->
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="name"> Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="name" placeholder=" Name" required>
    </div>
  </div>
  
     
  <div class="form-group">
    <label class="control-label col-sm-2" for="mobile"> Mobile:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"> Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
      <span>Email will used to login so enter email carefully</span>
    </div>
  </div>
  
  
<div class="form-group">
    <label class="control-label col-sm-2" for="password"> Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" min="4" required>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="role"> User Type:</label>
    <div class="col-sm-10">
      <label class="radio-inline"><input type="radio" name="role" value="staff" checked>Staff</label>
      <label class="radio-inline"><input type="radio" name="role" value="admin">Admin</label>
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
  <script type="text/javascript">
$('#description').summernote({height: 300});
//--></script>
</body>
</html> 