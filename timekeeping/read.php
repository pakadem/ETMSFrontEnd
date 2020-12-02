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

                    <div class="page-header clearfix">
                        <a href="../index.php" class="btn btn-primary pull-right btn-lg">
                            <svg width="1em" height="1em" viewBox="0 0 16 12" class="bi bi-house-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                            </svg>  
                            Home
                        </a>
                        <br>
                        <br>
                    </div>

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