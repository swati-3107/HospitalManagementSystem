<?php 
$title = 'Migrain homeopathic Treatment by Dr. Swapnil Patnoorkar';
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
    <div class="col-sm-5"> <img src="<?php echo ($base_path);?>img\gallery\7.Migraine.jpg" height="350" class="mt-3 img-fluid" alt=""> </div>
    <div class="col-sm-7"><p class="mt-3">   
    Migraine is a neurologic disorder that often causes a strong headache. The headache comes in episodes and sometimes also comes with nausea, vomiting, and sensitivity to light. A migraine is much more than a bad headache. This neurological disease can cause debilitating throbbing pain that can leave you in bed for days! Movement, light, sound and other triggers may cause symptoms like pain, tiredness, nausea, visual disturbances, numbness and tingling, irritability, difficulty speaking, temporary loss of vision and many more.
<br><br>
<b>Migraine Causes:</b><br><br>
Doctors don’t know the exact cause of migraine headaches, although they seem to be related to changes in your brain and to your genes. Your parents can even pass down migraine triggers like fatigue, bright lights, or weather changes.
<br><br>
Current thinking is that a migraine likely starts when overactive nerve cells send out signals that trigger your trigeminal nerve, which gives sensation to your head and face. This cues your body to release chemicals like serotonin and calcitonin gene-related peptide (CGRP). CGRP makes blood vessels in the lining of your brain swell. Then, neurotransmitters cause inflammation and pain.
<div class="text-end">
<a href="" data-bs-toggle="collapse" data-bs-target="#c1">....Read more</a>
</div>
</p>
</div>

<div class="col-sm-12">
  <div class="collapse" id="c1">

 
For many years, scientists thought migraine happened because of changes in blood flow in the brain. Most now think this can contribute to the pain but is not what starts it.
<br><br>

<b>stages or phases of a migraine:</b><br>
The four stages in chronological order are the prodrome (pre-monitory), aura, headache and postdrome. About 30% of people experience symptoms before their headache starts.
<br>The phases are:
<br>
<b>Prodrome:</b> <br> The first stage lasts a few hours, or it can last days. You may or may not experience it as it may not happen every time. Some know it as the “preheadache” or “premonitory” phase. <br>
<b>Aura:</b> <br> The aura phase can last as long as 60 minutes or as little as five. Most people don’t experience an aura, and some have both the aura and the headache at the same time. <br>
<b>Headache:</b> <br> About four hours to 72 hours is how long the headache lasts. The word “ache” doesn’t do the pain justice because sometimes it’s mild, but usually, it’s described as drilling, throbbing or you may feel the sensation of an icepick in your head. Typically it starts on one side of your head and then spreads to the other side. <br>
<b>Postdrome:</b> <br> The postdrome stage goes on for a day or two. It’s often called a migraine “hangover” and 80% of those who have migraines experience it.
<br><br>

<b>Home remedies</b><br>
You may ease migraine symptoms by:
<li>Resting with your eyes closed in a dark, quiet room</li>
<li>Putting a cool compress or ice pack on your forehead</li>
<li>Drinking plenty of liquids</li>

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
