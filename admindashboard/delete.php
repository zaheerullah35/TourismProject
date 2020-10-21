<?php
include_once("tourismdatabase.php");
session_start();
if (isset($_SESSION['UserId'])){
$tourId=$_GET['tourId'];

$sql1 = "DELETE FROM booking WHERE tourId =  $tourId";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindParam('$tourId', $_POST['tourId'], PDO::PARAM_INT);	
$stmt1->execute();
if(!$stmt1->execute()){
    echo "QUERY FAILED : Error -> " . json_encode($stmt1->errorMsg());
    return;
}
else{
    echo "Data Deleted Successfully";
}


$sql = "DELETE FROM tour WHERE tourId =  $tourId";
$stmt = $conn->prepare($sql);
$stmt->bindParam('$tourId', $_POST['tourId'], PDO::PARAM_INT);	
$stmt->execute();
if(!$stmt->execute()){
    echo "QUERY FAILED : Error -> " . json_encode($stmt->errorMsg());
    return;
}
else{
    echo "Data Deleted Successfully";
}
header("location:admindashboard.php");
}
?>