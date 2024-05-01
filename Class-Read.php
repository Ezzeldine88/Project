<?php
include_once 'DB.php';

class ReadClass{

    private $db;
    private $conn;

public function __construct(){

    $this->db = new Database();
    $this->conn = $this->db->getConnection();

} 
public function ReadAllRecords(){

    $sql = "SELECT*FROM user";
    if($result = mysqli_query($this->conn,$sql)){
        return $result;
     } else{ 
            echo "can't execute $sql." . mysqli_error($this->conn);
            return false;
        }
        mysqli_close($this->conn);
        return false;
    }
public function ReadOneRecord($id){
    $sql="SELECT *FROM user WHERE id = ?";
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
    }

        mysqli_stmt_close($stmt);

         mysqli_close($this->conn);
        return false;
 
  
    }
}

?>