<?php
	session_start();
	$userEmail = null;
	
	if(isset($_SESSION['user'])){
		$email = $_SESSION['user'];
	}
?>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="registration";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
	$sqlResult = "SELECT * FROM register WHERE Email ='" . $email . "'";
	$result = $conn->query($sqlResult);
	?>





<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<style type="text/css">
		.palel-primary
	{
		border-color: #bce8f1;
	}
	.panel-primary>.panel-heading
	{
		background:#bce8f1;
		
	}
	.panel-primary>.panel-body
	{
		background-color: #EDEDED;
	}




</style>


<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Enter Your Details Here
			</div>
			<div class="panel-body">
			<?php 
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
				?>
				<form name="myform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="form_reg">
				<div>
				<!-- <input type="hidden" name="action" value="submit" id="action"> -->
				</div>
					<div class="form-group">
						<label for="first">First Name *</label>
						<input id="first" placeholder="First Name" name="first" class="form-control" type="text" value="<?php echo $row ['First']; ?> data-validation="required">
						<span id="error_first" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="lastname">Last Name *</label>
						<input id="lastname" placeholder="Last Name" name="lastname" class="form-control" type="text" value="<?php echo $row ['Last']; ?> data-validation="email">
						<span id="error_lastname" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="email">Email *</label>
						<input id="email" placeholder="Email"  name="email"  class="form-control" type="text" value="<?php echo $row ['Email']; ?> min="1" >
						<span id="error_email" class="text-danger"></span>
					</div>
						<div class="form-group">
						<label for="pass">Password*</label>
						<input id="pass" placeholder="Password" name="pass"  class="form-control" type="Password" value="<?php echo $row ['Password']; ?> min="1" >
						<span id="error_pass" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="dob">Date Of Birth *</label>
						<input type="text" name="dob" id="dob" value="<?php echo $row ['DOB']; ?> class="form-control">
						<span id="error_dob" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<input type="text" name="gender" id="gender" value="<?php echo $row ['Gender']; ?> class="form-control">
						<span id="error_gender" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="phone">Phone Number *</label>
						<input type="text" id="phone" placeholder="PHONE Number" value="<?php echo $row ['Phone']; ?> name="phone" class="form-control" >
						<span id="error_phone" class="text-danger"></span>
					</div>
					<a input id="submit" type="submit" value="Logout" name="logout" class="btn btn-primary center" href="logout.php">LOGOUT</a>
					<input type="submit" value="Update" class="btn btn-primary center" >
					<?php
					}
				}
				?>
			
				</form>

			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	
$(document).ready(function(){
		$flag=1;
    	$("#first").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_first").text("* You have to enter your first name!");
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);
        		$("#error_first").text("");

        	}
       });
        $("#lastname").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_lastname").text("* You have to enter your Last name!");
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);
        		$("#error_lastname").text("");
        	}
       });

        $("#email").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_email").text("* You have to enter your email!");
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);
        		$("#error_email").text("");
        	}
       });

                $("#pass").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_pass").text("* You have to enter your Password!");
        	}
        	else
        	{
        		$(this).css({"border-color":"#2eb82e"});
        		$('#submit').attr('disabled',false);
        		$("#error_pass").text("");

        	}
        	});




        $("#dob").focusout(function(){
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_dob").text("* You have to enter your Date of Birth!");
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);
        		$("#error_dob").text("");
        	}
       });
        $("#gender").focusout(function(){
        	$(this).css("border-color", "#2eb82e");
       
       });

        $("#phone").focusout(function(){
            $pho =$("#phone").val();
    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_phone").text("* You have to enter your Phone Number!");
        	}
        	else if ($pho.length!=10)
        	{   
                    $(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_phone").text("* Lenght of Phone Number Should Be Ten");
        	}
        	else if(!$.isNumeric($pho))
        	{
        	        $(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			$("#error_phone").text("* Phone Number Should Be Numeric");  
        	}
        	else{
        		$(this).css({"border-color":"#2eb82e"});
        		$('#submit').attr('disabled',false);
        		$("#error_phone").text("");
        	}

    	});

   		$( "#submit" ).click(function() {
   			if($("#first" ).val()=='')
   			{
        		$("#first").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_first").text("* You have to enter your first name!");
        	}
        	if($("#lastname" ).val()=='')
   			{
        		$("#lastname").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_lastname").text("* You have to enter your Last name!");
        	}
           if($("#email" ).val()=='')
            {
                $("#email").css("border-color", "#FF0000");
                    $('#submit').attr('disabled',true);
                     $("#error_email").text("* You have to enter your Email!");
            }
          if($("#pass" ).val()=='')
            {
                $("#pass").css("border-color", "#FF0000");
                    $('#submit').attr('disabled',true);
                     $("#error_pass").text("* You have to enter your Password!");
            }
   			if($("#dob" ).val()=='')
   			{
        		$("#dob").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_dob").text("* You have to enter your Date of Birth!");
        	}

        	if($("#phone" ).val()=='')
   			{
        		$("#phone").css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			 $("#error_phone").text("* You have to enter your Phone Number!");
        	}
			});


    	
	}); 

var form = document.getElementById("form_reg");
var action = document.getElementById("action");

document.getElementById("submit").addEventListner("click",function(){
action.value="submit";
form.submit();
});
					
</script>
</body>
</html>