<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	$fname 		= $_POST["fname"];
	$lname 		= $_POST["lname"];
	$email 		= $_POST["email"];
	$password 	= $_POST["password"];
	$phone_no 	= $_POST["phone_no"];
	$shirt_size = $_POST["shirt_size"];
	$password_hash =password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
	
	$servername = "localhost";
	$username 	= "inwukor1";
	$password 	= "inwukor1";
	$dbname 	= "inwukor1";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn) {

	$query = "INSERT INTO ".$dbname.".USER (`user_id`, `fname`, `lname`, `email`, `password`, `phone_no`, `shirt_size`, `signup_date`, `user_type`)
	VALUES (NULL, '".$fname."', '".$lname."', '".$email."', '".$password_hash."', '".$phone_no."', '".$shirt_size."', NOW(), 'user')";

	if ($conn->query($query)) {
		// Email Cookie Set
		$_SESSION["email"] = $email;
		setcookie("email", $email, time() + 3600);
		
		//redirect to homepage.
		header("Location: ./index.php");
		exit();
	} else {
		$error = $conn->error;
	}

	$conn->close();
			
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
		<title>HackGSU | Register</title>
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
				<br/>
				<h2>Register For HackGSU</h2>
				<br/>
			<?php
		if (isset($_SESSION['email'])) { ?>
			<h1 class="log_message">Hello <?php echo $_SESSION['email'];?>!</h1>
			<p>It seems that you have already logged in.</p>
			<a class="button" href="./index.php" title="Home">Return Home</a>
		<?php } else if (!empty($error)) { ?>
			<h1 class="log_message">Error :(</h1>
			<p><?php echo $error; ?></p>
			<a class="button" href="./register.php" title="Home">Try Again</a>	
		<?php } else { ?>
			<form action="./register.php" method="POST">
				<label for="fname">First Name:</label>
				<input type="text" id="fname" name="fname" placeholder="First Name" required>
				
				<label for="fname">Last Name:</label>
				<input type="text" id="lname" name="lname" placeholder="Last Name" required>
				
				<label for="email">Email Address:</label>
				<input type="text" id="email" name="email" placeholder="Email Address" required> 
				
				<label for="password">Password:</label> 
				<input type="password" id="password" name="password" placeholder="Password" required> 
				
				<label for="phone_no">Phone Number:</label>
				<input type="text" id="phone_no" name="phone_no" placeholder="Phone Number" required> 

				<label for="shirt_size">Shirt Size:</label>
				<select id="shirt_size" name="shirt_size">
				  <option value="XS">Extra Small</option>
				  <option value="S">Small</option>
				  <option value="M">Medium</option>
				  <option value="L">Large</option>
				  <option value="XL">XL</option>
				  <option value="2XL">2XL</option>
				</select>

				<button type="submit">Register Now</button>
				<a class="button inverse" href="./login.php" title="SignIn">Login</a>
			</form>
		<?php } ?>
		</div>
		<div id="hero_right" class="hero_register"></div>
	</div>
	</body>
</html>
