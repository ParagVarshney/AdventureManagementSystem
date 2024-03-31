<!-- <?php
	session_start();
	if(isset($_SESSION['username']))
		unset($_SESSION['username']);
	
?> -->
<!DOCTYPE html>
<html>
<head>
	<title>Sign up portal</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link rel = "icon" href = "jagran_logo1.jpg" type = "image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body><!--http://mrwallpapers.com/wp-content/uploads/2018/10/wall-leaves-wooden-background-images-hd.jpg-->
<div>
<?php
		if(isset($_POST['signup']))
		{
			$usernameSub=$password1=$password2="";
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$usernameSub = test_input($_POST['Username']);
				$password1 = test_input($_POST['Password']);
				$password2 = test_input($_POST['ConfirmPassword']);

				$link = mysqli_connect("localhost", "root", "");
				if (mysqli_connect_errno()) {
    				printf("Connect failed: %s\n", mysqli_connect_error());
    				exit();
				}
				if(empty($usernameSub))
					array_push($error, "Please fill username");
				if(empty($password1))
					array_push($error, "Please fill password");
				if(empty($password2))
					array_push($error, "Please fill confirm password");
				if($password1 != $password2)
					echo "Password's don't match";
				else if($password1 == $password2)
				{
					mysqli_select_db($link,"test_db");
					$results=mysqli_query($link,"insert into usertable(Username,Password) values('$usernameSub','$password1')") or die("failed to connect".mysqli_connect_error());
					header('localhost: http://localhost/project/login.php');
					echo "Data Stored" ;
				}
				mysqli_close($link);
			}
		}
	?>
    <div id="back">
    <h3 id="si">SIGN UP</h3>
    <form id="robo" action="login.php" method="POST">
		<input class="input" type="text" name="Username" placeholder="Username" required><br>
		<input class="input" type="password" name="Password" placeholder="Password" required><br>
		<input class="input" type="password" name="ConfirmPassword" placeholder="Confirm Password" required><br>
		<input class="button" type="submit" name="signup" value="signup"><br>
		<a id="oklogin" href="login.php">Login Here</a>
	</form>
    </div>
    </div>