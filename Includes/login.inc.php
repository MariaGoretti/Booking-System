<?php

session_start();

if (isset($_POST['submit'])) {

	include 'db.inc.php';

	$email = mysqli_real_escape_string($conn, $_POST['user_email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['user_password']);

	//Error handlers
	//Check if inputs are empty
	if (empty($email) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_email='$email'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error1");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_password']);
        $myusertype = $row['user_type'];

				if ($hashedPwdCheck == true) {
					header("Location: ../index.php?login=error2");
					exit();
				} elseif ($hashedPwdCheck == false) {
					//Log in the user here
					$_SESSION['id'] = $row['id'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['user_email'] = $row['user_email'];
          if ($myusertype=="Client") {
              header("location: ../booking/makebooking.php?login=Clientsuccess");
                      }
          elseif($myusertype=="Admin"){
              header("Location: ../AdminDashboard.php?login=Adminsuccess");
                      }
                      else {
                        header("Location:../ConsultantDashboard.php?login=Consultantsuccess");
                      }
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error3");
	exit();
}
