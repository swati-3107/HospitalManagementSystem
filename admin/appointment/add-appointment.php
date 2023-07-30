<?php

// session_start(); 

include('../config.php');

$pg_title = "Add New Appointment";

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

     
        <a href="<?php echo $base_path;?>admin/appointment/appointment.php" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>

      <h1>Appointment</h1>

      <ul class="breadcrumb">

                <li><a href="<?php echo $base_path;?>admin/access.php">Home</a></li>

                <li><a href="<?php echo $base_path;?>admin/appointment/appointment.php">Appointment</a></li>

              </ul>

    </div>

  </div>

<div class="container-fluid">

    <div class="panel panel-default">

      <div class="panel-heading">

        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if(isset($_REQUEST['edit'])){echo 'Edit';}else{echo 'Add';}?> Appointment</h3>

      </div>

      <div class="panel-body">

<!-- HTML forms startes from here ---------------------->        

 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="col-md-10 col-md-offset-2" style="padding: 0px;">
          <?php        
                if(isset($_POST['add']))
                {
                   
                   
                    
                   $post = mysqli_escape_array($db,$_POST);
                   extract($post);
                   $sql  = "INSERT INTO `appointment` (`id`, `name`, `mobile`, `email`, `appointment_for`, `appointment_date`,`appointment_time`)
                   VALUES (NULL, \"$name\", \"$mobile\", \"$email\", \"$appointment_for\", \"$appointment_date\", \"$appointment_time\")";
                   $res = mysqli_query($db,$sql);
                   if($res)
                   {
                     ?>
                     <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success !</strong>   Appointment Successfully added to website.
                     </div>
                     <?php
                   }
                }
          ?>        
        </div> 

   
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="name" placeholder="Name" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="mobile">Mobile:</label>
    <div class="col-sm-10">
      <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile" >
    </div>
  </div>
 
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Appointment For:</label>
    <div class="col-sm-10">
       <select name="appointment_for" class="form-control">
          
          <?php

          $doctors_sql = "select * from doctor";
          
          $data_doctor = mysqli_query($db,$doctors_sql);
          $num_doctor = mysqli_num_rows($data_doctor);
        
          for ($i=0; $i <$num_doctor ; $i++) { 
            $doctors_row = mysqli_fetch_assoc($data_doctor);
            extract($doctors_row);
              
            ?>
            <option value="<?=$doctor_id?>"> <?=$firstname?> <?=$lastname?> </option>
            <?php
          }
          ?>
          
       </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="date">Appointment Date:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="appointment_date" id="date" placeholder="Appointment Date" >
    </div>
  </div>
 
  <div class="form-group">
    <label class="control-label col-sm-2" for="time">Appointment Time:</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" name="appointment_time" id="time" placeholder="Appointment Time" >
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