<?php include "inc/header.php";
include '../Classes/LoginClass.php';
$create = new LoginClass();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $insertUser= $create->insertUser($_POST);
}
?>
<div class="span9" style="padding: 30px;">
    <div class="content">
        <div class="module">
            <div class="module-head text-center">
                <h3>Add User</h3>
            </div>
            <div class="tab-pane active" id="tab1">
                    <form action="" method="POST" class="form-horizontal" role="form">
                        <?php
                            if (isset($insertUser)) {
                                echo $insertUser;
                            }
                        ?>  
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Add User</label>
                         
                                <input type="text" name="customer_username" class="form-control">
                          
                        </div>
                        <div class="container bg-light">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info" name="submit">Submit</button>
                                <br>
                            </div>
                        </div>
                    <br>
                    </form>
                </div>
			</div>
            
        </div>
        
    </div>
</div>
	<style>
        .button{
            margin-left: 30px;
        }
    </style>
<?php include "inc/footer.php"?>