<?php
 include('config.php');
$pg_title = "Dashboard";
include('includes/head-js-css.php');
?>
<body>
<div id="container">
	<?php include('includes/header.php');
    include('includes/left-menu.php');
    ?>
    <div id="content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="pull-right">
            
          </div>
          <h1>Dashboard</h1>
        </div>
      </div>
      <div class="container-fluid">
            <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Welcome <?=isset($company) && $company['company_name']!=''?$company['company_name']:'Master Admin Panel'?></h3>
          </div>
          <div class="panel-body">

          <!-- <div class="container">
            <div class="card">
              <div class="card-body">
                <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGhvc3BpdGFsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" width="800" alt="">
              </div>
            </div>
          </div> -->
<!--             
             
             <div class="alert alert-info">
               <span class="fa fa-info-circle"></span> Please update stock by Regular way. Direct updating stock may create some errors while tally stock or Report.
            </div>
             <a href="<?=$base_path?>/all_products_report.php">
             <img src="<?=$base_path?>admin/images/cache/new-gif-blinking-image.gif" style="height: 25px;"> Manage Purchase Quantity
            </a>
             <a href="<?=$base_path?>admin/stock/store-stock">
             <img src="<?=$base_path?>admin/images/cache/new-gif-blinking-image.gif" style="height: 25px;"> Update Store stock direct link
            </a>
               -->
             
          </div>
        </div>
      </div>
    </div>
</div>
<?php include('includes/footer.php');?>
</body></html>