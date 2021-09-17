<?php 
    include "inc/header.php";
   
 ?>
<?php 
      include 'Classes/LoginClass.php';
      $login = new LoginClass();
      if (isset($_POST['createAcc'])) {
          $logincheck= $login->CustomerReg($_POST);
      }

?> 
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="padding: 20px;">
        <h5>Create New Account</h5>
        <div>
        <?php if (isset($logincheck)) {
            echo $logincheck;
          } ?>
        </div>
        
          <form method="POST">
            <div class="form-group">
              <label for="exampleFormControlInput1">First Name</label>
              <input type="text" class="form-control" name="firstName"  placeholder="Enter Your First Name">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Last Name</label>
              <input type="text" class="form-control" name="lastName"  placeholder="Enter Your Last Name">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email address</label>
              <input type="email" class="form-control" name="customer_email"  placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Customer Username</label>
              <input type="text" class="form-control" name="customer_username"  placeholder="Username">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Customer Mobile</label>
              <input type="number" min="1" class="form-control" name="customer_phone" placeholder="Mobile">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Password</label>
              <input type="password" class="form-control" name="customer_password"  placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Choose Your Area</label>
              <select name="area_id" class="form-control" id="exampleFormControlSelect1">
                <option value="">Choose Your Area</option>
                <?php 
                  $viewarea = $area->ShowArea();
                  foreach ($viewarea as $value) {
              
                  ?>
                  <option value="<?php echo $value['areaId']; ?>"><?php echo $value['areaName']; ?></option>
                
                <?php } ?>
              </select>
            </div>
            <button name="createAcc" type="submit" class="btn btn-info">Confirm </button>
            <button class="btn btn-info"><a href="login.php" style="color: white;">Login</a></button>
          </form>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>