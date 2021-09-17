<?php include 'inc/header.php';
include 'classes/PackageClass.php';
$create = new PackageClass();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createPackage = $create->insertPackage($_POST);
}
?>
<section style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <?php
                if(isset($createPackage)){
                    echo $createPackage;
                }
            ?>
                <form method="POST">
                    <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" name="pacage_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Package Speed</label>
                        <input type="number" min=1 step="0.5" name="pacage_speed" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Package Description</label>
                        <textarea class="form-control" name="pacage_desc" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Package Price</label>
                        <input type="number" name="pacage_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Offer</label>
                        <select name="offer_status" class="form-control">
                            <option disabled>Select Offer</option>
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                        <select name="month" class="form-control">
                            <option disabled>Select Month</option>
                            <option value="0">All</option>
                            <option value="6">Only 6 Months</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php';?>