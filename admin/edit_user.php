<?php include "inc/header.php";
include '../Classes/LoginClass.php';
$update = new LoginClass();
$id = "";
if($_GET['userid']==NULL || !isset($_GET['userid'])){
	"<script>window.location = 'show_user.php'; </script>"; 
}else{
	$id = $_GET['userid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $upuser = $update->updateUser($_POST,$id);
}
?>
<div class="span9" style="padding: 30px;">
    <div class="content">
        <div class="module">
            <div class="module-head text-center">
                <h3>Edit User</h3>
            </div>
            <div class="tab-pane active" id="tab1">
                    <form action="" method="POST" class="form-horizontal" role="form">
                        <?php
                            if (isset($upuser)) {
                                echo $upuser;
                            }
                        ?>  
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Edit User</label>
                            
                                <?php
                                    $getUser = $update->catUserById($id);
                                    if ($getUser) {
                                    while ($value = $getUser->fetch_assoc()) {
                                ?>
                                <input type="text" name="customer_username" class="form-control" value="<?php echo $value['customer_username']; ?>">
                                <?php }} ?>
                             
                        </div>
                        <div class="container bg-light">
                            <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-info" name="submit">Update</button>
                            </div></div>
                    </form>
                </div>
			</div>
        </div>
    </div>
</div>
	
<?php include "inc/footer.php"?>