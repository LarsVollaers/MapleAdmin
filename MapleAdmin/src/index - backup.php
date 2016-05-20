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
			while($j = $jj->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$j['itemid'].'.png" alt="img" title="'.$j['itemid'].'" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$j['quantity'].'</p>
				</div>';
			}
			echo'
			</div><div class="col-xs-12 col-md-12 col-lg-4"><h3>Setup:</h3><hr/>'; // setup
			while($i = $ii->fetch_assoc()) {
			echo'<div class="image_box"> 
					<img src="/MapleAdmin/config/img/items/'.$i['itemid'].'.png" alt="img" title="'.$i['itemid'].'" />
				</div> 
				<div class="image_box2"> 
					<p class="counter_fix">'.$i['quantity'].'</p>
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
					<button style="float:right;" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Edit</button>
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
			</div>

			
			

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit '.$c['name'].'</h4>
      </div>
      <div class="modal-body">

	  
			<form method="post" action="?ma=main&action=edit">
				<div class="form-group">
					<label class="control-label" for="focusedInput">Character name (cannot be changed)</label>
					<input name="name" class="form-control" id="focusedInput" type="text" value="'.$c['name'].'" placeholder="Name">
				</div>
				
				
				<div class="row">
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Character Level</label>
						<input name="level" class="form-control" id="focusedInput" type="text" value="'.$c['level'].'" placeholder="Level">
					</div>
					
					<div class="col-xs-12 col-sm-6" class="form-group">
						<label class="control-label" for="focusedInput">Character job</label>
						<input name="job" class="form-control" id="focusedInput" type="text" value="'.$c['job'].'" placeholder="job">
					</div>
					
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">GMlevel</label>
						<input name="gm" class="form-control" id="focusedInput" type="text" value="'.$c['gm'].'" placeholder="gm (MAX = 7)">
					</div>
					
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Str</label>
						<input name="str" class="form-control" id="focusedInput" type="text" value="'.$c['str'].'" placeholder="str (MAX = 32767)">
					</div>
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Dex</label>
						<input name="dex" class="form-control" id="focusedInput" type="text" value="'.$c['dex'].'" placeholder="dex (MAX = 32767)">
					</div>				
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Int</label>
						<input name="int" class="form-control" id="focusedInput" type="text" value="'.$c['int'].'" placeholder="int (MAX = 32767)">
					</div>				
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Luk</label>
						<input name="luk" class="form-control" id="focusedInput" type="text" value="'.$c['luk'].'" placeholder="luk (MAX = 32767)">
					</div>
				
					<div class="col-xs-12 col-sm-6" class="form-group">
						<label class="control-label" for="focusedInput">Hp</label>
						<input name="hp" class="form-control" id="focusedInput" type="text" value="'.$c['hp'].'" placeholder="hp (MAX = 500000)">
					</div>
					<div class="col-xs-12 col-sm-6" class="form-group">
						<label class="control-label" for="focusedInput">Max Hp</label>
						<input name="maxhp" class="form-control" id="focusedInput" type="text" value="'.$c['maxhp'].'" placeholder="maxhp (MAX = 500000)">
					</div>
					
					<div class="col-xs-12 col-sm-6" class="form-group">
						<label class="control-label" for="focusedInput">Mp</label>
						<input name="mp" class="form-control" id="focusedInput" type="text" value="'.$c['mp'].'" placeholder="mp (MAX = 500000)">
					</div>
					<div class="col-xs-12 col-sm-6" class="form-group">
						<label class="control-label" for="focusedInput">Max Mp</label>
						<input name="maxmp" class="form-control" id="focusedInput" type="text" value="'.$c['maxmp'].'" placeholder="maxmp (MAX = 500000)">
					</div>
				
				
					<div  class="col-xs-12 col-sm-6"class="form-group">
						<label class="control-label" for="focusedInput">Character exp</label>
						<input name="exp" class="form-control" id="focusedInput" type="text" value="'.$c['exp'].'" placeholder="exp">
					</div>
					
					<div class="col-xs-12 col-sm-6" class="form-group">
						<label class="control-label" for="focusedInput">Character meso</label>
						<input name="meso" class="form-control" id="focusedInput" type="text" value="'.$c['meso'].'" placeholder="meso (MAX=2000000000)">
					</div>
					

					&nbsp;<hr/>
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Vote points</label>
						<input name="vpoints" class="form-control" id="focusedInput" type="text" value="'.$e['vpoints'].'" placeholder="vpoints">
					</div>
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Donate points</label>
						<input name="points" class="form-control" id="focusedInput" type="text" value="'.$e['points'].'" placeholder="points">
					</div>
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">NX</label>
						<input name="nxCredit" class="form-control" id="focusedInput" type="text" value="'.$e['nxCredit'].'" placeholder="nxCredit">
					</div>
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Cash</label>
						<input name="ACash" class="form-control" id="focusedInput" type="text" value="'.$e['ACash'].'" placeholder="ACash">
					</div>
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">MaplePoints</label>
						<input name="mPoints" class="form-control" id="focusedInput" type="text" value="'.$e['mPoints'].'" placeholder="mPoints">
					</div>
					
					
				</div>
		
		
      </div>
      <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" name="update" onclick="myFunction()" class="btn btn-primary" value="Save changes" />	
			</form>
      </div>
    </div>
  </div>
</div>

			';

			if(!isset($_POST['update'])){
			echo'';
			} else {
				//character info
				$name = $mysqli->real_escape_string($_POST['name']);
				$level = $mysqli->real_escape_string($_POST['level']);
				$job = $mysqli->real_escape_string($_POST['job']);
				$gm = $mysqli->real_escape_string($_POST['gm']);
				
				$str = $mysqli->real_escape_string($_POST['str']);
				$dex = $mysqli->real_escape_string($_POST['dex']);
				//$int = $mysqli->real_escape_string($_POST['int']);
				$luk = $mysqli->real_escape_string($_POST['luk']);
				
				$hp = $mysqli->real_escape_string($_POST['hp']);
				$maxhp = $mysqli->real_escape_string($_POST['maxhp']);
				$mp = $mysqli->real_escape_string($_POST['mp']);
				$maxmp = $mysqli->real_escape_string($_POST['maxmp']);
				
				$exp = $mysqli->real_escape_string($_POST['exp']);
				$meso = $mysqli->real_escape_string($_POST['meso']);
				//account info
				$vpoints = $mysqli->real_escape_string($_POST['vpoints']);
				$points = $mysqli->real_escape_string($_POST['points']);
				
				$nxCredit = $mysqli->real_escape_string($_POST['nxCredit']);
				$ACash = $mysqli->real_escape_string($_POST['ACash']);
				$mPoints = $mysqli->real_escape_string($_POST['mPoints']);
				
				
				if($name == ""){
					echo '<div class=\"alert alert-danger\">Enter a name!</div><hr/><a href="#" class="btn btn-primary">Back</a> ';
				}else{
					$u = $mysqli->query("UPDATE characters SET name='".$name."', level = '".$level."', job = '".$job."', gm = '".$gm."', str = '".$str."', dex = '".$dex."', luk = '".$luk."', hp = '".$hp."', maxhp = '".$maxhp."', mp = '".$mp."', maxmp = '".$maxmp."', exp = '".$exp."', meso = '".$meso."' WHERE id='".$c['id']."'") or die();
					$uu = $mysqli->query("UPDATE accounts SET vpoints='".$vpoints."', points = '".$points."', nxCredit = '".$nxCredit."', ACash = '".$ACash."', mPoints = '".$mPoints."' WHERE id='".$e['id']."'") or die();
					echo '<div class=\"alert alert-success\"><b>'.$name.'</b> successfully edited</div><hr/><a href="#" onclick="myFunction()" class="btn btn-primary">Reload page to see the effect</a>';
				}
			}
				

			
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

<script>
function myFunction() {
    location.reload();
}
</script>
