<?php include "inc/header.php"; ?>
<?php 
    include "Classes/LoginClass.php";
    $login = new LoginClass();
    if (isset($_POST['logincustomer'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $logincheck = $login->Customerlogin($user,$pass);
    }
?>
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="login col-md-8">
      <br>
      <br>
	  <br>
      <br>
      <h5>Log In</h5>
      <form method="POST" action="">
        <?php if (isset($logincheck)) {
              echo $logincheck;
          } ?>
          <br>
          <div class="form-group">
            <label for="inputEmail4">Username</label>
            <input type="text" name="user" class="form-control" id="inputEmail4" placeholder="your provided username">
          </div>
          <div class="form-group">
              <label for="inputPassword4">Password</label>
              <input type="password" name="pass" class="form-control" id="inputPassword4" placeholder="Password">
          </div>
        <button name="logincustomer" type="submit" class="btn btn-primary">Log in</button>
        <button class="btn btn-info"><a href="registration.php" style="color: white;">Sign up</a></button>
      </form>
	  <div style="margin-top:200px;"></div>
    </div>
  </div>
</div>

<?php include "inc/footer.php"; ?>