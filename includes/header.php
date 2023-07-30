<?php include('admin/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title; ?> </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">



  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
  
#header .logo img {
  min-height: 90px;
 
}
</style>

<body>
  <!-- HTML code for notification stream using Bootstrap Alerts -->
<div class="container">
  <div class="row">
    <div class="col">
      
      
      <!-- <div class="alert alert-primary" role="alert">
        Notification 4
      </div> -->
    </div>
  </div>
</div>


  <!-- ======= Top Bar ======= -->
 
  
  <div id="topbar" class="d-flex align-items-center fixed-top ">

    
    <div class="container d-flex justify-content-between">
    <?php
			$curdate = date('Y-m-d');
			$sql = "SELECT * FROM `notification_list`";
			$data = mysqli_query($db,$sql);
			$num = mysqli_num_rows($data);
			if($num>0)
			{
				$row = mysqli_fetch_assoc($data);
				extract($row);
				// if ( $row['todate'] >= $curdate ) {
				?><marquee class="text-dark mt-2" behavior="scroll" scrollamount="7" direction="left"><?=$notify_text?></marquee></a> <?php 
					// }
			}
		?>
      <div class="contact-info d-flex align-items-center p-2">
      <!-- <?php
								$company_Master = "SELECT * FROM `oc_master_company`";
								$company_master_data = mysqli_query($db, $company_Master);
								$company_num = mysqli_num_rows($company_master_data);
							
								for ($i = 0; $i < $company_num; $i++) {
									$class_master_row = mysqli_fetch_assoc($company_master_data);

									extract($class_master_row);
								?>
        
    
     <i class="bi bi-envelope-at"></i> <?=$class_master_row['email']?> <br>
    <i class="bi bi-phone"></i>
    <i class="fa fa-phone" aria-hidden="true"></i> <?=$class_master_row['mobile']?>
      </div>
      <?php 
                }
                ?> -->
  <!-- ----------------------------------------------------------               -->
  
                
       <!-- <marquee class="text-dark mt-2" behavior="scroll" direction="left" scrollamount=""10>
        <h6><?=$class_master_row['area']?></h6>

</marquee> -->

 
      
      </div>
      
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class=" logo me-auto  d-inline-block" style="margin-left:-10px;"><a href="index.php"><img class="img-fluid" src="assets\logo.jpg.png" alt=""></a></h1>
      

      <nav id="navbar" class="navbar order-last order-lg-0">
      <?php
                                    $nav_sql = "SELECT * from menus where menu_level=1";
                                    $nav_data = mysqli_query($db,$nav_sql);
                                    $nav_num = mysqli_num_rows($nav_data);
                                    // echo $nav_num;
                                    ?>
        <ul>
                                        <?php
                                        for ($i=0; $i < $nav_num; $i++) { 
                                            $nav_row = mysqli_fetch_assoc($nav_data);
                                            extract($nav_row);
                                            $sub_nav_sql = "SELECT * from menus where menu_level=2 and has_parent=$id";
                                            $sub_nav_data = mysqli_query($db,$sub_nav_sql);
                                            $sub_nav_num = mysqli_num_rows($sub_nav_data);

                                            if ($sub_nav_num>0) {
                                                ?>
                                                 <li class="dropdown"><a href="#" class="nav-link scrollto"><?=$menu_name?></a>
                                                    <ul>
                                                         <?php
                                                            for ($j=0; $j < $sub_nav_num; $j++) { 
                                                              $sub_nav_row = mysqli_fetch_assoc($sub_nav_data);
                                                            extract($sub_nav_row);  
                                                            ?>
                                                        <li><a class="nav-link scrollto section-bg" href="<?=$base_path?><?=$menu_link?>"><?=$menu_name?></a></li>
                                                        <?php } ?>
                                                        
                                                    </ul>
                                                </li>
                                                <?php
                                            }else {
                                                ?>
                                                <li><a class=" nav-link scrollto" href="<?=$base_path?><?=$menu_link?>"><?=$menu_name?></a></li>
                                                <?php
                                            }
                                            ?>
                                            
                                            <?php
                                        }
                                        ?>
                                        
                                      
                                       
                                       
                                    </ul>
          </li>
         
          
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

      <!-- <a href="Appoinment.html" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>

    </div> -->
    </div>
  </header>
   

</body>

</html>