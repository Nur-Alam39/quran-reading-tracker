$(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('nav').addClass('shrink');
  } else {
    $('nav').removeClass('shrink');
  }
});
			//for single bus
			$(document).ready(function(){
			 $('.bus_detail_info').click(function(){
			   var id = this.id;
			   var splitid = id.split('_');
			   var busid = splitid[1];
			   // AJAX request
			   $.ajax({
				url: 'bus_info.php',
				type: 'post',
				data: {busid: busid},
				success: function(response){ 
				  // Add response in Modal body
				  $('#bus_detail_b').html(response);

				  // Display Modal
				  $('#ModalforBusDetail').modal('show'); 
				}
			  });
			 });
			});
			
			//for seat
			$(document).ready(function(){
			 $('.bus_seat').click(function(){
			   var id = this.id;
			   var splitid = id.split('_');
			   var busno = splitid[1];
			   // AJAX request
			   $.ajax({
				url: 'seat_info.php',
				type: 'post',
				data: {busno: busno},
				success: function(response){ 
				  // Add response in Modal body
				  $('#bus_seat_b').html(response);

				  // Display Modal
				  $('#ModalforBusSeat').modal('show'); 
				}
			  });
			 });
			});