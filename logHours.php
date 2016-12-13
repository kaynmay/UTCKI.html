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
  #textform{
    width: 250px;
    margin: auto;
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
    padding: 0 1em 3em 1em;
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
          <td><a href = "loggedHours.php">Logged Hours</a></td>
          <td><a href = "logoutProcess.php">Log Out</a></td>
        </tr>
      </table>
      <h2>Log Hours</h2><br/>
      <form id="textform" method="post" action="insertProcess.php" onsubmit="return validate();">
        <div class="form-group">
          Select Event:
          <select name="events" class="form-control">
            <option value="event1">Dodge to Eliminate</option>
            <option value="event2">Inside Books</option>
            <option value="event3">Trick-or-Treat for UNICEF</option>
            <option value="event4">Build-A-Ramp</option>
            <option value="event5">Kiwanis One Day</option>
          </select>
        </div>
        <div class="form-group">
          Number of Hours:
          <input id = "input" class="form-control" type="text" name="hours"/>
        </div>
        <div id="button">
          <input class="btn btn-default" type="submit" value="Submit"/>
        </div>
      </form>
    </div>
    <div id="footer" class="col-sm-12">
        <p>&#169; 2016 UT CKI | <a id="contact" href="./contactUs.html">Contact Us</a>
        </p>
    </div>

    <script>
    function validate() {
      var formElt = document.getElementById("textform");
      var events = formElt.events.value;
      var hours = formElt.hours.value;

      if (events == ""){
        alert("Fill out all text fields.");
        return false;
      }
      else if (hours == ""){
        alert("Fill out all text fields.");
        return false;
      }
      return true;
    }
    </script>
  </body>
</html>
