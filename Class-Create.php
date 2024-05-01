<?php
include_once 'DB.php';

class Createclass {

private $db;

public function __construct() {
    echo 'created';
    $this->db = new Database();
    $this->conn = $this->db->getConnection();
    
}
public function AddRecord($name, $height, $weight, $bloodGroup, $DOB, $gender){
    $sql = "INSERT INTO user (name, height, weight, bloodGroup, DOB, gender) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($this->conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_height, $param_weight, $param_bloodGroup, $param_DOB,$param_gender);

        $param_name = $name;
        $param_height = $height;
        $param_weight = $weight;
        $param_bloodGroup = $bloodGroup;
        $param_DOB = $DOB;
        $param_gender = $gender;


        if(mysqli_stmt_execute($stmt)){
            return true;
        } else {
            return false;
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($this->conn);
    return false;
}

}


?>