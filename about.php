<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$user = $_SESSION['un'];
	$checklogin = "select * from faga where emailid='$user'";
	$fdata = mysqli_query($conn, $checklogin);
	$result = mysqli_fetch_assoc($fdata);
?>
<html>
	<head>
		<title>
			FindAcres - About
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/aboutstyle.css">
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
				
					<p><span style="color:white">_____</span>This website, FindAcres.com launched in 2019. It is a Project for the TyBSc.computer science course. This website is made by <b>Bineesh B.A.</b>. It is property portal, deals with every aspect of the consumers needs in the real estate industry. It is an online forum where buyers and sellers can exchange information about real estate properties quickly, effectively and inexpensively. At FindAcres.com, you can advertise a property, search for a property, browse through properties and keep yourself updated with the latest news and trends making headlines in the realty sector. </p>

					<p style="color:red">Why FindAcres.com ?</p>
					<p><span style="color:white">_____</span>At present, FindAcres.com offers advertisement stints such as microsites, banners, home page links and project pages to the clients for better visibility and branding in the market. With the ever-evolving online search behavior, FindAcres.com shares updated information pertinent to real estate activities, assisting prospective buyers to make informed buying decision. We make online property search easier, quicker and smarter!</p>
					
					<div class="card">
						<img src="image/profile_image.jpg" alt="Bineesh" style="width:100%">
						<h2>Bineesh B.A.</h2>
						<p class="title">CEO & Founder</p>
						<p>Mumbai University</p>
						<div style="margin: 24px 0;" class="link">
							<a href="https://www.facebook.com/profile.php?id=100008988073916"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="https://instagram.com/bineesh_a_b?igshid=3zjpkkkhr4wr"><i class="fa fa-instagram" aria-hidden="true"></i></a>
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