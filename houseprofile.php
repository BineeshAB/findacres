<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$user = $_SESSION['un'];
	
	$checklogin = "select * from faga where emailid='$user'";
	$fdata = mysqli_query($conn, $checklogin);
	$result = mysqli_fetch_assoc($fdata);
	
		$dts = $_SESSION['number'];
		
		
		$checkdataoh = "select * from fagh where srno='$dts'";
		$fdataoh = mysqli_query($conn, $checkdataoh);
		$resultoh = mysqli_fetch_assoc($fdataoh);
	
?>
<html>
	<head>
		<title>
			FindAcres - <?php echo $resultoh['firstname'];?>'s House Profile
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/houseprofilestyle.css">
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
	  				<a href="index.php"><span style="color:red"><i>Find</i></span><span style="color:Green"><i>Acres</i></span></a>
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
		<div class="wholecontent">
			<div class="cover">
				<div class="coverimage"><img src="image/cover_image.jpg" width="100%" id="bgimage"></div>
				<center>
					<img src="<?php
								if($resultoh['photosrc'] != "" || $resultoh['photosrc'] != NULL){
									echo $resultoh['photosrc'];
								}
								else{
									echo "image/default_house_image.jpg";
								}
								?>" class="profileimg" width="300px" height="300px">
					<h2><?php echo $resultoh['firstname'];?>'s House Details</h2>
				</center>
			</div>
		
			<div class="content">
				<p class="p"><b>Owner Full Name : </b><?php echo $resultoh['firstname']." ".$resultoh['lastname'];?></p>
				<p class="p">
					<b>Property Name : </b>
					<?php
						if($resultoh['housename'] != "" || $resultoh['housename'] != NULL){
							echo $resultoh['housename'];
						}	
						else{
							if($resultoh['propertytype'] = "Apartment / Flat / Building FLoor"){
								echo $resultoh['noofrooms']." Flat";
							}
							else{
								echo $resultoh['noofrooms']." House";
							}
												
						}
					?>
				</p>
				<p class="p"><b>This Property is For : </b><?php echo $resultoh['propertyfor'];?></p>
				<p class="p"><b>Property is  : </b><?php echo $resultoh['propertytype'];?></p>
				<p class="p"><b>The Property is : </b><?php echo $resultoh['noofrooms'];?><span> Plot</span></p>
				<p class="p"><b>Address : </b><?php echo $resultoh['houseno'].", ".$resultoh['locality'].", ".$resultoh['city'].", ".$resultoh['state'];?></p><br>
				<p class="p"><b>City : </b><?php echo $resultoh['city'];?></p>
				<p class="p"><b>Mobile No. : </b><?php echo $resultoh['mobileno'];?></p>
				<p class="p"><b>Email ID : </b><?php echo $resultoh['emailid'];?></p>
				<p class="p"><b>Price : </b>₹ <span> <?php echo $resultoh['price'];?></span></p>
				<!--<div class="borderforstyle">
					
				</div>-->
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