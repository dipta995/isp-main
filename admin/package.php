<?php 
    include 'inc/header.php';
    include '../Classes/PackageClass.php';
    $pack = new PackageClass();
 	if (isset($_GET['paid'])) {
        echo $pack->SubsupdateasPaid($_GET['paid']);
    }

?>
    <div class="span9" style="padding: 30px; float:left;">
        <div class="content">
            <div class="module">
                <div class="module-head text-center">
                    <h3>Subcription List</h3>
                </div>
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Pacage</th>
                                <th>Customer</th>
                                <th>Credit</th>
                                <th>Issue At</th>
                                <th>Decline At</th>
                                <th>Getway</th>
                                <th>Account No</th>
                                <th>Transection Id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $date=date("Y-m-d");
                                $i = 0;
                                $viewcomp = $pack->Subscribepackforadmin();
                                foreach ($viewcomp as $value) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i+= 1; ?></td>
                                <td><?php echo $value['pacage_name'] ?></td>
                                <td><?php echo $value['firstName']." ".$value['lastName']." (".$value['customer_username'].")"?></td>
                                <td><?php echo $value['pacage_amount']*$value['subscribe_month'] ?></td>
                                <td><?php echo $value['applytime'] ?></td>
                                <td class="center"><?php 
                                    echo $prdate = $pack->datecountadmin($value['subscribe_month'],$value['applytime']);?>
                                </td>
                                <td><?php echo $value['getway'] ?></td>
                                <td><?php echo $value['account_no'] ?></td>
                                <td><?php echo $value['code_no'] ?></td>
                                <td class="center">
                                    <?php 
                                        if ($value['confirmation']==0) {?>
                                                <a href="?paid=<?php echo $value['subs_id'] ?>">confirm</a>
                                        <?php }elseif ($value['confirmation']==1) {
                                            echo "Paid &  Running";
                                        }elseif ($prdate<$date) {
                                            echo "Expaired";
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--/.module-->

        <br />
            
        </div><!--/.content-->
    </div><!--/.span9--> 
<?php include 'inc/footer.php'; ?>