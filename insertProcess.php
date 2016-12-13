<?php
$event = $_POST["events"];
$hours = $_POST["hours"];
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

if ($event == "event1"){
  $sql = "UPDATE volunteerHours SET EVENT1='$hours' WHERE USER='$user'";
}

if ($event == "event2"){
  $sql = "UPDATE volunteerHours SET EVENT2='$hours' WHERE USER='$user'";
}

if ($event == "event3"){
  $sql = "UPDATE volunteerHours SET EVENT3='$hours' WHERE USER='$user'";
}

if ($event == "event4"){
  $sql = "UPDATE volunteerHours SET EVENT4='$hours' WHERE USER='$user'";
}

if ($event == "event5"){
  $sql = "UPDATE volunteerHours SET EVENT5='$hours' WHERE USER='$user'";
}

if (mysqli_query($conn, $sql)) {
    header("Location: ./loggedHours.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
