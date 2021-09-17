<?php include 'inc/header.php';
include 'classes/EmployeeClass.php';
$salary = new EmployeeClass();
$salaryid = '';
if($_GET['salaryid']==NULL || !isset($_GET['salaryid'])){
	"<script>window.location = 'pay_salary.php'; </script>"; 
}else{
	$salaryid = $_GET['salaryid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $updateSalary = $salary->updateSalary($_POST,$salaryid);
}
?>
<section style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                    if(isset($updateSalary)){
                        echo $updateSalary;
                    }
                ?>
                <form method="POST">
                    <?php 
                        $view = $salary->viewSingleSalary($salaryid);
                        if($view){
                            while($value = $view->fetch_assoc()){
                    ?>
                    <div class="form-group">
                        <label>Employee Name</label>
                        <select name="e_ID" class="form-control">
                            <option value="<?php echo $value['e_ID'];?>"><?php echo $value['e_name'];?></option>
                            <?Php
                                $optionSalary = $salary->viewEditSalary($salaryid);
                                if($optionSalary){
                                    while($option = $optionSalary->fetch_assoc()){
                            ?>
                            <option value="<?php echo $option['e_ID'];?>"><?php echo $option['e_name'];?></option>
                            <?php }}?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                        <select name="month" class="form-control">
                            <option><?php echo $value['month'];?></option>
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
                        <input type="number" name="salary" min="10000" class="form-control" value="<?php echo $value['salary'];?>">
                    </div>
                    <div class="form-group">
                        <label class="title">Year</label>
                        <input type="number" name="year" class="form-control" value="<?php echo $value['year'];?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <?php }} ?>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php';?>