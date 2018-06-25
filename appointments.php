<?php
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1|Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
	<style>
	body{
		font-family: 'Gothic A1', sans-serif;
	}
	
	button:hover{
		background:#6d082e;
	}
	</style>
  </head>
  <body>
  <button type="submit" name="submit" style="float: right;background: #B70E4D;border: 2px #B70E4D;padding: 10px;border-radius: 50px 20px;color:white;cursor: pointer;">Logout</button>
  <center>
  <h2 style="font-family: 'Indie Flower', cursive; font-size: 33px;">Appointments</h2>
<p><?php echo "Name: " .$_SESSION['first_name']." ".$_SESSION['last_name'] ?></p>
<table class="table table-strippped">
						<br>
						<tr>
							<th>Name</th>
							<th>Phone Number</th>
							<th>Client</th>
							<th>Start Day</th>
							<th>End Day</th>
							<th>Start Time</th>
							<th>End Time</th>
							<th>Cancelled</th>
						</tr>	
								<?php
									//check if its a success
									if($result -> num_rows > 0){
										while($row = $result->fetch_assoc()){
										?>

										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['phone']; ?></td>
											<td><?php echo $row['item']; ?></td>
											<td><?php echo $row['start_day']; ?></td>
											<td><?php echo $row['end_day']; ?></td>
											<td><?php echo $row['start_time']; ?></td>
											<td><?php echo $row['end_time']; ?></td>
											<td><?php echo $row['canceled']; ?></td>
										</tr>
                                        
										<?php
										display_all($result);
										}
									}
								?>
								

						</table>
						<form action="cancel.php" method="post" style="padding: 10px;">
		<center><h3 style="font-family: 'Indie Flower', cursive;">Cancel booking?</h3></center>
			<p>Input id of the booking to be cancelled</p>
			ID: <input name="id" required="" type="text" /><br />
			<p>
			<img id="captchaimg2" src="captcha_code_file2.php?rand=<?php echo rand(); ?>" /><br>
			<input id="captcha2" name="captcha2" required="" type="text" /></p>
			<p><input name="cancel" type="submit" value="Cancel" /></p>
		</form>
</center>
  </body>
</html>