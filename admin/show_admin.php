<?php include "inc/header.php";
include 'classes/LoginClass.php';
$admin = new LoginClass();
if(isset($_GET['deladmin'])){
    $delAdmin = $_GET['deladmin'];
    $delete = $admin->deleteAdmin($delAdmin);
	if ($delete) {
		echo "<script> window.location='show_admin.php';</script>";
	 
	}
}
?>
<div class="span9" style="padding: 30px; float:left;">
		<div class="content">
			<div class="module">
				<div class="module-head text-center">
					<h3>Admin List</h3>
				</div>
                    <?php 
                        if(isset($delete)){
                            echo $delete;
                        }
                    ?>
					<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
						<thead>
							<tr>
                                <th>NO.</th>
								<th>Email</th>
								<th>Password</th>
								<th>Image</th>
								<th>Roll</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                $i = 0;
                                $view = $admin->viewAdminName();
                                foreach($view as $value){
							?>
							<tr class="odd gradeX">
                                <td><?php echo $i+= 1;?></td>
								<td><?php echo $value['admin_email'];?></td>
								<td><?php echo $value['admin_password'];?></td>
								<td><img style="height: 100px; width: 80px;" src="../<?php echo $value['image'];?>"></td>
								<td><?php if ($value['status'] == 0) 
                                    {echo "Super Admin";}
                                    else if($value['status'] == 1)
                                    {echo "Admin";}
                                    else if($value['status'] == 2)
                                    {echo "Editor";}  ;?>
                                </td>
								<?php if ($adminrole==0) {  ?>
								<td>
									<a href="edit_admin.php?adminid=<?php echo $value['admin_id'] ;?>">Edit</a>
									<span>||</span>
									<a href="?deladmin=<?php echo $value['admin_id'] ;?>">Delete</a>	
								</td>
								<?php } ?>
							</tr>
							<?php } ?>

						</tbody>
					</table>
				</div>
			</div>

		<br />
			
		</div>
	</div>
	
<?php include "inc/footer.php"?>