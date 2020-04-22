<?php
session_start();
$servername = "localhost";
	$username 	= "inwukor1";
	$password 	= "inwukor1";
	$dbname 	= "inwukor1";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if (isset($_GET['delete']) && isset($_GET['id']) && (!empty($_GET['id']))) {
		if ($conn) {
			$id 	=  (int) $_GET['id'];
			$query  = "DELETE FROM ".$dbname.".USER WHERE `user_id` = '".$id."'";

			if ($conn->query($query)) {
				
				//redirect to homepage.
				header("Location: ./index.php?logout");
				exit();
			} else {
				$error = $conn->error;
			}

			$conn->close();
				
		}
	}
	
	
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	$fname 		= $_POST["fname"];
	$lname 		= $_POST["lname"];
	$email 		= $_POST["email"];
	$password 	= $_POST["password"];
	$phone_no 	= $_POST["phone_no"];
	$shirt_size = $_POST["shirt_size"];
	
	$query_string = "";
	if (!empty($fname)) {
		$query_string .= "`fname` = '".$fname."',";
	}
	if (!empty($lname)) {
		$query_string .= "`lname` = '".$lname."',";
	}	
	if (!empty($email)) {
		$query_string .= "`email` = '".$email."',";
	}
	if (!empty($phone_no)) {
		$query_string .= "`phone_no` = '".$phone_no."',";
	}	
	if (!empty($shirt_size)) {
		$query_string .= "`shirt_size` = '".$shirt_size."',";
	}
	if (!empty($password)) {
		$password_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
		$query_string .= "`password` = '".$password_hash."',";
	}		
	if(isset($_COOKIE['email'])) {
		$_SESSION["email"] = $_COOKIE['email'];
	}
	
	if ($conn) {
	$query = "UPDATE ".$dbname.".USER SET ".rtrim($query_string,",")." WHERE `email` = '".$_SESSION['email']."'";

	if ($conn->query($query)) {
		
		//redirect to homepage.
		header("Location: ./account.php?update");
		exit();
	} else {
		$error = $conn->error;
	}

	$conn->close();
			
	}
}
else if(isset($_COOKIE['email'])) {
	$error = null;
	$_SESSION["email"] = $_COOKIE['email'];
	
	
	if ($res = $conn -> query("SELECT * FROM ".$dbname.".USER WHERE `email` = '".$_SESSION['email']."' LIMIT 1")) {
		while ($item = $res -> fetch_assoc()) {
			$fname 		= $item["fname"];
			$lname 		= $item["lname"];
			$email 		= $item["email"];
			$password 	= $item["password"];
			$phone_no 	= $item["phone_no"];
			$shirt_size = $item["shirt_size"];
			$user_id 	= $item["user_id"];
		}
	}
} else {

  //redirect to homepage.
  header("Location: ./index.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>HackGSU | Account</title>
		<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Orbitron:400,700&display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
	<div id="login_wrapper">
		<div id="hero_right" class="hero_register"></div>
		<div id="login">
		<h2>HACK<strong>GSU</strong></h2>
			<ul>
				<li><a href="./index.php" title="Home">Home</a></li>			
				<li><a href="./index.php?logout" title="Login">Logout</a></li>
				<li><a href="./contact.php" title="Contact">Contact</a></li>
			</ul>
			<hr/>
				<br/>
				<h2>My Account | <?php echo $fname;?> <?php echo $lname;?></h2>
				<br/><br/><hr/>

			
		<?php if (!empty($error)) { ?>
			<h1 class="log_message">Error :(</h1>
			<p><?php echo $error; ?></p>
			<a class="button" href="./account.php" title="Home">Try Again</a>	
		<?php } else { ?>
		
		<?php if (isset($_GET['update'])) { ?>
			<h3 class="log_message">Your Account Has Been Updated!</h3>
		<?php } ?>
			<form action="./account.php" method="POST">
				<label for="fname">First Name:</label>
				<input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname;?>">
				
				<label for="fname">Last Name:</label>
				<input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lname;?>">
				
				<label for="email">Email Address:</label>
				<input type="text" id="email" name="email" placeholder="Email Address" value="<?php echo $email;?>" required> 
				
				<label for="password">Password:</label> 
				<input type="password" id="password" name="password" placeholder="Change Password"> 
				
				<label for="phone_no">Phone Number:</label>
				<input type="text" id="phone_no" name="phone_no" placeholder="Phone Number" value="<?php echo $phone_no;?>"> 

				<label for="shirt_size">Shirt Size:</label>
				<select id="shirt_size" name="shirt_size">
				  <option value="XS" 	<?php if ($shirt_size == "XS") 	{ echo "selected";}?>>Extra Small</option>
				  <option value="S" 	<?php if ($shirt_size == "S") 	{ echo "selected";}?>>Small</option>
				  <option value="M" 	<?php if ($shirt_size == "M") 	{ echo "selected";}?>>Medium</option>
				  <option value="L" 	<?php if ($shirt_size == "L") 	{ echo "selected";}?>>Large</option>
				  <option value="XL" 	<?php if ($shirt_size == "XL") 	{ echo "selected";}?>>XL</option>
				  <option value="2XL" 	<?php if ($shirt_size == "2XL") { echo "selected";}?>>2XL</option>
				</select>

				<button type="submit">Save Changes</button>
				<a class="button inverse red" href="./account.php?delete&id=<?php echo $user_id;?>" title="delete">Delete My Account</a>
			</form>
		<?php } ?>
		</div>
	</div>
	</body>
</html>
