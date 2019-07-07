<?php
	session_start();
	
	//connect to database
	$db = mysqli_connect("localhost", "root", "", "authentication");
	
	if(isset($_POST['login_btn'])){
		//session_start();
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		
		$password = md5($password); //remember we hashed password before storing last time
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db, $sql);
		
		if(mysqli_num_rows($result) == 1) {
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: home.php"); //redirect to home page
		}else{
			$_SESSION['message'] = "username/password combination incorrect";
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Welcome</h1>
	<h1>"The Holy City Varanasi" Official</h1>
</div>
<?php
	if(isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
<marquee>Varanasi city Welcomes and Congratulates to you for Visite here !!</marquee>
<center><img src="vnsbanner.jpg" width="1200" height="200"></img></center>
<form method="post" action="login.php">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
	
		<tr>
			<td></td>
			<td><input type="submit" name="login_btn" value="Login"></td>
		</tr>
	</table>
</form>
</body>
</html>
