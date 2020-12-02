<?php
// Include config file
// require_once "config.php";
 
// Define variables and initialize with empty values
$role_id = $role_desc = "";
$role_id_err = $role_desc_err = "";
 
const BASE_API = 'http://localhost:8080/role/';
                        
$id = $_GET['id'];
$item_json = file_get_contents( BASE_API . 'read/' . $id );
$item_array = json_decode($item_json, true);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Role</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Role</h2>
                        <br>
                        <h4>Role ID: <?php echo $item_array["roleID"] ?></h4>
                    </div>
                    
                    <form action="../functions.php" method="post">
                        
                        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>

                        <div class="form-group <?php echo (!empty($role_desc_err)) ? 'has-error' : ''; ?>">
                            <label>Role Description</label>
                            <input type="text" name="roleDesc" class="form-control" value="<?php echo $item_array["roleDesc"] ?>">
                            <span class="help-block"></span>
                        </div>

                       
                        <input type="hidden" name="source" class="form-control" value="role">
                        <input type="hidden" name="type" class="form-control" value="update">


                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="all.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>