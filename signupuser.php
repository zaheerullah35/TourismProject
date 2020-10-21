<!DOCTYPE HTML>
<body>
<?php
extract($_POST);
include_once("tourismdatabase.php");
 //$pass=md5($pass);
 
    

 if(isset($submit))
 {
    $email=$_POST['email'];
	$password=$_POST['password'];
	//$id='123';
	//$userType='1';
	
	$sql="INSERT INTO user(email,password) VALUES(?,?)";
	$statement =$conn->prepare($sql);  
	$statement->execute([$email,$password]);

	$query = "SELECT id FROM user WHERE `email` = ? AND `password` = ?";
    
	$statement = $conn->prepare($query);
	$statement->bindValue(1, $email);
	$statement->bindValue(2, $password);
	if(!$statement->execute()){
		echo "QUERY FAILED : Error -> " . json_encode($statement->errorMsg());
		return;
    }
    
	$result = $statement->fetch(PDO::FETCH_COLUMN);
	echo $result;

	$sql="INSERT INTO user_profile(id,userType) VALUES('$result','1')";
	echo $sql;
	$statement =$conn->prepare($sql);  
	$statement->execute();
	

header("Location: signin.php");
}

?>
</body>
</html>