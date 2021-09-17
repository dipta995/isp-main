<?php include 'inc/header.php'; ?>

<div class="container text-center">
    <h2>Welcome to Admin Panel</h2>
 
<?php 
$area = new AreaClass();
if (isset($_GET['delarea'])) {
    echo $del = $area->delarea($_GET['delarea']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['areaadd'])) {
    echo $aracreate = $area->addarea($_POST);
}

if (isset($_GET['uparea'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatearea'])) {
        echo $area->updatear($_POST,$_GET['uparea']);
    }
?>
  <div class="form-group">
    <label for="exampleInputEmail1">Area Name</label>
<?php
    $areaid = $area->shwoareabyid($_GET['uparea']);
    foreach ($areaid as $val) {
        
        
        ?>
        <form method="post" action="">
    <input type="text" class="form-control" id="exampleInputEmail1" name="areaName" aria-describedby="emailHelp" value="<?php echo $val['areaName']; ?>">
    
 <?php } ?>
 
  <button name="updatearea" type="submit" class="btn btn-primary">Submit</button>
</form>


<?php }else{?>


    <form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Area Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="areaName" aria-describedby="emailHelp" placeholder="Enter Area Name">
    
 
 
  <button name="areaadd" type="submit" class="btn btn-primary">Submit</button>
</form>

<?php } ?>





<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Area</th>
 
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <?php $arealist =$area->ShowArea();
  $i = 0;
   foreach ($arealist as $value) {
   ?>
    <tr>
      <th scope="row"><?php echo $i+=1?></th>
      <td><?php echo $value['areaName']; ?></td>
      <td><a href="?uparea=<?php echo $value['areaId']; ?>">Update</a> || <a href="?delarea=<?php echo $value['areaId']; ?>">Delete</a></td>
 
    </tr>
    <?php } ?>
  
  </tbody>
</table>

    
</div> 
<?php include 'inc/footer.php'; ?>