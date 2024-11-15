<?php
include '../connection/connect.php';
if(!$con){
    die(mysqli_errno($con));
}
if(isset($_GET['deletestt'])){
    $stt=$_GET['deletestt'];
    $sql="DELETE FROM diem WHERE stt='$stt'";
    $result=mysqli_query($con,$sql);
    if($result){
        header("Location: adminsite.php");
    }else{
        die(mysqli_errno($con));
    }
}
?>