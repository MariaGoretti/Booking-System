<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Canceling...</title>

</head>

<body>

<?php
	
	if(empty($errors))
	{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "financial_system";
	$tablename = "bookingcalendar";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password,  $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$id = intval(htmlspecialchars($_POST["id"]));

		$sql = "UPDATE $tablename SET canceled='1' WHERE id = $id";
		if (mysqli_query($conn, $sql)) {
			echo "<script type='text/javascript'>alert('Booking cancelled. User has been notified')</script>";
			echo "<script>setTimeout(\"location.href = '../ConsultantDashboard.php';\",500);</script>";
			//send message to user
			echo"<script>
if(window.Notification && Notification.permission !== 'denied') {
	Notification.requestPermission(function(status) {  // status is 'granted', if accepted by user
		var n = new Notification('Appointment Status', { 
			body: 'Your appointment has been cancelled.',
			icon: '/path/to/icon.png'
		}); 
	});
}
</script>";
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		mysqli_close($conn);
	}
?>

<!--<a href="ConsultantDashboard.php"><p>Back</p></a>-->

</body>

</html>
