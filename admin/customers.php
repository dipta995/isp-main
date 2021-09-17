<?php 
    include "inc/header.php";
	include "classes/CustomerClass.php";
	$customer = new CustomerClass();
	$log = new CustomerClass();
 	if (isset($_GET['blockid'])) {
         $log->blockuser($_GET['blockid']);
    }if (isset($_GET['unblockid'])) {
         $log->unblockuser($_GET['unblockid']);
    }
?>
	<div class="span9" style="padding: 30px;">
		<div class="content">
			<div class="module">
				<div class="module-head text-center">
					<h3>Customer List</h3>
				</div>
				<div class="module-body table">
					<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Customer</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$i = 0;
							$viewcustomer = $customer->ShowCustomerlistreg();
							foreach($viewcustomer as $value){
						?>
							<tr class="odd gradeX">
								<td><?php echo $i+= 1;?></td>
								<td><?php echo $value['firstName']." ".$value['lastName']." (".$value['customer_username'].")"?></td>
								<td><?php echo $value["customer_phone"]?></td>
								<td><?php echo $value["customer_email"]?></td>
								<td><?php echo $value["customer_address"]."(".$value['areaName'].")" ?></td>
								<td><?php if($value['blockuser'] == 0) {?>
										<a href="?blockid=<?php echo $value['customer_id'] ?>">Block</a>
									<?php }else if($value['blockuser'] == 1){ ?>
										<a href="?unblockid=<?php echo $value['customer_id']?>">Unblock</a>
									<?php } ?>
								</td>
							</tr>
						
						<?php } ?> 

						</tbody>
					</table>
				</div>
			</div><!--/.module-->

		<br />
			
		</div><!--/.content-->
	</div>
<?php include 'inc/footer.php'; ?>