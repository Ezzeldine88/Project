<?php
$name= $height= $weight= $bloodGroup= $DOB= $gender = "";
$name_err= $height_err = $weight_err = $bloodGroup_err= $DOB_err= $gender_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){

    $id=$_POST["id"];

    $input_name=trim($_POST["name"]);
    if(empty($input_name)) {
        $name_err="enter a name";
    }  elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "enter a valid name.";
    } else {
        $name= $input_name;
    }
    
    $input_height=trim($_POST["height"]);
    if(empty($input_height)){
        $height_err ="enter the height.";
    } else {
        $height=$input_height;
    }
    
    
    $input_weight=trim($_POST["weight"]);
    if(empty($input_weight)){
        $weight_err="enter the weight.";
    } else {
        $weight=$input_weight;
    }
    
    
    $input_bloodGroup=trim($_POST["bloodGroup"]);
    if(empty($input_bloodGroup)){
        $bloodGroup_err="choose the bloodGroup.";
    } else {
        $bloodGroup=$input_bloodGroup;
    }
    
    
    $input_DOB=trim($_POST["DOB"]);
    if(empty($input_DOB)){
        $DOB_err="choose the date of birth.";
    } else {
        $DOB=$input_DOB;
    }
        
    
    
        $input_gender=trim($_POST["gender"]);
    if(empty($input_gender)){
        $DOB_err="enter your gender.";
    } else {
        $gender=$input_gender;
    }
        
    if (empty ($name_err) && empty($weight_err) && empty ($bloodGroup_err) && empty ($height_err) && empty ($DOB_err)&& empty ($gender_err)){
        include_once '../Model/Class-Update.php';
        $update=new updateClass();
        if($update->update($name,$height,$weight,$bloodGroup,$gender,$DOB,$id)){
            header("location:../index.php");
        } else {
            echo "something went wrong";
        }
        mysqli_stmt_close($stmt);
    }    

    mysqli_close($conn);
 } else {
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id=trim($_GET["id"]);
        include_once '../Model/Class-Read.php';
        $r = new ReadClass();
        if ($row = $r->ReadOneRecord($id)) {
            $name = $row["name"];
            $height = $row["height"];
            $weight = $row["weight"];
            $bloodGroup = $row["bloodGroup"];
            $DOB = $row["DOB"];
            $gender = $row["gender"];
        } else {
            echo "Record not found. Please try again.";
        }

    }
}
?>