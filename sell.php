<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$user = $_SESSION['un'];
	$checklogin = "select * from faga where emailid='$user'";
	$fdata = mysqli_query($conn, $checklogin);
	$result = mysqli_fetch_assoc($fdata);
	
	if(isset($_POST['register'])){
		if($result['mobileno']){
			$addsn = "select * from fagh";
			$addsndb = mysqli_query($conn, $addsn);
			$addsntotal = mysqli_num_rows($addsndb);
			$convertsn = $addsntotal + 1;
			$sn = (string) $convertsn;
			$fn = $_POST['fname'];
			$ln = $_POST['lname'];
			$hn = $_POST['hname'];
			$pf = $_POST['property_for'];
			$pt = $_POST['property_type'];
			$nor = $_POST['no_of_rooms'];
			$st = $_POST['sstate'];
			$ct = $_POST['city'];
			$loc = $_POST['locality'];
			$hno = $_POST['house_no'];
			$mobile_no = $_POST['mobile'];
			$email_id = $_POST['email'];
			$pr = $_POST['price'];
			
			$filename = $_FILES["add_photo"]["name"];
			$tempname = $_FILES["add_photo"]["tmp_name"];
			$ap = "uploadedpics/".$filename;
			move_uploaded_file($tempname, $ap);
			
			$check = "select * from fagh where mobileno='$mobile_no'";
			$checkdb = mysqli_query($conn, $check);
			$total = mysqli_num_rows($checkdb);
			if($total == 0){
				$query = "insert into fagh values('$sn', '$fn','$ln','$hn', '$pf', '$pt', '$nor', '$st', '$ct', '$loc', '$hno', '$mobile_no', '$email_id', '$pr', '$ap')";
				$data = mysqli_query($conn, $query);
				if($data){
					header('location:index.php');
				}
			
			}
		}
	}
?>
<html>
	<head>
		<title>
			FindAcres - Sell
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/sellstyle.css">
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
					<center><h1>Register</h1></center>
					<center><p>Please fill in this form to Register your house for rent.</p></center>
					<div style="color:red">
						<?php
							if(isset($_POST['register'])){
								if(!($result['mobileno'])){
									echo "First You Need To <a href='login.php'>Login</a> In This Website To Register Your Property.";
								}
								else{
									if($total == 1){
										echo "You Have Already Registered Your Property Use Another Mobile Number or Emailid ";
									}
								}
							}
						?>
					</div>
					<hr>
					<form action="" method="post" enctype="Multipart/form-data">
						<div class="row">
							<div class="column">
								<label for="fname"><i class="fa fa-user"></i> First Name :<span style="color:red">*</span></label>
								<input type="text" placeholder="Enter First Name" name="fname" required>
							</div>
							<div class="column">
								<label for="lname"><i class="fa fa-user"></i> Last Name :<span style="color:red">*</span></label>
								<input type="text" placeholder="Enter Last Name" name="lname" required>
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label for="hname"><i class="fa fa-address-card"></i> Plot/House Name :</label>
								<input type="text" placeholder="Enter Plot/House Name" name="hname">
							</div>
							<div class="column">
								<label for="lpf"><i class="fa fa-home"></i> List Property For :<span style="color:red">*</span></label>
								<select name="property_for" required>
									<option value="">Select Property For</option>
									<option value="Rent">Rent</option>
									<option value="Sell">Sell</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label for="pt"><i class="fa fa-building"></i>Property Type :<span style="color:red">*</span></label>
								<select name="property_type" required>
									<option value="">Select Property Type</option>
									<option value="Apartment / Flat / Building FLoor">Apartment / Flat / Building FLoor</option>
									<option value="House / Villa">House / Villa</option>
								</select>
							</div>
							<div class="column">
								<label for="nor"><i class="fa fa-bed"></i> Number Of Rooms :<span style="color:red">*</span></label>
								<select name="no_of_rooms" required>
									<option value="">Select Number of Rooms</option>
									<option value="1 RK">1 RK</option>
									<option value="1 BHK">1 BHK</option>
									<option value="2 BHK">2 BHK</option>
									<option value="3 BHK">3 BHK</option>
									<option value="4 BHK">4 BHK</option>
									<option value="5 BHK">5 BHK</option>
									<option value="5+ BHK">5+ BHK</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label for="sstate"><i class="fa fa-tree"></i> Select State :<span style="color:red">*</span></label>
								<select name="sstate" required>
									<option value="">Select State</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Arunachal Pradesh">Arunachal Pradesh</option>
									<option value="Assam">Assam</option>
									<option value="Bihar">Bihar</option>
									<option value="Chhattisgarh">Chhattisgarh</option>
									<option value="Goa">Goa</option>
									<option value="Gujarat">Gujarat</option>
									<option value="Haryana">Haryana</option>
									<option value="Himachal Pradesh">Himachal Pradesh</option>
									<option value="Jammu and Kashmir">Jammu and Kashmir</option>
									<option value="Jharkhand">Jharkhand</option>
									<option value="Karnataka">Karnataka</option>
									<option value="Kerala">Kerala</option>
									<option value="Madhya Pradesh">Madhya Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Manipur">Manipur</option>
									<option value="Meghalaya">Meghalaya</option>
									<option value="Mizoram">Mizoram</option>
									<option value="Nagaland">Nagaland</option>
									<option value="Odisha">Odisha</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Sikkim">Sikkim</option>
									<option value="Tamil Nadu">Tamil Nadu</option>
									<option value="Telangana">Telangana</option>
									<option value="Tripura">Tripura</option>
									<option value="Uttar Pradesh">Uttar Pradesh</option>
									<option value="Uttarakhand">Uttarakhand</option>
									<option value="West Bengal">West Bengal</option>
								</select>
							</div>
							<div class="column">
								<label for="scity"><i class="fa fa-institution"></i> Enter City :<span style="color:red">*</span></label>
								<input type="text" placeholder="Enter City" name="city" required>
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label for="elocality"><i class="fa fa-road"></i> Enter Locality :<span style="color:red">*</span></label>
								<input type="text" placeholder="Enter locality" name="locality" required>
							</div>
							<div class="column">
								<label for="hnsn"><i class="fa fa-home"></i> House No./ Street Name :<span style="color:red">*</span></label>
								<input type="text" placeholder="Enter House no./ Street Name" name="house_no" required>
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label for="ephone"><i class="fa fa-phone"></i> Mobile No. :<span style="color:red">*</span></label>
								<input type="text" placeholder="Enter Mobile Number" name="mobile" required>
							</div>
							<div class="column">
								<label for="eemail"><i class="fa fa-envelope"></i> E-mail ID :</label>
								<input type="email" placeholder="Enter E-mail ID" name="email">
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label for="eprice"><i class="fa fa-inr"></i> Enter Expected Price :<span style="color:red">*</span></label>
								<input type="text" placeholder="Enter Expected Price" name="price" required>
							</div>
							<div class="column">
								<label for="aphoto"><i class="fa fa-picture-o"></i> Add Photo :</label>
								<input type="File" name="add_photo">
							</div>
						</div>
						<input type="submit" class="registerbtn" value="Register" name="register">
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