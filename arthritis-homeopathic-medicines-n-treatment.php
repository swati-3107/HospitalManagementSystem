<?php 
$title = 'Arthritis homeopathic Treatment by Dr. Swapnil Patnoorkar';
include("includes/header.php")?>


<style>
  .icon-box {
    margin-top: 50px;
  }

.why-us .icon-boxes .icon-box {
 height: 300px;
 
}

</style>
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container mt-5">
      <!-- d-flex justify-content-between -->
        <div class=" align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Treatments</li>
          </ol>
        </div>

      </div>
    </section>


<div class="container overflow-hidden mt-4">
  <div class="row">
    <div class="col-sm-5"> <img src="<?php echo ($base_path);?>img\gallery\1.Arthritis.jpg" height="350" class="mt-3 img-fluid" alt=""> </div>
    <div class="col-sm-7"><p class="mt-3">   
 <b>Treatment</b> <br>
Arthritis treatment focuses on relieving symptoms and improving joint function. You may need to try several different treatments, or combinations of treatments, before you determine what works best for you.
<br><br>
<b>NSAIDs:</b>
 Nonsteroidal anti-inflammatory drugs (NSAIDs) can relieve pain and reduce inflammation. Examples include ibuprofen (Advil, Motrin IB, others) and naproxen sodium (Aleve). Stronger NSAIDs can cause stomach irritation and may increase your risk of heart attack or stroke. NSAIDs are also available as creams or gels, which can be rubbed on joints. <br> <br>
 <b>Counterirritants:</b>Some varieties of creams and ointments contain menthol or capsaicin, the ingredient that makes hot peppers spicy. Rubbing these preparations on the skin over your aching joint may interfere with the transmission of pain signals from the joint itself. <br> <br>
 <b>Steroids:</b> Corticosteroid medications, such as prednisone, reduce inflammation and pain and slow joint damage. Corticosteroids may be given as a pill or as an injection into the painful joint. Side effects may include thinning of bones, weight gain and diabetes. <br>
 <div class="text-end">
<a href="" data-bs-toggle="collapse" data-bs-target="#c1">....Read more</a>
</div>

 </p>
</div>
<div class="col-sm-12">


<div class="col-sm-12">
  <div class="collapse" id="c1">
<b>Disease-modifying antirheumatic drugs (DMARDs):</b>
 These drugs can slow the progression of rheumatoid arthritis and save the joints and other tissues from permanent damage. In addition to conventional DMARDs, there are also biologic agents and targeted synthetic DMARDs. Side effects vary but most DMARDs increase your risk of infections. <br><br>
<p> <b>Therapy</b>
Physical therapy can be helpful for some types of arthritis. Exercises can improve range of motion and strengthen the muscles surrounding joints. In some cases, splints or braces may be warranted. <br>
SurgeryIf conservative measures don't help, doctors may suggest surgery, such as: <br>
<b>Joint repair.</b>In some instances, joint surfaces can be smoothed or realigned to reduce pain and improve function. These types of procedures can often be performed arthroscopically — through small incisions over the joint. <br>
<b>Joint replacement.</b>This procedure removes the damaged joint and replaces it with an artificial one. Joints most commonly replaced are hips and knees. <br>
<b>Joint fusion.</b> This procedure is more often used for smaller joints, such as those in the wrist, ankle and fingers. It removes the ends of the two bones in the joint and then locks those ends together until they heal into one rigid unit.
</p>
</div>
  </div>
</div>
  </div>
</div>


    
<section id="why-us" class="why-us" style="margin-top:30px;">
      <div class="container overflow-hidden">
        <div class="row">
        <div class="col-lg-12">
            <div class="icon-boxes d-flex flex-column justify-content-center" >
              <div class="row">
                <div class="col-lg-4 d-flex">
                  <div class="icon-box" style=" font-family: 'Tinos', serif;">
                    <i class="bx bx-receipt"></i>
                    <h4>OPD Timing</h4>
                    <ul>
                    <li class="d-flex">
									<b>Monday – Saturday :</b>
									<div class="ml-auto">10.00 – 14.00</div>
                </li>
								<li class="d-flex">
									<b>Monday – Saturday :</b>
									<div class="ml-auto">17.00 – 21.00</div>
                </li>
								<li class="d-flex">
									<b>Sunday :</b>
									<div style="margin-left: 50px;">Emergency calls Only</div>
								</li>
							</ul>
                  </div>
                </div>
               
                <div class="col-lg-8" style="margin-top:-50px;">
  <section id="appointment" class="appointment">
  <div class="container">

    <div class="section-title">
        
      <h2 class="text-primary">Appointment</h2>
    </div>

    <!-- <?php include('message.php')?> -->
     <form action="post_Appoinment.php" method="post" class="mt-2 justify-content-center align-item-center">
                    <div class="row php-email-form">
                      <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control section-bg" id="name" placeholder="Your Name"required>
                        <div class="validate"></div>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="tel" class="form-control section-bg"pattern="[0-9]{10}" name="mobile" id="mobile" placeholder="Your Phone"required>
                      <div class="validate"></div>
                      </div>
                    </div>
                    <div class="row php-email-form">
                      <div class="col-md-6 form-group mt-3">
                        <input type="date" name="appointment_date" class=" section-bg form-control datepicker" id="appointment_date" placeholder="Appointment Date" required>
                        <div class="validate"></div>
                      </div>
                      <div class="col-md-6 form-group mt-3 ">
                        <select name="appointment_for" id="appointment_for" class="form-select section-bg"required >
                          <option value="">Select</option>
                          <option value="Arthritis Treatment"> Arthritis Treatment </option>
                          <option value="Spine Complaints"> Spine Complaints</option>
                          <option value="Hyperacidity Treatments">Hyperacidity Treatments</option>
                          <option value="Migrain Treatments">Migrain Treatments</option>
                          <option value="Allergic Cold n Cough">Allergic Cold n Cough</option>
                          <option value="Asthama Treatments">Asthama Treatments</option>
                          <option value="Skin Complaints Treatment">Skin Complaints Treatment</option>
                          <option value="Weight Loss Treatments For Seniors">Weight Loss Treatments For Seniors</option>
                          <option value="Weight Loss Treatments For Women">Weight Loss Treatments For Women</option>
                          <option value="Weight Loss Treatments For Men">Weight Loss Treatments For Men</option>
                          <option value="Weight Loss Treatments For Childrens">Weight Loss Treatments For Childrens</option>
                        </select>
                        <div class="validate"></div>
                      </div>
                     
                    </div>
                   <div class="row php-email-form">
                    <div class="form-group mt-3 ">
                      <textarea class="form-control section-bg" name="text" rows="3" placeholder="Message (Optional)"></textarea>
                      <div class="validate"></div>
                    </div>
                   </div>
                    <div class="text-center"><button type="submit" class="btn btn-outline-primary mt-2">Make an Appointment</button></div>
                  </form>
  </div>
</section>
</div>
</div>
      </div>
    </div>
            </div>
          </div>
    
          </section>


<section id="testimonials" class="testimonials overflow-hidden" style="margin-top: -80px;">
      <div class="container">
        <div class="section-title">
        <h2 class="text-center">Patient Reviews</h2>
        </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
          <?php
            
                                          $sql  = 'SELECT * FROM `feedback_student`';
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
            <div class="swiper-slide">
              <div class="testimonial-wrap ">
        
                 <div class="testimonial-item">
                 <div class="testimonial-img rounded float-left">
                  <img src="<?= $base_path ?>gallery_images/<?= $gallery_image ?>"  height="60" alt=""></div>
                 
                <h3 class="text-primary"><p class="overview"><?=$name?></p></h3>
                <h4></h4>
                <p class="text-dark">
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 
                  <p class="testimonial"><?=$feedback?></p>
                  
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
              </div>
              
            </div>
              <?php
          }else{ ?>
           <div class="swiper-slide">
              <div class="testimonial-wrap ">
          <div class="testimonial-item">
                 <div class="testimonial-img rounded float-left">
                  <img src="<?= $base_path?>gallery_images/<?= $gallery_image?>"  height="60" alt=""></div>
                 
                <h3 class="text-primary"><p class="overview"><?=$name?></p></h3>
                <h4></h4>
                <p class="text-dark">
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  
                  <p class="testimonial"><?=$feedback?></p>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
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
      </div>
      </section>
    

   

  </main><!-- End #main -->

<?php include("includes/footer.php")?>
