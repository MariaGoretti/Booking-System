<?php

if (isset($_POST['submit'])) {

	include_once 'db.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first_name']);
	$last = mysqli_real_escape_string($conn, $_POST['last_name']);
	$email = mysqli_real_escape_string($conn, $_POST['user_email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['user_password']);

	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($pwd)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (preg_match("/^[a-zA-Z]'*$/", $first) || preg_match("/^[a-zA-Z]'*$/", $last)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {?>
          <script type="text/javascript">
              alert('User Email Already Exists!');
              window.location.href='../signup.php?signup=useremailexists';
            </script>
          <?php
					//header("Location: ../signup.php?signup=useremailexists");
					exit();
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (first_name,last_name, user_email, user_password) VALUES ('$first', '$last', '$email', '$hashedPwd');";
					mysqli_query($conn, $sql);?>
          <script type="text/javascript">
              alert('Registration successful! Now you can login with your email and password!');
              window.location.href='../login.php';
            </script>
            <?php

					exit();
				}
			}
		}
	}

} else {
	header("Location: ../signup.php");
	exit();
}
