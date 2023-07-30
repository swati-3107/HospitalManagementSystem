<?php
include('../config.php');
$pg_title = "Google analytics information";
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
        <h1>Google analytics</h1>
      <div class="pull-right">
      
      
      <ul class="breadcrumb">
                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/google/analytics">Google analytics</a></li>
              </ul>
    </div>
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo '';}?> Google analytics Information</h3>
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

 
//check info already exist

$sql = "select * from google_analytics";
 
$data = mysqli_query($db,$sql);
 
$num = mysqli_num_rows($data); 
 if($num>0)
 {
    
   $sql = "update google_analytics set
   code=\"$code\"
   ";
    

    
    //extract(mysqli_fetch_assos($data));
 }else{
 
   $sql = "INSERT INTO `google_analytics`
  (`id`, `code`)
  VALUES (NULL, \"$code\");";
   
    
 }
  
               
                  
 $res = mysqli_query($db,$sql) or die(mysqli_error($db));
 
 if($res)
 {
   ?>
     <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <strong>Success !</strong>  Google analytics information updated.
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
    
    $sql = "select * from google_analytics";
 
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
    
  <!--
  
  
  -->
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="code" >Code:</label>
    <div class="col-sm-10"> 
      <textarea name="code" class="form-control" id="code" rows="10" placeholder="Copy Google analytic code here"><?=isset($code)?stripslashes($code):''?></textarea>
    </div>
  </div

  
  

  
  

  
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="add">
        <span class="fa fa-send"></span>
        Submit
      </button>
    </div>
  </div>
</form>       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
<!--- HTML form end ---> 
      </div>
    </div>
</div>

</div>
<?php include('../includes/footer.php');?>
</body>
</html> 