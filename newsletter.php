<?php
include "booking/config.php";
$status = "";

$email=$_POST['email'];

  $result = mysqli_query($conn,"INSERT INTO newsletter(email)
  VALUES('$email')");

  if ($result)
{
$status = "Thank you for subscribing!.";
echo "<center>".$status."</center>";
}
else
{
echo "Error signing up";
}

?>
