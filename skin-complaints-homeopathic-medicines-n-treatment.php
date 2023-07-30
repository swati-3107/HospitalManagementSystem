<?php
$title = 'Skin Complaints homeopathic Treatment by Dr. Swapnil Patnoorkar';
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
    <div class="col-sm-5"> <img src="<?php echo ($base_path);?>img\gallery\4.Skin Complaints.jpg" height="350" class="mt-3 img-fluid" alt=""> </div>
    <div class="col-sm-7"><p class="mt-3">   
    Skin complaints are among the most common reasons people see their doctor. And whether it’s itching, flaking or spots, the good news is there are many treatments available, from things you can do yourself, to over-the-counter measures, and medical help. These are the 6 most common skin conditions our doctors see in patients.
<br><br>
<b>Rosacea</b><br>
Rosacea is a common disorder that mainly affects skin on the face. It causes redness on the nose, chin, cheeks, and forehead. Over time, the redness can become more intense, taking on a ruddy appearance. Blood vessels may become visible.
<br>
In some cases, rosacea appears on the chest, back, or neck. It can affect the eyes, causing them to feel irritated and to appear bloodshot or watery. People with rosacea can also develop red solid bumps and pus-filled pimples. 
<br><br>
<b>Eczema</b><br>
Eczema is a group of conditions that make your skin inflamed or irritated. The most common type is atopic dermatitis or atopic eczema. “Atopic” refers to a person’s tendency to get allergic conditions such as asthma and hay fever.
<br>
Eczema affects about 10% to 20% of infants and about 3% of adults and children in the U.S. Most children outgrow it by their 10th birthday.
<br>
<div class="text-end">
<a href="" data-bs-toggle="collapse" data-bs-target="#c1">....Read more</a>
</div>

 </p>
</div>


<div class="col-sm-12">
  <div class="collapse" id="c1">
  <p>
  <b>Acne:</b><br>
It starts when greasy secretions from the skin's sebaceous glands (oil glands) plug the tiny openings for hair follicles (plugged pores). If the openings remain open, the clogs take the form of blackheads: small, flat spots with dark centers. If the openings are closed, the clogs take the form of whiteheads: small, flesh-colored bumps. Both types of plugged pores can develop into swollen, tender inflammations or pimples or deeper lumps or nodules. Nodules associated with severe cases of acne (cystic acne) are firm swellings below the skin's surface that become inflamed, tender, and sometimes infected. <br><br>
<b>Vitiligo</b><br>
Vitiligo is a condition in which white patches develop on the skin. Any location on the body can be affected, and most people with vitiligo have white patches on many areas.
</p>
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
