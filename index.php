<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$user = $_SESSION['un'];
	$checklogin = "select * from faga where emailid='$user'";
	$fdata = mysqli_query($conn, $checklogin);
	$result = mysqli_fetch_assoc($fdata);
	
	$show = "select * from fagh";
	$checkdb = mysqli_query($conn, $show);
	$total = mysqli_num_rows($checkdb);
	
?>
<html>
	<head>
		<title>
			FindAcres - Home
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/main.css">
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
				<div class="image-slider">
					<div class="imgslide">
						<img class="mySlides" src="image/slideimage1.jpg">
						<img class="mySlides" src="image/slideimage2.jpg">
						<img class="mySlides" src="image/slideimage3.jpg">
						
					</div>
				</div>
				
				<div class="borderforstyle">
					<hr>
					<h2><center>Resently Add</center></h2>
					<hr>
					<div class="row">
						<?php
							$totalm = $total - 3;
							while($total > $totalm){
						?>
						<div class="column">
							<div class="card">
							<form action="" method="post" enctype="Multipart/form-data">
					
								<?php
									$sdboh = "select * from fagh where srno='$total'";
									$checkhidb = mysqli_query($conn, $sdboh);
									$sroh = mysqli_fetch_assoc($checkhidb);
								?>	
								<img src="
									<?php
										if($sroh['photosrc'] != "" || $sroh['photosrc'] != NULL){
											echo $sroh['photosrc'];
										}	
										else{
											echo "image/default_house_image.jpg";
										}
									?>" width="300px" height="300px" alt="House" style="padding:10px;width:100%">
								<div class="container">
										<hr>
										<h4>
											<b>
												<?php
													if($sroh['housename'] != "" || $sroh['housename'] != NULL){
														echo $sroh['housename'];
													}
													else{
														if($sroh['propertytype'] = "Apartment / Flat / Building FLoor"){
															echo $sroh['noofrooms']." Flat";
														}
														else{
															echo $sroh['noofrooms']." House";
														}
													}
												?>
											</b>
										</h4>
										<p><b>Property is For : </b><?php echo $sroh['propertyfor'];?></p>
										<p class="title"><b>Price : </b>₹ <?php echo $sroh['price'];?></p>
										<p><b>Address : </b><?php echo $sroh['locality'].", ".$sroh['city'].", ".$sroh['state'];?></p>
										<div id="contact_detail" name="">
											<input type="text" name="cd" value="<?php echo $sroh['srno'];?>" style="display:none">
											
										</div>
									</div>
									<p><input type="submit" onclick="houseview()" name="houseview" value="View Contact"></p>
									<?php
										if(isset($_POST['houseview'])){
											if($result['mobileno'] || $result['emailid']){
												$dts = $_POST['cd'];
												$_SESSION['number'] = $dts;
												header("location:houseprofile.php");
											}
											else{
												
												header("location:login.php");
											}	
										}
									?>
								</form>
								
							</div>
						</div>
						<?php
								$total--;
							}
							
							
											
						?>
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
						setTimeout(carousel, 5000);
			}
		</script>
	</body>
</html>