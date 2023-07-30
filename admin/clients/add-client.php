<?php
session_start(); 
include('../config.php');
$pg_title = "Add New Client";
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

     
        <a href="<?php echo $base_path;?>admin/clients/clients" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>

      <h1>Client</h1>

      <ul class="breadcrumb">

                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>

                <li><a href="<?php echo $base_path;?>admin/clients/add-client">Client</a></li>

              </ul>
    </div>

  </div>

<div class="container-fluid">

    <div class="panel panel-default">

      <div class="panel-heading">

        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo 'Add';}?> Client</h3>

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
                 $name = $_FILES['logo']['name'];
                 $logo= time().substr($name,strlen($name)-4,4);
                 $path = "../../client_logo/".$logo;
                 $old_path = $_FILES['logo']['tmp_name'];

                   if(move_uploaded_file($old_path,$path))
                   {

                     extract($post);

                    $sql  = "INSERT INTO `old_clients` (`id`, `client_name`, `website_link`, `logo`, `information`, `date_added`)
                    VALUES (NULL, \"$client_name\", \"$website_link\", \"$logo\", \"$information\", CURRENT_TIMESTAMP)";

                    $res = mysqli_query($db,$sql);

                     if($res)
                     {

                       ?>

                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                           <strong>Success !</strong>   Client  Successfully added to website.

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
    <label class="control-label col-sm-2" for="client_name">Client Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Client Name" >
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="website_link">Website Link:</label>
    <div class="col-sm-10">
      <input type="url" class="form-control" name="website_link" id="website_link" placeholder="Website link" >
    </div>
  </div>


  <div class="form-group">

    <label class="control-label col-sm-2" for="logo">Upload Logo:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="logo" name="logo">
    </div>

  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="information">Information:</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="information" id="information" placeholder="Information" rows="6"></textarea>
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

$('#information').summernote({height: 300});

//--></script>

</body>

</html> 