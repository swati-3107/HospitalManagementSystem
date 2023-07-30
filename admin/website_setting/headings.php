<?php
// session_start();
include('../config.php');
$pg_title = "website_settings";
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
                    <h1>headings</h1>
                    <div class="pull-right">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo $base_path; ?>admin/access.php">Home</a></li>
                            <li><a href="<?php echo $base_path; ?>admin/website_setting/headings.php">headings</a></li>
                        </ul>
                        <script>
                            function deleteMenus() {
                                var ret = confirm('Are you sure to delete');
                                if (ret) {
                                    document.getElementById("form-links").submit();
                                }

                            }
                        </script>
                  
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete All" onclick="deleteMenus()">
                                <i class="fa fa-trash"></i>
                            </button>

                            <!-- <button type="button" class="btn btn-danger disabled" data-toggle="tooltip" title="Delete All" onclick="deleteMenus()">
                                <i class="fa fa-trash"></i>
                            </button> -->


                            <a href="<?php echo $base_path; ?>admin/website_setting/add-heading.php" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>

                            <!-- <a href="<?php echo $base_path; ?>admin/website_setting/add-heading.php" data-toggle="tooltip" title="Add New" class="btn btn-primary "><i class="fa fa-plus"></i></a> -->


                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-list"></i>
                            <?php
                            if (isset($_GET['edit'])) {
                                echo "Update Links";
                            } elseif (isset($_GET['delete'])) {
                                echo "Delete Links";
                            } else {
                                echo "Links List";
                            }

                            ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        if (isset($_POST['table'])) {

                            $count = count($_POST['selected']);
                            $table = $_POST['table'];


                            for ($i = 0; $i < $count; $i++) {
                                $sql = "delete from $table where id=" . $_POST['selected'][$i];

                                $res = mysqli_query($db, $sql);
                            }
                        }



                        ?>



                        <?php
                        if (!isset($_GET['edit']) && !isset($_GET['delete'])) {
                        ?>
                            <form method="post" enctype="multipart/form-data" id="form-links">

                                <input type="hidden" name="table" value="social_links">

                                <div class="col-lg-12 col-xs-12 table-responsive">
                                    <table class="table  table-bordered table-hover" id="dataTables-example" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <td style="width: 1px;" class="text-center">
                                                    <input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);" />
                                                </td>
                                                <td class="text-right text-info">ID</td>
                                                <td class="text-left text-info">Headings</td>
                                                <td class="text-right text-info">Font family</td>
                                                <td class="text-right text-info">Heading case</td>
                                                <td class="text-right text-info">Font Size</td>
                                                <td class="text-right text-info">Font color</td>
                                                <td class="text-right text-info">Font weight</td>
                                                <td class="text-right text-info">delete</td>
                                                <td class="text-right text-info">edit</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql  = 'SELECT * FROM `headings`';
                                            $data = mysqli_query($db, $sql);
                                            $num = mysqli_num_rows($data);
                                            if ($num > 0) {
                                                for ($i = 1; $i <= $num; $i++) {
                                                    $row = mysqli_fetch_assoc($data);
                                                    //id	video_title	video_description	video_date	video_embed_code
                                                    extract($row);
                                            ?>
                                                        <tr>
                                                            <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $row['id']; ?>"/>
                                                            <td class="text-right"><?php echo $row['id']; ?></td>
                                                            <td class="text-left"><?php echo $row['heading_type']; ?></td>
                                                            <td class="text-right"><?php echo $row['heading_font_family']; ?></td>
                                                            <td class="text-left"><?php echo $row['heading_font_case']; ?></td>
                                                            <td class="text-right"><?php echo $row['heading_font_size']; ?></td>
                                                            <td class="text-right"><?php echo $row['heading_font_color']; ?></td>
                                                            <td class="text-right"><?php echo $row['heading_font_weight']; ?></td>


                                                                                                                                                                     <td class="text-left">
                                                                    <a href="<?php $base_path; 
                                                                    ?>admin/website_setting/headings.php?delete&id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to Delete...?')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                                </td>

                                                                
                                                            
                                                                <td class="text-left">
                                                                    <a href="<?php $base_path; ?>admin/website_setting/headings.php?edit&id=<?php echo $row['id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                                                                </td>

                                                               
                                                   

                                                </td>
                                            </tr>
                                                    
                                            <?php
                                                }
                                            } else {
                                            }


                                            ?>



                                        </tbody>
                                    </table>
                                </div>
                            </form>


                        <?php
                        } elseif (isset($_GET['edit'])) {
                            //Edit form action statrs from here

                            $id = isset($_GET['id']) ? $_GET['id'] : 0;

                            $sql = "select * from headings where id = $id";

                            $data = mysqli_query($db, $sql);

                            $num = mysqli_num_rows($data);

                            if ($num > 0) {
                                $row = mysqli_fetch_assoc($data);
                                extract($row);
                            }


                        ?>
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">


                                <div class="col-md-10 col-md-offset-2" style="padding: 0px;">

                                    <?php
                                    // form action

                                    if (isset($_POST['edit'])) {
                                        //Array ( [videos_caption] => [videos_date_from] =>
                                        //[videos_date_to] => [videos_description] =>

                                        $post = mysqli_escape_array($db, $_POST);

                                        //Image upload action

                                        //Array ( [videos_image] => Array ( [name] => Chrysanthemum.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\php75DC.tmp [error] => 0 [size] => 879394 ) )





                                        extract($post);
                                        $sql  = "update `headings` set heading_type=\"$heading_type\",
                 heading_font_family = \"$heading_font_family\",heading_font_case=\"$heading_font_case\",heading_font_color=\"$heading_font_color\",heading_font_size=\"$heading_font_size\",heading_font_weight=\"$heading_font_weight\" where id=$id";

                                        $res = mysqli_query($db, $sql);

                                        if ($res) {
                                    ?>
                                            <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Success !</strong> Links Successfully updated.
                                            </div>
                                        <?php
                                        } else {

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
                                    <label class="control-label col-sm-2" for="name">Heading Type:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="heading_type" id="heading_type" class="form-control" value="<?= $heading_type ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Font Family:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="heading_font_family" id="heading_font_family" class="form-control" value="<?= $heading_font_family ?>">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="icon">font case:</label>
                                    <div class="col-sm-10">
                                        <select name="heading_font_case" class="form-control" id="heading_font_case" value="<?= $heading_font_case ?>">
                                            <option selected>select font case</option>
                                            <option value="uppercase">uppercase</option>
                                            <option value="lowercase">lowercase</option>
                                            <option value="capitalize">capitalize</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="link">font color:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="heading_font_color" id="heading_font_color" value="<?= $heading_font_color ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="link">font size:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="heading_font_size" id="heading_font_size" value="<?= $heading_font_size ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="link">font weight:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="heading_font_weight" id="heading_font_size" value="<?= $heading_font_weight ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="control-label col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="edit">Update</button>
                                    </div>
                                </div>

                            </form>

                            <?php
                            //Edit form action ends here
                        } elseif (isset($_GET['delete'])) {
                            $id = isset($_GET['id']) ? $_GET['id'] : 0;

                            $sql = "delete from headings where id = $id";

                            $res = mysqli_query($db, $sql);


                            if ($res) {

                            ?>
                                <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Success !</strong> Links Successfully removed from website.
                                </div>

                            <?php
                            } else {
                            ?>
                                <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning !</strong> Something went wrong.
                                </div>

                        <?php
                            }
                        }





                        ?>




                    </div>
                </div>
            </div>
            <script src="<?php echo $base_path; ?>admin/view/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo $base_path; ?>admin/view/datatables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript">
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
            <script type="text/javascript">
                $('input[name=\'filter_customer\']').autocomplete({
                    'source': function(request, response) {
                        $.ajax({
                            url: 'index.php?route=sale/customer/autocomplete&token=281529591044070afa4f37ec0ceca0b0&filter_name=' + encodeURIComponent(request),
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
                //-->
            </script>
            <script type="text/javascript">
                $('input[name^=\'selected\']').on('change', function() {
                    $('#button-shipping, #button-invoice').prop('disabled', true);

                    var selected = $('input[name^=\'selected\']:checked');

                    if (selected.length) {
                        $('#button-invoice').prop('disabled', false);
                    }

                    for (i = 0; i < selected.length; i++) {
                        if ($(selected[i]).parent().find('input[name^=\'shipping_code\']').val()) {
                            $('#button-shipping').prop('disabled', false);