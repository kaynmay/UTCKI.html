<!DOCTYPE html>
<?php
  if (!isset($_COOKIE["logged_in_user"])){
    header("Location:./logIn.php");
    die();
  }
?>
<html lang="en">

<head>
  <title>About Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" title="basic style" type="text/css" href="./home.css" media="all">
  <style>
  p{
    text-align: center;
  }
  h2 {
    margin-top: 15px;
    text-align: center;
    font-size: 40px;
    border-bottom: 1px solid;
  }
  h3{
    text-align:center;
    border-bottom: none;
    font-size: 30px;
    padding-bottom: 1em;
  }
  #container{
    padding: 0 1em 5em 1em;
  }
  #about1{
    padding: 1em 5.5em .5em 5.5em;
    text-indent: 50px;
  }
  #about2{
    padding: 0 5.5em 3em 5.5em;
    text-indent: 50px;
  }
  td{
    padding: 0 1em 0 1em;
    font-size: 1.1em;
  }
  table{
    margin: auto;
    text-decoration: underline;
  }
  </style>
</head>

<body>
  <div id="header">
    <p>
      <a href="./home.html"><img id="logo" src="./images/logo.png" alt="logo" width="100px" /></a> at the University of Texas at Austin</p>
      <nav class="navbar navbar-custom">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li class="active"><a href="./home.html">Home</a>
            </li>
            <li><a href="./aboutUs.html">About Us</a>
            </li>
            <li><a href="./officers.html">Officers</a>
            </li>
            <li><a href="./calendar.html">Calendar</a>
            </li>
            <li><a href="./pastProjects.html">Past Projects</a>
            </li>
            <li><a href="./loggedHours.php">Log Hours</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div id="container">
      <h2> Hello,
        <?php
          print $_COOKIE["logged_in_user"]."!";
        ?>
      </h2>
      <table>
        <tr>
          <td><a href = "logHours.php">Log Hours</a></td>
          <td><a href = "logoutProcess.php">Log Out</a></td>
        </tr>
      </table>
      <?php
      $user = $_COOKIE["logged_in_user"];
      $servername = "localhost";
      $username = "root";
      $password = "x";
      $dbname = "x";

      // Create connection
    	$conn = mysqli_connect($servername, $username, $password, $dbname);
    	// Check connection
    	if (!$conn) {
    	    die("Connection failed: " . mysqli_connect_error());
    	}

      $sql = "SELECT * FROM volunteerHours where USER='$user'";

      $result = mysqli_query($conn, $sql);
      while ($row = $result->fetch_row())
      {
        $sum = $row[1] + $row[2] + $row[3] + $row[4] + $row[5];
        print "<h3>You have logged $sum hours.</h3>";
        print "<p>";
        if ($row[1] != 0){
          print "$row[1] hours from Dodge to Eliminate</br>";
        }
        if ($row[2] != 0)
        {print "$row[2] hours from Inside Books</br>";}
        if ($row[3] != 0)
        {print "$row[3] hours from Trick-or-Treat for UNICEF</br>";}
        if ($row[4] != 0)
        {print "$row[4] hours from Build-A-Ramp</br>";}
        if ($row[5] != 0)
        {print "$row[5] hours from Kiwanis One Day";}
        print "</p>";
      }
      $result->free();

      mysqli_close($conn);

      ?>
    </div>
    <div id="footer" class="col-sm-12">
        <p>&#169; 2016 UT CKI | <a id="contact" href="./contactUs.html">Contact Us</a>
        </p>
    </div>
  </body>
</html>
