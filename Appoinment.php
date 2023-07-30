<?php 
$title = 'Appointment';
include("includes/header.php")?>
<main id="main">
<style>
  appointment .php-email-form .error-message{
    background:green;
  }
</style>
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Appoinment</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Appoinment </li>
      </ol>
    </div>

  </div>
</section>
<!-- End Breadcrumbs Section -->\


<!-- start Appoinment section -->
<section id="appointment" class="appointment section-bg">
  <div class="container">

    <div class="section-title">
        
      <h2>Make an Appointment</h2>
      <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
    </div>

    <form action="forms/appointment.php" method="post" role="form" >
                    <div class="row php-email-form">
                      <div class="col-md-4 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                      </div>
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                      </div>
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 form-group mt-3">
                        <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                      </div>
                      <div class="col-md-6 form-group mt-3">
                        <select name="appointment_for" id="appointment_for" class="form-select">
                          <option value="">Select Department</option>
                          <option value="Diabetes in pregnancy">Diabetes in pregnancy</option>
                          <option value="Diabetes Prevention">Diabetes Prevention</option>
                          <option value="Diet consultation">Diet consultation</option>
                          <option value="Weight loss">Weight loss</option>
                          <option value="Thyroid Problem">Thyroid Problem</option>
                          <option value="Hyper Tension">Hyper Tension</option>
                          <option value="Raised-cholestrol(BP)">Raised-cholestrol(BP)</option>
                        </select>
                        <div class="validate"></div>
                      </div>
                     
                    </div>
            
                    <div class="form-group mt-3">
                      <textarea class="form-control" name="text" rows="3" placeholder="Message (Optional)"></textarea>
                      <div class="validate"></div>
                    </div>
                   
                    <div class="text-center"><button type="submit">Make an Appointment</button></div>
                  </form>
            
  </div>
</section><!-- End Appointment Section -->




  


 

</main><!-- End #main -->
<?php include("includes/footer.php")?>
