<!DOCTYPE html>
<html>
	<title>Quran Reading Tracker</title>
	<link rel="icon" href="meal_icon.png" />
	<head>
		<?php include "linker.php";?>
	</head>
	<body>
		<div class="container-fluid" style="margin-top: 10%;">
			<?php
				date_default_timezone_set("Asia/Dhaka");
				$time= date("Y-m-d h:i:s");
				$surah_name=$_POST["surah_name"];
				$ayat_from=$_POST["ayat_from"]; 
				$ayat_to=$_POST["ayat_to"]; 


				$query1 = "INSERT INTO reading_list(time, surah_name, ayat_from, ayat_to) VALUES('$time', '$surah_name','$ayat_from', '$ayat_to')";
				$query2 = "update surah_list set read_ayat = $ayat_to where surah_name = '$surah_name'";
				
				mysqli_query($connect, $query1);
				mysqli_query($connect, $query2);


		        echo "<script> location.href='all_list.php'; </script>";
		        exit;

			?>
		</div>
	</body>
</html>