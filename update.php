<?php
include_once '../Controller/UpdateController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="../Controller/UpdateController.php" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($height_err)) ? 'has-error' : ''; ?>">
                            <label>Height</label>
                            <input type="text" name="height" class="form-control" value="<?php echo $height; ?>">
                            <span class="help-block"><?php echo $height_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
                            <label>Weight</label>
                            <input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($DOB_err)) ? 'has-error' : ''; ?>">
                            <label>Date Of Birth</label>
                            <input type="date" name="DOB" class="form-control" value="<?php echo $DOB; ?>">
                            <span class="help-block"><?php echo $DOB_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male" <?php if($gender === 'male') echo 'selected'; ?>>Male</option>
                                <option value="female" <?php if($gender === 'female') echo 'selected'; ?>>Female</option>
                            </select>
                            <span class="help-block"><?php echo $gender_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select name="bloodGroup" class="form-control">
                                <option value="A+" <?php if($bloodGroup === 'A+') echo 'selected'; ?>>A+</option>
                                <option value="A-" <?php if($bloodGroup === 'A-') echo 'selected'; ?>>A-</option>
                                <option value="B+" <?php if($bloodGroup === 'B+') echo 'selected'; ?>>B+</option>
                                <option value="B-" <?php if($bloodGroup === 'B-') echo 'selected'; ?>>B-</option>
                                <option value="AB+" <?php if($bloodGroup === 'AB+') echo 'selected'; ?>>AB+</option>
                                <option value="AB-" <?php if($bloodGroup === 'AB-') echo 'selected'; ?>>AB-</option>
                                <option value="O+" <?php if($bloodGroup === 'O+') echo 'selected'; ?>>O+</option>
                                <option value="O-" <?php if($bloodGroup === 'O-') echo 'selected'; ?>>O-</option>
                            </select>
                            <span class="help-block"><?php echo $bloodGroup_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
