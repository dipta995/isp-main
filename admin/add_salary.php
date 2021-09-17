<?php include 'inc/header.php';
include 'classes/EmployeeClass.php';
$employee = new EmployeeClass();
$create = new EmployeeClass();
if (!isset($_GET['salid']) || empty($_GET['salid'])) {
     echo "<script> window.location= 'employee_list.php';</script>";
}else{
    $salid = $_GET['salid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $createSalary = $create->insertSalary($_POST);
}
?>
<section style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form method="POST">
                    <?php
                        if(isset($createSalary)){
                            echo $createSalary;
                        }
                    ?>
                    <div class="form-group">
                        <label>Employee Name</label>
                        <select name="e_ID" class="form-control">
                            <option disabled>Select Employee</option>
                            <?php
                            $data = $employee->employeeViewbyid($salid);
                            // if ($getEmployee) {
                            //     while ($value = $getEmployee->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $data['ID'];?>"><?php echo $data['e_name'];?></option>
                         
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                        <select name="month" class="form-control">
                            <option value="<?php echo date('F'); ?>"><?php echo date('F'); ?></option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="Novembver">Novembver</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="number" name="salary" min="10000" class="form-control" value="<?php echo $data['emp_salary']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="title">Year</label>
                        <input type="number"  min="2000" name="year" value="<?php echo date('Y'); ?>" class="form-control" placeholder="Year">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php';?>