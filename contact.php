<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$user = $_SESSION['un'];
	$checklogin = "select * from faga where emailid='$user'";
	$fdata = mysqli_query($conn, $checklogin);
	$result = mysqli_fetch_assoc($fdata);
	
	
	if(isset($_POST['sendMail'])){
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$comment = $_POST['subject'];
		$mail = $_POST['email_id'];
		if($result['mobileno'] || $result['emailid']){
			$to = "bineeshalakkal22@gmail.com";
			$subject = $fname." ".$lname." has Sended a Message.";
			$message = $comment;
			$header = "From: ".$mail;
	
			if(mail($to, $subject, $message, $header)){
				echo '<script>alert("Mail Has Sended")</script>';
			}
			else{
				echo '<script>alert("Mail Cannot be Send")</script>';
			}
		}
		else{
			header("location:login.php");
		}
	}
?>
<html>
	<head>
		<title>
			FindAcres - Contact
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/contactstyle.css">
		<link href="font/fonts/css/font.min.css" rel="stylesheet" type="text/css">
		<script src="js/jquery-3.2.1.min.js"></script>
	</head>
	<body>
		 <header>
  			<nav>
				<div class="menu-icon">
					<i class="fa fa-bars"></i>
					
				</div>
		  		<div class="logo">
	  				<a href="index.php"><span style="color:red">Find</span><span style="color:Green">Acres</span></a>
  				</div>
	  			<div class="menu">
			  		<ul>
						<span class="mainmenu">
							<li class="home"><a href="index.php">Home</a></li>
							<li class="search"><a href="buy.php">Buy</a></li>
							<li class="sell"><a href="sell.php">Sell</a></li>
							<li class="about"><a href="about.php">About us</a></li>
							<li class="contact"><a href="contact.php">Contact us</a></li>
						</span>
			  			<li class="login"><a href="register.php">Register</a></li>
			  		</ul>
			  	</div>
			 </nav>
		</header> 
			<div class="content">
				
				<div class="borderforstyle">
					
					<div class="container">
						<div style="text-align:center">
							<h2>Contact Us</h2>
							<p>Questions? Go ahead, ask them and leave us a message:</p>
						</div>
						<hr>
						<div class="row">
							<div class="column">
								<img src="image/contact_us.jpg" style="width:100%">
							</div>
							<div class="column" id="column">
								<form action="" method="post">
									<label for="fname"><i class="fa fa-user"></i> First Name :<span style="color:red">*</span></label>
									<input type="text" id="fname" name="firstname" placeholder="Enter your name.." required>
									
									<label for="lname"><i class="fa fa-user"></i> Last Name :<span style="color:red">*</span></label>
									<input type="text" id="lname" name="lastname" placeholder="Enter your last name.." required>
									
									<label for="email"><i class="fa fa-envelope"></i> Email ID :<span style="color:red">*</span></label>
									<input type="email" placeholder="Enter Your Email ID" name="email_id" style="width: 100%;padding: 12px;border: 1px solid #ccc;margin-top: 6px;gin-bottom: 16px;esize: vertical;" required>
									
									<label for="subject"><i class="fa fa-sticky-note-o"></i> Subject :<span style="color:red">*</span></label>
									<textarea id="subject" name="subject" placeholder="Write something.." style="height:170px" required></textarea>
									<input type="submit" value="Submit" name="sendMail">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<footer>
			<div class="footer-icons">
				<ul>
					<li><a href="https://www.facebook.com/profile.php?id=100008988073916"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="https://instagram.com/bineesh_a_b?igshid=3zjpkkkhr4wr"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li>
						<?php
							if($result['mobileno'] || $result['emailid']){
								echo "<a href='logout.php' name='logout'>Log Out</a>";
							}
						?>
					</li>
				</ul>
			</div>
			<p>
				A Project for <b>Tybsc</b>. All Rights Reserved <i class="fa fa-copyright" aria-hidden="true"></i> 2019. This Website Is Made By <a href="">Bineesh</a>.
			</p>
		</footer>
		<script type="text/javascript">
			
			$(document).ready(function(){
				$(".menu-icon").on("click", function(){
					$("nav ul"). toggleClass("showing");
				});
			});
			
			var myIndex = 0;
			carousel();

			function carousel() {
				var i;
				var x = document.getElementsByClassName("mySlides");
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";  
				}
				myIndex++;
				if (myIndex > x.length) {myIndex = 1}    
						x[myIndex-1].style.display = "block";  
						setTimeout(carousel, 5000); // Change image every 2 seconds
				}

		</script>
	</body>
</html>