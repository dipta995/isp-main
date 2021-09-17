<?php 
include 'inc/header.php'; 
 

if ($_SESSION['loginauth'] !='customer' || empty($_SESSION['loginauth'])) {
    echo "<script> window.location = 'login.php';</script>";
   
 }
    if (isset($_GET['packid'])) {
        $packid = $_GET['packid'];
    }
    
?>
<br>
<br>
<br>
    <div style="height: 50px;" class="text-center form-control">
      
    </div>
<div class="container">
  	<h4 class="text-center">Complete The Process To Confirm The Subscription</h4>
      <div class="text-center">
      <?php
            if ($_SERVER['REQUEST_METHOD'] =='POST') {
                echo  $sendsubs= $pack->ApplyPack($_POST,$_GET['packid'],$_SESSION['customerid']);
            } 
        ?>

      </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php 
                $viewpack = $pack->ShowSelectedpack($packid);
                foreach($viewpack as $value){
            ?> 
            <form method="POST" action="">
         
                <input type="hidden" value="<?php echo $_SESSION['customerid'] ?>">

                <div class="form-group">
                    <label>Package Name</label>
                    <input type="text" readonly value="<?php echo $value["pacage_name"]?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Speed</label>
                    <input type="text" readonly value="<?php echo $value["pacage_speed"]?> mbps" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Package Amount (TK)</label>
                    <input type="text" name="pacage_amount" id="amount_one" readonly value="<?php echo $value["pacage_price"]?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Months Total amount: <span style= "color: green;" id="amount"><?php if($value["offer_status"] == 1){ echo $value["pacage_price"]*$value["month"];} else{echo $value["pacage_price"];}?></span> TK</label>
                    <input onchange="amount()" type="number" name="subscribe_month" id="amount_two" min="<?php if($value["offer_status"] == 1){echo $value["month"];} else{echo 1;}?>" max="12" value="<?php if($value["offer_status"] == 1){echo $value["month"];} else{echo 1;}?>" class="form-control" />
                </div>
                <?php 
$cid =$_SESSION['customerid'];
                    $checkpack = $pack->ShowSelectedpackcus($cid);
  
                    $confir="";
                    foreach ($checkpack as $values) {
                        
                    $confir = $values['confirmation'];

                    } 
                ?>


                <div class="form-group">
                    <label>Bkash Account No</label>
                    <select name="getway" id="" class="form-control">
                        <option value="">--Choose---</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Rocket">Rocket</option>
                        <option value="Nogod">Nogod</option>
                    </select>
                </div>
                <div class="form-group">
                    <label> Account No</label>
                    <input type="number" name="account_no" id="" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Transection ID</label>
                    <input type="text" name="code_no" id="" class="form-control" />
                </div>






                <button type="submit" value="sendPack" class="btn btn-primary btn-block mb-4">Send</button>
                
            </form>
            <?php } ?>
        </div>
    </div>
  	
  </div>
  <script>
    function amount(){
        let x = document.getElementById("amount_one").value;
        let y = document.getElementById("amount_two").value;
        document.getElementById("amount").innerHTML = x*y;
    }
  </script>
<?php include "inc/footer.php"; ?>