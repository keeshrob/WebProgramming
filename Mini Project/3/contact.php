<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$servername = "localhost";
	$username 	= "inwukor1";
	$password 	= "inwukor1";
	$dbname 	= "inwukor1";
	$error 		= null;
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn) {
			$email 		= $_POST["email"];
			$name 		= $_POST["name"];
			$message 	= $_POST["message"];
			$hash_pass  = null;
			if (!empty($email) && !empty($name) && !empty($message)) {
				// If form fields not empty email hackgsu email
				// Messages can be checked at https://www.dispostable.com/inbox/hackgsu
				$to      = 'hackgsu@dispostable.com';
				$headers = 'From: '. $email . "\r\n".
				'Reply-To: ' .$to. "\r\n".
				'X-Mailer: PHP/' . phpversion();
				
				$full_message = 'From: '. $email . "\r\n".
								'Message: '.$message . "\r\n";
				
				mail($to, "HackGSU | New Contact Form Submission", $full_message, $headers);
			} else {$error ="All Fields Not Filled";}
	} else {$error ="Connection Not Found";}
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
		<title>HackGSU | Contact Us</title>
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
				<li><a href="./login.php" title="Signup">Login</a></li>
				<li><a href="./register.php" title="Signup">Register</a></li>
			    <li><a href="./contact.php" title="Contact">Contact</a></li>
			</ul>
			<hr/>
			<?php
		if (($_SERVER["REQUEST_METHOD"] == "POST") && (empty($error))) { ?>
			<h1 class="log_message">Thanks!</h1>
			<p>Your Message has been sent :)</p>
			<a class="button" href="./index.php" title="Home">Return Home</a>
		<?php } else if (($_SERVER["REQUEST_METHOD"] == "POST") && (!empty($error))) { ?>
			<h1 class="log_message">Error :(</h1>
			<p><?php echo $error; ?></p>
			<a class="button" href="./contact.php" title="Home">Try Again</a>	

		<?php } else { ?>
				<br/>
				<h2>Contact Form</h2>
				<br/>
				<form action="./contact.php" method="POST">
						<label for="email">Email Address:</label>
						<input type="text" id="email" name="email" placeholder="Email Address" required> 
						<label for="name">Your Name:</label> 
						<input type="name" id="name" name="name" placeholder="Your Name" required> 
						<label for="message">Your Message:</label> 
						<textarea id="message" name="message" placeholder="Your Message..." required></textarea>
						<button class="button inverse" type="submit">Send Message</button>
				</form>
		<?php } ?>
		</div>
		<div id="hero_right" class="hero_contact"></div>
	</div>
	</body>
</html>
