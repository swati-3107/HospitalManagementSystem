<?php
// session_start();
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

                        <a href="<?php echo $base_path; ?>admin/website_setting/add-heading.php" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
                    </div>
                    <h1>heading</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $base_path; ?>admin/access.php">Home</a></li>
                        <li><a href="<?php echo $base_path; ?>admin/website_setting/headings.php">heading</a></li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php if (isset($_REQUEST['edit'])) {
                                                                                    echo 'Edit';
                                                                                } else {
                                                                                    echo 'Add';
                                                                                } ?>heading</h3>
                    </div>
                    <div class="panel-body">
                        <!-- HTML forms startes from here ---------------------->
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-10 col-md-offset-2" style="padding: 0px;">

                                <?php
                                // form action

                                if (isset($_POST['add'])) {


                                    extract($_POST);

                                    $sql  = "INSERT INTO `headings` (`heading_type`, `heading_font_family`,`heading_font_case`,`heading_font_color`,`heading_font_size`,`heading_font_weight`)
                    VALUES ('$heading_type','$heading_font_family', '$heading_font_case', '$heading_font_color','$heading_font_size','$heading_font_weight')";

                                    $res = mysqli_query($db, $sql);

                                    if ($res) {
                                ?>
                                        <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 20px;">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Success !</strong> New Social Link Successfully added to website.
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
                                    <input type="text" name="heading_type" id="heading_type" class="form-control">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Font Family:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="heading_font_family" id="heading_font_family" class="form-control">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="icon">font case:</label>
                                <div class="col-sm-10">
                                    <select name="heading_font_case" class="form-control" id="heading_font_case">
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
                                    <input type="text" class="form-control" name="heading_font_color" id="heading_font_color">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="link">font size:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="heading_font_size" id="heading_font_size">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-sm-2" for="link">font weight:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="heading_font_weight" id="heading_font_size" >
                                    </div>
                                </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="add">
                                        <span class="fa fa-send"></span> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        <span class="fa fa-close"></span> Reset
                                    </button>
                                </div>
                            </div>
                        </form>


                        <!--- HTML form end --->
                    </div>
                </div>
            </div>

        </div>
        <?php include('../includes/footer.php'); ?>
        <script type="text/javascript">
            $('#description').summernote({
                height: 300
            });
            //-->
        </script>
    </div>
</body>

</html>