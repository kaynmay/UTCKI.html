<?php
//KILL THE COOKIE
setcookie("logged_in_user", "", time() - 3600);
setcookie("name", "", time() - 3600);
//REDIRECT TO LOGIN PAGES
header("Location: home.html");
?>
