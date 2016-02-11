<?php
		if(isset($_SESSION['id']) && isset($_SESSION['gm']) || isset($_SESSION['admin'])){
			if(isset($_POST['name'])){
			$name = $_POST['name'];
			$aa = $mysqli->query("SELECT * from characters WHERE name='$name'");
			$a = $aa->fetch_assoc();
			if(strtolower($a['name']) != strtolower($name)){
				echo'<div class="col-xs-12"><div class="alert alert-dismissible alert-danger">Oh boy! <b><i>"'.$_POST['name'].'"</i></b> does not exists!</div><a href="?ma=main" class="btn btn-warning">Back</a><hr/></div>';
				error_reporting(0);
			}
			$id = $a['id'];
			$bb = $mysqli->query("SELECT * from inventoryitems Where characterid = $id");
			$cc = $mysqli->query("SELECT * from characters Where id = $id");
			$c = $cc->fetch_assoc();
			$accid = $c['accountid'];
			$dd = $mysqli->query("SELECT * from characters Where accountid = $accid");
			$d = $dd->fetch_assoc();
			$ee = $mysqli->query("SELECT * from accounts Where id = $accid");
			$e = $ee->fetch_assoc();
			$ff = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = -1"); // equiped
			$gg = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = 1"); // equip
			$hh = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = 2"); // use
			$ii = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = 3"); // etc
			$jj = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = 4"); // setup
			$kk = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = 5"); // cash
			echo'<div class="col-xs-12"><a href="?ma=main" class="btn btn-warning">Back</a><hr/></div>';
			echo'<div class="col-xs-12 col-sm-9"><h2>'.$c['name'].''.$comma.'s Inventory</h2><hr/>
				
			<div class="col-xs-12 col-md-12 col-lg-4"><h3>'.$c['name'].' is wearing:</h3><hr/>'; // equiped
			while($f = $ff->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$f['itemid'].'.png" alt="img" title="'.$f['itemid'].'" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$f['quantity'].'</p>
				</div>';
			}
			echo'
			</div><div class="col-xs-12 col-md-12 col-lg-4"><h3>Equips:</h3><hr/>'; // equip
			while($g = $gg->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$g['itemid'].'.png" alt="img" title="'.$g['itemid'].'" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$g['quantity'].'</p>
				</div>';
			}
			echo'
			</div><div class="col-xs-12 col-md-12 col-lg-4"><h3>Use:</h3><hr/>'; // use
			while($h = $hh->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$h['itemid'].'.png" alt="img" title="'.$h['itemid'].'" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$h['quantity'].'</p>
				</div>';
			}
			echo'
			</div><div class="col-xs-12 col-md-12 col-lg-4"><h3>Etc:</h3><hr/>'; // etc
			while($i = $ii->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$i['itemid'].'.png" alt="img" title="'.$i['itemid'].'" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$i['quantity'].'</p>
				</div>';
			}
			echo'
			</div><div class="col-xs-12 col-md-12 col-lg-4"><h3>Setup:</h3><hr/>'; // setup
			while($j = $jj->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$j['itemid'].'.png" alt="img" title="'.$j['itemid'].'" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$j['quantity'].'</p>
				</div>';
			}
			echo'
			</div><div class="col-xs-12 col-md-12 col-lg-4"><h3>Cash:</h3><hr/>'; // cash
			while($k = $kk->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$k['itemid'].'.png" alt="img" title="'.$k['itemid'].'" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$k['quantity'].'</p>
				</div>';
			}
			/*
			while($b = $bb->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$b['itemid'].'.png" alt="img" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$b['quantity'].'</p>
				</div>';
			}
			*/
			echo'
			</div></div>
			
			
			<div class="col-xs-12 col-sm-3"><h2>'.$c['name'].''.$comma.'s Character info</h2><hr/>
				<div class="col-xs-12">
					<div class="panel panel-default">
					<span class="label label-default">Character ID: <b>'.$c['id'].'</b></span> <span class="label label-default">Account ID: <b>'.$e['id'].'</b></span>
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
					
					<h2>'.$c['name'].''.$comma.'s Account info</h2><hr/>
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
				<b>'.$siteversion.'</b> - Inventory organized by tabs<br>
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
			
				<div class="alert alert-dismissible alert-warning"><p>Make sure you are logged in with <b>gm</b> or <b>admin</b> rights.</p></div>
				<ul class="breadcrumb">
				DATABASE, Go to:
				  <li class="active">Accounts</li>
				  <li>FIND <i>gm</i></li>
				  <li class="active">or</li>
				  <li>FIND <i>webadmin</i></li>
				</ul>
				<ul class="breadcrumb">
				FOR GM
				  <li class="active">Accounts</li>
				  <li>FIND <i>gm</i></li>
				  <li class="active">SET</li>
				  <li><i>0 to 3</i></li>
				</ul>
				<ul class="breadcrumb">
				FOR Admin
				  <li class="active">Accounts</li>
				  <li>FIND <i>webadmin</i></li>
				  <li class="active">SET</li>
				  <li><i>0 to 1</i></li>
				</ul>
				<p>
				<b>'.$siteversion.'</b> - Maplebit-Master login support<br>
				<b>'.$siteversion.'</b> - Loading images local!<br>
				<b>'.$siteversion.'</b> - Offers you Inventory searching with some basic character information.<br>
				<b>'.$siteversion.'</b> - Search on character name<br>
				<b>'.$siteversion.'</b> - Inventory organized by tabs<br>
				</p>
			</div>';
		}
?>