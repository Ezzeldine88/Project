<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id==$_POST["id"];
include_once '../Model/Class-Delete.php';
$delete = new Deleteclass();
if($delete->delete($id)){
    header ("location:../index.php");
} else {
    echo "try again";
}

}


?>