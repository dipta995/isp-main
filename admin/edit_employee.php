<?php include 'inc/header.php';
include 'classes/EmployeeClass.php';
$employee = new EmployeeClass();
$employeeid = "";
if($_GET['employeeid']==NULL || !isset($_GET['employeeid'])){
	"<script>window.location = 'employee_list.php'; </script>"; 
}else{
	$employeeid = $_GET['employeeid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateEmployee = $employee->updateEmployee($_POST,$employeeid,$_FILES);
}
?>
<section style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="" enctype="multipart/form-data">
                    <?php if (isset($updateEmployee)){
                        echo $updateEmployee;
                    }  ?>
                    <?php 
                        $view = $employee->viewSingleEmployee($employeeid);
                        if($view){
                            while($value = $view->fetch_assoc()){
                    ?>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="e_name" class="form-control" value="<?php echo $value['e_name'];?>">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" name="e_number" class="form-control" value="<?php echo $value['e_number'];?>">
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="number" name="emp_salary" min="0" class="form-control" value="<?php echo $value['emp_salary'];?>">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="e_address" rows="3"><?php echo $value['e_address'];?></textarea>
                    </div>
                    <div class="form-group">
                        <img style="height: 100px; width: 80px;" src="../<?php echo $value['e_image'];?>"" alt="Employee Image">
                    </div>
                    <div class="form-group">
                        <label class="title">Image </label>
                        <input type="file" name="e_image">
                    </div>
                    <?php }} ?>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php';?>