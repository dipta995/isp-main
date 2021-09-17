<?php include "inc/header.php";
include '../Classes/SlideClass.php';
$show = new SlideClass();
$dl = new SlideClass();
if(isset($_GET['delSlide'])){
	$delSlide = $_GET['delSlide'];
	$delSlide = $dl->delSlide($delSlide);
}
?>
<div class="span9" style="padding: 30px; min-width: 600px; float:left;">
		<div class="content">
			<div class="module">
				<div class="module-head text-center">
					<h3>Slide List</h3>
				</div>
				<?php 
					if(isset($delSlide)){
						echo $delSlide;
					}
				?>
					<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
						<thead>
							<tr>
								<th>NO.</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i = 0;
								$showSlide = $show->showSlide();
								foreach($showSlide as $value){
							?>
							<tr class="odd gradeX">
								<td><?php echo $i+= 1;?></td>
								<td><img style="height: 100px; width: 80px;" src="../<?php echo $value['image'];?>"></td>
								<td>
									<a href="?delSlide=<?php echo $value['id']; ?>">Delete</a>	
								</td>
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