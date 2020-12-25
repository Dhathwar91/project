
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<!-- styling the form-->
<style>
           body
             {
              background-image: url("performbg.jpg");
  background-color: #cccccc;
  background-repeat: no-repeat;
  background-size: 2000px 1500px;
             }

              #backtologin{
        margin-left: 40%;
    margin-right: 40%;
  }
  #sub{
     margin-left: 23%;
    margin-right: 50%;


  }
#clik{
  background-color:#7c7d7c;
 }
.container{
 	margin-top:80px;
 }
 
             </style>
            
          

<body>
<!-- creating form for lost items-->
<?php 
// Start the session
  session_start(); 
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
?>
<form action="" method="POST" enctype="multipart/form-data">
<div style="margin:10px">
    <h1><center>Fill this out</center></h1>
    Name of the owner<br>
    <input type="text" name="owner" required/>
    <br>
    Type of gadget<br>
    <input type="text" name="typeid" required/>
    <br>
    Mobile number<br>
    <input type="text" name="phone" required/>
    <br>
    Description:<br>
    <textarea rows="5" cols="30" name="des" ></textarea>
    <br>
    Location:<br>
    <input type="text" name="location"  placeholder="Specify the location you last had it " />

      Image:<br>
	 
    <input type="file" name="image" id="image" />  
        </div>  
 <!--submit button to submit details-->   
	   <input type="submit" name="upload" value="SUBMIT"/> <br>
</div>
<div>
<!-- on clicking button "click here to go back to login page,it refers to index2.php-->
<a href="index2.php" class="btn btn-primary" style="margin:10px">Click here to go back to the login page</a>

</div>
		</form>
</body>
</html>
      
      <?php
	    //establishing the connection to database
    $con=mysqli_connect("localhost","root","","iwtproject");
    $db=mysqli_select_db($con,'iwtproject');
    if(isset($_POST['upload']))
	{
		
		$owner=$_POST['owner'];
		$typeid=$_POST['typeid'];
		$phone=$_POST['phone'];
		$des=$_POST['des'];
		$location=$_POST['location'];
		$creator=$_SESSION['username'];
	 $file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	 //query to insert values into table ele
$query="INSERT INTO `ele`(`owner`,`typeid`,`phone`,`des`,`location`,`tb3image`,`creator`) VALUES('$owner','$typeid','$phone','$des','$location','$file','$creator')"; 
//run the query
	$query_run=mysqli_query($con,$query);		
    //if query successfully runs print the message else print not uploaded          
	if($query_run)
	{
		echo '<script type="text/javascript">alert("Your details have been submitted successfully.Please wait for someone to contact you about the missing item.")</script>';
			
	}
	else{
		echo 'script type="text/javascript">alert("not uploaded")</script>';
	}
	}
    ?>