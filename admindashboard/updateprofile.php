<!DOCTYPE HTML>
<head>
    </head>
<body>
<title>Tourism Website</title>
   <center><h3>Edit</h3></center>

<?php
    session_start();
    include_once("tourismdatabase.php");
    $session=$_SESSION['UserId'];
    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d H:i:s');

if (isset($_SESSION['UserId'])){
    $userId=$_POST['userId'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    
     $sql = "UPDATE user_profile SET firstName='$firstName', lastName='$lastName' ,phone='$phone', gender='$gender',updatedOn='$date'  WHERE userId='$userId'";
     $conn->prepare($sql)->execute([$firstName, $lastName,$phone,$gender]);
     $sql1 = "UPDATE user SET email='$email', password='$password'  WHERE id='$session'";
     $conn->prepare($sql1)->execute([$email,$password]);
     
     header("Location: admindashboard.php");
}
?>


</body>
</html>
    
    
