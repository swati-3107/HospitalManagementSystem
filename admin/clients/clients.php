<?php

session_start();

 include('../config.php');

$pg_title = "Client List";

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

          <a href="<?php echo $base_path;?>admin/clients/add-client" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a></div>

      <h1>Client</h1>

      <ul class="breadcrumb">

                <li><a href="<?php echo $base_path;?>admin/access">Home</a></li>

                <li><a href="<?php echo $base_path;?>admin/clients/clients">Clients</a></li>

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

          echo "Update Client";

         }elseif(isset($_GET['delete']))

         {

          echo "Delete Client";

         }else{

          echo "Client List";

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

                  <td class="text-left text-info">Client Name</td>
                  <td class="text-left text-info">Website Link</td>
                  <td class="text-left text-info">Information</td>
                  <td class="text-right text-info">Client logo </td>
                  <td class="text-left text-info">Date Added</td>
                  <td class="text-right text-info">Action</td>
                </tr>

              </thead>

              <tbody>

               <?php

               $sql  = 'SELECT * FROM `old_clients`';

               $data = mysqli_query($db,$sql);

               $num = mysqli_num_rows($data);

               if($num>0)

               {

                 for($i=1;$i<=$num;$i++)

                 {

                  $row = mysqli_fetch_assoc($data);

                 
                  ?>

                   <tr>

                       <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['id'];?>" />

                       <td class="text-right"><?php echo $row['id'];?></td>

                       <td class="text-left"><?php echo $row['client_name'];?></td>
                       <td class="text-left"><a href="<?php echo $row['website_link'];?>"><?=$row['website_link']?></a></td>
                       <td class="text-left"><a href="<?php echo $row['website_link'];?>"><?=$row['information']?></a></td>
                      
                       <td class="text-left"><img src="<?php $base_path;?>client_logo/<?php echo $row['logo'];?>" target="_blank" height="40px"></td>

                       <td class="text-left"><?php echo date("m-d-Y",strtotime($row['date_added']));?></td>

                       <td class="text-right">

                         <a href="<?php $base_path;?>admin/clients/clients?edit&id=<?php echo $row['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                         <a href="<?php $base_path;?>admin/clients/clients?delete&id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to Delete...?')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>

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

        

        $sql = "select * from old_clients where id = $id";

        

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

                // form action

                

                if(isset($_POST['edit']))

                {

                 //Array ( [client_caption] => [client_date_from] =>

                 //[client_date_to] => [client_description] =>

                 

                 $post = mysqli_escape_array($db,$_POST);

                 $name = $_FILES['logo']['name'];

                 

                 $logo= time().substr($name,strlen($name)-4,4);

                 

                 $path = "../../client_logo/".$logo;

                 $old_path = $_FILES['logo']['tmp_name'];

                 

                 extract($post);

                 $sql  = "update `old_clients`
                 set
                 client_name=\"$client_name\",
                 website_link=\"$website_link\",
                 information=\"$information\"
                 where id=$id";

                     

                     

                     

                     

                     

                     $res = mysqli_query($db,$sql);

                     

                     if($res)

                     {

                       ?>

                         <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                           <strong>Success !</strong>  Client Successfully updated.

                         </div>

                       <?php
                       
                       if(!empty($_FILES['logo']['name']))

                       {

                        //replace image

                        

                        $id = isset($_GET['id'])?$_GET['id']:0;

                        

                        $sql = "select * from old_clients where id = $id";

                        

                        $data = mysqli_query($db,$sql);

                        

                        $num = mysqli_num_rows($data);

                        

                        if($num>0)

                        {

                         $row = mysqli_fetch_assoc($data);

                         $logo = $row['logo'];

                         $path = "../../client_logo/".$logo;
                         
                          $path = "../../client_logo/".$logo;
                         if(unlink($path))

                         {

                           $name = $_FILES['logo']['name'];

                 

                          $logo= time().substr($name,strlen($name)-4,4);

                          

                          $path = "../../client_logo/".$logo;

                          $old_path = $_FILES['logo']['tmp_name'];

                          

                            if(move_uploaded_file($old_path,$path))

                            {

                                   

                              $sql = "update old_clients set logo = \"$logo\" where id=$id";

                              

                              if(mysqli_query($db,$sql))

                              {

                               ?>

                              <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                <strong>Success !</strong>  Image Successfully replaced..

                              </div>

                            <?php

                              }

                              

                            }

                          

                          

                         }

                         

                         

                         

                        }

                        

                                        

                                        

                        

                       }else{

                        //keep as it

                       }

                       

                       

                       

                       

                       

                       

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
    <label class="control-label col-sm-2" for="client_name">Client Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="client_name" value="<?=$client_name?>" id="client_name" placeholder="Client Name" >
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="website_link">Website Link:</label>
    <div class="col-sm-10">
      <input type="url" class="form-control" name="website_link" value="<?=$website_link?>" id="website_link" placeholder="Website link" >
    </div>
  </div>


  <div class="form-group">

    <label class="control-label col-sm-2" for="logo">Upload Logo:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="logo" name="logo">
            <small style="color:red">Uploading new logo will replace old logo <a target="_blank" href="<?php $base_path;?>client_logo/<?php echo $row['logo'];?>"><?=$logo?></a></small>

    </div>

  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="information">Information:</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="information" id="information" placeholder="Information" rows="6"><?=$information?></textarea>
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

                        

                        $sql = "select * from old_clients where id = $id";

                        

                        $data = mysqli_query($db,$sql);

                        

                        $num = mysqli_num_rows($data);

                        

                        if($num>0)

                        {

                         $row = mysqli_fetch_assoc($data);

                         $logo = $row['logo'];

                         $path = "../../client_logo/".$logo;

                         

                         $sql = "delete from old_clients where id = $id";

                          

                         $res = mysqli_query($db,$sql);

                          

                          

                           if($res)

                           {

                            if(unlink($path))

                            {

                            

                             ?>

                               <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                 <strong>Success !</strong>  Client and Image Successfully removed from website.

                               </div>

                             

                             <?php

                             }else{

                              ?>

                               <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">

                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                 <strong>Success !</strong>  Client Successfully removed from website.

                               </div>

                             

                             <?php

                             }

                           }else{

                            ?>

                               <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 20px;">

                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                 <strong>Warning !</strong>  Cant delete Image.Please try again.

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

	url = 'index?route=sale/order&token=281529591044070afa4f37ec0ceca0b0';

	

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

			url: 'index?route=sale/customer/autocomplete&token=281529591044070afa4f37ec0ceca0b0&filter_name=' +  encodeURIComponent(request),

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

$('#information').summernote({height: 300});

//--></script>

</body></html>