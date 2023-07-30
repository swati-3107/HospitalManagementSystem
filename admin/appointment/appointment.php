<?php

// session_start();

 include('../config.php');

$pg_title = "Appointment List";

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

          <a href="<?php echo $base_path;?>admin/appointment/add-appointment.php" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a></div>

      <h1>Appointment List</h1>

      <ul class="breadcrumb">

                <li><a href="<?php echo $base_path;?>admin/access.php">Home</a></li>

                <li><a href="<?php echo $base_path;?>admin/appointment/appointment.php">Appointment List</a></li>

              </ul>

    </div>

  </div>

  <div class="container-fluid">

            <div class="panel panel-default">

      <div class="panel-heading">

        <h3 class="panel-title"><i class="fa fa-list"></i>

         <?php

         if(isset($_GET['edit']))

         {

          echo "Update Appointment";

         }elseif(isset($_GET['delete']))

         {

          echo "Delete Appointment";

         }else{

          echo "Appointment List";

         }

         
         ?>

        </h3>

      </div>

      <div class="panel-body">

       <?php

       if(!isset($_GET['edit']) && !isset($_GET['delete']))

       {

       ?>

        <form method="post" enctype="multipart/form-data" target="_blank" id="form-order">

         <div class="col-lg-12 col-xs-12 table-responsive">

            <table class="table  table-bordered table-hover" id="dataTables-example" style="width:100%;">

              <thead>

                <tr>

                  <td style="width: 1px;" class="text-center">

                    <input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" />

                  </td>

                  <td class="text-right text-info"> ID</td>
                  <td class="text-left text-info">Name</td>
                  <td class="text=left text-info">Email</td>
                  <td class="text-left text-info">Mobile</td>
                  <td class="text-left text-info">Appointment For</td>
                  <td class="text-left text-info">Appointment Date</td>
                  <td class="text-left text-info">Appointment Time</td>
                  <td class="text-left text-info">Added Date</td>
                  <td class="text-right text-info">Action</td>

                </tr>

              </thead>

              <tbody>

               <?php

               $sql  = 'SELECT * FROM `appointment`';

               $data = mysqli_query($db,$sql);

               $num = mysqli_num_rows($data);

               if($num>0)

               {

                 for($i=1;$i<=$num;$i++)

                 {

                  $row = mysqli_fetch_assoc($data);

                  $doctors_sql = "select firstname,lastname from doctor where doctor_id=".$row['appointment_for'];
                  $data_doctor = mysqli_query($db,$doctors_sql);
                  $doctors_row = mysqli_fetch_assoc($data_doctor);
                  echo $row['appointment_for'];
                  extract($doctors_row);
              
           
          
          
                 
                  ?>

                   <tr>

                       <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['id'];?>" />

                       <td class="text-right"><?php echo $row['id'];?></td>
                       <td class="text-left"><?php echo $row['name'];?></td>
                       <td class="text-left"><?php echo $row['email'];?> </td>
                       <td class="text-left"><?php echo $row['mobile'];?></td>
                       <td class="text-left"><?=$firstname?> <?=$lastname?></td>
                       <td class="text-left"><?php echo $row['appointment_date'];?></td>
                       <td class="text-left"><?php echo $row['appointment_time'];?></td>
                       <td class="text-left"><?php echo $row['date_added'];?></td>
                       <td class="text-right">

                         <a href="<?php $base_path;?>admin/appointment/appointment.php?edit&id=<?php echo $row['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                         <a href="<?php $base_path;?>admin/appointment/appointment.php?delete&id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to Delete...?')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>

                   </tr>

               <?php

                 }

               }else{

                

               }
               ?>

                </tbody>

            </table>

          </div>

        </form>

       <?php

       }elseif(isset($_GET['edit']))

       {

//Edit form action statrs from here

       

        $id = isset($_GET['id'])?$_GET['id']:0;

        

        $sql = "select * from appointment where id = $id";

        

        $data = mysqli_query($db,$sql);

        

        $num = mysqli_num_rows($data);

        

        if($num>0)

        {

         $row = mysqli_fetch_assoc($data);

         extract($row);

        }

        



        ?>

   <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

    <div class="col-md-10 col-md-offset-2" style="padding: 0px;">
    <?php        

      
                if(isset($_POST['edit']))
                {

                 $post = mysqli_escape_array($db,$_POST);
                 extract($post);

                  $sql  = "update `appointment` set `name`=\"$name\",`email`=\"$email\",`mobile`=\"$mobile\",`appointment_for`=\"$appointment_for\",`appointment_date`=\"$appointment_date\",`appointment_time`=\"$appointment_time\"
                 where id=$id";

                     $res = mysqli_query($db,$sql) or die(mysqli_error($db));

                     

                     if($res)

                     {

                       ?>

                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                           <strong>Success !</strong>  Appointment Successfully updated.

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
     <label class="control-label col-sm-2" for="fname">Name:</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" name="fname" id="fname" value="<?=$name?>" placeholder="First Name">
     </div>
   </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="email" id="email" value="<?=$email?>" placeholder="Email">
      </div>
   </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="mobile">Mobile:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile"  value="<?=$mobile?>" >
      </div>
   </div>
 
   <div class="form-group">
     <label class="control-label col-sm-2" for="	photo">Appointment For:</label>
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
            <option value="<?=$doctor_id?>" <?php if ( $doctor_id==$appointment_for){echo "selected";} ?> > <?=$firstname?> <?=$lastname?> </option>
            <?php
          }
          ?>
          

       </select>
     </div>
   </div>

   <div class="form-group">
      <label class="control-label col-sm-2" for="appointment_date">Appointment Date:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="appointment_date" id="appointment_date" placeholder="Appointment Date"  value="<?=$appointment_date?>" >
      </div>
   </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="appointment_date">Appointment Time:</label>
      <div class="col-sm-10">
        <input type="time" class="form-control" name="appointment_time" id="appointment_time" placeholder="Appointment time"  value="<?=$appointment_time?>" >
      </div>
   </div>
  <div class="form-group"> 

    <div class="col-sm-offset-2 col-sm-10">

      <button type="submit" class="btn btn-primary" name="edit">

        <span class="fa fa-pencil"></span>

        Update</button>

      

    </div>

  </div>

</form>       


        <?php

 //Edit form action ends here

       }elseif(isset($_GET['delete']))

       {

                        $id = isset($_GET['id'])?$_GET['id']:0;

                         $sql = "select * from appointment where id = $id";

                        $data = mysqli_query($db,$sql);

                        $num = mysqli_num_rows($data);

                        

                        if($num>0)

                        {

                          $row = mysqli_fetch_assoc($data);
                          $sql = "delete from appointment where id = $id";
                          $res = mysqli_query($db,$sql) or die(mysqli_query($db));
                          if($res)
                          {

                              ?>

                               <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                 <strong>Success !</strong>  Appointment Successfully removed from website.

                               </div>

                             
                             <?php

                           }

                        }
       }
       ?>

      </div>

    </div>

  </div>

  <script src="<?php echo $base_path;?>admin/view/datatables/datatables/media/js/jquery.dataTables.min.js"></script>

  <script src="<?php echo $base_path;?>admin/view/datatables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript"><!--

  $(document).ready(function() {

        $('#dataTables-example').DataTable({

                responsive: true,

                aaSorting: []

        });

    });



$('#button-filter').on('click', function() {

	url = 'index.php?route=sale/order&token=281529591044070afa4f37ec0ceca0b0';

	

	var filter_order_id = $('input[name=\'filter_order_id\']').val();

	

	if (filter_order_id) {

		url += '&filter_order_id=' + encodeURIComponent(filter_order_id);

	}

	

	var filter_customer = $('input[name=\'filter_customer\']').val();

	

	if (filter_customer) {

		url += '&filter_customer=' + encodeURIComponent(filter_customer);

	}

	

	var filter_order_status = $('select[name=\'filter_order_status\']').val();

	

	if (filter_order_status != '*') {

		url += '&filter_order_status=' + encodeURIComponent(filter_order_status);

	}	



	var filter_total = $('input[name=\'filter_total\']').val();



	if (filter_total) {

		url += '&filter_total=' + encodeURIComponent(filter_total);

	}	

	

	var filter_date_added = $('input[name=\'filter_date_added\']').val();

	

	if (filter_date_added) {

		url += '&filter_date_added=' + encodeURIComponent(filter_date_added);

	}

	

	var filter_date_modified = $('input[name=\'filter_date_modified\']').val();

	

	if (filter_date_modified) {

		url += '&filter_date_modified=' + encodeURIComponent(filter_date_modified);

	}

				

	location = url;

});

//-->

  </script> 

  <script type="text/javascript"><!--

$('input[name=\'filter_customer\']').autocomplete({

	'source': function(request, response) {

		$.ajax({

			url: 'index.php?route=sale/customer/autocomplete&token=281529591044070afa4f37ec0ceca0b0&filter_name=' +  encodeURIComponent(request),

			dataType: 'json',			

			success: function(json) {

				response($.map(json, function(item) {

					return {

						label: item['name'],

						value: item['customer_id']

					}

				}));

			}

		});

	},

	'select': function(item) {

		$('input[name=\'filter_customer\']').val(item['label']);

	}	

});

//--></script> 

<script type="text/javascript">

<!--

$('input[name^=\'selected\']').on('change', function() {

	$('#button-shipping, #button-invoice').prop('disabled', true);

	

	var selected = $('input[name^=\'selected\']:checked');

	

	if (selected.length) {

		$('#button-invoice').prop('disabled', false);

	}

	

	for (i = 0; i < selected.length; i++) {

		if ($(selected[i]).parent().find('input[name^=\'shipping_code\']').val()) {

			$('#button-shipping').prop('disabled', false);

			

			break;

		}

	}

});



$('input[name^=\'selected\']:first').trigger('change');



$('a[id^=\'button-delete\']').on('click', function(e) {

	e.preventDefault();

	

	if (confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?')) {

		location = $(this).attr('href');

	}

});

//-->

 </script> 

  <script src="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

  <link href="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />

  <script type="text/javascript">

$('.date').datetimepicker({

	pickTime: false

});

</script></div>

<?php include('../includes/footer.php');?>

<script type="text/javascript"><!--

$('#description').summernote({height: 300});

//--></script>

</body></html>