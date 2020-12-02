<?php
// Include config file
// require_once "config.php";
 
// Define variables and initialize with empty values
$name = $surname = $phonenumber = $dob = "";
$name_err = $surname_err = $phonenumber_err = $dob_err = "";
 
const BASE_API = 'http://192.168.8.101:4500/store/';
                        
$emp_id = $_GET['id'];
$item_json = file_get_contents( BASE_API . 'read/' . $emp_id );
$item_array = json_decode($item_json, true);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1024px;
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
                        <h2>Update Store: <?php echo $item_array["storeID"] ?></h2>
                    </div>
                    <p>Please fill this form and submit to add store record to the database.</p>
                    <form action="functions.php" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>storeName</label>
                            <input type="text" name="storeName" class="form-control" value="<?php echo $item_array["storeName"] ?>">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group <?php echo (!empty($surname_err)) ? 'has-error' : ''; ?>">
                            <label>StoreID</label>
                            <input type="text" name="storeID" class="form-control" value="<?php echo  $item_array["storeID"] ?>">
                            <span class="help-block"></span>
                        </div>
                        
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="all.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>