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
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
echo"<script>alert('Booking deleted');</script>";
echo "<script>setTimeout(\"location.href = 'AdminDashboard.php';\",2000);</script>";
//header("Location: AdminDashboard.php");
?>