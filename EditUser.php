<link href="https://fonts.googleapis.com/css?family=Gothic+A1|Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1|Indie+Flower" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
	<body>
	<center>
<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "financial_system";
	$tablename = "bookingcalendar";
	$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "";

if(isset($_GET['Fname']) && isset($_GET['Lname']) && isset($_GET['Email']) && isset($_GET['Type'])&& isset($_GET['id'])){
$Fname=$_GET['Fname'];
$Lname=$_GET['Lname'];
$Email=$_GET['Email'];
$Type=$_GET['Type'];
$id=$_GET['id'];
}
$Fnames=$_REQUEST['Fname'];
$Lnames=$_REQUEST['Lname'];
$Emails=$_REQUEST['Email'];
$Types=$_REQUEST['Type'];

if(isset($_POST['Delete'])){
$sql="DELETE FROM `users` WHERE `first_name`='$Fname' AND `last_name`='$Lname' AND `user_email`='$Email' AND `user_type`='$Type'";

$run=mysqli_query($conn,$sql);
if($run){
header('Location:AdminDashboard.php');
}else{
    echo "Records have not been deleted";
}
}else if(isset($_POST['Update'])){
$sqli="UPDATE `users` SET `first_name`='$Fnames',`last_name`='$Lnames',`user_email`='$Emails',`user_type`='$Types' WHERE `id`='$id'";
$run2=mysqli_query($conn,$sqli);
if($run2){
header('Location:AdminDashboard.php');
}else{
    echo "Records have not been updated";
}
}
?>
<br><br>
<div class= "label" id= "label">
<a href="AdminDashboard.php">Back</a><br>
<form method="post">

<h2 style="font-family: 'Indie Flower', cursive;">Edit User</h2>
<label>FirstName</label><input type="Text" name="Fname" value="<?php echo $Fname;?>"/><br>
<label>LastName</label><input type="Text" name="Lname" value="<?php echo $Lname;?>"/><br>
<label>Email Address</label><input type="Text" name="Email" value="<?php echo $Email;?>"/><br>
<label>User type</label><input type="Text" name="Type" value="<?php echo $Type;?>"/><br>
<input type="submit" name="Delete" value="Delete">
<input type="submit" name="Update" value="Update">
</form>
</div> 
</center> 
</body>
