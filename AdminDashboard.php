<?php
include('Includes/authentication.php');
include('Includes/db.inc.php');

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
		background: #EDCC43;
		border: 2px #B70E4D;
		padding: 10px;
		border-radius: 50px 20px;
		color:white;
		cursor: pointer;
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
  <li><a href="/Finsmarts/home.php">Home</a></li>
  <li><a href="/Finsmarts/home.php#section-one">Overview</a></li>
  <li><a href="/Finsmarts/home.php#section-five">Newsletter</a></li>
  <li><a href="/Finsmarts/home.php#section-six">Contact</a></li>
  <li><a href="/Finsmarts/booking/makebooking.php">Book Appointment</a></li>
<li style="float:right;"><a href="/Finsmarts/Includes/logout.inc.php">Logout</a></li>
   </ul>
   <br><br><br>
   <center>
    <h2 style="font-family: 'Indie Flower', cursive; font-size: 33px;text-align:center">Admin Dashboard</h2>
    <p style="text-align:center"><?php echo "Name: " .$_SESSION['first_name']." ".$_SESSION['last_name'] ?></p>
    <p style="text-align:center"><?php echo "Email: " .$_SESSION['user_email'] ?></p>
	</center>
    <form action="#" method="POST" style="text-align:center">
    <input type="submit" name="Users" value="Users">
    <input type="submit" name="Consult" value="Appointments"><br><br>
<?php
if(isset($_POST['Users'])){?>
<u><h2 style="font-family: 'Indie Flower', cursive; font-size: 24px;text-align:center;">Users</h2></u>
<?php
echo"<center>";
echo"<table class='table table-strippped' style='width: 70%;'>";
echo"<tr>";
echo"<th>FirstName</th>";
echo"<th>LastName</th>";
echo"<th>EmailAddress</th>";
echo"<th>User Type</th>";
echo"<th></th>";
echo"</tr>";
$sql= "SELECT * FROM `users`";
$records=mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_assoc($records)){
$fname=$fetch['first_name'];
$Lname=$fetch['last_name'];
$Email=$fetch['user_email'];
$Type=$fetch['user_type'];
$id=$fetch['id'];
echo "<tr>";
echo "<td>{$fname}</td>";
echo "<td>{$Lname}</td>";
echo "<td>{$Email}</td>";
echo "<td>{$Type}</td>";
echo "<td><a href='EditUser.php?Fname={$fname}&Lname={$Lname}&Email={$Email}&Type={$Type}&id={$id}'>Edit or Delete</a></td>";
echo "</tr>";
echo "</center>";
}}
?>


<?php
if(isset($_POST['Consult'])){
echo"<center>"; ?>
<u><h2 style="font-family: 'Indie Flower', cursive; font-size: 24px;text-align:center;">Appointments</h2></u>
<table class='table table-strippped' style="width: 90%">
<tr>
<th>Id</th>
<th>Client Name</th>
<th>Client Phone Number</th>
<th>Consultant</th>
<th>Start Day</th>
<th>End Day</th>
<th>Start Time</th>
<th>End Time</th>
<th>Cancelled</th>
<th></th>
</tr>
<tbody>
<?php
$count=1;
$query="Select * from bookingcalendar ORDER BY id desc;";
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
<td ><?php echo $row["canceled"]; ?></td>
<td ><a href="delete.php?id=<?php $id=$count;echo $row["id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } 
echo"</center";
}
?>
</table>
    </form>
  </body>
</html>