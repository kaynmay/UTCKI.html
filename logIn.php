<!DOCTYPE html>
<html lang="en">

<head>
  <title>Log In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" title="basic style" type="text/css" href="./home.css" media="all">
  <style>
  h2 {
    margin-top: 15px;
    text-align: center;
    font-size: 40px;
    border-bottom: 1px solid;
  }
  h3{
    border-bottom: none;
    font-size: 30px;
  }
  #container{
    padding: 0 1em 4.5em 1em;
    text-align: center;
  }
  #input{
    margin: auto;
    width: 200px;
  }
  #button{
    padding-bottom: .5em;
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
      <h2>Log In</h2>
      <br/>
      <?php
      if (isset($_COOKIE["loggedin"])){
        print "<p>Incorrect username or password.</p>";
      }
      ?>
      <form id="textForm" method="post" action="loginProcess.php" onsubmit="">
        <div class="form-group">
          Username:
          <input id = "input" class="form-control" type="text" name="username"/>
        </div>
        <div class="form-group">
          Password:
          <input id = "input" class="form-control" type="password" name="password"/>
        </div>
        <div id="button">
          <input class="btn btn-default" type="submit" value="Log In"/>
        </div>
      </form>
      <p>Register <a href="./register.php">here</a>.</p>
    </div>
    <div id="footer" class="col-sm-12">
      <p>&#169; 2016 UT CKI | <a id="contact" href="./contactUs.html">Contact Us</a>
      </p>
    </div>
  </body>

  </html>
