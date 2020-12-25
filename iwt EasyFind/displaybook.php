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
<!-- list of missing items for book section -->
<h3>LIST OF MISSING ITEMS</h3>
<form action="" method="POST" enctype="multipart/form-data">
<table width="50%" border="1" cellpadding="5" cellspacing="5">
<!-- table for the list -->
<thread>
<tr>
<th>name of the owner</th>
<th>type of book</th>
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
$query="SELECT * FROM `book` ";
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
<td> <?php echo '<img src="data:image;base64,'.base64_encode($row['tb1image']).'"alt="image" style="width:100px;height"100px;" >';?></td>
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