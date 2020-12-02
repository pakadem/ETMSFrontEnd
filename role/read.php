<?php

    const BASE_API = 'http://192.168.8.101:4500/role/';
                        
    $emp_id = $_GET['id'];
    $item_json = file_get_contents( BASE_API . 'read/' . $emp_id );
    $item_array = json_decode($item_json, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                        <h1>View Role Record</h1>
                    </div>

                    <p class="form-control-static h4"><?php echo 'Role ID: ' . $item_array["roleID"]; ?></p>
                    <p class="form-control-static h4"><?php echo 'Role Description: ' . $item_array["roleDesc"]; ?></p>

                    <p><br></p>
                    <p><a href="all.php" class="btn btn-primary btn-lg btn-block">Back</a></p>
                    <p><a href="update.php?id=<?php echo $item_array["roleID"] ?>" class="btn btn-primary btn-lg btn-block">Update Record</a></p>
                 
                </div>
            </div>        
        </div>
    </div>
</body>
</html>