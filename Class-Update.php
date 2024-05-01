<?php   

include_once 'DB.php';

class updateClass{

    private $db;

    public function __construct(){

        $this->db= new Database();
        $this->conn = $this->db->getConnection();
    

    }

    public function update($name, $height,$weight,$bloodGroup, $gender,$DOB,$id){
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
        mysqli_close($conn);
        return false;
    }   

}



?>