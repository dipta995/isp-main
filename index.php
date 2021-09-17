<?php include "inc/header.php";


?>
 
<!-- slider end -->
<!--test-->

      <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">

       
       
          <?php 
                $show = $show->showSlide();
                if($show){
                    $a=0;
                while ($value = $show->fetch_assoc()){
                    $a++;
            ?>
          <div class="carousel-item <?php if($a==1){echo 'active';} ?>" style="background-image: url('<?php echo $value['image'];?>'); background-size: cover; ">
          <div class="caption">
              <!-- <h1>Something and share your whatever</h1>
              <h2>Else it easy for you to do whatever this thing does.</h2>

              <a class="big-button" href="" title="">Create Project</a>
              <div class="clear"></div>
              <a class="view-demo" href="" title="">View Demo</a> -->
              <?php echo $value['caption'];?>
            </div>
          </div>
<?php } } ?>
        </div>
        
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
 
 
  <!-- Full Page Image Background Carousel Header -->
  

<!-- special section -->
<section id="special">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title mb-50px text-center"> 
                <span>Features</span>
                <h1>Why we are Special</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="feature-item mb-30px">
                <h4>Unlimited Package</h4>
                <p>Legend internet service is a is a private broadband internet service provider  with 12 years of experience.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="feature-item mb-30px">
                <h4>Dedicated IP Server</h4>
                <p>Legend internet service is a is a private broadband internet service provider  with 12 years of experience.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="feature-item mb-30px">
                <h4>Fiver Optic Network</h4>
                <p>Legend internet service is a is a private broadband internet service provider  with 12 years of experience.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="feature-item mb-30px">
                <h4>Stable Connections</h4>
                <p>Legend internet service is a is a private broadband internet service provider  with 12 years of experience.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="feature-item mb-30px">
                <h4>Buffer Free Browsing</h4>
                <p>Legend internet service is a is a private broadband internet service provider  with 12 years of experience.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="feature-item mb-30px">
                <h4>24/7 Customer Support</h4>
                <p>Legend internet service is a is a private broadband internet service provider  with 12 years of experience.</p>
            </div>
        </div>
    </div>
  </div>
</section>
<!-- special section end -->

<!-- package section-->
<section id="package">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-50px text-center">
                    <span>Pricing</span>
                    <h1>Choose your Package Plan</h1>
                </div>
            </div>
        </div>
        <div class="row">
        <?php 
        $viewpack = $pack->ShowAllpacklimit();
        foreach ($viewpack as $value) {
        ?>
            <div class="col-lg-4 col-md-4 package">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="pack_head">

                            <h5 style="font-size:30px;text-transform: uppercase;" class="card-title"><?php echo $value['pacage_name'] ?></h5>
                            <div class="speed">
                                <h1><?php echo $value['pacage_speed'] ?></h1>
                                <span style="color:#fff;font-size:18px; font-weight:600;">mbps</span>
                            </div>
                        </div>
                        <div class="pricing-content pack_body">
                            <?php echo $value['pacage_desc'] ?> 
                            <h1><?php echo $value['pacage_price'] ?> Tk</h1>
                                <span>Monthly</span>
                        </div>
                        <div class="pricing-footer pack_footer">
                            <a style="box-shadow: 10px 10px 5px grey;" href="applysubscribe.php?packid=<?php echo $value['pacage_id'] ?>" class="btn btn-outline-info">Select Plan</a>
                            <div class="price">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<div class="d-flex justify-content-center">

    <a  style="box-shadow: 10px 10px 5px grey;" class="btn btn-outline-info text-center" href="package.php">Show All Package</a>
</div>
<br>
<!-- package section end-->

<!-- contact us section -->
<section style="background-color: rgb(23, 162, 184);color:#fff;
    padding: 50px;" class="contactUs">
  <div class="container-fluid">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2">
                  <div class="cta-info text-center">
                      <h2>Need any help about Pricing, Location or others? Please feel free to contact us</h2>
                      <a href="complain.php" class="btn btn-dark">Contact us</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- contact us section end-->

<style>
 .pack_head{background: rgb(23, 162, 184);padding: 10px;border-radius: 15px 50px 30px;box-shadow: 10px 10px 5px grey;color:#fff;}
 .pack_body{margin-top: 20px;padding-bottom: 20px;background: #dbd8d44a;border-radius: 10px;box-shadow: 10px 10px 5px grey;}
 .pack_footer{margin-top:10px;}
 .carousel-inner {
	width: 100%;
	display: inline-block;
	position: relative;
}
.carousel-inner {
	padding-top: 43.25%;
	display: block;
	content: "";
}
.carousel-item {
	position: absolute;
	top: 0;
	bottom: 0;
	right: 0;
	left: 0;
	background: skyblue;
	background: no-repeat center center scroll;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

.caption {
	position: absolute;
	top: 50%;
	left: 50%;
    transform: translateX(-50%) translateY(-50%);
	width: 60%;
	z-index: 9;
	margin-top: 20px;
	text-align: center;
}
.caption h1 {
  color: #fff;
	font-size: 52px;
	font-weight: 700;
	margin-bottom: 23px;
}
.caption h2 {
  color: rgba(255,255,255,.75);
	font-size: 26px;
	font-weight: 300;
}
a.big-button {
	color: #fff;
	font-size: 19px;
	font-weight: 700;
	text-transform: uppercase;
	background: #eb7a00;
	background: rgba(255, 0, 0, 0.75);
	padding: 28px 35px;
	border-radius: 3px;
	margin-top: 80px;
	margin-bottom: 0;
	display: inline-block;
}
a.big-button:hover {
	text-decoration: none;
	background: rgba(255, 0, 0, 0.9);
}
a.view-demo {
	color: #fff;
	font-size: 21px;
	font-weight: 700;
	display: inline-block;
	margin-top: 35px;
}
a.view-demo:hover {
	text-decoration: none;
	color: #333;
}

.carousel-indicators .active {
  background: #fff;
}
.carousel-indicators li {
  background: rgba(255, 255, 255, 0.4);
  border-top: 20px solid;
  z-index: 15;
}
</style>
<?php include "inc/footer.php"; ?>