<?php include 'inc/header.php';
include 'classes/EmployeeClass.php';
$salary = new EmployeeClass();
if(isset($_GET['delEmployee'])){
    $delEmployee = $_GET['delEmployee'];
    $delete = $employee->deleteEmployee($delEmployee);
}
if(isset($_GET['delSalary'])){
    $delSalary = $_GET['delSalary'];
    $delete = $salary->deleteSalary($delSalary);
}

?>
<section>
    <div class="container">
        <div class="row">
        <div class="col-md-2">
    

        
   
  </div>
  <div class="card">
  <div class="card-body">
      <h3>Search By month and year</h3>
                <form action="" method="get">
                      <div class="row">
                        <div class="col">
                <select name="month" class="form-control">
                            <option disabled>Select Month</option>
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
                     <div class="col">
                    <input type="number" class="form-control" value="<?php echo date('Y'); ?>" min="2000" step="1" name="year" value="">
                     </div>
                     <div class="col">
                    <input type="submit" name="search" value="search">
                     </div>
                </form>
  </div>
  </div>
            </div>
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
                    <th scope="col">Employee Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Month</th>
                    <th scope="col">Year</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       if(isset($_GET['search'])=='search'){
                        $viewSalary = $salary->searchselery($_GET);
                    }else{
                        $month = date('F');
                        $year = date('Y');
                        $viewSalary = $salary->viewSalary($month,$year);
                    }
                    $i = 0;
                    $total = 0;
                    while ($value = $viewSalary->fetch_assoc()) {
                        $total +=$value['salary'];
                    ?>
                    <tr>
                    <th scope="row"><?php echo $i+=1;?></th>
                    <td><?php echo $value['e_name'];?></td>
                    <td><img style="height: 50px;" src="../<?php echo $value['e_image'];?>" alt="Employee Image"></td>
                    <td><?php echo $value['salary'];?></td>
                    <td><?php echo $value['month'];?></td>
                    <td><?php echo $value['year'];?></td>
                    <td>
                        <a href="edit_salary.php?salaryid=<?php echo $value['s_id'];?>">Edit</a>
                        <span>||</span>
                        <a href="?delSalary=<?php echo $value['s_id'];?>">Delete</a>
                    </td>
                    </tr>
                    <?php } echo "total spend :".$total;  ?>taka
                    
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php';?>