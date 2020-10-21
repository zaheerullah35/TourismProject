
<?php
include_once("tourismdatabase.php");
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['UserId'])){
    $session=$_SESSION["UserId"];
    $query="SELECT userId FROM user_profile WHERE id=$session";
    $statement=$conn->prepare($query);
	if(!$statement->execute()){

		echo "QUERY FAILED : Error -> " . json_encode($statement->errorMsg());
		return;
    }

    $result=$statement->fetch(PDO::FETCH_COLUMN);



    $sql="SELECT userType FROM user_profile WHERE id=$session";
	$stmt=$conn->prepare($sql);
	if(!$stmt->execute()){

		echo "QUERY FAILED : Error -> " . json_encode($stmt->errorMsg());
		return;
	}
	else{
		$resultset=$stmt->fetch(PDO::FETCH_COLUMN);
        
        if($resultset=="0"){
    header("Location: admindashboard/admindashboard.php");
        }else if($resultset=="1")
        {
    header("location:customerdashboard/customerdashboard.php");
        }
        else{
            echo "email does'nt exist ";
            ?>		<p> <a href="signup.php">Register Here</a></p></center><?php

            
        }
    }
}
else {
    header("Location: signin.php");
}



?>