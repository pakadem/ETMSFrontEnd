<?php
// Include config file
// require_once "config.php";
 
// Define variables and initialize with empty values
$time_in = $time_out = $emp_id = "";
$time_in_err = $time_out_err = $emp_id_err = "";

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Employee Role</title>
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
                        <h2>Log Time</h2>
                    </div>
                    <p>Please fill this form and submit to add employee time record to the database.</p>
                    <form action="../functions.php" method="post">
                        <div class="form-group <?php echo (!empty($role_desc_err)) ? 'has-error' : ''; ?>">
                            <label>Time In</label>
                            <input type="text" name="time_In" class="form-control" value="<?php echo $time_in; ?>">
                            <span class="help-block"><?php echo $time_in_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($role_desc_err)) ? 'has-error' : ''; ?>">
                            <label>Time Out</label>
                            <input type="text" name="time_Out" class="form-control" value="<?php echo $time_out; ?>">
                            <span class="help-block"><?php echo $time_in_err;?></span>
                        </div>

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

                        <input type="hidden" name="source" class="form-control" value="Timekeeping">
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