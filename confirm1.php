<?php
	function redirect() {
    header('Location: loginval.php');
    exit();
	}
	$email = $_REQUEST['email'];
	$confirmm = $_REQUEST['verify'];

	if (!isset($_REQUEST['email']) || !isset($_REQUEST['verify'])) {
		redirect();
	} else {
		//$con = new mysqli('localhost', 'research_emailC', 'test123', 'research_phpEmailConfirmation');
$servername = "Localhost";
$username = "root";
$password = "";
$dbname= "registration";

// Create connection
$con = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

echo "Connected successfully<br>";


		echo 'ddddddd';

		$sql = "SELECT confirmed_code FROM register WHERE Email='".$email."'";
		$result = $con->query($sql);
        $token=NULL;
		if ($result -> num_rows > 0) {
			echo '11111111';
		while($row = $result-> fetch_assoc()) {
			$token = $row['confirmed_code'];
			echo 'ajsaksas';
		}
		echo 'aaaaaaaa';
		if($token == $confirmm )
		{
			echo 'ccccccccc';
			$con->query("UPDATE register SET token=1, confirmed_code='' WHERE email='$email'");
			echo 'Your email has been verified! You can log in now!';
			
		
		}
		
	
		}
		
		
			redirect();
	}
	
	
?>