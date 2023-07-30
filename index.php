<?php 
$title= 'Homoeopathy Treatments by Dr Swapnil Patnoorkar- Health Plus Clinic';
include("includes/header.php")?>

<main id="main">
  <head>
  <link href='https://fonts.googleapis.com/css?family=Abyssinica SIL' rel='stylesheet'>
  </head>
<style>
 
@media (min-width:320px)  { 
  .carousel-item img {
    margin-top:100px;
    width:100%;
    margin-bottom:30px;
   
  }
}
   .icon-box {
    margin-top: 50px;
  }
  .why-us .icon-boxes .icon-box {
   height: 350px;
   
  }
  .appointment .php-email-form .error-message{
    background:green;
  }
  
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

  .faq .faq-list {
  padding: 0 0;
}

</style> 

<?php
// $todays_date = date('Y-m-d');
if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) {
    $slider_sql = "SELECT * FROM `index_slider`  WHERE type='mobile'";
} else {
    $slider_sql = "SELECT * FROM `index_slider`  WHERE  type='computer'";
    // echo "web browser!";
}
$slider_sql = "SELECT * FROM `index_slider`";
$slider_data = mysqli_query($db, $slider_sql);
$slider_num = mysqli_num_rows($slider_data); 
// echo $slider_num;
?>


<div style="margin-top:60px">
  <div class="container-fluid">
    <div class="row">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    
    
    <div class="carousel-inner ">
    <?php
        for ($i = 0; $i < $slider_num; $i++) {
            $slider_row = mysqli_fetch_assoc($slider_data);
            extract($slider_row);
            
        ?>
      <div class="carousel-item active"style="margin-bottom:-15%;">
  


       
      <img  src="<?= $base_path ?>/slider_images/<?= $slider_image ?>" class="img-fluid"   alt="" >

        <div class="carousel-caption d-none d-md-block">
          <section id="hero" class="d-flex align-items-center">
            <!-- <div class="container">
              <h1 class="text-dark">Welcome to Kale Clinic</h1>
              <h2 class="text-dark">We are team of talented docters</h2>
              <a href="Appoinment.html" class="btn-get-started scrollto">Make an Appoinment</a>
            </div> -->
          </section>
        </div>
      </div>
      
        <?php
        }
        ?>

<!-- if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) {
 $isMobiel = true;
} else {
   
// echo "web browser!";
 $isMobiel = false;
} -->

      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" ></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" ></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
      </div>

  <!-- ======= Hero Section ======= -->
 
  <!-- End Hero -->


    <!-- ======= Why Us Section ======= -->
    

   
    <section id="why-us" class="why-us" style="margin-top: -100px;">
      <div class="container overflow-hidden">
        <div class="row">
        <div class="col-lg-12">
            <div class="icon-boxes d-flex flex-column justify-content-center" >
              <div class="row">
                <div class="col-lg-4 d-flex " style="margin-bottom: -40px; margin-top:100px;">
                  <div class="icon-box mt-xl-0" style=" font-family: 'Tinos', serif;">
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
									<div style="margin-left: 50px;">Emergency calls only</div>
								</li>
							</ul>
                  </div>
                </div>
               
                <div class="col-lg-8 mt-2 " style="margin-top: -65px; ">
  <section id="appointment" class="appointment">
  <div class="container">

    <div class="section-title">
        
      <h2 class="text-primary">Appointment</h2>
    </div>

    <?php include('message.php')?>
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
                        <select name="appointment_for" id="appointment_for" class="form-select section-bg "required>
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
                    <div class="text-center" style="margin-left:-20px;"><button type="submit" class="btn btn-outline-primary mt-2">Make an Appointment</button></div>
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

   <!-- <div class="col-lg-4 d-flex align-items-stretch  ">
   <section id="appointment" class="appointment shadow p-3 mb-5 mt-5  bg-white rounded">
        
  <div class="container ">
   <div class="section-title">
        <h4 class="text-dark " style="font-size:30px;"> Appointment</h4>
      </div>
      <?php include('message.php')?>
     <form action="post_Appoinment.php" method="post" class="mt-2 justify-content-center align-item-center">
                    <div class="row php-email-form">
                      <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"required>
                        <div class="validate"></div>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="tel" class="form-control"pattern="[0-9]{10}" name="mobile" id="mobile" placeholder="Your Phone"required>
                      <div class="validate"></div>
                      </div>
                    </div>
                    <div class="row php-email-form">
                      <div class="col-md-6 form-group mt-3">
                        <input type="date" name="appointment_date" class="form-control datepicker" id="appointment_date" placeholder="Appointment Date" required>
                        <div class="validate"></div>
                      </div>
                      <div class="col-md-6 form-group mt-3">
                        <select name="appointment_for" id="appointment_for" class="form-select"required >
                          <option value="">Select</option>
                          <option value="Diabetes in adults"> Diabetes in adults </option>
                          <option value="Diabetes in children"> Diabetes in children</option>
                          <option value="Diabetes in pregnancy">Diabetes in pregnancy</option>
                          <option value="Blood sugar control">Blood sugar control</option>
                          <option value="Diabetes in complications screening">Diabetes in complications screening</option>
                          <option value="Continuous glocose monitoring system">Continuous glocose monitoring system</option>
                          <option value="Diabetes remission">Diabetes remission</option>
                          <option value="Diabetes Prevention">Diabetes Prevention</option>
                          <option value="Diet consultation">Diet consultation</option>
                          <option value="Weight loss">Weight loss</option>
                          <option value="Thyroid Problem">Thyroid Problem</option>
                          <option value="Hyper Tension">Hyper Tension</option>
                          <option value="Raised-cholestrol(BP)">Raised-cholestrol(BP)</option>
                          <option value="Fatty Liver">Fatty Liver </option>
                          <option value="Laboratory Tests">Laboratory Tests </option>
                        </select>
                        <div class="validate"></div>
                      </div>
                     
                    </div>
                   <div class="row php-email-form">
                    <div class="form-group mt-3 ">
                      <textarea class="form-control" name="text" rows="3" placeholder="Message (Optional)"></textarea>
                      <div class="validate"></div>
                    </div>
                   </div>
                    <div class="text-center"><button type="submit" class="btn btn-outline-primary mt-2">Make an Appointment</button></div>
                  </form>
            
                   </div>
            </section> -->

            
     
  
        
    <div class="container overflow-hidden">
      <div class="section-title">
        <h1 class="text-primary text-center">Dr.Swapnil Patnoorkar</h1>
        <hr class="w-25 m-auto">
      </div>
      <div class="row">

      <div class="col-sm-12 col-md-4 col-lg-4 col-12 mt-2 justify-content-center align-item-center d-flex">
          <img src="img\gallery\IMG_1.jpg"  height="350" width="340" alt="">
        </div>


        <div class="col-sm-12 col-md-8 col-lg-8 col-12 ">
           <p class="p-2" style="text-align: justify;text-indent: 50px;font-family: 'Tinos', serif;font-size:18px;">
           About Swapnil Patnoorkar

An Eminent Homeopath,Having 17 years of experience in Homoeopathy and 10 years in obesity.

Cured thousands of patients of different diseases with Homoeopathy. Upgraded Homoeopathy treatment for each disease, faster results, no lengthy case history. Dealt with thousands of Obese patients with his unique Trio of treatment. Safe & sure way of losing weight & fats is his speciality.

 

Women weight loss

 

Specialised Homoeopathic medicines, modern diet plans & exercise schedule for working women.

Special weight loss programme for Housewives.

-Precautionary weight loss programme in post operative patients and post delivery patients.

-Teenage girls weight loss programme

 

Weight loss for Men

-Heridatory obesity

-Sedentary life style obesity

-Post operative weight gain

 

 Weight loss for Senior citizens

 

Specialised Homoeopathic medicines and diet plans for seniors. Safe and sure results.                       

 We will create some images for Homoeopathy treatment in different disease for website

Piles

Kidney stones

Skin complaint

asthama
 </p>
 <div class="text-end">
              <a href="dr-swapnil-patnoorkar-about-us.php">.....Read More</a>
            </a>
          </div>
          </div>

    </div>
    </div> 
        <!-- End Doctors Section -->

       

   
        <!-- <div class="row mt-3">
    <div class="col-sm-7"><div class="container overflow-hidden">
      <div class="section-title">
        <h2 class="text-primary text-center">Dr.Swapnil Patnoorkar</h2>
      
      </div>

      <div class="row">
      <div class=" justify-content-center d-flex">
          <img src="img\gallery\IMG_1.jpg"  height="200" width="200" alt="">
        </div>


        <div>
           <p class="p-2" style="text-align: justify;text-indent: 50px;font-family: 'Tinos', serif;font-size:18px;">
           About Swapnil Patnoorkar

An Eminent Homeopath,Having 17 years of experience in Homoeopathy and 5 years in obesity.
Cured thousands of patients of different diseases with Homoeopathy. Upgraded Homoeopathy treatment for each disease, faster results, no lengthy case history. 
 </p>
 <div class="text-end">
              <a href="dr-swapnil-patnoorkar-about-us.php">.....Read More</a>
            </a>
          </div>
          </div>

    </div>
    </div>
  </div> -->

    


    <!-- ======= Frequently Asked Questions Section ======= -->
    
    <section id="faq" class="faq section-bg mt-5 overflow-hidden">
      <div class="container">

        <div class="section-title">
          <h2>Homoeopathy Treatments</h2>
         
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Arthritis Treatment<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show " data-bs-parent=".faq-list">
                <div class="d-flex">
                  <div class="row align-items-end justify-contain-between ">
                    <div class="col-sm-6">
                      <p class="text-justify" style="font-size:16px;font-family: 'Tinos', serif;">
                      Arthritis treatment focuses on relieving symptoms and improving joint function. You may need to try several different treatments, or combinations of treatments, before you determine what works best for you.
                <div class="justify-content-end d-flex">
                  <a href="arthritis-homeopathic-medicines-n-treatment.php">.....Read More</a>
                </div>
                

                </p>
              </div>
                    <div class="col-sm-6 d-flex justify-content-end"> <img  class="mt-3" src="img\gallery\1.Arthritis.jpg" width="300" height="200" alt=""></div>
                  </div>
                
               
                </div>
              
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Spine Complaints<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse " data-bs-parent=".faq-list">
                <div class="d-flex justify-contain-between ,ml-auto">
                  <div class="row ">
                    <div class="col-sm-6"> <p  class="text-justify" style="font: size 13px;font-family: 'Tinos', serif;">
                    Spinal pain in the lumbar region (lower back) and cervical region (neck) are highly prevalent and are often the causes for many lost work days. Lumbar muscle strains and sprains are the most common causes of low back pain. The thoracic spine can also be a site of spinal pain, but because it is much more rigid, the thoracic spinal area is much less frequently injured than the lumbar and cervical spine.


                  <div class="justify-content-end d-flex">
                    <a href="spine-complaints-homeopathic-medicines-n-treatment.php">.....Read More</a>
                  </div>
                  
              </p>
            </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                      <img class="mt-3" src="img\gallery\6. Spine Complaints.jpg" height="200" width="300" alt=""></div>
                  </div>
               
              
                </div>
                
              </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Hyperacidity<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <div class="d-flex">
                  <div class="row">
                    <div class="col-sm-6"><p  class="text-justify" style="font-size:16px;font-family: 'Tinos', serif;">
                    Hyperacidity, also known as acid dyspepsia, is a common issue bothering most people. It is a medical disorder where the stomach produces an excess of acids, mainly hydrochloric by the gastric glands.
<div class="justify-content-end d-flex">
<a href="hyperacidity-treatments-homeopathic-medicines-n-treatment.php">.....Read More</a>
</div>

              </p>
            </div>
                    <div class="col-sm-6 d-flex justify-content-end"> <img class="mt-3"  src="img\gallery\5. Hyperacidity.jpg" width="300" height="200" alt=""></div>
                  </div>
                </div>
                
             
              </div>
            </li>

           
            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Migrain Treatments <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <div class="d-flex">
                  <div class="row">
                    <div class="col-sm-6"><p  class="text-justify" style="font-size:16px;font-family: 'Tinos', serif;">
                    The headache comes in episodes and sometimes also comes with nausea, vomiting, and sensitivity to light. This neurological disease can cause debilitating throbbing pain that can leave you in bed for days! Movement, light, sound and other triggers may cause symptoms like pain, tiredness, nausea, visual disturbances, numbness and tingling, irritability, difficulty speaking, temporary loss of vision and many more.
                    <div class="justify-content-end d-flex">
                    <a href="migrain-treatments-homeopathic-medicines-n-treatment.php">.....Read More</a>
                    </div>
                    
                </p></div>
                    <div class="col-sm-6 d-flex justify-content-end"> 
                      <img class="mt-3"  src="img\gallery\7.Migraine.jpg" width="300" height="200"  alt="">
                    </div>
                  </div>
                </div>
                
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Allergic Cold and Cough<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <div class="d-flex">
                  <div class="row ml-auto">
                    <div class="col-sm-6"> <p  class="text-justify" style="font-size:16px;font-family: 'Tinos', serif;">
                    Taking over-the-counter (OTC) medications: Allergy medicines, such as antihistamines, nasal sprays, and decongestants, can help reduce the inflammation and mucus production that can lead to a cough. Using a humidifier or inhaling steam from a shower: Humidifiers can help clear congestion and soothe throat irritation.
                    <div class="justify-content-end d-flex">
                    <a href="allergic-cold-n-cough-homeopathic-medicines-n-treatment.php">.....Read More</a>
                    </div>
                   
                </p></div>
                    <div class="col-sm-6 d-flex justify-content-end">
                      <img class="mt-3"  src="img\gallery\3. Cold and Cough.jpg" width="300" height="200" alt="">
                    </div>
                  </div>
                </div>
               
              </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-6" class="collapsed">Asthama Treatments<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
                <div div class="text-justify" style="font-size:16px; font-family: 'Tinos', serif;">
                  <div class="d-flex">
                    <div class="row">
                      <div class="col-sm-6"><p>
                      There's currently no cure for asthma, but treatment can help control the symptoms so you're able to live a normal, active life. Inhalers, which are devices that let you breathe in medicine, are the main treatment. Tablets and other treatments may also be needed if your asthma is severe.
<div class="justify-content-end d-flex">
<a href="asthama-homeopathic-medicines-n-treatment.php">.....Read More</a>
</div>

                      </p>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                      <img class="mt-3"  src="img\gallery\2. Asthma.jpg" width="300" height="200" alt="">
                    </div>
                  </div>
                </div>
              </div>
                
                
              </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="600"> <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-7" class="collapsed">Skin Complaints Treatment<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">
                <div class="d-flex ">
                  <div class="row ">
                    <div class="col-sm-6 "><p  class="text-justify" style="font-size:15px">
                    Skin complaints are among the most common reasons people see their doctor. And whether it’s itching, flaking or spots, the good news is there are many treatments available, from things you can do yourself, to over-the-counter measures, and medical help. These are the 6 most common skin conditions our doctors see in patients.
                    <div class="justify-content-end d-flex">
<a href="skin-complaints-homeopathic-medicines-n-treatment.php">.....Read More</a>
</div>
                  </p>
              </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                      <img class="mt-3"  src="img\gallery\4.Skin Complaints.jpg" width="300" height="200" alt="">
                    </div>
                  </div>
                </div>
                
              </div>
           
        </div>
      </li>
            
      
                  
     </div>
    </section>
  

    
    <div class="container mt-4" style="position: relative;">
    <!-- <section id="faq" class="faq section-bg mt-5">
      <div class="container"> -->

        <div class="section-title">
          <h2>Weight Loss Treatments</h2>
        </div>

        
       
        <div class="row departments_row row-md-eq-height">
			<div class="col-lg-3 col-md-6 dept_col mt-2">
      <div class="section-bg">
             <img src="gallery_images\senior.jpg" class="img-fluid" alt="">
             <div class="px-3 py-3">
             <p class="mt-3">
              <div class="text-center">
              <b>Weight Loss Treatments For Seniors</b><br><br>
              </div>
              Burn more calories than you eat or drink. Eat more veggies, fruits, whole grains, fish, beans, and low-fat or fat-free dairy; and keep meat and poultry lean. <br><br>
              <a href="weight-loss-treatments-for-seniors.php" class="d-flex justify-content-center">Read More</a>
            </p>
             </div>
             </div>
			</div>

			<div class="col-lg-3 col-md-6 dept_col mt-2">
      <div class=" section-bg">
             <img src="gallery_images\men.jpg" class="img-fluid" alt="">
             <div class="px-3 py-3">
            <p class="mt-3">
              <div class="text-center"><b>Weight Loss Treatments For Men</b><br><br></div>
              For many men, losing weight whether a few pounds or many is difficult. Balancing diet, exercise, supplements, sleep and many other factors is a full-time task. <br><br>
              <a href="weight-loss-treatments-for-men.php" class="d-flex justify-content-center">Read More</a> 
            </p>
            </div>
             </div>
			</div>

			<div class="col-lg-3 col-md-6 dept_col mt-2">
      <div class=" section-bg">
             <img src="gallery_images\women.jpg" class="img-fluid" alt="">
             <div class="px-3 py-3">
            <p class="mt-3">
              <div class="text-center"><b>Weight Loss Treatments For Women</b><br><br></div>
             Setting a realistic weight loss goal will help you stay motivated and avoid disappointment. A safe and achievable rate of weight loss is 1-2 pounds per week. <br><br>
             <a href="weight-loss-treatments-for-women.php" class="d-flex justify-content-center">Read More</a>
            </p>
             </div>
             </div>
			</div>

			<div class="col-lg-3 col-md-6 dept_col mt-2">
      <div class=" section-bg">
             <img src="gallery_images\child.jpg" class="img-fluid" alt="">
             <div class="px-3 py-3">
            <p class="text-center mt-3">
              <div class="text-center"><b>Weight Loss Treatments For Childrens</b><br><br></div>
               Encourage children to do physical activities such as sports,dancing, or simply playing outdoors. Encourage at least an hour of physical activity every day. <br><br>
               <a href="weight-loss-treatments-for-childrens.php" class="d-flex justify-content-center">Read More</a>
            </p>
             </div>
             </div>
			</div>
        </div>


    <!-- </div> -->


    <section id="testimonials" class="testimonials overflow-hidden">
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
  </main>
  
















<?php include("includes/footer.php")?>
