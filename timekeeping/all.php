<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1024px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Time Tracing Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Log New Time</a>
                    </div>

                    

                    <?php
                         
                        $item_json = file_get_contents('http://localhost:8080/Timekeeping/all');
                        $item_array = json_decode($item_json, true);
                    
                        // echo "<pre>";

                    if( !empty($item_array) ){
                        echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>Time ID</th>";
                                    echo "<th>Time In</th>";
                                    echo "<th>Time Out</th>";
                                    echo "<th>Employee Name</th>";
                                    echo "<th>Actions</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            $i = 0;
                            foreach ($item_array as $emp_key => $emp_val) {
                                
                                echo "<tr>";
                                    echo "<td>" . $item_array[$i]['recID'] . "</td>";
                                    echo "<td>" . $item_array[$i]['time_In'] . "</td>";
                                    echo "<td>" . $item_array[$i]['time_Out'] . "</td>";

                                    $emp_json = file_get_contents('http://localhost:8080/employee/read/'. $item_array[$i]['empID']);
                                    $emp_array = json_decode($emp_json, true);


                                    echo "<td>" . $emp_array['empName'] . ' ' . $emp_array['empLastName'] . "</td>";
                                    echo "<td>";
                                        echo "<a href='read.php?id=".  $item_array[$i]['recID'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        echo "<a href='update.php?id=". $item_array[$i]['recID'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "<a href='delete.php?id=".  $item_array[$i]['recID'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                    echo "</td>"; 
                                echo "</tr>";

                                $i++;
                            }
                            echo "</tbody>";                            
                        echo "</table>";

                    } else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
 
                    ?>

                </div>
            </div>        
        </div>
    </div>
</body>

<?php
    // echo "<pre>";
    // print_r( $item_array );
?>
</html>