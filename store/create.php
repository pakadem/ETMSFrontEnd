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
                        <h2>Create Store</h2>
                    </div>
                    <p>Please fill this form and submit to add store record to the database.</p>
                    <form action="../functions.php" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label> Store Name</label>
                            <input type="text" name="storeName" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                       
                        <input type="hidden" name="source" class="form-control" value="store">
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