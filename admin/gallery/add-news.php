<?php

//   session_start(); 

  include('../config.php');

  $pg_title = "Add New Gallery Images";

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

              <div class="pull-right"><a href="<?php echo $base_path;?>admin/gallery/news_gallery.php" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>

              <h1>Gallery</h1>

              <ul class="breadcrumb">

                 <li><a href="<?php echo $base_path;?>admin/access.php">Home</a></li>

                 <li><a href="<?php echo $base_path;?>admin/gallery/news_gallery.php">News Gallery</a></li>

              </ul>

          </div>

        </div>

        

        <div class="container-fluid">

           <div class="panel panel-default">

              <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo 'Add';}?> Gallery</h3></div>

              <div class="panel-body">

                 <!-- HTML forms startes from here -->        

                 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                    <div class="col-md-10 col-md-offset-2" style="padding: 0px;">

                       <?php        

                       if(isset($_POST['add']))

                       {

                          $post = mysqli_escape_array($db,$_POST);

                          $name = $_FILES['gallery_image']['name'];

                          $gallery_image= time().substr($name,strlen($name)-4,4);

                          $path = "../../gallery_images/".$gallery_image;

                          $old_path = $_FILES['gallery_image']['tmp_name'];

                          if(move_uploaded_file($old_path,$path))

                          {

                             extract($post);

                              $sql  = "INSERT INTO `news_gallery` (`id`, `gallery_image`, `image_caption`, `description`, `date_added`, `height`, `width`)

                              VALUES (NULL, \"$gallery_image\", \"$image_caption\", \"$description\", CURRENT_TIMESTAMP, \"$height\", \"$width\")";

                             $res = mysqli_query($db,$sql) or die(mysqli_error($db));

                             if($res)

                             {?>

                                <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                   <strong>Success !</strong>Gallery image Successfully added to website.

                                </div><?php

                             }else{

                               unlink($path);?>

                               <div class="alert alert-danger">Something went wrong please try again.</div><?php

                             }

                          }else{?>

                            <div class="alert alert-danger">Problem occured while uploading image.Please try again.</div><?php

                          }

                       }

                       ?>        

                    </div>

                    <div class="form-group">

                       <label class="control-label col-sm-2" for="image_caption">Image Caption:</label>

                       <div class="col-sm-10">

                         <input type="text" class="form-control" name="image_caption" id="image_caption" placeholder="Image Caption" >

                       </div>   

                    </div>

                    <div class="form-group">

                       <label class="control-label col-sm-2" for="gallery_image">Upload Image:</label>

                       <div class="col-sm-10"> 

                         <input type="file" class="form-control" id="gallery_image" name="gallery_image"> 

                       </div>

                    </div>

                    <div class="form-group">

                       <label class="control-label col-sm-2" for="description">Description:</label>

                       <div class="col-sm-10">

                          <textarea type="text" class="form-control" rows="7" name="description" id="description" placeholder="Image Description" ></textarea>

                       </div>   

                    </div>

                    <div class="form-group">

                       <label class="control-label col-sm-2" for="category">Image Category:</label>

                       <div class="col-sm-10">

                          <input type="text" class="form-control" name="category" id="category" placeholder="Image Category">

                       </div>   

                    </div>
                    <div class="form-group">

                       <label class="control-label col-sm-2" for="height">height</label>

                       <div class="col-sm-10">

                          <input type="text" class="form-control" name="height" id="height" placeholder="Image height">

                       </div>   

                    </div>
                    <div class="form-group">

                       <label class="control-label col-sm-2" for="width">width</label>

                       <div class="col-sm-10">

                          <input type="text" class="form-control" name="width" id="width" placeholder="Image width">

                       </div>   

                    </div>
					 
					 
					

                    <div class="form-group"> 

                       <div class="col-sm-offset-2 col-sm-10">

                          <button type="submit" class="btn btn-primary" name="add"><span class="fa fa-send"></span>Submit</button>

                          <button type="reset" class="btn btn-danger"><span class="fa fa-close"></span>Reset</button>

                       </div>

                    </div>

                 </form>       

                 <!--- HTML form end ---> 

             </div>

           </div>

        </div>

     </div>
     </div>
     

    <?php include('../includes/footer.php');?>

    <script type="text/javascript">

      //$('#description').summernote({height: 300});

    </script>

  
</body>

</html> 