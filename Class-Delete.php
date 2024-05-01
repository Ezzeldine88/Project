<?php

include_once 'DB.php';

class Deleteclass{

    private $db;
public function __construct(){
   $this->db= new Database();
   $this->conn=$this->db->getConnection();

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

mysqli_close($conn);
return false;

}


}