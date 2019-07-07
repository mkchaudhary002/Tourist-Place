<?php
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Holy City Varanasi !</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Welcome to your at Varanasi Officials</h1>
</div>
<?php
	if(isset($_SESSION['message'])) {
 		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
	
?>
<center><img src="vnsbanner.jpg" width="1200" height="200"></img></center>
<h1><center>Home</h1>
<div><h4><center>Welcome Mr. <?php echo $_SESSION['username']; ?> </h4></div>
<a href ="Varanasi\index.html">Touch Me</a>
<div><a href=logout.php>Logout</a></div>
</body>
</html>