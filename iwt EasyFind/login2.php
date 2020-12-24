<?php include('server1.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
  <style >
    body{
      background-image: url(signinbg.jpeg);
      background-size: cover;
    }
    form{
      width: 40%;

    }
    .header{
      width: 40%;
      background-color: #19B2FF;
    }
   .btn{
    background-color: #19B2FF;
   }
  </style>
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  
  
  </div>
  <form method="post" action="login2.php">
  
   <!-- login to the account that already exists -->
  	<?php include('errors2.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register2.php">Sign up</a>
  	</p>
	 
  </form>
  
</body>
</html>