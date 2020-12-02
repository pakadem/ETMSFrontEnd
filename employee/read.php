<?php

    const BASE_API = 'http://localhost:8080/employee/';
                        
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
                        <h1>View Employee Record</h1>
                    </div>

                    <div class="col-md-4 pull-left">
                        <svg width="15em" height="15em" viewBox="4 0 12 16" class="bi bi-file-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z"></path>
                        </svg>
                    </div>
                    <div class="col-md-8 pull-right">
                        <h2><?php echo $item_array["empName"] . " " . $item_array["empLastName"]; ?></h2>
                        <p class="form-control-static h4"><?php echo $item_array["empID"]; ?></p>

                        <p class="form-control-static h4"><?php echo 'Phone Number: ' . $item_array["empPhoneNumber"]; ?></p>
                        <p class="form-control-static h4"><?php echo 'Date of Birth: ' . $item_array["empDOB"]; ?></p>

                    </div>

                    <div class="col-md-12"> 
                        <p></p>
                        <p><br></p>
                        <p><a href="all.php" class="btn btn-primary btn-lg btn-block">Back</a></p>
                        <p><a href="create.php" class="btn btn-primary btn-lg btn-block">Update Record</a></p>
                     </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>