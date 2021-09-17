<?php include "inc/header.php";
   
    if ($_SESSION['loginauth'] !='customer' || empty($_SESSION['loginauth'])) {
        echo "<script> window.location = 'login.php';</script>";
       
     }

     if(isset($_GET['cancell'])){
         echo $pack->delpackuser($_GET['cancell']);
     }
    
?>

<div class="container" id="subscription">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Total Cost (TK)</th>
                <th>Amount of Month</th>
                <th>Subscribe at</th>
                <th>last date</th>
                <th>Total Amount</th>
                <th>Package Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $date=date("Y-m-d");
                $viewpack = $pack->ShowSelectedpackcus($_SESSION['customerid']);
                foreach($viewpack as $value){
            ?>
            <tr>
                <td><?php echo $value['pacage_name']?></td>
                <td><?php echo $value['pacage_price']?> taka</td>
                <td><?php echo $value['subscribe_month']?></td>
                <td><?php echo $value['applytime']?> </td>
                <td><?php echo $effectiveDate = date('Y-m-d', strtotime("+".$value['subscribe_month']." months", strtotime($value['applytime'])));?></td>
                <td><?php echo $value['subscribe_month']*$value['pacage_price']; ?> Taka</td>
                <td><?php if($value['confirmation'] == 0){
                        echo "<span style='color:red;'><a href='#'>Pending</a> || <a href='?cancell=".$value['subs_id']."'>Cancell</a></span>";
                    }else if($value['confirmation'] == 1){
                        echo "<span style='color:green';>Paid</span>";
                    }else if($effectiveDate<$date){
                        echo "<span style='color:red';>Left</span>";
                    }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
    <style>
        #subscription {
            padding: 100px;
        }
    </style>
<?php include "inc/footer.php"?>
