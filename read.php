<!DOCTYPE html>
<?php
include_once '../Controller/ReadController.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Record</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper{
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="../Controller/readController.php" method="post">

                            <div class="page-header">
                                <h1>View Record</h1>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <p class="form-control-static"><?php echo $row["name"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Height</label>
                                <p class="form-control-static"><?php echo $row["height"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Weight</label>
                                <p class="form-control-static"><?php echo $row["weight"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Blood Group</label>
                                <p class="form-control-static"><?php echo $row["bloodGroup"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <p class="form-control-static"><?php echo $row["gender"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <p class="form-control-static"><?php echo $row["DOB"]; ?></p>
                                <p><a href="../index.php" class="btn btn-primary">Back</a></p>
                            </div>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>