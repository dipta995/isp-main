<?php include 'inc/header.php';
include 'classes/PackageClass.php';
$packageItem = new PackageClass();
$pacid = "";
if($_GET['pacid']==NULL || !isset($_GET['pacid'])){
	"<script>window.location = 'show_package.php'; </script>"; 
}else{
	$pacid = $_GET['pacid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $updatePackage = $packageItem->updatePackage($_POST,$pacid);
}
?>
<section style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <?php
                if(isset($updatePackage)){
                    echo $updatePackage;
                }
            ?>
            <?php
                $view = $packageItem->viewSinglePackage($pacid);
                if($view){
                    while($value = $view->fetch_assoc()){
            ?>
                <form method="POST">
                    <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" name="pacage_name" class="form-control" value="<?php echo $value['pacage_name'];?>">
                    </div>
                    <div class="form-group">
                        <label>Package Speed</label>
                        <input type="number" name="pacage_speed" min=1 step="0.5" class="form-control" value="<?php echo $value['pacage_speed'];?>">
                    </div>
                    <div class="form-group">
                        <label>Package Description</label>
                        <textarea class="form-control" name="pacage_desc" rows="3"><?php echo $value['pacage_desc'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Package Price</label>
                        <input type="number" name="pacage_price" class="form-control" value="<?php echo $value['pacage_price'];?>">
                    </div>
                    <div class="form-group">
                        <label>Offer</label>
                        <select name="offer_status" class="form-control">
                          
                            <option <?php if($value['offer_status']==1){ echo "selected"; }?> value="1">Available</option>
                            <option <?php if($value['offer_status']==0){ echo "selected"; }?> value="0">Not Available</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                        <select name="month" class="form-control">
                           
                            <option <?php if($value['month']==0){ echo "selected"; }?> value="0">All month</option>
                            <option <?php if($value['month']==6){ echo "selected"; }?> value="6">Only 6 Months</option>
                        </select>
                    </div>
                    <?php }} ?>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php';?>