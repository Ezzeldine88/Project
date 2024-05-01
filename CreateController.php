<?php
$name= $height= $weight= $bloodGroup= $DOB= $gender = "";
$name_err= $height_err = $weight_err = $bloodGroup_err= $DOB_err= $gender_err = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){

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
    }


    $input_gender=trim($_POST["gender"]);
if(empty($input_gender)){
    $DOB_err="enter your gender.";
} else {
    $gender=$input_gender;
}
    


if (empty ($name_err) && empty($weight_err) && empty ($bloodGroup_err) && empty ($height_err) && empty ($DOB_err)&& empty ($gender_err)){
    include_once '../Model/Class-Create.php';
    $creator = new Createclass();
    if($creator->AddRecord($name,$height,$weight,$bloodGroup,$DOB, $gender)){
        header("location:../index.php");
    } else {
        echo "something went wrong";
    }
}


?>