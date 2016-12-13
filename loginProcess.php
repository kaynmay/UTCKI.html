<?php
//Get usernames and password txt file
$login_data = fopen("passwd.txt", "r");
$usernames = array();
$passwords = array();
$key = 'CS329';
$method = 'aes-128-cbc';
while (!feof($login_data)){
	$temp_line = fgets($login_data);
	$temp_array = explode(":", $temp_line);
	$encrypt = $temp_array[1];
	$decrypt = openssl_decrypt ($encrypt, $method, $key);
	array_push($usernames, $temp_array[0]);
	array_push($passwords, $decrypt);
}
fclose($login_data);
//get variables from login.php
$in_username = $_POST["username"];
$in_password = $_POST["password"];

//check if $in_username exists
$user_index = -1;
for ($i = 0; $i < count($usernames); $i++){
	if ($in_username == $usernames[$i]){
		$user_index = $i;
	}
}
//check for correct password
//if correct redirect to home. otherw
if ($user_index >= 0 and $in_password == $passwords[$user_index]){
	setcookie("logged_in_user", $in_username, time()+1200);
	header("Location: ./loggedHours.php");
}
else{
	setcookie("loggedin", "fail", time()+60);
	header("Location: ./logIn.php");
}
?>
