<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	if(isset($_POST['login'])){
		$user = $_POST['username'];
		$pwd = $_POST['password'];
		
		$query = "select * from faga where emailid='$user' && password='$pwd'";
		$data = mysqli_query($conn, $query);
		$total = mysqli_num_rows($data);
		if($total == 1){
			$_SESSION['un'] = $user;
			header('location:index.php');
		}
	}
?>
<html>
	<head>
		<title>
			FindAcres - Login
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/loginstyle.css">
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
							<h2>Login</h2>
							<p>If You have Register Your Account Then Login Here</p>
						</div>
						<div style="color:red"><?php if(isset($_POST['login'])){if($total == 0){echo "Invailed Login. If you don't have account then <a href='register.php'>Register</a>";}}?></div>
						<hr>
						<div class="row">
							<div class="column">
								<img src="image/default_house_image.jpg" style="width:100%">
							</div>
							<div class="column" id="column">
								<form action="" method="post">
									<label for="fname"><i class="fa fa-user"></i> UserName :</label>
									<input type="text" id="uname" name="username" placeholder="Enter Your Email ID" required>
									
									<label for="lname"><i class="fa fa-key"></i> Password :</label>
									<input type="password" id="pwd" name="password" placeholder="Enter Your Password" required>
									<input type="checkbox" onclick="showPassword()" style="margin-bottom:30px">Show Password
									
									<input type="submit" name="login" value="Login">
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
				function showPassword() {
					var x = document.getElementById("pwd");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
		</script>
	</body>
</html>