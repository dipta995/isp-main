<?php include 'inc/header.php';
include 'classes/EmployeeClass.php';
$create = new EmployeeClass();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createEmployee = $create->insertEmployee($_POST,$_FILES);
}
?>
<section style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="" enctype="multipart/form-data">
                    <?php if (isset($createEmployee)){
                            echo $createEmployee;
                    }  ?>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="e_name" class="form-control" placeholder="Enter Employee Name">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" name="e_number" class="form-control" placeholder="Enter Mobile Number">
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="number" name="emp_salary" min="0" class="form-control" placeholder="Enter employee salary">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="e_address" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="title">Image </label>
                        <input class="form-control" type="file" name="e_image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php';?>