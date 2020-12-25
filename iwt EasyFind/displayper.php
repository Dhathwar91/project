<html>
<head>
<title>display details</title>
<style>
body{
	background-color:lightblue;
}
</style>
</head>
<body>
<center>
 <!-- list of missing items for personal items section -->
<h3>LIST OF MISSING ITEMS</h3>
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
<table width="50%" border="1" cellpadding="5" cellspacing="5">
 <!-- table for the list -->
<thread>
<tr>
<th>name of the owner</th>
<th>type of item</th>
<th>mobile number</th>
<th>description</th>
<th>location</th>
<th>image</th>
<th>chat</th>
<tr>
</thread>
<!-- get all information stored in database and display -->
<?php
$con=mysqli_connect("localhost","root","","iwtproject");
$db=mysqli_select_db($con,'iwtproject');
$query="SELECT * FROM `personal` ";
$query_run=mysqli_query($con,$query);
while($row=mysqli_fetch_array($query_run))
{
?>
<tr>
<td> <?php echo $row['owner']; ?></td>
<td> <?php echo $row['typeid']; ?></td>
<td> <?php echo $row['phone']; ?></td>
<td> <?php echo $row['des']; ?></td>
<td> <?php echo $row['location'];
 ?></td>
<td> <?php echo '<img src="data:image;base64,'.base64_encode($row['tb8image']).'"alt="image" style="width:100px;height"100px;" >';?></td>
 <td><?php echo "<a href='chat.php?username=".$row['creator']."'>Chat</a>";?> </td>
</tr>
<?php	
	
}

?>

</table>
</form>
</center>
</body>
</html>