<?php

    const BASE_API = 'http://localhost:8080/store/';
                        
    $emp_id = $_GET['id'];
    $item_json = file_get_contents( BASE_API . 'read/' . $emp_id );
    $item_array = json_decode($item_json, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Store</title>
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
                        <h1>View Store Record</h1>
                    </div>

                    <div class="col-md-4 pull-left">
                        <svg width="15em" height="15em" viewBox="4 0 12 16" class="bi bi-file-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z"></path>
                        </svg>
                    </div>
                    <div class="col-md-8 pull-right">
                        <h2><?php echo $item_array["storeName"] . " " . $item_array["storeID"]; ?></h2>
                        <p class="form-control-static h4"><?php echo $item_array["storeID"]; ?></p>

                        

                    </div>

                    <div class="col-md-12"> 
                        <p></p>
                        <p><br></p>
                        <p><a href="all.php" class="btn btn-primary btn-lg btn-block">Back</a></p>
                        <p><a href="create.php" class="btn btn-primary btn-lg btn-block">Update Store</a></p>
                     </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>