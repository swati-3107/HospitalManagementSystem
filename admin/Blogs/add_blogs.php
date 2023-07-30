<?php

//   session_start(); 

  include('../config.php');

  $pg_title = "Add New Gallery Images";

  include('../includes/head-js-css.php');

?>
<link href="<?php echo $base_path;?>admin/view/javascript/summernote/summernote.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $base_path;?>admin/view/javascript/summernote/summernote.js"></script>

<body>

  <div id="container">

     <?php include('../includes/header.php');

     include('../includes/left-menu.php');

     ?>

     <div id="content">

        <div class="page-header">

           <div class="container-fluid">

              <div class="pull-right"><a href="<?php echo $base_path;?>admin/Blogs/blogs.php" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>

              <h1>Feedback</h1>

              <ul class="breadcrumb">

                 <li><a href="<?php echo $base_path;?>admin/access.php">Home</a></li>

                 <li><a href="<?php echo $base_path;?>admin/Blogs/blogs.php">Blogs/News Update</a></li>

              </ul>

          </div>

        </div>

        

        <div class="container-fluid">

           <div class="panel panel-default">

              <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo 'Add';}?>Blogs/News Update</h3></div>

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

                             $sql  = "INSERT INTO `news_update` (`id`, `gallery_image`, `facility_name`, `facility_details`,`more_facility_details`,`date_added`)

                             VALUES (NULL, \"$gallery_image\", \"$facility_name\", \"$facility_details\",\"$more_facility_details\",CURRENT_TIMESTAMP)";

                             $res = mysqli_query($db,$sql) or die(mysqli_error($db));

                             if($res)

                             {?>

                                <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                   <strong>Success !</strong>  Patient Feedback Successfully added to website.

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

                       <label class="control-label col-sm-2" for="image_caption">Name:</label>

                       <div class="col-sm-10">

                         <input type="text" class="form-control" name="facility_name" id="name" placeholder="name" >

                       </div>   

                    </div>

                    <div class="form-group">

                       <label class="control-label col-sm-2" for="gallery_image"> Image:</label>

                       <div class="col-sm-10"> 

                         <input type="file" class="form-control" id="gallery_image" name="gallery_image"> 

                       </div>

                    </div>

                    <div class="form-group">

                       <label class="control-label col-sm-2" for="description">Blog_details:</label>

                       <div class="col-sm-10">

                          <textarea type="text" class="form-control" rows="7" name="facility_details" id="facility" placeholder="facility"  ></textarea>

                       </div>   

                    </div>
                    <div class="form-group">

                       <label class="control-label col-sm-2" for="description">more_blog_details:</label>

                       <div class="col-sm-10">

                          <textarea type="text" class="form-control" rows="7" name="more_facility_details" id="more_facility" placeholder="facility"  ></textarea>

                       </div>   

                    </div>

                      

                    </div>
					 
					 

       </select>

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

     

    <?php include('../includes/footer.php');?>

    <script type="text/javascript">

      //$('#description').summernote({height: 300});

    </script>
    <script type="text/javascript">

$('#facility').summernote({height: 100,});

</script>
    </script>
    <script type="text/javascript">

$('#more_facility').summernote({height: 300,});

</script>
    
<!-- <script>
      $('#facility').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script> -->

</body>

</html>