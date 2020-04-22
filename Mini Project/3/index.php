<?php
session_start();
if (isset($_GET['logout'])) {
	setcookie("email", "", 1);
	unset($_COOKIE['email']);
	session_unset();
}
if (isset($_POST['email'])) { 
	$_SESSION["email"] = $_POST['email'];
	setcookie("email", $_POST['email'], time() + 3600);
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
		<title>HackGSU</title>
		<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Orbitron:400,700&display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
		<div id="menu">
		<h2>HACK<strong>GSU</strong> '20</h2>
		<ul>
		<?php
		if (isset($_SESSION['email'])) { ?>
		
			<li class="logged_in"><a href="#" title="Welcome Back">Welcome, <?php echo $_SESSION['email'];?></a></li>
			<li><a href="./index.php?logout" title="Logout">Logout</a></li>
			<li><a href="./account.php" title="Profile">Account</a></li>
		<?php } else { ?>
		
			<li><a href="./login.php" title="Login">Login</a></li>
			<li><a href="./register.php" title="Signup">Register</a></li>
			
		<?php } ?>
			<li><a href="https://docs.google.com/forms/d/e/1FAIpQLSftQZXD6Z4xM7di1TEhcDAXFgWHZ70dmDwNxdz-eYff0mkj7g/viewform" title="Signup">Volunteer</a></li>
			<li><a href="./contact.php" title="Contact">Contact</a></li>
			<li><a href="https://www.gsu.edu/" title="GSU Homepage">GSU Homepage</a></li>
			<li><a href="https://youtu.be/Bnrudw-QzeE" title="YT Video">YT Video</a></li>			
		</ul>
		</div>
		<div id="hero_wrapper">
			<div id="info_box">
				<h1>HACK<strong>GSU</strong> 2020</h1>
				<h2>4.17 - 4.19</h2>
				<a class="button" href="https://hackspurt.com/hackgsu/register/student" title="Reserve Your Ticket">RESERVE YOUR TICKET</a>
			
				<div class="countdown">
					<p id="cd1"></p>
				</div>
			</div>
			
		</div>

		<div id="introduction" class="grouped_box">
			<div class="photo">
				<img src="./hgsu1.jpg" alt="Hack GSU photo"/>
			</div>
			<div class="what_is">
				<h2>What Is HackGSU?</h2>
				<p>HackGSU is the Hackathon hosted by the GSU Computer Science Department's
				   ACM &amp; IEEE student organizations. 100% free of charge, Lots of Food, $$ Prizes $$.
				   This semester, HackGSU will be a 500+ participant event taking place from November 1- 3, 2019.
				</p>
				<a class="button" href="http://hackgsu.com/faq" title="Learn More">MORE</a>
			</div>
		</div>
		<div class="grouped_box reverse_column">
			<div class="photo">
				<img src="./hgsu2.jpg" alt="Hack GSU photo"/>
			</div>
			<div class="bring">
				<h2>What To Bring</h2>
				<p>You will definitely need your laptop, phone, chargers (phone and laptop),
					toiletries (toothbrush, toothpaste, deodorant), headphones, medication (if applicable),
					as well as a valid student or government ID. Feel free to also bring along a sleeping bag,
					and we recommend some comfortable clothes (sweatpants and a hoodie are highly recommended).
				</p>
				<a class="button" href="http://hackgsu.com/faq" title="Learn More">MORE</a>
			</div>
		</div>
		<div class="sponsor">
			<img src="./sponsor_logo.png" alt="sponsor logo">
			<div class="sponsor_segment">
				<h4>Sponsored By NCR</h4>
				<p>NCR is the world's leading enterprise technology provider of software, hardware and services for banks, retailers, restaurants, small business and telecom & technology. </p>
			</div>
		</div>

		<div class="action_section">
			<div id="volunteer">
				<h2>Volunteer</h2>
				<img src="./hgsu10.jpg" alt="Hack GSU photo">

				<a class="button" href="https://goo.gl/forms/z4BOXGSxBFYqFsf13" title="Apply Now">Apply Now</a>
				<a class="button inverse" href="#" title="Learn More">Learn More</a>
			</div>
			<div id="benefits">
			<h2>Benefits</h2>
			<p>The perks of being a volunteer:</p>
				<ul>
					<li>Complimentary HACKGSU Shirt</li>
					<li>Looks great on your resume or CV</li>
					<li>Build up your communication skills</li>
					<li>Form Lifetime memories and connections</li>
				</ul>
			</div>
			<div id="dates">
			   <h2>Dates</h2>
			   <dl>
				<dt>11.01 - FRIDAY</dt>
					<dd>6:00 PM - Students Check-in</dd>
					<dd>7:30 PM - Late Registration</dd>
				<dt>11.02 - SATURDAY</dt>
					<dd>9:00 AM - Workshops</dd>
					<dd>12:00 AM - NCR Midnight Madness</dd>
				<dt>11.03 - SUNDAY</dt>
					<dd>10:00 AM - Submit Project & Hacking Ends</dd>
					<dd>1:00 PM - Closing Ceremonies: Awards</dd>
			   </dl>
			</div>
		</div>
		<div class="countdown count_section">
			<p>Semester Countdown:<span id="cd2"></span></p>
		</div>
		<div id="footer">
			<span>
				<img src="./logo_footer.png" alt="GSU Logo">
				<span id="footnote">
					Built By GSU Panthers
				</span>
			</span>
			<ul class="footer_links">
			   <li><a href="./register.php" title="Signup">Register Now</a></li>
			   <li><a href="https://hackspurt.com/student" title="Check In Now">Check In Now</a></li>
			   <li><a href="http://hackgsu.com/faq" title="About HackGSU">About HackGSU</a></li>
			   <li><a href="https://www.gsu.edu/" title="GSU Home">GSU Website</a></li>	
			</ul>
			<ul class="footer_links">
			   <li><a href="http://sponsors.hackgsu.com/hackGSU_Sponsorship_packet.pdf" title="Become A Sponsor">Become A Sponsor</a></li>
			   <li><a href="http://hackgsu.com/schedule" title="Event Schedule">Event Schedule</a></li>
			   <li><a href="https://forms.gle/Coz1MATrcqVScWiQ8" title="Travel Reimbursement">Travel Reimbursement</a></li>
			   <li><a href="https://youtu.be/Bnrudw-QzeE" title="Youtube Video">YouTube: About This Page</a></li>
			</ul>
			
		</div>
	</body>
	<script>
		// Countdown Script
		var countDownDate = new Date("Apr 27, 2020 13:00:00").getTime();

		var x = setInterval(function() {

		var now = new Date().getTime();

		var distance = countDownDate - now;

		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		document.getElementById("cd1").innerHTML = days + " d " + hours + " h "
		+ minutes + " m " + seconds + " s ";

		document.getElementById("cd2").innerHTML = days + " days!";

		//countdown expired
		if (distance < 0) {
		clearInterval(x);
		document.getElementById("cd1").innerHTML = "EXPIRED";
    	document.getElementById("cd2").innerHTML = "EXPIRED";
		}}, 1000);
	</script>
</html>
