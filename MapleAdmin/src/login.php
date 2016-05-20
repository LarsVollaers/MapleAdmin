<?php
	if(isset($_POST['username']) == $_POST['username']){
		include_once('/config/database.php');
		$u = $mysqli->real_escape_string($_REQUEST['username']);
		$p = $mysqli->real_escape_string($_REQUEST['password']);
		$s = $mysqli->query("SELECT * FROM `accounts` WHERE `name`='".$u."'") or die();
		$i = $s->fetch_assoc();
		if($i['password'] == ($_REQUEST['password'])){
			#echo "SELECT * FROM `accounts` WHERE `username`='".$i['username']."' AND `password`='".$i['password']."'";
			$userz = $mysqli->query("SELECT * FROM `accounts` WHERE `name`='".$i['name']."' AND `password`='".$i['password']."'") or die();
			$auser = $userz->fetch_assoc();
			$_SESSION['id'] = $auser['id'];
			echo "success.. ".$i['name']."";
		}
		echo'';
}
?>