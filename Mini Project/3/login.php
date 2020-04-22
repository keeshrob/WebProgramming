<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$servername = "localhost";
	$username 	= "inwukor1";
	$password 	= "inwukor1";
	$dbname 	= "inwukor1";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn) {
			$email 		= $_POST["email"];
			$password 	= $_POST["password"];
			$hash_pass  = null;
			if (!empty($email) && !empty($password)) {
				if ($res = $conn -> query("SELECT `password` FROM ".$dbname.".USER WHERE `email` = '".$email."' LIMIT 1")) {
					while ($item = $res -> fetch_assoc()) {
						$hash_pass  = $item['password'];
						if (password_verify($password, $hash_pass)) {
						  //save post as cookie
						  $_SESSION["email"] = $email;
						  setcookie("email", $email, time() + 3600);
						  	
						  //redirect to homepage.
						  header("Location: ./index.php");
						  exit();
						} else {
							$error = "Password is not correct.";
						}
					}
					$error = "Username or Password May By Incorrect.";
				}else {
					$error = $conn->error;
				}
			} else {
				$error = "Username or Password is Blank.";
			}
		
	}
}
else if(isset($_COOKIE['email'])) {
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
				<li><a href="./register.php" title="Signup">Register</a></li>
			    <li><a href="./contact.php" title="Contact">Contact</a></li>
			</ul>
			<hr/>
			<?php
		if (isset($_SESSION['email'])) { ?>
			<h1 class="log_message">Hello <?php echo $_SESSION['email'];?>!</h1>
			<p>It seems that you have already logged in.</p>
			<a class="button" href="./index.php" title="Home">Return Home</a>
			
		<?php } else if (!empty($error)) { ?>
			<h1 class="log_message">Error :(</h1>
			<p><?php echo $error; ?></p>
			<a class="button" href="./login.php" title="Home">Try Again</a>	
		<?php } else { ?>
		
				<br/>
				<h2>Sign into HackGSU</h2>
				<br/>
				<form action="./login.php" method="POST">
						<label for="email">Email Address:</label>
						<input type="text" id="email" name="email" placeholder="Email Address" required> 
						<label for="fname">Password:</label> 
						<input type="password" id="password" name="password" placeholder="Password" required> 
						<button type="submit">Sign In</button>
						<a class="button inverse" href="./register.php" title="Register">Register</a>
				</form>
		<?php } ?>
		</div>
		<div id="hero_right"></div>
	</div>
	</body>
</html>
