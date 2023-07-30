<?php

// session_start();

 include('../config.php');

$pg_title = "career List";

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

          <a href="<?php echo $base_path;?>admin/career/add-career.php" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a></div>

      <h1>career List</h1>

      <ul class="breadcrumb">

                <li><a href="<?php echo $base_path;?>admin/access.php">Home</a></li>

                <li><a href="<?php echo $base_path;?>admin/career/career.php">career List</a></li>

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

          echo "Update career";

         }elseif(isset($_GET['delete']))

         {

          echo "Delete career";

         }else{

          echo "career List";

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
                  <td class="text-left text-info">Education</td>
                  <td class="text-left text-info">About</td>
                  <td class="text-left text-info">Date Added</td>
                  <td class="text-right text-info">Action</td>

                </tr>

              </thead>

              <tbody>

               <?php

               $sql  = 'SELECT * FROM `career`';

               $data = mysqli_query($db,$sql);

               $num = mysqli_num_rows($data);

               if($num>0)

               {

                 for($i=1;$i<=$num;$i++)

                 {

                  $row = mysqli_fetch_assoc($data);

                 
           
          
          
                 
                  ?>

                   <tr>

                       <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['sno'];?>" />

                       <td class="text-right"><?php echo $row['sno'];?></td>
                       <td class="text-left"><?php echo $row['c_first_name'];?> <?php echo $row['c_last_name'];?></td>
                       <td class="text-left"><?php echo $row['c_email'];?> </td>
                       <td class="text-left"><?php echo $row['c_mobile'];?></td>
                       <td class="text-left"><?php echo $row['c_education'];?></td>
                       <td class="text-left"><?=$row['c_about']?></td>
                       <td class="text-left"><?php echo $row['date'];?></td>
                       <td class="text-right">

                         <a href="<?php $base_path;?>admin/career/career.php?edit&id=<?php echo $row['sno'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                         <a href="<?php $base_path;?>admin/career/career.php?delete&id=<?php echo $row['sno']; ?>" onClick="javascript:return confirm('Do you really want to Delete...?')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>

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

        

        $sql = "select * from career where sno = $id";

        

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

                  $sql  = "update `career` set `c_first_name`=\"$c_fname\", `c_last_name`=\"$c_lname\", `c_email`=\"$c_email\", `c_mobile`=\"$c_mobile\", `c_dob`=\"$c_dob\", `c_education`=\"$c_education\", `c_about`=\"$c_about\", `c_address`=\"$c_address\", `c_city`=\"$c_city\", `c_satate`=\"$c_satate\", `c_zip`=\"$c_zip\", `c_skills`=\"$c_skills\", `aadhar_card`=\"$aadhar_card\", `other_file`=\"$other_file\" where sno=$id";

           

                     $res = mysqli_query($db,$sql) or die(mysqli_error($db));

                     

                     if($res)

                     {

                       ?>

                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                           <strong>Success !</strong>  career Successfully updated.

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
     <label class="control-label col-sm-2" for="fname">First name:</label>
     <div class="col-sm-4">
        <input type="text" class="form-control" name="c_fname" id="fname" value="<?=$c_first_name?>" placeholder="First Name">
     </div>
     <label class="control-label col-sm-2" for="lname">Last Name:</label>
     <div class="col-sm-4">
        <input type="text" class="form-control" name="c_lname" id="lname" value="<?=$c_last_name?>" placeholder="First Name">
     </div>
   </div>
  
   
   <div class="form-group">
      <label class="control-label col-sm-2" for="mobile">Mobile:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="c_mobile" id="mobile" placeholder="Mobile"  value="<?=$c_mobile?>" >
      </div>
       <label class="control-label col-sm-2" for="city">DOB:</label>
      <div class="col-sm-4">
         <input type="date" class="form-control" name="c_dob" id="" value="<?=$c_dob?>" placeholder="dob">
      </div>
   </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="c_email" id="" value="<?=$c_email?>" placeholder="Email">
      </div>
   </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="education">Education:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="c_education" id="education" value="<?=$c_education?>" placeholder="Education">
      </div>
   </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="about">About:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="c_about" id="about" value="<?=$c_about?>" placeholder="about">
      </div>
   </div>

   <div class="form-group">
      <label class="control-label col-sm-2" for="city">City:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="c_city" id="city" value="<?=$c_city?>" placeholder="city">
      </div>
   </div>




   <div class="form-group">
      <label class="control-label col-sm-2" for="state">State:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="c_satate" id="state" value="<?=$c_satate?>" placeholder="state">
      </div>
   </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="zip">Zip:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="c_zip" id="zip" value="<?=$c_zip?>" placeholder="zip">
      </div>
   </div>

   <div class="form-group">
      <label class="control-label col-sm-2" for="skilss">Skills:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="c_skills" id="skilss" value="<?=$c_skills?>" placeholder="skilss">
      </div>
   </div>

   <div class="form-group">
      <label class="control-label col-sm-2" for="aadhar_card">Aadhar Card:</label>
      <div class="col-sm-4">
          <input type="file" class="form-control" name="aadhar_card" id="aadhar_card" value="<?=$aadhar_card?>" placeholder="aadhar card">
      </div>
      <div class="col-sm-5">
          <a href="<?=$base_path?>career_images/<?=$aadhar_card?>">

              <img style="width:100%" src="<?=$base_path?>career_images/<?=$aadhar_card?>" alt="aadhar" class="w-100">
          </a>
      </div>
   </div>

   <div class="form-group">
      <label class="control-label col-sm-2" for="other_file">Other File:</label>
      <div class="col-sm-4">
          <input type="file" class="form-control" name="other_file" id="other_file" value="<?=$other_file?>" placeholder="Other file">
      </div>
      <div class="col-sm-5">
          <a href="<?=$base_path?>career_images/<?=$other_file?>">

              <img style="width:100%" src="<?=$base_path?>career_images/<?=$other_file?>" alt="" class="w-100">
          </a>
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

                         $sql = "select * from career where sno = $id";

                        $data = mysqli_query($db,$sql);

                        $num = mysqli_num_rows($data);

                        

                        if($num>0)

                        {

                          $row = mysqli_fetch_assoc($data);
                          $sql = "delete from career where sno = $id";
                          $res = mysqli_query($db,$sql) or die(mysqli_query($db));
                          if($res)
                          {

                              ?>

                               <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                 <strong>Success !</strong>  career Successfully removed from website.

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