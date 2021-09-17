<?php include "inc/header.php";
include 'classes/LoginClass.php';
$admin = new LoginClass();
$adminid = "";
if($_GET['adminid']==NULL || !isset($_GET['adminid'])){
	"<script>window.location = 'show_admin.php'; </script>"; 
}else{
	$adminid = $_GET['adminid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateAdmin = $admin->updateAdmin($_POST,$adminid,$_FILES);
}
?>

<section style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="" enctype="multipart/form-data">
                    <?php if (isset($updateAdmin)){
                        echo $updateAdmin;
                    }  ?>
                            <?php 
                                $view = $admin->viewAdmin($adminid);
                                if($view){
                                    while($value = $view->fetch_assoc()){
                            ?>
                            
                    

                                <div class="form-group">
                                    <label class="title">Email Address</label>
                                    <input type="email" class="form-control" name="admin_email" value="<?php echo $value['admin_email'];?>">
                                </div>
                      
                                
                                <div class="form-group">
                                    <label class="title">Password </label>
                                    <input type="text" class="form-control" name="admin_password" value="<?php echo $value['admin_password'];?>">
                                </div>
                    
                                
                                <div class="form-group ">
                                    <label class="title">Image </label>
                                    <input class="form-control" type="file" name="image">
                                    <img src="../<?php echo $value['image'];?>" alt="">
                                </div>
                     
                                
                                <div class="form-group">
                                    <label class="title">Role</label>
                                    <select class="form-control" name="status">
                                        <option value="<?php echo $status = $value['status'];?>">
												<?php 
												if ($status==0) {
													echo "Super Admin";
												}
												elseif ($status==1) {
													echo "Admin";
												}
												elseif ($status==2) {
													echo "Editor";
												}else{
													echo "Something Wrong";
												}
												
												?>	
										</option>
                                        <option value="2">Editor</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Super Admin</option>
                                    </select>
                              
                            </div>
                            <?php }} ?>
                        <input type="submit" name="submit" value="Update" class="btn btn-primary button">
                       
                </form>
            </div>
        </div>
    </div>
</section>
<?php include "inc/footer.php"?>