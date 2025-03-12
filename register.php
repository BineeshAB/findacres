<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
		$user = $_SESSION['un'];
		$checklogin = "select * from faga where emailid='$user'";
		$fdata = mysqli_query($conn, $checklogin);
		$result = mysqli_fetch_assoc($fdata);
	
	if(isset($_POST['register'])){
		$un = $_POST['fname'];
		$ln = $_POST['lname'];
		$mobile_no = $_POST['mobile'];
		$email_id = $_POST['email'];
		$pwd = $_POST['pswrepeat'];
		
		
		$check = "select * from faga where mobileno='$mobile_no' && emailid='$email_id' && password='$pwd'";
		$checkdb = mysqli_query($conn, $check);
		$total = mysqli_num_rows($checkdb);
		if($total == 0){
		
			$query = "insert into faga values('$un','$ln','$mobile_no','$email_id','$pwd')";
			$data = mysqli_query($conn, $query);
			if($data){
				header('location:login.php');
			}
		}
	}
?>
<html>
	<head>
		<title>
			FindAcres - Register
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/registerstyle.css">
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
					<form action="" name="registerForm" method="post">
						<div class="container">
							<center><h1>Register</h1></center>
							<center><p>Please fill in this form to create an account.</p></center>
							<div style="color:red"><?php if(isset($_POST['register'])){if($total == 1){echo "You Have Already Registered Your account or use Another Password";}}?></div>
							<hr>
							<div class="row">
								<div class="column">
									<label for="fname"><i class="fa fa-user"></i> First Name :<span style="color:red">*</span></label>
									<input type="text" placeholder="Enter First Name" name="fname" id="fn" required>
								</div>	
								<div class="column">
									<label for="lname"><i class="fa fa-user"></i> Last Name :<span style="color:red">*</span></label>
									<input type="text" placeholder="Enter Last Name" name="lname" required>
								</div>
							</div>
							<div class="row">
								<div class="column">
									<label for="ephone"><i class="fa fa-phone"></i> Mobile No. :</label>
									<input type="text" placeholder="Enter Mobile Number" name="mobile" >
								</div>
							
								<div class="column">
									<label for="email"><i class="fa fa-envelope"></i> Email ID :<span style="color:red">*</span></label>
									<input type="email" placeholder="Enter Email ID" name="email" required>
								</div>
							</div>
							<div class="row">
								<div class="column">
									<label for="psw"><i class="fa fa-key"></i> Password :<span style="color:red">*</span></label>
									<input type="password" placeholder="Enter Password" id="newpwd" name="psw" required>
								</div>
								<div class="column">
									<label for="psw-repeat"><i class="fa fa-key"></i> Repeat Password :<span style="color:red">*</span></label>
									<input type="password" placeholder="Re-Enter Password" id="confirmpwd" onkeyup="checkPasswordMatch()" name="pswrepeat" required>
									<div id="errorMessage" style="color:Red;font-size:13px;margin-top:-20px"></div>
								</div>
							</div>
							<hr>
							<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
							
							<input type="submit" class="registerbtn" name="register" onClick="btn()" value="Register" id="rgbtn">
					
							<div class="container signin">
								<p>Already have an account? <a href="login.php">Sign in</a>.</p>
							</div>
						</div>
					</form>
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
					$("nav ul").toggleClass("showing");
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
				if (myIndex > x.length) {
					myIndex = 1
				}    
				x[myIndex-1].style.display = "block";  
				setTimeout(carousel, 5000); // Change image every 5 seconds
			}
			function checkPasswordMatch() {
				var password = document.getElementById("newpwd").value;
				var confirmPassword = document.getElementById("confirmpwd").value;

				if (password != confirmPassword) {
					document.getElementById("errorMessage").innerHTML = "Passwords do not match!";
				}
				else{
					document.getElementById("errorMessage").innerHTML = "";
				}
			}
			function btn(){
				
			}
		</script>
		
	</body>
</html>