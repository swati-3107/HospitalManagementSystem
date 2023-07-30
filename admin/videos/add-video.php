<?php

include('../config.php');
$pg_title = "Add New Video";
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
      
        <a href="<?php echo $base_path;?>admin/videos/videos.php" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Video</h1>
      <ul class="breadcrumb">
         <li><a href="<?php echo $base_path;?>admin/access.php">Home</a></li>
         <li><a href="<?php echo $base_path;?>admin/videos/videos.php">Videos</a></li>
       </ul>
    </div>
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo 'Add';}?>  Videos</h3>
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
                  
                  
                   //print_r($_POST);  
                 extract($post);
                 
                 //Array ( [video_title] => test [video_description_] => vbgn [video_embed_code] => vbnmbnmbnm [add] => ) 
                 
                 $sql  = "INSERT INTO `videos`
                 (`id`, `video_title`, `video_description`, `video_date`, `video_embed_code`) VALUES
                 (NULL, \"$video_title\", \"$video_description\", CURRENT_TIMESTAMP, \"$video_embed_code\")";

                 
                 $res = mysqli_query($db,$sql);
                 
                 
                 
                     if($res)
                     {
                       ?>
                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong>Success !</strong>  New Video Successfully added to website.
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
    
    
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="video_title">Video Caption:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="video_title" id="video_title" placeholder="Enter Video title" >
    </div>
  </div>
  
    <div class="form-group">
    <label class="control-label col-sm-2" for="video_description">Description:</label>
    <div class="col-sm-10"> 
      <textarea class="form-control" id="video_description " name="video_description" rows="6" placeholder="Short description about video"></textarea>
    </div>
  </div>

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="video_embed_code">Video Embed Code:</label>
    <div class="col-sm-10"> 
      <textarea class="form-control" id="video_embed_code" name="video_embed_code" rows="6" placeholder="Copy Youtube embed code here"></textarea>
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