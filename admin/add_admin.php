<?php include 'inc/header.php';
include 'classes/LoginClass.php';
$create = new LoginClass();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createAdmin = $create->insertAdminName($_POST,$_FILES);
}
?>

<section style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="" enctype="multipart/form-data">
                    <?php if (isset($createAdmin)){
                        echo $createAdmin;
                    }  ?>
                             
                                <div class="form-group ">
                                    <label class="title">Email Address</label>
                                    <input type="email" class="form-control" name="admin_email" placeholder="Enter Email Address">
                                </div>
                           

                            
                          
                                <div class="form-group">
                                    <label class="title">Password </label>
                                    <input type="text" class="form-control" name="admin_password" placeholder="Enter Password">
                                </div>
                         
                            
                             
                                <div class="form-group">
                                    <label class="title">Image </label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                    
                                <div class="form-group">
                                    <label class="title">Role</label>
                                    <select class="form-control" name="status">
                                        <option value="2">Editor</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Super Admin</option>
                                    </select>
                                </div>
                             
                        <input type="submit" name="submit" value="Create Admin" class="btn btn-primary button">
                                    
              
          


                     
                     
                </form>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php';?>