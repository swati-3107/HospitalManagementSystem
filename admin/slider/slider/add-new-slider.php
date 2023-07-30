<?php
session_start(); 
include('../config.php');
$pg_title = "Add New Slider";
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
      <?php if(isset($_REQUEST['edit'])){?>
        <button type="submit" form="form-product" data-toggle="tooltip" title="Update" name="update_product" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <?php }else{?>
        <button type="submit" form="form-product" data-toggle="tooltip" title="Save" name="add_product" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <?php }?>
        <a href="<?php echo $base_path;?>admin/sliders/sliders" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Slider</h1>
      <ul class="breadcrumb">
         <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
         <li><a href="<?php echo $base_path;?>admin/slider/slider">Slider</a></li>
       </ul>
    </div>
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo 'Add';}?>  Slider</h3>
      </div>
      <div class="panel-body">
<!-- HTML forms startes from here ---------------------->        
 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    
    
        <div class="col-md-10 col-md-offset-2" style="padding: 0px;">
         
                        <?php        
                // form action
                
                if(isset($_POST['add']))
                {
                 
                 //print_r($_POST);
                 //Array ( [slider_caption] => [slider_date_from] =>
                 //[slider_date_to] => [slider_description] =>
                 
                 $post = mysqli_escape_array($db,$_POST);
                 
                 //Image upload action
                 
                 //Array ( [slider_image] => Array ( [name] => Chrysanthemum.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\php75DC.tmp [error] => 0 [size] => 879394 ) )
               
                 
                 
                 $name = $_FILES['slider_image']['name'];
                 
                 $slider_image= time().substr($name,strlen($name)-4,4);
                 
                 $path = "../../slider_images/".$slider_image;
                 $old_path = $_FILES['slider_image']['tmp_name'];
                 
                   if(move_uploaded_file($old_path,$path))
                   {
                     extract($post);
                     $sql  = "INSERT INTO `index_slider`
                     (`id`, `slider_caption`, `slider_date_from`, `slider_date_to`,  `slider_image`, `date_added`)
                     VALUES (NULL, \"$slider_caption\", \"$slider_date_from\", \"$slider_date_to\",  \"$slider_image\", CURRENT_TIMESTAMP)";
                     
                     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
                     
                     if($res)
                     {
                       ?>
                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong>Success !</strong>  New Slider Successfully added to website.
                         </div>
                       <?php
                     }else{
                       unlink($path);
                       ?>
                       <div class="alert alert-danger">
                           Something went wrong please try again.
                       </div>
                       <?php
                     }
                     
                     
                   }else{
                       ?>
                       <div class="alert alert-danger">
                           Problem occured while uploading image.Please try again.
                       </div>
                       <?php
                   }
                   
                 
                 
                 
                }
                
                
                
                       
               ?>        
               
                        
                        
                        
        </div> 
    
    
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="caption">Slider Caption:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="slider_caption" id="caption" placeholder="Enter slider caption" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="from">Slider date from:</label>
    <div class="col-sm-10"> 
      <input type="date" class="form-control" id="from" name="slider_date_from"> 
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="to">Slider date to:</label>
    <div class="col-sm-10"> 
      <input type="date" class="form-control" id="to" name="slider_date_to"> 
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="image">Upload Image:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="image" name="slider_image"> 
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