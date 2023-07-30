<?php
$title = 'Videos';
include("includes/header.php")?>

<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center mt-5">
      <!-- <h2>Gallery</h2> -->
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Gallery</li>
        <li>Videos</li>
      </ol>
    </div>

  </div>
</section>
<!-- End Breadcrumbs Section -->


    <section id="gallery" class="gallery">
       
  
        <div class="container-fluid">
          <div class="row g-0">
          <?php

$sql  = 'SELECT * FROM `videos`';

$data = mysqli_query($db,$sql);

$num = mysqli_num_rows($data);

if($num>0)

{

  for($i=1;$i<=$num;$i++)

  {

   $row = mysqli_fetch_assoc($data);

//id	video_title	video_description	video_date	video_embed_code

   ?>    
            <div class="col-lg-4 col-md-6">
              <div class="container  ">
                <div class="gallery-item ">
                <iframe width="420" height="345" src="<?php echo $row['video_embed_code'];?>"></iframe>
                <p class="testimonial"><?php echo $row['video_title'];?></p>

                </div>
               </div>
            
              </div>
              
              <?php

}

}else{
    
    
    
}





?>
            
            
        </div>
        </div>
  
        </div>
      </section>
      <!-- End Gallery Section -->
  


 

</main><!-- End #main -->


   
<?php include("includes/footer.php")?>
