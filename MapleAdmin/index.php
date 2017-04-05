<?php 
session_start();

require_once("config/database.php");
$_base = isset($_GET['ma']) ? $_GET['ma'] : "";
switch($_base){
	case NULL:
		header('Location: ?ma=main');
		break;
	case "main":
	default:
		include("src/header.php");
		include("src/index.php");
		include("src/footer.php");
		break;
	case "login":
		include("src/header.php");
		include("src/login.php");
		include("src/footer.php");
		break;
	case "logs":
		include("src/header.php");
		include("src/logs.php");
		include("src/footer.php");
		break;
	case "logout":
		include("src/header.php");
		include("src/logout.php");
		include("src/footer.php");
		break;
}
$mysqli->close();
?>