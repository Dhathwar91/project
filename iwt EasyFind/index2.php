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
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<div class="topnav bg-light">
  <a class="active" href="#home">Home</a>
  <div class="topnav-right">
    <!-- logout button -->
    <a href="index2.php?logout='1'" tabindex="-1" aria-disabled="true" style="color:black"><b>LOGOUT</b></a>
  </div>
</div>
<div style="text-align: center;"><?php
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      } ?></div>
<title>MISSING SOMETHING?!</title>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style3.css">

<style>
  body {
    background-image: url("inbg.jpg");
    /* background-color: #cccccc;*/
    background-repeat: no-repeat;
    background-size: cover;
  }

  .topnav {

    overflow: hidden;
  }

  /* Style the links inside the navigation bar */
  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  /* Change the color of links on hover */
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }

  /* Add a color to the active/current link */
  .topnav a.active {
    background-color: #4CAF50;
    color: white;
  }

  /* Right-aligned section inside the top navigation */
  .topnav-right {
    float: right;
  }

  .jumbotron {
    background-color: #b3cccc;
    height: 200px;


  }

  .card {
    height: 100%;



  }

  img {
    height: 450px;
  }

  .card:hover {
    border-color: green;
  }

  .btn {

    margin: 6px;
    width: 70%;
    background-color: #34aeeb;
  }

  strong img {
    height: 100px;
  }

  .btn:hover {
    background-color: #105D97;
  }
</style>
</head>

<body>





  <div class="container">
    <div class="jumbotron">
      <h1 style="padding:2px" ,style="margin:auto">
        <center>
          <font color="#000066" style="font-family:Geneva">
            <strong>MISSING SOMETHING?<img src="det.jpg"></strong></font>
        </center>
      </h1>
    </div>
    <div class="row">




      <div class="col-sm-6 " style="margin:auto;">
        <!-- using cards from bootstrap to make 4 sections for different categories -->
        <!-- 3 different buttons for each cateory -->
        <!-- form for missing items,form for found items, list of missing and found items -->
        <div class="card">
          <img src="personal.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Missing your personal belongings</h5>
            <p class="card-text">Check if someone has found it</p>
            <a href="formper.php" class="btn btn-primary">Fill the form about the missing item</a>
            <a href="formperfound.php" class="btn btn-primary">Fill the form for any found item</a>
            <a href="per1.php" class="btn btn-primary">Click for missing/found items list</a>
          </div>
        </div>



      </div>


      <div class="col-sm-6" style="margin:auto;">
        <div class="card">
          <img src="elec.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Missing your electronic gadgets</h5>
            <p class="card-text">Oh yes we know how important they are so find them.</p>
            <a href="formelec.php" class="btn btn-primary">Fill the form about the missing item</a>
            <a href="formelefound.php" class="btn btn-primary">Fill the form for any found item</a>
            <a href="ele1.php" class="btn btn-primary bcol">Click for missing/found items list</a>

          </div>
        </div>
      </div>


      <div class="col-sm-6" style="margin:auto;">
        <div class="card">
          <img src="ids.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Missing Identity card</h5>
            <p class="card-text">Find any form of card that identifies you.</p>
            <a href="formid.php" class="btn btn-primary">Fill the form about the missing item</a>
            <a href="formidfound.php" class="btn btn-primary">Fill the form for any found item</a>
            <a href="id1.php" class="btn btn-primary">Click for missing/found items list</a>

          </div>
        </div>
      </div>

      <div class="col-sm-6" style="margin:auto;">
        <div class="card">
          <img src="books.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Missing college books</h5>
            <p class="card-text">Find your most precious college books.</p>
            <a href="formbook.php" class="btn btn-primary">Fill the form about the missing item</a>
            <a href="formbookfound.php" class="btn btn-primary">Fill the form for any found item</a>
            <a href="book1.php" class="btn btn-primary">Click for missing/found items list</a>

          </div>
        </div>
      </div>
    </div>
  </div>






</body>

</html>