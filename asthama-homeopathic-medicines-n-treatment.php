<?php 
$title = 'Asthama homeopathic Treatment by Dr. Swapnil Patnoorkar';
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
    <div class="col-sm-5"> <img src="<?php echo ($base_path);?>img\gallery\2. Asthma.jpg" height="350" class="mt-3 img-fluid" alt=""> </div>
    <div class="col-sm-7"><p class="mt-3">   
   <h4><b>What is asthma?</b></h4> <br>
Asthma, also called bronchial asthma, is a disease that affects your lungs. It’s a chronic (ongoing) condition, meaning it doesn’t go away and needs ongoing medical management.
<br>
Asthma affects more than 25 million people in the U.S. currently. This total includes more than 5 million children. Asthma can be life-threatening if you don’t get treatment. <br><br>
<h5><b>signs and symptoms of asthma?</b></h5>
People with asthma usually have obvious symptoms. These signs and symptoms resemble many respiratory infections:
<li>Chest tightness, pain or pressure.
</li>
<li>Coughing (especially at night).</li>
<li>Shortness of breath.</li>
<li>Wheezing.</li>

<div class="text-end">
<a href="" data-bs-toggle="collapse" data-bs-target="#c1">....Read more</a>
</div>

 </p>
</div>
<div class="col-sm-12">


<div class="col-sm-12">
  <div class="collapse" id="c1">
<br>
<b>asthma attack</b> <br>
When you breathe normally, muscles around your airways are relaxed, letting air move easily and quietly. During an asthma attack, three things can happen: <br>
<b>Bronchospasm:</b> The muscles around the airways constrict (tighten). When they tighten, it makes your airways narrow. Air cannot flow freely through constricted airways. <br>
<b>Inflammation:</b> The lining of your airways becomes swollen. Swollen airways don’t let as much air in or out of your lungs. <br>
<b>Mucus production:</b> During the attack, your body creates more mucus. This thick mucus clogs airways. <br>
When your airways get tighter, you make a sound called wheezing when you breathe, a noise your airways make when you breathe out. You might also hear an asthma attack called an exacerbation or a flare-up. It’s the term for when your asthma isn’t controlled. <br><br>
<b>asthma causes</b><br>
Researchers don’t know why some people have asthma while others don’t. But certain factors present a higher risk:
<br><br>
<b>Allergies:</b> Having allergies can raise your risk of developing asthma. <br>
<b>Environmental factors:</b> People can develop asthma after exposure to things that irritate the airways. These substances include allergens, toxins, fumes and second- or third-hand smoke. These can be especially harmful to infants and young children whose immune systems haven’t finished developing. <br>
<b>Genetics:</b> If your family has a history of asthma or allergic diseases, you have a higher risk of developing the disease. <br>
<b>Respiratory infections:</b> Certain respiratory infections, such as respiratory syncytial virus (RSV), can damage young children’s developing lungs. <br><br>
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
									<div style="margin-left:50px;">Emergency Calls only</div>
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
