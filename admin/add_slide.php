<?php include "inc/header.php";
include '../Classes/SlideClass.php';
$create = new SlideClass();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $insertSlide= $create->insertSlide($_POST, $_FILES);
}
?>
<div class="span9" style="padding: 30px;">
    <div class="content">
        <div class="module">
            <div class="module-head text-center">
                <h3>Add Slide</h3>
            </div>
            <div class="tab-pane active" id="tab1">
                    <form action="" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <?php
                        if (isset($insertSlide)) {
                            echo $insertSlide;
                        }
                    ?>  
                        <div class="form-group">
                            <label class="col-sm-2 control-label">File input</label>
                            <div class="col-sm-10">
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Caption</label>
                            <div class="col-sm-10">
                              
                                <textarea type="text" name="caption" id="" cols="100" rows="2"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    
                    </form>
                </div>
			</div>
            
        </div>
        
    </div>
</div>
	
<?php include "inc/footer.php"?>