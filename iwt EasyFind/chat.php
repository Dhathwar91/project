<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      margin: 0 auto;
      max-width: 800px;
      padding: 0 20px;
    }

    .container {
      border: 2px solid #dedede;
      background-color: #f1f1f1;
      border-radius: 5px;
      padding: 10px;
      margin: 10px 0;
      display: flex;
      flex-direction: column;
    }

    .darker {
      border-color: #ccc;
      background-color: #ddd;
    }

    .container::after {
      content: "";
      clear: both;
      display: table;
    }




    .right {
      text-align: end;
    }

    .left {
      justify-content: left;
    }
  </style>
</head>

<body>
  <!-- SELECT * FROM `chats` WHERE (touser='dhathwar91' and fromuser = 'gauri') or (touser='gauri' and fromuser = 'dhathwar91') order by created_at ASC -->
  <!-- $_GET['username'] -->
  <!-- $_SESSION['username'] -->
  <h2>Chat Messages</h2>
  <?php
  // Start the session
  $con=mysqli_connect("localhost","root","","iwtproject");
  $db=mysqli_select_db($con,'iwtproject');
  session_start();
  if (!isset($_GET['username'])) {
    $_SESSION['msg'] = "Username not set";
    header('location: index2.php');
  }
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login2.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login2.php");
    $author = mysqli_real_escape_string($db, $_POST['author']);
  }
  $touser=$_GET['username'];
    $fromuser=$_SESSION['username'];

$query="SELECT * FROM `chats` where (touser='$touser' and fromuser='$fromuser') or (touser='$fromuser' and fromuser='$touser') order by created_at ASC";
$query_run=mysqli_query($con,$query);
while($row=mysqli_fetch_array($query_run))
{
  if($row['fromuser']==$fromuser){
    echo '<div class="container">
    <span class="left">You</span>
    <p class="left">'.$row["message"].'</p>
    <span class="right">'.$row["created_at"].'</span>
  </div>';
}else{
    echo '<div class="container">
    <span class="left">'.$touser.'</span>
    <p class="left">'.$row["message"].'</p>
    <span class="right">'.$row["created_at"].'</span>
  </div>';
    
  }
	
}

?>

  <!-- <div class="container">
    <span class="left">You</span>
    <p class='left'>Hello. How are you today?</p>
    <span class="right">11:00</span>
  </div>

  <div class="container darker">
    <span class="left">Person</span>
    <p class='left'>Hey! I'm fine. Thanks for asking!</p>
    <span class="right">11:01</span>
  </div> -->

  <form action="" method="POST" enctype="multipart/form-data">

    <textarea ype='text' name='message' placeholder='Type your message here' required rows='5'></textarea>

    <!--submit button to submit details-->
    <input type="submit" name="upload" value="SUBMIT" /> <br>

  </form>
  <a href="index2.php" class="btn btn-primary" style="margin:10px">Click here to go back to the login page</a>
</body>

</html>
<?php
	  //establishing the connection to database
   
    if(isset($_POST['upload']))
	{
		
    $message= str_replace("'","\'",$_POST['message']);
    
		
	 //query to insert values into table book
$query="INSERT INTO `chats`(`touser`,`fromuser`,`message`) VALUES('$touser','$fromuser','$message')"; 
//run the query
	$query_run=mysqli_query($con,$query);		
     //if query successfully runs print the message else print not uploaded       
	if($query_run)
	{
    echo '<script type="text/javascript">alert("Your message has been sent successfully.Please wait for the reply");
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
      window.location.reload();
    }
    </script>';
			
	}
	else{
		echo 'script type="text/javascript">alert("not uploaded")</script>';
	}
	}
    ?>