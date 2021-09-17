<?php include 'inc/header.php';
include 'classes/PackageClass.php';
$show = new PackageClass();
 
if(isset($_GET['delPacid'])){
	$delPackage = $_GET['delPacid'];
	$deletePackage = $show->delPackage($delPackage);
	echo "<script> window.location='show_package.php';</script>";
}
?>
<div class="span9" style="padding: 30px; float:left;">
		<div class="content">
			<div class="module">
				<div class="module-head text-center">
					<h3>User List</h3>
				</div>
				<?php 
					
				?>
					<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
						<thead>
							<tr>
                                <th>NO.</th>
								<th>Package Name</th>
								<th>Package Speed</th>
								<th>Package Description</th>
								<th>Package Price</th>
								<th>Offer</th>
								<th>Month</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                               $i = 0;
							   $showPackage = $show->showPackageList();
							   foreach($showPackage as $value){
							?>
							<tr class="odd gradeX">
                                <td><?php echo $i+= 1;?></td>
								<td><?php echo $value['pacage_name'];?></td>
								<td><?php echo $value['pacage_speed'];?></td>
								<td><?php echo $value['pacage_desc'];?></td>
								<td><?php echo $value['pacage_price'];?></td>
								<td><?php if($value['offer_status']==0){echo " Available";}else{echo "Not Available";}?></td>
								<td><?php if($value['month']==0){echo "All";}else{echo "Only 6 Months";}?></td>
								<?php if ($adminrole==0 || $adminrole==1) {  ?><td>
										<a href="edit_package.php?pacid=<?php echo $value['pacage_id']?>">Edit</a>
									||
										<a href="?delPacid=<?php echo $value['pacage_id']; ?>">Delete</a>	
								</td> <?php } ?>
							</tr>
							<?php } ?>

						</tbody>
					</table>
				</div>
			</div>

		<br />
			
		</div>
</div>
<?php include 'inc/footer.php';?>