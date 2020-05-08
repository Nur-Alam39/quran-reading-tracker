<?php
	$connect=mysqli_connect("localhost","root","","quran_tracker");
	/*$sql="select * from others_info";
	$records=mysqli_query($connect,$sql);
	$data=mysqli_fetch_array($records);
	$current_day=$data['Current_day'];
	$meal_charge=$data['Meal_charge'];
	$extra_charge=$data['Extra_charge'];
	$year=$data['Year'];
	$month=$data['Month'];
	$dept=$data['Department'];
	$name=$data['Name'];*/
?>
<link rel="stylesheet" href="style.css" media="all" />
<link rel="stylesheet" href="success_animation.css" media="all" />
<link rel="stylesheet" href="animate.css" media="all" />
<script src="jquery.js" type="text/javascript"></script>
<script src="viewportchecker.js" type="text/javascript"></script>
<script src="scripts.js" type="text/javascript"></script>
<script src="serverTime.js" type="text/javascript"></script>
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css"/>
<link rel="stylesheet" href="bootstrap4/css/bootstrap.css"/>
<script src="bootstrap4/js/bootstrap.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script type="text/javascript">
	$(window).scroll(function() {
	  if ($(document).scrollTop() > 50) {
		$('nav').addClass('shrink');
	  } else {
		$('nav').removeClass('shrink');
	  }
	});
</script>
<script>
	$('.navbar-nav .nav-link').click(function(){
    $('.navbar-nav .nav-link').removeClass('active');
    $(this).addClass('active');
});
</script>
<style>
	.navbar-light .fixed-top .nav-item > .nav-link.active  {
    color:red;
}
box-shadow: 0 0 8px #d9d9d9;
</style>
<nav class="navbar navbar-expand-sm  navbar-light fixed-top" style="background-color:#fff;border-bottom:1px solid #f2f2f2;">
		  <a class="navbar-brand" style="color:#;margin-left:1%;font-weight:bold;" href="index.php">
				<!-- <img src='' style='width:;height:;padding-top:%;margin-right:2%'/> -->Quran Reading Tracker
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon" style="border:px solid #666;background-color:#fff;border-radius:2px;"></span>
		  </button>
		  <div class="collapse navbar-collapse" style="background-color:white;color:white;z-index:200;width:100%;margin-left:7%;" id="collapsibleNavbar">
				 <ul class="navbar-nav">
				  <li class="nav-item">
					<a class=" nav-link" style='color:#;font-weight:bold;' href="index.php">Overview&emsp;&emsp;</a>
				  </li>
				   <li class="nav-item">
					<a class=" nav-link" style='color:#;font-weight:bold;' href="all_list.php">Reading List&emsp;&emsp;</a>
				  </li>
				  <li class="nav-item">
					<a class=" nav-link" style='color:#;font-weight:bold;' href="add.php">Add New&emsp;&emsp;</a>
				  </li>
				  <li class="nav-item">
					<a class=" nav-link" style='color:#;font-weight:bold;' href="surah.php">Surah Index&emsp;&emsp;</a>
				  </li>
				  <li class="nav-item">
					<a class="btn btn-sm btn-light" style='color:#;font-weight;margin-left:;float:right' href="#">&emsp;Started: 26-April-2020 &emsp;</a>
				  </li>
				</ul>
		  </div> 
		<!-- <button class='btn btn-link' style='float:right;padding:;' data-toggle="tooltip" data-placement="bottom" title="About Meal System"> 
			<img src='food3.gif' style='width:60px;height:50px;'/>
		  </button> -->
	</nav>