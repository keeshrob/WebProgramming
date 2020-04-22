<?php
if(isset($_COOKIE['email'])) {
	$_SESSION["email"] = $_COOKIE['email'];
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>HackGSU | Login</title>
		<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Orbitron:400,700&display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
	<div id="login_wrapper">
		<div id="login">
		<h2>HACK<strong>GSU</strong></h2>
			<ul>
				<li><a href="./index.php" title="Home">Home</a></li>			
				<li><a href="./login.php" title="Login">Login</a></li>
				<li><a href="https://hackspurt.com/hackgsu/register/student" title="Signup">Register</a></li>
				<li><a href="http://hackgsu.com/faq" title="FAQ">FAQ</a></li>
			</ul>
			<hr/>
			<?php
		if (isset($_SESSION['email'])) { ?>
			<h1 class="log_message">Hello <?php echo $_SESSION['email'];?>!</h1>
			<p>It seems that you have already logged in.</p>
			<a class="button" href="./index.php" title="Home">Return Home</a>
		<?php } else { ?>
				<form action="./index.php" method="POST">
						<label for="email">Email Address:</label>
						<input type="text" id="email" name="email" placeholder="Email Address" required> 
						<label for="fname">Password:</label> 
						<input type="password" id="fname" name="fname" placeholder="Password" required> 
						<button type="submit">Sign In</button>
						<a class="button inverse" href="#register" title="Register">Register</a>
				</form>
		<?php } ?>
		</div>
		<div id="hero_right"></div>
	</div>
	</body>
</html>
