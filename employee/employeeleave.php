<?php
// Include config file
// require_once "config.php";
 
// Define variables and initialize with empty values
$start_date = $end_date = "";
$start_date_err = $end_date_err = "";
 


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Leave</title>
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
                        <h2>Assign Employee to Leave</h2>
                    </div>
                    
                    <p>Assign Employee to Role </p>
                    <form action="../functions.php" method="post">
                      
                         <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <?php
                                
                                $item_json = file_get_contents('http://localhost:8080/employee/all');
                                $item_array = json_decode($item_json, true);
                            ?>
                            <label>Employee</label>
                            <select name="empID"  class="form-control" id="sel1">
                                <?php
                                     $i = 0;
                                    foreach ($item_array as $key => $value) {
                                        
                                        echo "<option value='". $item_array[$i]['empID']."'>" . $item_array[$i]['empName'] . " " . $item_array[$i]['empLastName'] . "</option>";
                                        $i++;
                                    }
                                ?>
                              
                            </select>   
                        </div>


                        <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <?php
                               
                                $item_json = file_get_contents('http://localhost:8080/leave/all');
                                $item_array = json_decode($item_json, true);
                            ?>
                            <label>Leave</label>
                            <select name="leaveID"  class="form-control" id="sel1">
                                <?php
                                     $i = 0;
                                    foreach ($item_array as $key => $value) {
                                        
                                        echo "<option value='". $item_array[$i]['leaveID']."'>" . $item_array[$i]['leaveDescription'] . "</option>";
                                        $i++;
                                    }
                                ?>
                              
                            </select>   
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Leave Start Date</label>
                            <input type="text" name="startDate" class="form-control" value="<?php echo $start_date; ?>">
                            <span class="help-block"></span>
                       
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Leave End Date</label>
                            <input type="text" name="endDate" class="form-control" value="<?php echo $end_date; ?>">
                            <span class="help-block"></span>
                       
                        </div>

                        <input type="hidden" name="source" class="form-control" value="employeeLeave">
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