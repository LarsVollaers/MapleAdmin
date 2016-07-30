<?php
if(basename($_SERVER["PHP_SELF"]) == "header.php") {
    die("403 - Access Forbidden");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>MapleAdmin</title>
		<link rel="stylesheet" href="./config/css/bootstrap.css">
		<link rel="stylesheet" href="./config/css/style.css">
		<link rel="stylesheet" href="./config/css/bootstrap.min.css">
		<script type="text/javascript" src="./config/js/jquery.min.js"></script>
		<script type="text/javascript" src="./config/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="col-xs-12-fluid">
			<div class="well well-sm">
					<div class="logo_box">
						<div class="version_fix"><b><?php echo $siteversion; ?></b></div>
					</div> 
			</div>
		</div>