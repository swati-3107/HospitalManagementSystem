<?php
include('../config.php');
$pg_title = "Add New Section";
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
        <h1>Add New Section</h1>
      <div class="pull-right">
      
      
      <ul class="breadcrumb">
                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php echo $base_path;?>admin/image-settings/add-new-section">Add New Section</a></li>
              </ul>
    </div>
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo '';}?> Add New Section Information</h3>
      </div>
      <div class="panel-body">
<!-- HTML forms startes from here ---------------------->        
 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
 <div class="col-md-10 col-md-offset-2" style="padding: 0px;">
         
        <?php        
// form action
                
                
                
                
                
if(isset($_POST['add']))
{

 extract($_POST);        
 $sql  = "INSERT INTO `image_config`
 (`id`, `section`, `width`, `height`)
 VALUES (NULL, \"$section\", \"$width\", \"$height\")";
                 
 $res = mysqli_query($db,$sql) or die(mysqli_error($db));
 
 if($res)
 {
   ?>
     <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <strong>Success !</strong>  Section information updated.
     </div>
   <?php
 }else{
   
   ?>
   <div class="alert alert-danger">
       Something went wrong please try again.
   </div>
   <?php
 }
                     
   
}
        
?>        
               
                        
                        
                        
        </div> 
    
  <!--
  
  
  -->
    
  <div class="form-group">
    <label class="control-label col-sm-3" for="section" >Section name:</label>
    <div class="col-sm-9"> 
      <input name="section" type="text" class="form-control" id="section"  placeholder="Section Name" autofocus required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="code" >Compressed Image Width:</label>
    <div class="col-sm-9"> 
      <input name="width" type="number" class="form-control" id="width"  placeholder="Compressed Image Width" required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="height" >Compressed Image Height:</label>
    <div class="col-sm-9"> 
      <input name="height" type="number" class="form-control" id="height" placeholder="Compressed Image Height" required>
    </div>
  </div>
  
  

  
  
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary" name="add">
        <span class="fa fa-plus"></span>
        Add     
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