<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register</title>
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
    padding: 0 1em 3em 1em;
    text-align: center;
  }
  #input{
    margin: auto;
    width: 200px;
  }
  #button{
    padding-bottom: .5em;
  }
  #taken{
    color: red;
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
      <h2>Register</h2>
      <?php
      if (isset($_COOKIE["register"])){
        if ($_COOKIE["register"] == "fail"){
          print "<p>Username already taken.</p>";
        }
        else{
          print "<p>Registration complete.</p>";
        }
      }
      ?>
      <form id="textForm" method="get" action="registerProcess.php" onsubmit="return validate();">
        <div class="form-group">
          <span id="taken"></span></br>
          Username:
          <input id = "input" onchange = "checkUser(this.value);" class="form-control" type="text" name="username"/>
        </div>
        <div class="form-group">
          First Name:
          <input id = "input" class="form-control" type="text" name="first"/>
        </div>
        <div class="form-group">
          Last Name:
          <input id = "input" class="form-control" type="text" name="last"/>
        </div>
        <div class="form-group">
          Password:
          <input id = "input" class="form-control" type="password" name="password"/>
        </div>
        <div class="form-group">
          Repeat Password:
          <input id = "input" class="form-control" type="password" name="passWord2"/>
        </div>
        <div id="button">
          <input class="btn btn-default" type="submit" value="Register"/>
        </div>
      </form>
      <p>Log-In <a href="./logIn.php">here</a>.</p>
    </div>
    <div id="footer" class="col-sm-12">
      <p>&#169; 2016 UT CKI | <a id="contact" href="./contactUs.html">Contact Us</a>
      </p>
    </div>

    <script type="text/javascript">
    function checkUser(user){
      var xhttp;
      if (window.ActiveXObject)
      {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      else if (window.XMLHttpRequest)
      {
        xhttp = new XMLHttpRequest();
      }

      xhttp.onreadystatechange = updatePage;

      function updatePage(){
        if (xhttp.readyState == 4 && xhttp.status == 200) {
          var match = xhttp.responseText;
          if (match == true){
            document.getElementById("taken").innerHTML = "Username already taken.";
          }
          else{
            document.getElementById("taken").innerHTML = "";
          }
        }
      }
      xhttp.open("GET", "checkUser.php?user="+escape(user), true);
      xhttp.send();
    }

    function validate() {
      var formElt = document.getElementById("textForm");
      var user = formElt.username.value;
      var pass1 = formElt.password.value;
      var pass2 = formElt.passWord2.value;
      if (user.length < 4 || user.length > 10)
      {
        alert("Username must be between 4-10 characters long.");
        return false
      }
      for (i = 0; i < user.length; i++) {
        if (user.charCodeAt(i) < 48 || (user.charCodeAt(i) > 57 && user.charCodeAt(i) < 65)
        || (user.charCodeAt(i) > 90 && user.charCodeAt(i) < 97) || user.charCodeAt(i) > 122)
        {
          alert("Username must contain only letters and numbers.");
          return false
        }
      }
      if (pass1 != pass2)
      {
        alert("Passwords must match.");
        return false
      }
      if (pass1.length < 6 || pass1.length > 15)
      {
        alert("Password must be between 6-15 characters long.");
        return false
      }
      for (i = 0; i < pass1.length; i++) {
        if (pass1.charCodeAt(i) < 48 || (pass1.charCodeAt(i) > 57 && pass1.charCodeAt(i) < 65)
        || (pass1.charCodeAt(i) > 90 && pass1.charCodeAt(i) < 97) || pass1.charCodeAt(i) > 122)
        {
          if (pass1.charCodeAt(i) == 95)
          {

          }
          else{
            alert("Password must contain only letters, numbers, and underscores.");
            return false
          }
        }
      }
      return true
    }
    </script>
  </body>

  </html>
