
<?php
$title = 'Contact';
include("includes/header.php")
?>

<style>
 .cblock-1 {
		margin-top: 50px;
		padding: 30px;
		text-align: center;
		background-color: #f6f6f6;
		border: 1px solid #dbdbdb;
	}
	.cblock-1 + .cblock-1 {
		margin-top: 100px;
	}
		.cblock-1 .icon-wrap {
			margin-top: -70px;
			margin-bottom: 30px;
			margin-left: auto;
			margin-right: auto;
			display: block;
			width: 78px;
			height: 78px;
			line-height: 90px;
			background-color: #009bdb;
		}
		.cblock-1 .icon-wrap.red {
			line-height: 100px;
			background-color: #c43535;
		}
			.cblock-1 .icon-wrap .fa {
				font-size: 38px;
				color: #fff;
			}
		.cblock-1 h4 {
			margin-top: 0;
			margin-bottom: 20px;
			color: #262626;
		}
		.cblock-1 ul {
			margin-bottom: 0;
		}
			.cblock-1 li {
				color: #505050;
				font-size: 16px;
				line-height: 26px;
			}
		

</style>
<!-- <div class="main-banner one">
				<div class="container">
				<h2><span>Contact Us</span></h2>
				</div>
			</div> -->
            
              <div class="breadcrumb hidden-lg hidden-md mt-5">
				<div class="container">
					<ul class="list-unstyled list-inline">
						<li><a href="index.php">Home</a></li>
						<li class="active">Contact Us</li>
					</ul>
				</div>
			</div>
		<!-- Header Ends -->
		<!-- Slider Section Starts -->
			
		<!-- Slider Section Ends -->
		<!-- Main Container Starts -->
			<div class="main-container" style="margin-bottom:0px">
			<!-- Notification Boxes Starts -->
				
			<!-- Notification Boxes Ends -->
			<!-- Welcome Section Starts -->
				<section class="container">
					<div class="row">
                    <div class="col-lg-4">
						<div class="cblock-1">
								<span class="icon-wrap #1977cc"><i class="fa fa-car"></i></span>
								<h4>Health Plus Clinic</h4>
								<p> <a href="https://goo.gl/maps/8AKtcLpoZaurrESb6?coh=178572&entry=tt"><?=$class_master_row['address1']?> </a></p>
							</div>
					</div>	
                    
                    <div class="col-lg-4">
                    <div class="cblock-1" style="height:260px">
								<span class="icon-wrap #1977cc"><i class="fa fa-phone"></i></span>
								<h4>Contact:</h4>
								<a href="tel:<?=$class_master_row['mobile']?>"><?=$class_master_row['mobile']?></a> 
								<br>
                    
  </p>
							</div>
                    
                    </div>
                    
                    <div class="col-lg-4">
                    <div class="cblock-1"  style="height:260px">
								<span class="icon-wrap #1977cc"><i class="fa fa-envelope"></i></span>
								<h4>Email</h4>
								<a href="mailto:<?=$class_master_row['email']?>"><?=$class_master_row['email']?></a>
								
 
  </p>
							</div>
                    
                    </div>
					</div>
               
                    
				</section>
			<!-- Welcome Section Ends -->
<br>
		

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3752.2883304539114!2d75.33259937422277!3d19.87004332656754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdba2b97e56a609%3A0x828f30b6f28a6db5!2sHealth%20Plus%20clinic%20for%20Homoeopathy%20%26%20weight%20loss!5e0!3m2!1sen!2sin!4v1682765185087!5m2!1sen!2sin"  width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<br>
		<!-- Main Container Ends -->
		<!-- Meet Our Doctors Section Starts -->
			
		<!-- Meet Our Doctors Section Ends -->
		<!-- Main Container Starts -->
			
			<!-- Content Ends -->
			<!-- Book Appointment Box Starts -->
				
			<!-- Book Appointment Box Ends -->
	
			
		<!-- Main Container Ends -->





<?php
include("includes/footer.php")
?>
