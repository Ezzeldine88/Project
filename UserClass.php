<?php
include_once 'DB.php';

class User {
    private $name;
    private $height;
    private $weight;
    private $bloodGroup;
    private $DOB;
    private $gender;
    private $conn;
    
    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function AddRecord($name, $height, $weight, $bloodGroup, $DOB, $gender){
        $sql = "INSERT INTO user (name, height, weight, bloodGroup, DOB, gender) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($this->conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssss", $name, $height, $weight, $bloodGroup, $DOB, $gender);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                return true;
            } else {
                mysqli_stmt_close($stmt);
                return false;
            }
        } else {
            return false;
        }
    }

    public function ReadAllRecords(){
        $sql = "SELECT * FROM user";
        $result = mysqli_query($this->conn, $sql);
        if($result) {
            return $result;
        } else { 
            echo "Error executing query: " . mysqli_error($this->conn);
            return false;
        }
        mysqli_close($this->conn);
        return false;
    }

    public function ReadOneRecord($id){
        $sql = "SELECT * FROM user WHERE id = ?";
        if($stmt = mysqli_prepare($this->conn,$sql)){
            mysqli_stmt_bind_param($stmt,"i",$param_id);
            $param_id=$id;
            if(mysqli_stmt_execute($stmt)){
                $result= mysqli_stmt_get_result($stmt);
                
                if(mysqli_num_rows($result)==1){
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    return $row;
                } else {
                    return false;
                }
            } else {
                return false;
            }
            mysqli_stmt_close($stmt);
        } 
        mysqli_close($this->conn);
        return false;    
    }
    
    public function delete($id){
        $sql="DELETE FROM user WHERE id = ?";
        if($stmt = mysqli_prepare($this->conn,$sql)){
             mysqli_stmt_bind_param($stmt, "i",$param_id);
             $param_id=trim($_POST["id"]);
    
             if (mysqli_stmt_execute($stmt)){
                return true;
             }  else {
                return false;
             }
    
        }
        mysqli_stmt_close($stmt);
        mysqli_close($this->conn);
        return false;
    }
    
    public function update($name, $height, $weight, $bloodGroup, $gender, $DOB, $id){
        $sql ="UPDATE user SET name=?, height=?, weight=?, bloodGroup=?, gender=?, DOB=? WHERE id=?";

        if($stmt=mysqli_prepare($this->conn,$sql)){
            mysqli_stmt_bind_param($stmt,"ssssssi",$param_name,$param_height,$param_weight,$param_bloodGroup,$param_gender,$param_DOB,$param_id);

            $param_name=$name;
            $param_height=$height;
            $param_weight=$weight;
            $param_bloodGroup=$bloodGroup;
            $param_gender=$gender;
            $param_DOB=$DOB;
            $param_id=$id;

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
