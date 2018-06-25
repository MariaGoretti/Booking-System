<?php
include('Includes/authentication.php');
include ('booking/config.php');
$result = mysqli_query($conn,"SELECT * FROM bookingcalendar WHERE item = '".$_SESSION['first_name']."'");
?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consultant</title>
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1|Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
	<style>
	body{
		font-family: 'Gothic A1', sans-serif;
	
	}
	input[type=submit]{
		background: #EDCC43;border: 2px #B70E4D;padding: 10px;border-radius: 50px 20px;color:white;cursor: pointer;
	}
	input[type=submit]:hover{
		background-color:#5EA246;
	}
	ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
	position: fixed;
	width: 100%
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}


li a:hover {
    background-color: black;
	text-decoration:none;
	color:black;
}
li a:visited {
    color: white;
}
#active li a:hover{
	color: black;
}
	</style>
  </head>
  
  <body>
<ul>
  <li><a class="active" href="/Finsmarts/index.php">Home</a></li>
  <li><a href="/Finsmarts/index.php#section-one">Overview</a></li>
  <li><a href="/Finsmarts/index.php#section-five">Newsletter</a></li>
  <li><a href="/Finsmarts/index.php#section-six">Contact</a></li>
  <li><a href="/Finsmarts/booking/makebooking.php">Book Appointment</a></li>
<li style="float:right;"><a href="/Finsmarts/Includes/logout.inc.php">Logout</a></li>
   </ul>
		<br><br><br>
  <center>
  <h2 style="font-family: 'Indie Flower', cursive; font-size: 33px;">Consultant Dashboard</h2>
  
		
<p><?php echo "Name: " .$_SESSION['first_name']." ".$_SESSION['last_name'] ?></p>
<p><?php echo "Email: " .$_SESSION['user_email'] ?></p>
<form method="post" action="">
							<input type="hidden" name="viewallrecords" value="view all">
							<input type="submit" name="btn-show_all" value="View All Your Appointments">
						</form>
						<?php
						function display_all($result){
						//display all records
					?>
					<?php
					
$conn=mysqli_connect("localhost","root","","financial_system");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = $_SESSION['first_name'];
//$result = mysqli_query($conn,"SELECT * FROM bookingcalendar WHERE item = '$user'");?>

<table class='table table-strippped'>
<tr>
<th>Id</th>
<th>Client Name</th>
<th>Client Phone Number</th>
<th>Consultant</th>
<th>Start Day</th>
<th>End Day</th>
<th>Start Time</th>
<th>End Time</th>
<th>Accept or Decline</th>
</tr>
<tbody>
<?php
$count=1;
$query="Select * from bookingcalendar WHERE item = '$user' ORDER BY id desc;";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td ><?php echo $count; ?></td>
<td ><?php echo $row["name"]; ?></td>
<td ><?php echo $row["phone"]; ?></td>
<td ><?php echo $row["item"]; ?></td>
<td ><?php echo date("d-m-Y", substr($row["start_day"], 0, 10)); ?></td>
<td ><?php echo date("d-m-Y", substr($row["end_day"], 0, 10)); ?></td>
<td ><?php echo sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)); ?></td>
<td ><?php echo sprintf("%02d:%02d", $row["end_time"]/60/60, ($row["end_time"]%(60*60)/60)) ; ?></td>
<td ><a href="booking/accept.php?id=<?php $id=$count; ?>">Accept</a><br><a href="booking/consultantdelete.php?id=<?php $id=$count;echo $row["id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } 

mysqli_close($conn);
						}
						
						
?>
</tbody>
<?php
						//check if user wants to view all the records
								if(isset($_POST['btn-show_all'])){
									display_all($result);
								}
								?>
</center>

  </body>
</html>