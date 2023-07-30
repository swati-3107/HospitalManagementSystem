<?php
$title = 'Spine Complaints homeopathic Treatment by Dr. Swapnil Patnoorkar';
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
    <div class="col-sm-5"> <img src="<?php echo ($base_path);?>img\gallery\6. Spine Complaints.jpg" height="350" class="mt-3 img-fluid" alt=""> </div>
    <div class="col-sm-7"><p class="mt-3">   
    Spinal pain in the lumbar region (lower back) and cervical region (neck) are highly prevalent and are often the causes for many lost work days. Lumbar muscle strains and sprains are the most common causes of low back pain. The thoracic spine can also be a site of spinal pain, but because it is much more rigid, the thoracic spinal area is much less frequently injured than the lumbar and cervical spine.
<br><br>
<b>Three types of muscles support the spine:</b><br>
<ul>
 <li>Extensors (back muscles and gluteal muscles)</li>
 <li>Flexors (abdominal muscles and iliopsoas muscles)</li>
 <li>Oblique or rotators (side muscles)</li>
</ul>
The lumbar and cervical spine are prone to strain because of its weight-bearing function and involvement in moving, twisting and bending. Lumbar muscle strain is caused when muscle fibers are abnormally stretched or torn. Lumbar sprain is caused when ligaments — the tough bands of tissue that hold bones together — are unusually stretched. Both of these can result from a sudden injury or from gradual overuse.
<br>
When the lumbar spine is strained or sprained, the soft tissues become inflamed. This inflammation causes pain and may cause muscle spasms.
<div class="text-end">
<a href="" data-bs-toggle="collapse" data-bs-target="#c1">....Read more</a>
</div>

 </p>
</div>
<div class="col-sm-12">


<div class="col-sm-12">
  <div class="collapse" id="c1">
  <p>
Spinal pain can be caused by things more severe that might require surgical consideration. These usually involve spinal pain that radiates into arms, legs or around the rib cage from back toward the anterior chest. <br>
Even though lumbar strain or sprain can be very debilitating, neither usually requires neurosurgical attention.
<br><br>
<b>Prevention Tips</b><br>
The following tips may be helpful in preventing low back pain associated with strain and sprain:
<br>
<ul>
  <li>Do crunches and other abdominal-muscle strengthening exercises to provide more spine stability. Swimming, stationary bicycling and brisk walking are good aerobic exercises that generally do not put extra stress on your back;</li>
  <li>Use correct lifting and moving techniques, such as squatting to lift a heavy object (don't bend and lift). Get help if an object is too heavy or awkward;</li>
  <li>Maintain correct posture when you're sitting and standing;</li>
  <li>Quit smoking. Smoking is a risk factor for atherosclerosis (hardening of the arteries), which can cause lower back pain and degenerative disc disorders;</li>
  <li>Avoid stressful situations if possible, as this can cause muscle tension;</li>
  <li>Maintain a healthy weight. Extra weight, especially around the midsection, can put strain on the lower back.</li>
</ul>
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
									<div style="margin-left: 50px;">Emergency Calls Only</div>
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
