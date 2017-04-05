<?php
if(basename($_SERVER["PHP_SELF"]) == "header.php"){
    die("403 - Access Forbidden");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MapleAdmin</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="config/css/bootstrap.css">
	<link rel="stylesheet" href="config/css/style.css">
	<script type="text/javascript" src="config/js/jquery.min.js"></script>
	<script type="text/javascript" src="config/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="config/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <script>
	  $(function() {
		$( "#search" ).autocomplete({
		  source: 'src/search.php'
		});
	  });
	  </script>
</head>
	<body>
		<div class="col-xs-12-fluid">
			<div class="well well-sm">
					<div class="logo_box">
						<div class="version_fix">
							<b><?php echo''.$siteversion.'';?></b>
						</div>
					</div> 
			</div>
		</div>
