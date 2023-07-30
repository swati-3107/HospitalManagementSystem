<?php
 
include('../config.php');
$pg_title ='Add New Reviews';
include('../includes/head-js-css.php');
if(isset($_REQUEST['add-review'])){

$db->query("INSERT INTO oc_review SET author = '" . $_REQUEST['author'] . "', text = '" . strip_tags($_REQUEST['text']) . "', rating = '" . (int)$_REQUEST['rating'] . "', status = '" . (int)$_REQUEST['status'] . "', date_added = NOW()");
	echo '<script>window.location.assign("admin/catalog/reviews-list.php")</script>';
}
if(isset($_REQUEST['edit'])){
$review_id=$_REQUEST['id'];
if(isset($_REQUEST['path'])){ if($_REQUEST['path']!=''){$path_value=$_REQUEST['path'];}else{$path_value='';}}
$sql_ed="SELECT * FROM oc_review where review_id='$review_id'";
$res_ed=$db->query($sql_ed) or die($db->error.__LINE__);
$row_ed=$res_ed->fetch_assoc();
$customer_id=$row_ed['customer_id']; $author=$row_ed['author']; $text=$row_ed['text'];
$rating=$row_ed['rating']; $status=$row_ed['status']; $date_added=$row_ed['date_added']; $review_id=$row_ed['review_id'];
$sql_cus="select CONCAT(firstname,' ',lastname) As customer_name from oc_customer where customer_id='$customer_id'";
$res_cus=$db->query($sql_cus) or die($db->error.__LINE__);
$row_cus=$res_cus->fetch_assoc();
$customer_name=$row_cus['customer_name'];
}else{
 $customer_id=''; $author=''; $text=''; $path_value='';
$rating=''; $status=''; $date_added=''; $review_id=''; $customer_name='';
}
if(isset($_REQUEST['update-review'])){
$review_id=$_REQUEST['rev_id'];
$db->query("UPDATE oc_review SET author = '" . $_REQUEST['author'] . "', text = '" . strip_tags($_REQUEST['text']) . "', rating = '" . (int)$_REQUEST['rating'] . "', status = '" . (int)$_REQUEST['status'] . "', date_modified = NOW() WHERE review_id = '" . (int)$review_id . "'");
if($_REQUEST['path_value']!=1){
echo '<script>window.location.assign("admin/catalog/reviews-list.php")</script>';
}else{
echo '<script>window.location.assign("admin/catalog/review-pending.php")</script>';
}
}
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
      <?php if(isset($_REQUEST['edit'])){ ?>
        <button type="submit" form="form-review" data-toggle="tooltip" title="Update" name="update-review" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <?php }else{?>
        <button type="submit" form="form-review" data-toggle="tooltip" title="Save" name="add-review" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <?php }?>
        
        <a href="<?php $base_path;?>admin/catalog/reviews-list" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Reviews</h1>
      <ul class="breadcrumb">
                <li><a href="<?php $base_path;?>admin/access">Home</a></li>
                <li><a href="<?php $base_path;?>admin/reviews-add">Reviews</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i>  <?php if(isset($_REQUEST['edit'])){ ?>Edit <?php }else{?> Add <?php }?>Review</h3>
      </div>
      <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data" id="form-review" class="form-horizontal">
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-author">Customer Name</label>
            <div class="col-sm-10">
              <input type="text" name="author" value="<?php echo $customer_name;?>" placeholder="Author" id="input-author" class="form-control" />
               <input type="hidden" name="rev_id" value="<?php echo $review_id;?>"  class="form-control" />
                <input type="hidden" name="path_value" value="<?php echo $path_value;?>"  />
                          </div>
          </div>
         
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-text">Text</label>
            <div class="col-sm-10">
              <textarea name="text" cols="60" rows="8" placeholder="Text" id="input-text" class="form-control"><?php echo $text;?></textarea>
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name">Rating</label>
            <div class="col-sm-10">
              <label class="radio-inline">
                                <input type="radio" name="rating" value="1" <?php if($rating ==1){ echo 'checked';} ?> />
                1
                              </label>
              <label class="radio-inline">
                                <input type="radio" name="rating" value="2" <?php if($rating ==2){ echo 'checked';} ?> />
                2
                              </label>
              <label class="radio-inline">
                                <input type="radio" name="rating" value="3" <?php if($rating ==3){ echo 'checked';} ?> />
                3
                              </label>
              <label class="radio-inline">
                                <input type="radio" name="rating" value="4" <?php if($rating ==4){ echo 'checked';} ?> />
                4
                              </label>
              <label class="radio-inline">
                                <input type="radio" name="rating" value="5" <?php if($rating ==5){ echo 'checked';} ?> />
                5
                              </label>
                          </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status">Status</label>
            <div class="col-sm-10">
              <select name="status" id="input-status" class="form-control">
                                <option value="1" <?php if($status ==1){ echo 'selected';} ?> >Enabled</option>
                <option value="0"  <?php if($status ==0){ echo 'selected';} ?>>Disabled</option>
                              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php');?>
</body></html>