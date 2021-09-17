<?php 
include 'inc/header.php'; 

if ($_SESSION['loginauth'] !='customer' || empty($_SESSION['loginauth'])) {
   echo "<script> window.location = 'login.php';</script>";
  
}
  
  if (isset($_POST['complainadd'])) {
    $sendcom= $comp->SendComplain($_POST);
    } 
  ?>
  <div style="height: 30px;">
  	
  </div> 

  <div class="container">
    <br>
    <br>
  	<h4>Write Your Complain Here (max 300 Word's)</h4>
    <?php if (isset($sendcom)) {
        echo $sendcom;
      } ?>
  	<form method="POST" action="">
 
        <input type="hidden" name="customer_id" value="<?php echo $_SESSION['customerid'] ?>">

        <div class="form-outline mb-4">
          <input type="hidden"  name="customer_username" value="<?php echo $_SESSION['username'] ?>" class="form-control" />
        </div>
      
        <div class="form-outline mb-4">
          <label class="form-label" for="form4Example3">Complan Box</label>
          <textarea name="complain" class="form-control" id="form4Example3" cols="6" rows="14"></textarea>
        </div>
 
        <button type="submit" name="complainadd" class="btn btn-info btn-block mb-4">Send</button>
    </form>
  </div>

<?php include "inc/footer.php"; ?>