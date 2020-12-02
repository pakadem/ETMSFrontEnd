<?php
// Include config file
// require_once "config.php";
 
// Define variables and initialize with empty values
$name = $surname = $phonenumber = $dob = "";
$name_err = $surname_err = $phonenumber_err = $dob_err = "";
 


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Report</title>
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
                        <h2>Generate Leave Report</h2>
                    </div>
                    
                    <p>Generate Leave Report </p>
                    <form action="../functions.php" method="post">
                      
                         <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <?php
                                
                                $item_json = file_get_contents('http://192.168.8.101:4500/leaveReport/getAll');
                                $item_array = json_decode($item_json, true);
                            ?>
                            <label>Employee</label>
                            <select name=""  class="form-control" id="sel1">
                                <?php
                                     $i = 0;
                                    foreach ($item_array as $key => $value) {
                                        
                                        echo "<option value='". $item_array[$i]['empID']."'>" . $item_array[$i]['empID'] . "</option>";
                                        $i++;
                                    }
                                ?>
                              
                            </select>   
                        </div>


                        

                        <input type="hidden" name="source" class="form-control" value="leaveReport">
                        <input type="hidden" name="type" class="form-control" value="create">

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="all.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>