<?php include "inc/header.php";
 
?>
  <div style="height: 30px;">
  	
      </div> 
      <style> .pack_head{background: rgb(23, 162, 184);padding: 10px;border-radius: 15px 50px 30px;box-shadow: 10px 10px 5px grey;color:#fff;}
 .pack_body{margin-top: 20px;padding-bottom: 20px;background: #dbd8d44a;border-radius: 10px;box-shadow: 10px 10px 5px grey;}
 .pack_footer{margin-top:10px;}</style>
<section id="package">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-50px text-center">
                    <h1>Choose your Package Plan</h1>
                    <br>
        <a style="box-shadow: 10px 10px 5px grey;" class="btn btn-outline-info" href="?checker=offer">Offer</a>
        <a style="box-shadow: 10px 10px 5px grey;" class="btn btn-outline-info" href="?checker=regular">regular</a>
        <a style="box-shadow: 10px 10px 5px grey;" class="btn btn-outline-info" href="package.php">All</a>
                </div>
            </div>
        </div>
        <div class="row">
        <?php 
        if (isset($_GET['checker'])) {
            $src=  $_GET['checker'];
        }else{
            $src="";
        }
        $viewpack = $pack->ShowAllpacksearch($src);
        foreach ($viewpack as $value) {
        ?>
            <div class="col-lg-4 col-md-4 package rgba-cyan-light">
                <div style="background-color: #d7e9f185;" class="card">
                    <div class="card-body text-center">
                    <?php if($value['month']>0){ ?>
                            <span class="offer">OFFER</span>
                            <?php } ?>
                        <div class="pack_head">
                           
                           <h5 style="font-size:30px;text-transform: uppercase;" class="card-title"><?php echo $value['pacage_name'] ?> </h5> 
                      
                        
                        <div class="speed">
                            <h4 ><?php echo $value['pacage_speed'] ?><span style="color:#fff;">mbps</span> <span style="color:black;">/<span> <span style="color:#fff;"><?php if ($value['month']==0){ echo "Monthly";}else{ echo $value['month']." Month";  } ?> </span></h4>
							<h4 style="color:#fff;"><?php echo $value['pacage_price'] ?> Tk</h4>
                            
                        </div>
                    </div>
                        <div class="pricing-content pack_body">
                            <?php echo $value['pacage_desc'] ?>
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
<?php include "inc/footer.php";?>