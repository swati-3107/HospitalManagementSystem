<?php 
$title = 'Weight loss homeopathic treatment for Childrens by Dr. Swapnil Patnoorkar';
include("includes/header.php")?>



<main id="main"style="margin-top:100px;">
<section class="breadcrumbs">
      <div class="container mt-5">
      <!-- d-flex justify-content-between --> 
        <div class=" align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Health Packages</li>
          </ol>
        </div>
 
      </div>
    </section>

<div class="container mt-4" style="position: relative;">
    <!-- <section id="faq" class="faq section-bg mt-5">
      <div class="container"> -->

        <div class="section-title" style="margin-top:80px;">
          <h2>Health Packages</h2>
        </div>

        
       
        <div class="row departments_row row-md-eq-height">
        <?php
            $today_date = date('Y-m-d');
           $sql  = "SELECT * FROM `health_packages` WHERE fromdate<='$today_date' AND todate>='$today_date'";
            $data = mysqli_query($db,$sql);
            $num = mysqli_num_rows($data);
            if($num>0)
            {
                for($i=1;$i<=$num;$i++)
                {
                    $row = mysqli_fetch_assoc($data);
                    extract($row);

if($i==1){

?> 
			<div class="col-lg-3 col-md-6 dept_col">
          
      <div class=" card section-bg mt-4">
      <img src="<?= $base_path ?>gallery_images/<?= $gallery_image ?>" class="img-fluid"  alt="">
             <div class="px-3 py-3">
             <p class="mt-3">
              <div class="text-center">
              <b><?=$package_name?></b><br><br>
              </div>
              <?=$description?> <br><br>
              <p><b>RS.<?=$cost?></b></p>
            </p>
             </div>
             </div>
			</div>

			
            <?php
          }else{ ?>
			<div class="col-lg-3 col-md-6 dept_col">
      <div class="card section-bg mt-4">
      <img src="<?= $base_path ?>gallery_images/<?= $gallery_image?>"   class="img-fluid" alt="">
             <div class="px-3 py-3">
            <p class="mt-3">
              <div class="text-center"><b><?=$package_name?></b><br><br></div>
              <?=$description?><br><br>
              <p><b>RS.<?=$cost?></b></p>
            </p>
             </div>
             </div>
			</div>
            <?php }
                        ?>
        
        <?php
                                              }
                                          }
                                          ?>
			
                                        </div>
                                        </div>




  </main><!-- End #main -->

<?php include("includes/footer.php")?>
