<?php 
if(basename($_SERVER["PHP_SELF"]) == "logout.php"){
    die("403 - Access Forbidden");
}
	session_destroy();
	$_SESSION = array();
	echo'Logged out';
	header("Location:main");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=main\">";
?>