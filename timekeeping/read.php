<?php

    const BASE_API = 'http://localhost:8080/Timekeeping/';
                        
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
                        <h1>View Time Record</h1>
                    </div>

                    <p class="form-control-static h4"><?php echo 'Time ID: ' . $item_array["recID"]; ?></p>
                    <p class="form-control-static h4"><?php echo 'Time In: ' . $item_array["time_In"]; ?></p>
                    <p class="form-control-static h4"><?php echo 'Time Out: ' . $item_array["time_Out"]; ?></p>
                    <?php
                        $emp_json = file_get_contents('http://localhost:8080/employee/read/' . $item_array["empID"]);
                        $emp_array = json_decode($emp_json, true);

                    ?>
                    <p class="form-control-static h4"><?php echo 'Employee: ' . $emp_array['empName'] . " " . $emp_array['empLastName']; ?></p>

                    <p><br></p>
                    <p><a href="all.php" class="btn btn-primary btn-lg btn-block">Back</a></p>
                    <p><a href="update.php?id=<?php echo $item_array["recID"] ?>" class="btn btn-primary btn-lg btn-block">Update Record</a></p>
                 
                </div>
            </div>        
        </div>
    </div>
</body>
</html>