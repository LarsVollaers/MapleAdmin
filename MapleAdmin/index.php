<?php 
session_start();
	require_once("config/database.php");
	$_base = isset($_GET['ma']) ? $_GET['ma'] : "";
	switch($_base){
		case NULL:
			header('Location: ?ma=main');
			break;
		case "main":
			include("src/header.php");
			include("src/index.php");
			include("src/footer.php");
			break;
		case "mutate":
			include("src/header.php");
			include("src/mutate.php");
			include("src/footer.php");
			break;
		default:
			include("src/header.php");
			include("src/index.php");
			include("src/footer.php");
			break;
	}
$mysqli->close();
?>