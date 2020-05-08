<!DOCTYPE html>
<html>
	<title>Quran Reading Tracker</title>
	<link rel="icon" href="meal_icon.png" />
	<head>
		<?php include "linker.php";?>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 400px;
      border-radius: 10px;
  }
  </style>
	</head>
	<body>
		<div class="row" style="margin: 0%; margin-top: 8%;">
			<div class="col-lg-6">
				<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
				  <ul class="carousel-indicators">
				    <li data-target="#demo" data-slide-to="0" class="active"></li>
				    <li data-target="#demo" data-slide-to="1"></li>
				    <li data-target="#demo" data-slide-to="2"></li>
				  </ul>
				  
				  <!-- The slideshow -->
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="m1.jpg" alt="Los Angeles" width="1100" height="500">
				    </div>
				    <div class="carousel-item">
				      <img src="m2.jpg" alt="Chicago" width="1100" height="500">
				    </div>
				    <div class="carousel-item">
				      <img src="m3.jpg" alt="New York" width="1100" height="500">
				       <div class="carousel-caption">
					    <!-- <h3>Los Angeles</h3>
					    <p>We had such a great time in LA!</p> -->
					  </div>
				    </div>
				  </div>
				  
				  <!-- Left and right controls -->
				  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				    <span class="carousel-control-prev-icon"></span>
				  </a>
				  <a class="carousel-control-next" href="#demo" data-slide="next">
				    <span class="carousel-control-next-icon"></span>
				  </a>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="container-fluid text-center" style="margin: 0%; margin-top: %;">
					<h3>12 Ramadan, 1441 Hijri</h3>
					 <?php 
					 	date_default_timezone_set("Asia/Dhaka"); 
						echo "<h5>" .date('d-F-Y | h:i A'). "</h5>";
					 ?>
				</div>
				<?php

					$query="select * from surah_list order by id";
					$result=mysqli_query($connect,$query);
					
					$surah_read = 0;
					$ayat_read = 0;
					$surah_read_in_progress = 0;

					while($data=mysqli_fetch_array($result))
					{
						if ($data['total_ayat'] == $data['read_ayat'])
						{
							$surah_read++;
							$ayat_read += $data['read_ayat'];
						}
						else if ($data['read_ayat'] > 0 && $data['total_ayat'] != $data['read_ayat']) 
						{
							$surah_read_in_progress++;
							$ayat_read += $data['read_ayat'];
						}
					}

					$surah_percentage = ($surah_read * 100) / 114;
					$surah_percentage = number_format($surah_percentage, 0);

					$ayat_percentage = ($ayat_read * 100) / 6236;
					$ayat_percentage = number_format($ayat_percentage, 2);

					$ayat_remaining = 6236 - $ayat_read;

					
					echo '
					<div class="row" style="margin: 2%; margin-top: 4%">
						<div class="col-md-3 mt-3">
						  <div class="card" style="border: ; border-radius: 10px;">
						    <div class="card-body text-center">
						    	<h3>114</h3>
						    	<h5 class="">Total Surah</h5>
						    </div>
						  </div>
						</div>
						<div class="col-md-5 mt-3">
						  <div class="card" style="border: ; border-radius: 10px;">
						    <div class="card-body text-center">
						    	<h3>'.$surah_read.'</h3>
						    	<h5 class="">Surah Completed</h5>
						    	<div class="progress" style="height: 25px;">
								  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuemin="0" aria-valuemax="100" 
								  		style="width:'.$surah_percentage.'%; color: ; font-weight: bold; background-color: #1a8cff;">
								    &nbsp; '.$surah_percentage.'%
								  </div>
								</div>
						    </div>
						  </div>
						</div>
						<div class="col-md-4 mt-3">
						  <div class="card" style="border: ; border-radius: 10px;">
						    <div class="card-body text-center">
						    	<h3>'.$surah_read_in_progress.'</h3>
						    	<h5 class="">Surah in Progress</h5>
						    </div>
						  </div>
						</div>
						<div class="col-md-3 mt-3">
						  <div class="card" style="border: ; border-radius: 10px;">
						    <div class="card-body text-center">
						    	<h3>6236</h3>
						    	<h5 class="">Total Ayat</h5>
						    </div>
						  </div>
						</div>
						<div class="col-md-5 mt-3">
						  <div class="card" style="border: ; border-radius: 10px;">
						    <div class="card-body text-center">
						    	<h3>'.$ayat_read.'</h3>
						    	<h5 class="">Ayat Read</h5>
						    	<div class="progress" style="height: 25px;">
								  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuemin="0" aria-valuemax="100" 
								  		style="width:<?php echo '.$ayat_percentage.' ?>%; color: ; font-weight: bold; background-color: #1a8cff;">
								    &nbsp; '.$ayat_percentage.'%
								  </div>
								</div>
						    </div>
						  </div>
						</div>
						<div class="col-md-4 mt-3">
						  <div class="card" style="border: ; border-radius: 10px;">
						    <div class="card-body text-center">
						    	<h3>'.$ayat_remaining.'</h3>
						    	<h5 class="">Ayat Remaining</h5>
						    </div>
						  </div>
						</div>
					</div>';
				?>
					</div>
		</div>
		
	</body>
</html>
