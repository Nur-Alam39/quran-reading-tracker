<!DOCTYPE html>
<html>
	<title>Quran Reading Tracker</title>
	<link rel="icon" href="meal_icon.png" />
	<head>
		<?php include "linker.php";?>
	</head>
	<body>
		<div class="container-fluid" style="margin-top: 8%;">
			<h4 class="text-center" style="margin-bottom: 2%">Surah Index</h4>
			<?php
				$query="select * from surah_list order by id";
				$result=mysqli_query($connect,$query);
				echo "<table class='table'>";
					echo "<thead>";
						echo "<th>No</th>";
						echo "<th>Surah name</th>";
						echo "<th>Total ayat</th>";
						echo "<th>Read ayat</th>";
						echo "<th>Remaining ayat</th>";
						echo "<th>Progress</th>";
					echo "</thead>";
					while($data=mysqli_fetch_array($result))
					{
						$remaining_ayat = $data['total_ayat'] - $data['read_ayat'];
						$percentage = ($data['read_ayat'] * 100) / $data['total_ayat'];
						$percentage = number_format($percentage, 0);

						$surah_link = 'https://quran.com/' . $data['id'];

						$bg_clr = 'white';
						$clr = 'black';
						$font_weight = 'bold';

						if ($percentage == 100)
						{
							$bg_clr = '#f2f2f2';
							$font_weight = 'bold';
							$clr = 'white';
						}
						else if ($percentage > 1)
						{
							$bg_clr = '#f2f2f2';
							$clr = 'white';
						}
						/*else 
						{
							$bg_clr = 'white';
							$clr = 'black';
							$font_weight = 'bold';
						}  */
						echo "<tr style='background-color: ".$bg_clr."; font-weight: ".$font_weight.";'>";
							echo "<td>".$data['id']."</td>";
							echo "<td><a href = ".$surah_link." target='_blank' style='color: black;'>".$data['surah_name']."</a></td>";
							echo "<td>".$data['total_ayat']."</td>";
							echo "<td>".$data['read_ayat']."</td>";
							echo "<td>".$remaining_ayat."</td>";
							echo '<td>	
									<div class="progress" style="height: 25px;">
									  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuemin="0" aria-valuemax="100" 
									  		style="width:'.$percentage.'%; color: '.$clr.'; background-color: #1a8cff; font-weight: bold;">
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