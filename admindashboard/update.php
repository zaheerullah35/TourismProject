<!DOCTYPE HTML>
<head>
    </head>
<body>
<title>Tourism Website</title>
   <center><h3>Edit</h3></center>

<?php
    session_start();
    include_once("tourismdatabase.php");
    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d H:i:s');
if (isset($_SESSION['UserId'])){
    $tourId=$_POST['tourId'];
    $placename=$_POST['placename'];
    $departure=$_POST['departure'];
    $arrival=$_POST['arrival'];
    $seats=$_POST['seats'];
    $details=$_POST['details'];
    
     $sql = "UPDATE tour SET placename='$placename', departure='$departure' ,arrival='$arrival', seats='$seats',availableseats='$seats',details='$details',updatedOn='$date'   WHERE tourId='$tourId'";
     $conn->prepare($sql)->execute([$placename, $departure,$arrival,$seats,$details]);
     header("Location: admindashboard.php");
}
?>


</body>
</html>
    
    
