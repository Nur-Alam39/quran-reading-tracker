<!DOCTYPE html>
<html>
	<title>Quran Reading Tracker</title>
	<head>
		<?php include "linker.php";?>
	</head>
	<body>
		<div class="container-fluid" style="margin-top: 8%;">
			<h4 class="text-center" style="margin-bottom: 2%">New Record</h4>
			<form action="insert.php" method="post" class="card p-4 m-2 mb-5 ml-5 text-center" style='width: 90%; background-color: ; border:; border-radius: 10px; margin-left: 50%; margin-right: 50%;'>
			  <div class="form-row" >
			  	<div class="form-group col-md-3">
				    <label><b>Time</b></label><br>
				    <input type="text" class='form-control' name="" value = 
				    	"<?php
					    	date_default_timezone_set("Asia/Dhaka"); 
					    	echo "" . date("d-F-Y | h:i:s A");
					    ?>"/>
				  </div>
			  		
				  <div class="form-group col-md-3">
				    <label for="inputState"><b>Surah</b></label>
			      
			      		<?php
							$query="select * from surah_list order by id";
							$result=mysqli_query($connect,$query);
							echo "<select  class='form-control' name='surah_name' id='surah_name'>";
								while($data=mysqli_fetch_array($result))
								{
									echo "<option value ='".$data['surah_name']."'>".$data['id'].". ".$data['surah_name']." - ".$data['total_ayat']."</option>";
								}
							echo "</select>";
						?>
			      
				  </div>
				  <div class="form-group col-md-2">
				    <label><b>From</b></label>
				    <input type="number" class="form-control"  rows="1" name="ayat_from"></input>
				  </div>
				  <div class="form-group col-md-2">
				    <label><b>To</b></label>
				    <input type="number" class="form-control"  rows="1" name="ayat_to"></input>
				  </div>
				   <div class="form-group col-md-2">
				    <label>&nbsp;</label>
				    <input type="submit"  class="btn btn-primary text-center form-control"></input>
				  </div>
			  </div>
			</form>
		</div>	
	</body>
</html>