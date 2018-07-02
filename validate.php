<?php
session_start();

 if(isset($_SESSION['user'])){
		$url="http://localhost/office/welcome.php";
		header('location: '.$url);
	}
$servername = "Localhost";
$username = "root";
$password = "";
$dbname= "registration";

// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";



if(isset($_POST['login']))
{
	 
	$email=$_POST['email'];
	$pass=$_POST['password'];
	
	$signin=$_POST['login'];
	
	
	$sql = "SELECT Email,Password,Token FROM register WHERE Email = '" . $email ."'";
	$result = $conn->query($sql);
	
	if ($result -> num_rows > 0) 
	{
		
		while($row = $result->fetch_assoc()) 
		{
			$dbemail = $row["Email"];
			$dbpass = $row["Password"];
			$dbtoken = $row["Token"];
		}	
		
			if($dbtoken=="0")
			{
				echo"For login we have sent you an email to Verified your account";
			}
			else if($dbemail==$email  && $dbpass==$pass) 
			{
				$_SESSION["user"] = $dbemail;
				$url="http://localhost/office/welcome.php";
				header('location: '.$url);
			}
				
	}
	else
	{	
		echo'<span id="invalid-pass" style="color:#DF5048; text-align:center; margin-left:205px;">Incorrect email or password</span>';
		echo 'Incorrect email or password';
	}		

if($_POST['email']==$dbemail and $_POST['password']==$dbpass){
		$_SESSION['email'] = $_POST['email'];
		if($_POST['remember'] != NULL){
			setcookie('em', $_POST['email'], time() + (86400 * 30), "/");
			setcookie('pwd',$_POST['password'], time() + (86400 * 30), "/");
			
		}
		header('location: welcome.php');
	}
		 else{
		echo "Email or Password is Invalid. <br> click here to <a href='loginval.php'>try again</a>";
	}	

			
}			



?>