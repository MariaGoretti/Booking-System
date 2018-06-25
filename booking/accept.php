<?php
echo "<script type='text/javascript'>alert('Booking accepted.')</script>";
			echo "<script>setTimeout(\"location.href = '../ConsultantDashboard.php';\",2000);</script>";
			//send message to user
			echo"<script>
if(window.Notification && Notification.permission !== 'denied') {
	Notification.requestPermission(function(status) {  // status is 'granted', if accepted by user
		var n = new Notification('Appointment Status', { 
			body: 'Your appointment has been accepted.',
			icon: '/path/to/icon.png'
		}); 
	});
}
</script>";
?>