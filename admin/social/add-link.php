<?php

include('../config.php');
$pg_title = "Add New Link";
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
      
        <a href="<?php echo $base_path;?>admin/menus/menu" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Link</h1>
      <ul class="breadcrumb">
         <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
         <li><a href="<?php echo $base_path;?>admin/social/links">Links</a></li>
       </ul>
    </div>
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo 'Add';}?>  Links</h3>
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
                    
                    $sql  = "INSERT INTO `social_links` (`id`, `name`, `link`, `icon`)
                    VALUES (NULL, \"$name\", \"$link\", \"$icon\")";

                    $res = mysqli_query($db,$sql);
                    
                    if($res)
                     {
                       ?>
                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong>Success !</strong>  New Social Link Successfully added to website.
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
   <label class="control-label col-sm-2" for="name">Social media name:</label>
   <div class="col-sm-10">
     <input type="text" name="name" class="form-control" required placeholder="Social Media name">
   </div>
  </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="icon">Choose Icon:</label>
    <div class="col-sm-10">
      <select name="icon" class="form-control" id="icon" style="font-family: 'FontAwesome',sans-serif;font-size: 16px;">
            <option value="bx bxl-facebook">&#xf082;  Facebook</option>
            <option value="bx bxl-twitter">&#xf081; Twitter</option>
            <option value="bx bxl-google-plus">&#xf0d4;  Google+</option>
            <option value="bx bxl-instagram">&#xf16d;  Instagram</option>
            <option value="bx bxl-pinterest">&#xf0d3;  Pinterest</option>
            <option value="bx bxl-linkedin">&#xf0e1;  Linkedin</option>
            <option value="bx bxl-whatsapp" class="bx">&#xf232;  Whatsapp</option>
            <option value="bx bxl-youtube" class="bx">&#xf166;  Youtube</option>
     </select>
     
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="link">Website Link:</label>
    <div class="col-sm-10">
      <input type="url" class="form-control" name="link" id="link" placeholder="Enter Link Link" >
    </div>
  </div>

 <!--
 
 //name
 
 link
 
 main_id	sub_name	sub_link

 -->


  
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