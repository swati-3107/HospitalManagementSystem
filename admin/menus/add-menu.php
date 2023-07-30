<?php
include('../config.php');
$pg_title = "Add New Menu";
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
      
        <a href="<?php echo $base_path;?>admin/videos/videos" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Menu</h1>
      <ul class="breadcrumb">
         <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>
         <li><a href="<?php echo $base_path;?>admin/videos/videos">Menu</a></li>
       </ul>
    </div>
  </div>
<div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo 'Add';}?>  Menu</h3>
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
                 
                 if($menu_level==1)
                 {
                  $has_parent="none";
                  $child_menu_name="none";
                 }elseif($menu_level==2)
                 {
                  $child_menu_name = $parent_menu;
                  $has_parent = $child_menu_name;
                  
                 }elseif($menu_level==3)
                 {
                  $child_menu_name = $child_menu;
                  $has_parent = $child_menu_name;
                 }
                 
                 $sql  = "INSERT INTO `menus`
                 (`id`, `menu_name`, `menu_link`, `menu_level`, `has_parent`, `child_menu_name`,`meta_tags`,`meta_description`,`title`)
                   VALUES (NULL, \"$menu_name\", \"$menu_link\", \"$menu_level\", \"$has_parent\",\"$child_menu_name\",\"$meta_tags\",\"$meta_description\",\"$title\")";

                 $res = mysqli_query($db,$sql);
                 
                     if($res)
                     {
                       ?>
                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong>Success !</strong>  New Menu Successfully added to website.
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
    <label class="control-label col-sm-2" for="menu_name">Menu Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="Enter Menu Name" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="menu_link">Menu Link:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="menu_link" id="menu_link" placeholder="Enter Menu URL" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="menu_level">Menu Type:</label>
    <div class="col-sm-10">
       <label class="radio-inline"><input type="radio" name="menu_level" checked id="menu_level" value="1" onchange="hideData(this);">Parent Menu</label>
       <label class="radio-inline"><input type="radio" name="menu_level" value="2" onchange="hideData(this);">Child Menu</label>
       <label class="radio-inline"><input type="radio" name="menu_level" value="3" onchange="hideData(this);">Grand Child Menu</label>
    </div>
  </div>
  
  <div class="form-group" id="parent" style="display: none">
    <label class="control-label col-sm-2">Choose Parent Menu</label>
    <div class="col-sm-10">
       <select name="parent_menu" class="form-control" >
           <?php
            $sql  = "SELECT * FROM `menus` WHERE `menu_level`=1";
            
            $data = mysqli_query($db,$sql);
            
            $num = mysqli_num_rows($data);
            
            if($num>0)
            {
             for($i=1;$i<=$num;$i++)
             {
              $row = mysqli_fetch_assoc($data);
              //print_r($row);
              extract($row);
              echo "<option value='$id'>$menu_name</option>";
             }
            }

           
           ?>
       </select>
    </div>
  </div> 
  
  <div class="form-group" id="child"  style="display: none">
    <label class="control-label col-sm-2">Choose Parent Menu</label>
    <div class="col-sm-10">
       <select name="child_menu" class="form-control">
           <?php
           $sql  = "SELECT * FROM `menus` WHERE `menu_level`=2";
            
            $data = mysqli_query($db,$sql);
            
            $num = mysqli_num_rows($data);
            
            if($num>0)
            {
             for($i=1;$i<=$num;$i++)
             {
              //print_r($row);
              $row = mysqli_fetch_assoc($data);
              extract($row);
              echo "<option value='$id'>$menu_name</option>";
             }
            }

           
           ?>

       </select>
    </div>
  </div> 
    
   <div class="form-group">
    <label class="control-label col-sm-2" for="title">Page title:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="title" placeholder="Page title" >
    </div>
  </div>
  
  

  
    
   <div class="form-group">
    <label class="control-label col-sm-2" for="meta_tags">Meta Tags:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="meta_tags" id="meta_tags" placeholder="Meta Tags" >
    </div>
  </div>
  
  
    <div class="form-group">
    <label class="control-label col-sm-2" for="meta_description">Description:</label>
    <div class="col-sm-10"> 
      <textarea class="form-control" id="meta_description " name="meta_description" rows="6" placeholder="Meta Description"></textarea>
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
  
<script>
 function hideData(radio)
 {
  if(radio.value=="1")
  {
   document.getElementById("parent").style.display = "none";
   document.getElementById("child").style.display = "none";
  }else if(radio.value=="2")
  {
   document.getElementById("parent").style.display = "block";
   document.getElementById("child").style.display = "none";
  }else
  {
   document.getElementById("parent").style.display = "none";
   document.getElementById("child").style.display = "block";
  }
 }
</script>
  
</body>
</html> 