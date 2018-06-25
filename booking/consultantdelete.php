<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "financial_system";
	$tablename = "bookingcalendar";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "";

$id=$_REQUEST['id'];
$query = "DELETE FROM bookingcalendar WHERE id=$id";
$query = "UPDATE bookingcalendar SET canceled='1' WHERE id = $id";
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
echo"<script>alert('Booking deleted');</script>";
		echo"<script>
if(window.Notification && Notification.permission !== 'denied') {
	Notification.requestPermission(function(status) {  // status is 'granted', if accepted by user
		var n = new Notification('Appointment Status', { 
			body: 'Your appointment has been deleted. Consultant will be unavailable.',
			icon: '/path/to/icon.png'
		}); 
	});
}
</script>";
echo "<script>setTimeout(\"location.href = '../ConsultantDashboard.php';\",2000);</script>";
?>