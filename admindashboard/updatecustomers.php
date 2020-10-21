<!DOCTYPE HTML>
<head>
    </head>
<body>
<title>Tourism Website</title>
   <center><h3>Edit</h3></center>

<?php
    session_start();
    include_once("tourismdatabase.php");
if (isset($_SESSION['UserId'])){
    $userId=$_POST['userId'];
    $userType=$_POST['userType'];
    echo $userType;
    if($userType=='Admin')
    {
        $userType1=0;
    }
     $sql = "UPDATE user_profile SET userType='$userType1'  WHERE userId='$userId'";
     $conn->prepare($sql)->execute([$userType]);
     header("Location: viewcustomers.php");
}
?>


</body>
</html>
    
    
