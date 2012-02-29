<?php
		
	require_once("lib/config.php");
	require_once("lib/functions.php");
		
	// initialize form values
	$fullname = "";
	$firstname = "";
	$participationcategory = "";
	$company = "";
	$phone = "";
	$title = "";
	$email = "";
	$purpose = "";
	
	if ($_POST) { // check for HTTP post variables
		// clean and assign post variables
		foreach($_POST as $name => $value) {
			$varname = $name;
			$$varname = clean($value);
		}
	
		// Honeypot CAPTCHA
		if (isset($firstname) && !empty($firstname)) {
			header("HTTP/1.1 400 Bad Request");
			header("Content-Length: 0");
			exit;
		}
		
		// validate full name
		if (isset($fullname) && empty($fullname)) {
			catchErr("Full name required");
		}
		
		// validate email
		if (isset($email) && !isEmailValid($email)) {
			catchErr("Email address required");
		}
		
		// validate participation category
		if (isset($participationcategory) && $participationcategory == "-") {
			catchErr("Participation category required");
		}
		
		// validate purpose
		if (isset($purpose) && empty($purpose)) {
			catchErr("Purpose for joining TIM required");
		}
		
		// if no errors
		if (sizeof($ERRORS) == 0) {
			// send email
			$from = $email;
			$to = "pcourtot@trustworthyinternet.org";
			$headers = "From:" . $from;
			$subject = "TIM Signup - $fullname";
			$message = "
Full Name: $fullname
Company: $company
Email Address: $email
Title: $title
Participation Category: $participationcategory
Phone: $phone
Purpose for joining TIM: $purpose
";
			mail($to,$subject,$message,$headers);
			
			catchMsg("Thank you for registering");
			
			// reset form variables
			$fullname = "";
			$firstname = "";
			$participationcategory = "";
			$company = "";
			$phone = "";
			$title = "";
			$email = "";
			$purpose = "";
		}
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Trustworthy Internet Movement</title>
<link rel="stylesheet" type="text/css" href="asset/stylesheet/main.css" />
<!--[if IE]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="//d1dejaj6dcqv24.cloudfront.net/js/jquery.tools-1.2.6.min.gz.js" type="text/javascript"></script>
	<script src="/asset/script/main.js"></script>
</head>
<body id="home">
<div class="outer-container">
	<div class="header">
		<div class="logo">
			TIM Trustworthy Internet Movement
		</div>
		<a href="#join" class="button1"> Join The Movement <span class="arrow"></span> </a>
		<div class="press">
			<a href="mailto:pr@trustworthyinternet.org">Press Inquiries</a>
		</div>
	</div>
	<div class="content">
		<div class="banner">
			<div class="banner-text">
				<h1>Building Together a<br />
					<strong>Trustworthy</strong> Internet</h1>
				<p>Together, we resolve major lingering security issues on the Internet, such as SSL governance and the spread of botnets and malware, by ensuring security is built into the very fabric of private and public clouds.</p>
				<br />
				<p>TIM, the Trustworthy Internet Movement is a non-profit, vendor-neutral organization leveraging the power of the global security community to advance industry-wide technology innovations and initiatives for actionable change.</p>
			</div>
			<div class="tabs-without-javascript">
				<a href="#fundamentals" class="current">Fundamentals</a>
				<a href="#about">About TIM</a>
				<a href="#join">Join TIM</a>
			</div>
		</div>
		<div class="panes">
			<div class="fundamentals">
				<h2>Our Fundamentals</h2>
				<h5>Three core pillars guide our work and focus</h5>
				<div class="three-column clear">
					<div class="box1">
						<div class="icon-lightbulb">
						</div>
						<h2>Innovation</h2>
						<p>We focus on fostering innovation to solve the hard problems on the Internet, by funding new solutions and providing the appropriate technical assistance and resources to address them.</p>
					</div>
					<div class="box1">
						<div class="icon-bubbles">
						</div>
						<h2>Collaboration</h2>
						<p>Through working groups consisting of subject matter experts and stakeholders,  we provide collaborative frameworks for discussing these problems and working towards solutions. Working group results will be published on a regular basis and shared with the community.</p>
					</div>
					<div class="box1 last">
						<div class="icon-stars">
						</div>
						<h2>Individual Expertise</h2>
						<p>We will attract individuals with specialized domain expertise to guide and contribute to the development of the various working groups. These experts include members from larger corporations, government agencies, industry organizations or individual contributors.</p>
					</div>
				</div>
				<div class="section1">
					<h2>Ready to Participate with TIM?</h2>
					<h5>Participation in TIM can come in multiple forms</h5>
					<ol>
						<li><strong>Experts</strong> with domain expertise who want to devote their time and energy to solve one or many of the problems they are most passionate about.</li>
						<li><strong>Innovators and technology gurus</strong> who want to build new security solutions and innovate in this space.</li>
						<li><strong>Stakeholders</strong>, including individuals, venture capitalists or corporations that want to adopt an important problem to  be solved for a particular initiative.</li>
						<li><strong>Corporations</strong> that want to fund TIM to solve a specific problem.</li>
						<li><strong>Academic institutions and non-profit organizations</strong> who need funds for a specific initiative TIM is interested in and can help resolve.</li>
						<li><strong>Angel investors and VCs</strong> who want to be the forefront of innovation and can provide financial support.</li>
					</ol>
				</div>
			</div> 
			<div class="about">
				<div class="side-box1">
					<h2>Founding Principles</h2>
					<p>Founded by <strong><a href="http://www.linkedin.com/pub/philippe-courtot/1/104/703" target="_blank">Philippe Courtot</a></strong>, chairman and CEO of Qualys, at the request of many large corporations and industry leaders who share the  view that with the emergence of cloud technologies, we now have the unique opportunity to build security into the fabric and not as an afterthought. Philippe has personally pledged half a million dollars to support TIM. </p>
					<div class="icon-lightbulb2">
					</div>
				</div>
				<div class="main">
					<h2>Our Story</h2>
					
					<p>Today, with two billion people online and millions of corporations moving into the cloud to support their business growth and compete more effectively, the Internet has emerged as the backbone of modern society. At the same time security, privacy and reliability have become the front and center issues as the threat landscape continues to evolve at warp speed. </p>
					<br />
					<p>Launched at the RSA Conference 2012, the Trustworthy Internet Movement (TIM) is a non-profit, vendor-neutral organization leveraging the power of the global security community to advance industry-wide technology innovations and initiatives for actionable change. </p>
					<br />
					<p>TIM’s mission is to resolve major lingering security issues on the Internet, such as SSL governance and the spread of botnets and malware, by ensuring security is built into the very fabric of private and public clouds, rather than being an afterthought. </p>
					<p>The approach to solving these critical issues includes both technological and societal aspects. Drawing on individual talent from large corporations, cloud providers and industry groups as well as resources and technical assistance from technology leaders and the venture capital community, TIM will fund and foster collaborative innovation through working groups between these stakeholders. Together, our members will identify the hard issues to be solved and create new solutions to address them.</p>
					<br />
					<p><a href="/docs/TIM_PressRelease.pdf" target="_blank">Press Release</a></p>
				</div>
			</div>
			<div class="join">
				<div class="side-box1">
					<h2>Founding Principles</h2>
					<p>Founded by <strong><a href="http://www.linkedin.com/pub/philippe-courtot/1/104/703" target="_blank">Philippe Courtot</a></strong>, chairman and CEO of Qualys, at the request of many large corporations and industry leaders who share the  view that with the emergence of cloud technologies, we now have the unique opportunity to build security into the fabric and not as an afterthought. Philippe has personally pledged half a million dollars to support TIM. </p>
					<div class="icon-lightbulb2">
					</div>
				</div>
				<div class="main">
					<h2>Actionable change starts with you.</h2>
					<h5>Fill in the form below and join the movement. </h5>
					<h5 class="required-fields">( – ) Required fields</h5>
					<?php 
						displayErr();
						displayMsg();
					?>
					<form name="form" action="#join" method="post">
						<div class="clear">
							<div class="column">
								<label for="firstname" class="honey">First Name</label>
								<input type="text" name="firstname" placeholder="-" value="<?php echo $firstname; ?>" class="honey">
								<label for="fullname">Full Name</label><br />
								<input type="text" name="fullname" placeholder="-" value="<?php echo $fullname; ?>"><br />
								<label for="email">Email</label><br />
								<input type="text" name="email" placeholder="-" <?php echo $email; ?>><br />
								<label for="participationcategory">Participation category in TIM</label><br />
								<select name="participationcategory" class="last">
									<option value="-">-</option>
									<option value="Experts" <?php if($participationcategory == "Experts") echo "selected"; ?>>Experts</option>
									<option value="Innovators" <?php if($participationcategory == "Innovators") echo "selected"; ?>>Innovators</option>
									<option value="Stakeholders" <?php if($participationcategory == "Stakeholders") echo "selected"; ?>>Stakeholders</option>
									<option value="Corporations" <?php if($participationcategory == "Corporations") echo "selected"; ?>>Corporations</option>
									<option value="Academic Institutions" <?php if($participationcategory == "Academic Institutions") echo "selected"; ?>>Academic Institutions</option>
									<option value="Non-profit Organizations" <?php if($participationcategory == "Non-profit Organizations") echo "selected"; ?>>Non-profit Organizations</option>
									<option value="Angel Investors and VCs" <?php if($participationcategory == "Angel Investors and VCs") echo "selected"; ?>>Angel Investors and VCs</option>
								</select>
							</div>
							<div class="column">
								<label for="company">Company Name</label><br />
								<input type="text" name="company" value="<?php echo $company; ?>"><br />
								<label for="title">Title</label><br />
								<input type="text" name="title" value="<?php echo $title; ?>"><br />
								<label for="phone">Phone number <span class="example">(650-123-4567)</span></label><br />
								<input type="text" name="phone" class="last" value="<?php echo $title; ?>">
							</div>
						</div>
						<label for="purpose">Purpose for joining TIM</label><br />
						<textarea name="purpose" cols="" rows="" placeholder="-"><?php echo $purpose; ?></textarea><br />
						<input type="submit" class="button1" value="Submit">
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-container">
		<div class="divider">
		</div>
		<div class="footer">
			<div class="logo2">
				TIM Trustworthy Internet Movement
			</div>
			<div class="text">
			<p>For all press inquiries send email to <a href="mailto:pr@trustworthyinternet.org">pr@trustworthyinternet.org</a></p>
			<p>All rights reserved. © 2012</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>