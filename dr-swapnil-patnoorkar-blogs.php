<?php 
$title = 'Weight loss homeopathic treatment for Childrens by Dr. Swapnil Patnoorkar';
include("includes/header.php")?>


<style>
  .card{

    transition: all ease-in-out 0.4s;
  }

  .card:hover img{
    transform: scale(1.1);
  }


  .home-blog {
    padding-top: 80px;
    padding-bottom: 80px;
}
@media (min-width: 992px) {
    .home-blog {
        padding-top: 100px;
        padding-bottom: 100px;
    }
}
.home-blog .section-title {
    padding-bottom: 15px;
}
.home-blog .media {
    margin-top: 50px;
}
@media (min-width: 768px) {
    .home-blog .media {
        margin-top: 30px;
    }
}
.bg-sand {
    background-color: #f5f5f6;
}
.media.blog-media {
    margin-top: 30px;
    position: relative;
    display: block;
}
@media (min-width: 992px) {
    .media.blog-media {
        display: table;
    }
}
.media.blog-media .circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    white-space: nowrap;
    position: absolute;
    padding: 0;
    top: 20px;
    left: 20px;
    text-align: center;
    box-shadow: none;
    transform: translateX(0);
    color: #fff;
    transition: background-color 0.3s ease;
}
.media.blog-media .circle .day {
    color: #fff;
    transition: color 0.25s ease;
    font-weight: 500;
    font-size: 28px;
    line-height: 1;
    margin-top: 12px;
}
.media.blog-media .circle .month {
    text-transform: uppercase;
    font-size: 14px;
}
.media.blog-media > a {
    position: relative;
    display: block;
}
@media (min-width: 992px) {
    .media.blog-media > a {
        display: table-cell;
        vertical-align: top;
        min-width: 200px;
    }
}
@media (min-width: 1200px) {
    .media.blog-media > a {
        min-width: 230px;
    }
}
.media.blog-media > a:before {
    position: absolute;
    content: "";
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    opacity: 0;
    transform: scale(0);
    transition: transform 0.3s ease, opacity 0.3s;
    /* background: rgba(12, 198, 82, 0.7); */
    /* pic color */ 
}
.media.blog-media > a img {
    width: 100%;
}
.media.blog-media:hover > a:before {
    opacity: 1;
    transform: scale(1);
}
.media.blog-media:hover .circle {
    background-color: rgba(255, 255, 255, 0.9);
}
.media.blog-media:hover .circle .day,
.media.blog-media:hover .circle .month {
    color: #222;
}
.media.blog-media:hover .media-body h5 {
    color: #0cc652;
}
.media.blog-media:hover .media-body a.post-link {
    color: #0cc652;
    text-decoration: underline;
}
.media.blog-media .media-body {
    border: 1px solid #efeff3;
    padding: 30px 30px 10px;
    font-size: 14px;
    background: #fff;
    border-top: none;
}
@media (min-width: 992px) {
    .media.blog-media .media-body {
        padding: 15px 20px 10px;
        border-top: 1px solid #efeff3;
        border-left: none;
        display: table-cell;
        vertical-align: top;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body {
        padding: 30px 20px 10px;
    }
}
.media.blog-media .media-body h5 {
    transition: color 0.3s ease;
    margin-bottom: 15px;
}
@media (min-width: 992px) {
    .media.blog-media .media-body h5 {
        font-size: 15px;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body h5 {
        margin-bottom: 15px;
        font-size: 18px;
    }
}
.media.blog-media .media-body a.post-link {
    display: block;
    color: #222;
    font-size: 11px;
    padding: 23px 0;
    text-transform: uppercase;
    font-weight: 400;
}
@media (min-width: 992px) {
    .media.blog-media .media-body a.post-link {
        padding: 7px 0;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body a.post-link {
        padding: 23px 0;
    }
}
.media.blog-media .media-body ul {
    position: relative;
    padding: 10px 0 0;
}
.media.blog-media .media-body ul li {
    display: inline-block;
    width: 49%;
    position: relative;
}
.media.blog-media .media-body ul li:before {
    position: absolute;
    content: "";
    top: 5px;
    left: 0;
    width: 1px;
    height: 14px;
    background: #eeeef2;
}
.media.blog-media .media-body ul li:first-child:before {
    visibility: hidden;
}
.media.blog-media .media-body ul:before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: #eeeef2;
}
.media {
    Transition:0.5;
}
.media:hover {
    transform:scale(0.9);
}



</style>
<main id="main"style="margin-top:100px;">
 <!-- ======= Breadcrumbs Section ======= -->
 <section class="breadcrumbs">
      <div class="container mt-5">
      <!-- d-flex justify-content-between -->
        <div class=" align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Blogs/News Updates</li>
          </ol>
        </div>

      </div>
    </section>
    


<!-- <div class="container mt-4" style="position: relative;">
    <section id="faq" class="faq  mt-5">
      <div class="container">

       

        
       
        <div class="row departments_row row-md-eq-height">
        <?php
            $today_date = date('m-d-y');
            $sql  = "SELECT * FROM `news_update`";
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
			<div class="col-lg-4 col-md-6 dept_col">
          
      <div class="card section-bg mt-4">
      <img src="<?= $base_path ?>gallery_images/<?= $gallery_image ?>" class="img-fluid"  alt="">
             <div class="px-3 py-3">
             <p class="mt-3">
              <div class="text-center">
              <b><?=$facility_name?></b><br><br>
              </div>
              <?=$facility_details?> <br><br>
              
            </p>
             </div>
             </div>
			</div>

			
            <?php
          }else{ ?>
			<div class="col-lg-4 col-md-6 dept_col">
      <div class="card section-bg mt-4">
      <img src="<?= $base_path ?>gallery_images/<?=$gallery_image?>"   class="img-fluid" alt="">
             <div class="px-3 py-3">
            <p class="mt-3">
              <div class="text-center"><b><?=$facility_name?></b><br><br></div>
              <?=$facility_details?><br><br>
              
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
                                        </div> -->






  <section class="home-blog bg-sand">
    <div class="container">
		<!-- section title -->
		<div class="row justify-content-md-center">
			<div class="col-xl-5 col-lg-6 col-md-8">
				<div class="section-title text-center title-ex1">
					<h2>Latest News</h2>
					<p>Inventore cillum soluta inceptos eos platea, soluta class laoreet repellendus imperdiet optio.</p>
				</div>
			</div>
		</div>
		<!-- section title ends -->
		<div class="row ">

    <?php
            $today_date = date('m-d-y');
            $sql  = "SELECT * FROM `news_update`";
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
			<div class="col-md-6">

   
				<div class="media blog-media">
				  <a href="blog-post-left-sidebar.html"><img class="d-flex" src="<?= $base_path ?>gallery_images/<?=$gallery_image?>" alt="Generic placeholder image"></a>
				  <div class="circle">
				  	<!-- <h5 class="day"><?=$date_added?></h5> -->
				  	<h5 class="day">5</h5>
				  	<span class="month">sep</span>
				  </div>
				  <div class="media-body">
				    <a href=""><h5 class="mt-0"><?=$facility_name?></h5></a>
				    <?=$facility_details?>
				    <a href="dr-swapnil-patnoorkar-blogs-moredetails.php" class="post-link">Read More</a>
				    <ul>
				    	<li>by:dr.SwapnilPatnoorkar</li>
				    	<!-- <li class="text-right"><a href="blog-post-left-sidebar.html">07 comments</a></li> -->
				    </ul>
				  </div>
				</div>
			</div>
      <?php
          }else{ ?>
			<div class="col-md-6">
				<div class="media blog-media">
				  <a href="blog-post-left-sidebar.html"><img class="d-flex" src="<?= $base_path ?>gallery_images/<?=$gallery_image?>" alt="Generic placeholder image"></a>
				  <div class="circle">
  				  	<h5 class="day">12</h5>
  				  	<span class="month">sep</span>
  				  </div>
				  <div class="media-body">
				    <a href=""><h5 class="mt-0"><?=$facility_name?></h5></a>
            <?=$facility_details?>
				    <a href="dr-swapnil-patnoorkar-blogs-moredetails.php" class="post-link">Read More</a>
				    <ul>
				    	<li>by:dr.SwapnilPatnoorkar</li>
				    	<!-- <li class="text-right"><a href="blog-post-left-sidebar.html">04 comments</a></li> -->
				    </ul>
				  </div>
				</div>
			</div>
      <?php }
                        ?>
        
        <?php
                                              }
                                          }
                                          ?>
			<!-- <div class="col-md-6">
				<div class="media blog-media">
				  <a href="blog-post-left-sidebar.html"><img class="d-flex" src="https://www.bootdey.com/image/350x380/FF7F50/000000" alt="Generic placeholder image"></a>
				  <div class="circle">
  				  	<h5 class="day">09</h5>
  				  	<span class="month">sep</span>
  				  </div>
				  <div class="media-body">
				    <a href=""><h5 class="mt-0">deleniti incdunt magni</h5></a>
				    Sodales aliquid, in eget ac cupidatat velit autem numquam ullam ducimus occaecati placeat error.
				    <a href="blog-post-left-sidebar.html" class="post-link">Read More</a>
				    <ul>
				    	<li>by: Admin</li>
				    	<li class="text-right"><a href="blog-post-left-sidebar.html">10 comments</a></li>
				    </ul>
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="media blog-media">
				  <a href="blog-post-left-sidebar.html"><img class="d-flex" src="https://www.bootdey.com/image/350x380/008B8B/000000" alt="Generic placeholder image"></a>
				  <div class="circle">
  				  	<h5 class="day">04</h5>
  				  	<span class="month">sep</span>
  				  </div>
				  <div class="media-body">
				    <a href=""><h5 class="mt-0">Explicabo magnam </h5></a>
				    Sodales aliquid, in eget ac cupidatat velit autem numquam ullam ducimus occaecati placeat error.
				    <a href="blog-post-left-sidebar.html" class="post-link">Read More</a>
				    <ul>
				    	<li>by: Admin</li>
				    	<li class="text-right"><a href="blog-post-left-sidebar.html">06 comments</a></li>
				    </ul>
				  </div>
				</div>
			</div> -->
		</div>
	</div>
</section>

  </main><!-- End #main -->

<?php include("includes/footer.php")?>
