<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .imgcontainer{
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
  }
   @import url('https://fonts.googleapis.com/css?family=Cookie');
  form{
	  border: 2px solid #EEEEEE;
	  padding: 20px;
	  border-radius: 25px;
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
  <li><a class="active" href="/Finsmarts/home.php">Home</a></li>
  <li><a href="/Finsmarts/home.php#section-one">Overview</a></li>
  <li><a href="/Finsmarts/home.php#section-five">Newsletter</a></li>
  <li><a href="/Finsmarts/home.php#section-six">Contact</a></li>

   </ul>

   <br>
    <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
	  
      <div class="col-md-6">
        <br><br><br>
        <form action="Includes/signup.inc.php" method="post">
		<legend style="font-size: 30px; font-family: 'Pacifico', cursive; padding-bottom:3px;"><center>Sign Up</center></legend>
          <div class="imgcontainer">
            <img src="logo.png" alt="Avatar" class="avatar">
          </div>
          <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" required placeholder="Enter First Name" name="first_name">
          </div>
          <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" required placeholder="Enter Last Name" name="last_name">
          </div>
          <div class="form-group">
            <label for="user_email">Email:</label>
            <input type="email" class="form-control" id="user_email" required placeholder="Enter Email" name="user_email">
          </div>
          <div class="form-group">
            <label for="user_password">Password:</label>
            <input type="password" class="form-control" id="user_password" required placeholder="Enter Password" name="user_password">
          </div>
          <button type="submit" class="btn btn-success" name="submit" style="width:100%; font-family: 'Cookie', cursive;">CREATE ACCOUNT</button><br><br>
          <center><p>Already have an account? <a href="login.php">Login</a> </p></center>
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  </body>
</html>
