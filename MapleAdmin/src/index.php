<?php
		if(isset($_SESSION['id']) && isset($_SESSION['gm']) || isset($_SESSION['admin'])){
			if(isset($_POST['name'])){
			$name = $_POST['name'];
			$aa = $mysqli->query("SELECT * from characters WHERE name='$name'");
			$a = $aa->fetch_assoc();
			$id = $a['id'];
			$bb = $mysqli->query("SELECT * from inventoryitems Where characterid = $id");
			$cc = $mysqli->query("SELECT * from characters Where id = $id");
			$c = $cc->fetch_assoc();
			$accid = $c['accountid'];
			$dd = $mysqli->query("SELECT * from characters Where accountid = $accid");
			$d = $dd->fetch_assoc();
			$ee = $mysqli->query("SELECT * from accounts Where id = $accid");
			$e = $ee->fetch_assoc();
			echo'<div class="col-xs-12"><a href="?ma=main" class="btn btn-warning">Back</a><hr/></div>';
			echo'<div class="col-xs-12 col-sm-9"><h2>Character Items</h2><hr/>';
			while($b = $bb->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$b['itemid'].'.png" alt="img" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$b['quantity'].'</p>
				</div>';
			}
			echo'
			</div>
			<div class="col-xs-12 col-sm-3"><h2>Character info</h2><hr/>
				<div class="col-xs-12">
					<div class="panel panel-default">
					  <div class="panel-body">
						<img src="/'.$sitefolder.'/assets/img/GD/Characters/'.$c['name'].'.png" name="Character_img" alt="#" />
					  </div>
					<div class="panel-footer"> 
						<span class="label label-default">Name: <b>'.$c['name'].'</b></span> 
						<br><br>
						<span class="label label-default">Lv: <b>'.$c['level'].'</b></span> 
						<span class="label label-default">Job: <b>'.$jobs[$c['job']].'</b></span> 
						<span class="label label-default">Status: <b>'.$GMrank[$c['gm']].'</b></span>
						<br><br>
						<span class="label label-default">Str: <b>'.$c['str'].'</b></span>
						<span class="label label-default">Dex: <b>'.$c['dex'].'</b></span>
						<span class="label label-default">Int: <b>'.$c['int'].'</b></span>
						<span class="label label-default">Luk: <b>'.$c['luk'].'</b></span>
						<br><br>
						<span class="label label-danger">Hp: <b>'.$c['hp'].' / '.$c['maxhp'].'</b></span>
						<span class="label label-info">Mp: <b>'.$c['mp'].' / '.$c['maxmp'].'</b></span>
						<br><br>
						<span class="label label-warning">Exp: <b>'.$c['exp'].'</b></span>
						<span class="label label-success">Meso: <b>'.$c['meso'].'</b></span>
					  </div>
					</div>
					<h2>Account info</h2><hr/>
					<div class="panel panel-default">
					<div class="panel-footer">
						<span class="label label-info">Banned: <b>'.$banRank[$e['banned']].'</b></span>
						<span class="label label-info">VP: <b>'.$e['vpoints'].'</b></span>
						<span class="label label-info">DP: <b>'.$e['points'].'</b></span><br>
						<span class="label label-info">NX: <b>'.$e['nxCredit'].'</b></span>
						<span class="label label-info">Cash: <b>'.$e['ACash'].'</b></span>
						<span class="label label-info">MaplePoints: <b>'.$e['mPoints'].'</b></span>
					  </div>
					</div>
				</div>
			</div>';
			} else {
				echo'<div class="col-xs-12">
				<h2>Welcome back '.$_SESSION['pname'].'</h2>
				<p>
				<b>'.$siteversion.'</b> - Maplebit-Master login support<br>
				<b>'.$siteversion.'</b> - Loading images local!<br>
				<b>'.$siteversion.'</b> - Offers you Inventory searching with some basic character information.<br>
				<b>'.$siteversion.'</b> - Search on character name<br>
				</p>
				<form action="?ma=main" method="post">
					<div class="form-group">
						<input class="form-control" name="name" placeholder="Character Name" required>
					</div>
							
					<div class="form-group">
						<button type="submit" href="#" name="submit" class="btn btn-success btn-lg btn-block">Check it</button>
					</div>
				</form>
				</div>
				';
			}
		} else {
			echo'<div class="col-xs-12">
			<p>Make sure you are logged in with <b>admin</b> rights.</p>
			<b>'.$siteversion.'</b> - Maplebit-Master login support<br>
			<b>'.$siteversion.'</b> - Loading images local!<br>
			<b>'.$siteversion.'</b> - Offers you Inventory searching with some basic character information.<br>
			<b>'.$siteversion.'</b> - Search on character name<br>
			</div>';
		}
?>