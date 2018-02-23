<?php 

include_once 'db.php';

if(empty($_POST["email"]) || empty($_POST["password"]))  
{  
	echo 'All fields are required';  

}  
else  
{  
	$query = "SELECT * FROM login WHERE email = :email AND password = :password";  
	$statement = $db->prepare($query);  
	$statement->execute(  
	     array(  
	          'email'     =>     $_POST["email"],  
	          'password'     =>     $_POST["password"]  
	     )  
	);  


	$count = $statement->rowCount();  
	if($count > 0)  
	{  
     	$_SESSION["email"] = $_POST["email"];  
     	header('overview.php');
	}  
	else  
	{  
     	echo '<label>Wrong Data</label>';  
	}  
}  



