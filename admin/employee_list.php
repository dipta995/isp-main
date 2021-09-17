<?php include 'inc/header.php';
include 'classes/EmployeeClass.php';
$employee = new EmployeeClass();
if(isset($_GET['delEmployee'])){
    $delEmployee = $_GET['delEmployee'];
    $delete = $employee->deleteEmployee($delEmployee);
    if ($delete) {
		echo "<script> window.location='employee_list.php';</script>";
	 
	}
}
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <div>
                <?php 
                    if(isset($delete)){
                        echo $delete;
                    }
                ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>
                    <th>Salary</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $view = $employee->viewEmployee();
                        foreach($view as $value){
                    ?>
                    <tr>
                    <th scope="row"><?php echo $i+=1;?></th>
                    <td><?php echo $value['e_name'];?></td>
                    <td><?php echo $value['e_number'];?></td>
                    <td><?php echo $value['e_address'];?></td>
                    <td><img style="height: 100px; width: 80px;" src="../<?php echo $value['e_image'];?>" alt="Employee image"></td>
                    <td><?php echo $value['emp_salary'];?></td>
                    <td>
                        <a href="edit_employee.php?employeeid=<?php echo $value['ID'] ;?>">Edit</a>
                        <span>||</span>
                        <a href="?delEmployee=<?php echo $value['ID'] ;?>">Delete</a>
                        <br>
                        <a href="add_salary.php?salid=<?php echo $value['ID'] ;?>">Pay</a>
                    </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php';?>