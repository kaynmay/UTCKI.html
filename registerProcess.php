<?php
//open txt to get usernames
$user = $_GET["username"];
$first = $_GET["first"];
$last = $_GET["last"];

$servername = "localhost";
$username = "root";
$password = "x";
$dbname = "x";

$login_data = fopen("passwd.txt", "r");
$usernames = array();
while (!feof($login_data)){
	$temp_line = fgets($login_data);
	$temp_array = explode(":", $temp_line);
	array_push($usernames, $temp_array[0]);
}
fclose($login_data);
//get and check inputs
$in_username = $_GET["username"];
$source = $_GET["password"];
$key = 'CS329';
$method = 'aes-128-cbc';
$in_password = openssl_encrypt ($source, $method, $key);
if (in_array($in_username, $usernames)){
  setcookie("register", "fail", time()+60);
	header("Location: ./register.php");
}
//if not duplicate, append to txt file
else{
	$login_data_write = fopen("passwd.txt", "a");
	$temp_line = "\n".$in_username.":".$in_password;
	fwrite($login_data_write, $temp_line);
  setcookie("register", "valid", time()+60);

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = array();

	array_push($sql, "INSERT INTO volunteerHours (USER, EVENT1, EVENT2, EVENT3, EVENT4, EVENT5)
	VALUES ('$user', '0', '0', '0', '0', '0')");
	array_push($sql, "INSERT INTO names (USER, LAST, FIRST)
	VALUES ('$user', '$last', '$first')");

	for ($i = 0; $i < count($sql); $i++){
	  if (!mysqli_query($conn, $sql[$i])) {
	  	echo "Error updating record: " . mysqli_error($conn);
		}
	}

	mysqli_close($conn);

	header("Location: ./register.php");
}
?>
