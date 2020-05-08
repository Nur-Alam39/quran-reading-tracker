<!DOCTYPE html>
<html>
	<title>Quran Reading Tracker</title>
	<head>
		<?php include "linker.php";?>
	</head>
	<body>
		<div class="container-fluid" style="margin-top: 8%;">
			<h4 class="text-center" style="margin-bottom: 2%">Reading List</h4>
			<?php
				$query="select reading_list.time, reading_list.surah_name, reading_list.ayat_from, 
						reading_list.ayat_to, surah_list.id, surah_list.total_ayat, surah_list.read_ayat
						from reading_list 
						inner join surah_list 
						on reading_list.surah_name = surah_list.surah_name 
						order by reading_list.id desc";
				$result=mysqli_query($connect,$query);
	
				echo "<table class='table rounded-top'>";
					echo "<thead class = 'rounded-top' style='border-radius: 20px'>";
						echo "<th style='text-align: center'>Time</th>";
						echo "<th>Surah name</th>";
						echo "<th>Read from</th>";
						echo "<th>Progress</th>";
					echo "</thead>";
					while($data=mysqli_fetch_array($result))
					{
						date_default_timezone_set("Asia/Dhaka");
						$day = date('l', strtotime($data['time']));
						$day_month = date('d F', strtotime($data['time']));
						$year = date('Y | h:i A', strtotime($data['time']));
						//$time = date('h:i A', strtotime($data['time']));

						$remaining_ayat = $data['total_ayat'] - $data['read_ayat'];
						$read_now = $data['ayat_to'] - $data['ayat_from'] + 1;
						$percentage = ($data['ayat_to'] * 100) / $data['total_ayat'];
						$percentage = number_format($percentage, 0);
						echo "<tr>";
							echo "<td style = 'font-size: rem; text-align: center'><h5>".$day_month."</h5>".$year."</td>";
							echo "<td style='padding-top: 2%'><b class = 'p-1' style='border: solid 1px #cccccc; border-radius: 10px'>".$data['id'].'</b> <b>'.$data['surah_name'].'</b> - '.$data['total_ayat']." ayat</td>";
							echo "<td style='padding-top: 2%'><b>".$data['ayat_from'].' - '.$data['ayat_to']."</b> ayat</td>";
							echo '<td style="padding-top: 2%">	
									<div class="progress" style="height: 25px;">
									  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuemin="0" aria-valuemax="100" 
									  		style="width:'.$percentage.'%; color: ; font-weight: bold; background-color: #1a8cff;">
									    &nbsp; '.$percentage.'% Complete
									  </div>
									</div>
								  </td>';
						echo "</tr>";
					}
				echo "</table>";
			?>
		</div>
	</body>
</html>