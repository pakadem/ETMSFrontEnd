<?php
// Include config file
// require_once "config.php";
 
// Define variables and initialize with empty values
$role_desc = "";
$role_desc_err = "";

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
                        <h2>Create Employee Role</h2>
                    </div>
                    <p>Please fill this form and submit to add employee role record to the database.</p>
                    <form action="../functions.php" method="post">
                        <div class="form-group <?php echo (!empty($role_desc_err)) ? 'has-error' : ''; ?>">
                            <label>Employee Role</label>
                            <input type="text" name="roleDesc" class="form-control" value="<?php echo $role_desc; ?>">
                            <span class="help-block"><?php echo $role_desc_err;?></span>
                        </div>

                        <input type="hidden" name="source" class="form-control" value="role">
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