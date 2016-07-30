<?php
if(isset($_SESSION['id']) && isset($_SESSION['gm']) || isset($_SESSION['admin'])) {
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
	
		echo'
		<div>
			<div class="col-xs-12 col-lg-2">
				<div class="well well-sm">
					<h3>Menu</h3>
					<hr/>
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="#Wearing" data-toggle="tab">Wearing</a></li>
						<li><a href="#Equip" data-toggle="tab">Equip</a></li>
						<li><a href="#Use" data-toggle="tab">Use</a></li>
						<li><a href="#Setup" data-toggle="tab">Setup</a></li>
						<li><a href="#Etc" data-toggle="tab">Etc</a></li>
						<li><a href="#Cash" data-toggle="tab">Cash</a></li>
					</ul>
					<hr/>
					<a href="?ma=main" class="btn btn-warning btn-lg btn-block">Go back</a>
				</div>
			</div>
					
			<div class="col-xs-12 col-lg-6">
				<div class="well well-sm">
					<div id="myTabContent" class="tab-content">
							  
							  <div class="tab-pane fade active in" id="Wearing">
								<h3>'.$c['name'].' is wearing:</h3><hr/>
									<img src="./config/img/inventory_bg.png"/>
									<span class="item_grid">
										'; // Wearing
										while($f = $ff->fetch_assoc()) {
										echo'<div class="image_box"> 
												<img src="./config/img/items/'.$f['itemid'].'.png" alt="img" title="'.$f['itemid'].'" />
											</div> 
											<div class="image_box2"> 
												<p class="counter_fix">'.$f['quantity'].'</p>
											</div>';
										}
										echo'
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Equip">
								<h3>Equips:</h3><hr/>
									<img src="./config/img/inventory_bg.png"/>
									<span class="item_grid">
										'; // Equip
										while($g = $gg->fetch_assoc()) {
										echo'<div class="image_box"> 
												<img src="./config/img/items/'.$g['itemid'].'.png" alt="img" title="'.$g['itemid'].'" />
											</div> 
											<div class="image_box2"> 
												<p class="counter_fix">'.$g['quantity'].'</p>
											</div>';
										}
										echo'
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Use">
								<h3>Use:</h3><hr/>
									<img src="./config/img/inventory_bg.png"/>
									<span class="item_grid">
										'; // Use
										while($h = $hh->fetch_assoc()) {
										echo'<div class="image_box"> 
												<img src="./config/img/items/'.$h['itemid'].'.png" alt="img" title="'.$h['itemid'].'" />
											</div> 
											<div class="image_box2"> 
												<p class="counter_fix">'.$h['quantity'].'</p>
											</div>';
										}
										echo'
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Setup">
								<h3>Setup:</h3><hr/>
									<img src="./config/img/inventory_bg.png"/>
									<span class="item_grid">
										'; // Setup
										while($i = $ii->fetch_assoc()) {
										echo'<div class="image_box"> 
												<img src="./config/img/items/'.$i['itemid'].'.png" alt="img" title="'.$i['itemid'].'" />
											</div> 
											<div class="image_box2"> 
												<p class="counter_fix">'.$i['quantity'].'</p>
											</div>';
										}
										echo'
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Etc">
								<h3>Etc:</h3><hr/>
									<img src="./config/img/inventory_bg.png"/>
									<span class="item_grid">
										'; // Etc
										while($j = $jj->fetch_assoc()) {
										echo'<div class="image_box"> 
												<img src="./config/img/items/'.$j['itemid'].'.png" alt="img" title="'.$j['itemid'].'" />
											</div> 
											<div class="image_box2"> 
												<p class="counter_fix">'.$j['quantity'].'</p>
											</div>';
										}
										echo'
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Cash">
								<h3>Cash:</h3><hr/>
									<img src="./config/img/inventory_bg.png"/>
									<span class="item_grid">
										'; // Cash
										while($k = $kk->fetch_assoc()) {
										echo'<div class="image_box"> 
												<img src="./config/img/items/'.$k['itemid'].'.png" alt="img" title="'.$k['itemid'].'" />
											</div> 
											<div class="image_box2"> 
												<p class="counter_fix">'.$k['quantity'].'</p>
											</div>';
										}
										echo'
								  </span>
							  </div>
							</div>
						</div>
					</div>
					
					<div class="col-xs-12 col-lg-4">
						<div class="well well-sm">

						<h3>'.$c['name'].''.$comma.'s Character info</h3><hr/>

					<div class="panel panel-default">
					<span class="label label-default">Character ID: <b>'.$c['id'].'</b></span> <span class="label label-default">Account ID: <b>'.$e['id'].'</b></span>
					<button style="float:right;" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Edit</button>
					  <div class="panel-body">
						<img src="config/img/GD/character.php?name='.$c['name'].'" name="Character_img" alt="#" />
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
						
						        <select name="job" class="form-control" id="select">
								  <option value="'.$c['job'].'">'.$jobs[$c['job']].' (current job)</option>
								  
									<option value="0">Beginner</option>
									<option value="100">Warrior</option>
									<option value="110">Fighter</option>
									<option value="120">Page</option>
									<option value="130">Spearman</option>
									<option value="111">Crusader</option>
									<option value="121">White Knight</option>
									<option value="131">Dragon Knight</option>
									<option value="112">Hero</option>
									<option value="122">Paladin</option>
									<option value="132">Dark Knight</option>
									<option value="200">Magician</option>
									<option value="210">Fire/Poison Wizard</option>
									<option value="220">Ice/Lightning Wizard</option>
									<option value="230">Cleric</option>
									<option value="211">Fire/Poison Mage</option>
									<option value="221">Ice/Lightning Mage</option>
									<option value="231">Priest</option>
									<option value="212">Fire/Poison Arch Mage</option>
									<option value="222">Ice/Lightning Arch Mage</option>
									<option value="232">Bishop</option>
									<option value="300">Bowman</option>
									<option value="310">Hunter</option>
									<option value="320">Crossbowman</option>
									<option value="311">Ranger</option>
									<option value="321">Sniper</option>
									<option value="312">Bow Master</option>
									<option value="322">Crossbow Master</option>
									<option value="400">Thief</option>
									<option value="410">Assassin</option>
									<option value="420">Bandit</option>
									<option value="411">Hermit</option>
									<option value="421">Chief Bandit</option>
									<option value="412">Night Lord</option>
									<option value="422">Shadower</option>
									<option value="430">Blade Recruit</option>
									<option value="431">Blade Acolyte</option>
									<option value="432">Blade Specialist</option>
									<option value="433">Blade Lord</option>
									<option value="434">Blade Master</option>
									<option value="500">Pirate</option>
									<option value="510">Brawler</option>
									<option value="520">Gunslinger</option>
									<option value="511">Marauder</option>
									<option value="521">Outlaw</option>
									<option value="512">Buccaneer</option>
									<option value="522">Corsair</option>
									<option value="501">Cannon Master 1</option>
									<option value="530">Cannon Master 2</option>
									<option value="531">Cannon Master 3</option>
									<option value="532">Cannon Master 4</option>
									<option value="508">Jett</option>
									<option value="570">Jett</option>
									<option value="571">Jett</option>
									<option value="572">Jett</option>
									<option value="800">Manager</option>
									<option value="900">GameMaster</option>
									<option value="910">Super GM</option>
									<option value="1000">Noblesse</option>
									<option value="1100">Dawn Warrior 1</option>
									<option value="1110">Dawn Warrior 2</option>
									<option value="1111">Dawn Warrior 3</option>
									<option value="1112">Dawn Warrior 4</option>
									<option value="1200">Blaze Wizard 1</option>
									<option value="1210">Blaze Wizard 2</option>
									<option value="1211">Blaze Wizard 3</option>
									<option value="1212">Blaze Wizard 4</option>
									<option value="1300">Wind Archer 1</option>
									<option value="1310">Wind Archer 2</option>
									<option value="1311">Wind Archer 3</option>
									<option value="1312">Wind Archer 4</option>
									<option value="1400">Night Walker 1</option>
									<option value="1410">Night Walker 2</option>
									<option value="1411">Night Walker 3</option>
									<option value="1412">Night Walker 4</option>
									<option value="1500">Thunder Breaker 1</option>
									<option value="1510">Thunder Breaker 2</option>
									<option value="1511">Thunder Breaker 3</option>
									<option value="1512">Thunder Breaker 4</option>
									<option value="2000">Legend</option>
									<option value="2001">Evan</option>
									<option value="2100">Aran 1</option>
									<option value="2110">Aran 2</option>
									<option value="2111">Aran 3</option>
									<option value="2112">Aran 4</option>
									<option value="2200">Evan 1</option>
									<option value="2210">Evan 2</option>
									<option value="2211">Evan 3</option>
									<option value="2212">Evan 4</option>
									<option value="2213">Evan 5</option>
									<option value="2214">Evan 6</option>
									<option value="2215">Evan 7</option>
									<option value="2216">Evan 8</option>
									<option value="2217">Evan 9</option>
									<option value="2218">Evan 10</option>
									<option value="2300">Mercedes 1</option>
									<option value="2310">Mercedes 2</option>
									<option value="2311">Mercedes 3</option>
									<option value="2312">Mercedes 4</option>
									<option value="2003">Phantom</option>
									<option value="2400">Phantom 1</option>
									<option value="2410">Phantom 2</option>
									<option value="2411">Phantom 3</option>
									<option value="2412">Phantom 4</option>
									<option value="3000">Citizen</option>
									<option value="3100">Demon Slayer 1</option>
									<option value="3110">Demon Slayer 2</option>
									<option value="3111">Demon Slayer 3</option>
									<option value="3112">Demon Slayer 4</option>
									<option value="3200">Battle Mage 1</option>
									<option value="3210">Battle Mage 2</option>
									<option value="3211">Battle Mage 3</option>
									<option value="3212">Battle Mage 4</option>
									<option value="3300">Wild Hunter 1</option>
									<option value="3310">Wild Hunter 2</option>
									<option value="3311">Wild Hunter 3</option>
									<option value="3312">Wild Hunter 4</option>
									<option value="3500">Mechanic 1</option>
									<option value="3510">Mechanic 2</option>
									<option value="3511">Mechanic 3</option>
									<option value="3512">Mechanic 4</option>
									<option value="2004">Luminous</option>
									<option value="2700">Luminous 1</option>
									<option value="2710">Luminous 2</option>
									<option value="2711">Luminous 3</option>
									<option value="2712">Luminous 4</option>
									<option value="3101">Demon Avenger 1</option>
									<option value="3120">Demon Avenger 2</option>
									<option value="3121">Demon Avenger 3</option>
									<option value="3122">Demon Avenger 4</option>
									<option value="3002">Xenon</option>
									<option value="3600">Xenon 1</option>
									<option value="3610">Xenon 2</option>
									<option value="3611">Xenon 3</option>
									<option value="3612">Xenon 4</option>
									<option value="4001">Hayato 1</option>
									<option value="4110">Hayato 2</option>
									<option value="4111">Hayato 3</option>
									<option value="4112">Hayato 4</option>
									<option value="4002">Kanna 1</option>
									<option value="4210">Kanna 2</option>
									<option value="4211">Kanna 3</option>
									<option value="4212">Kanna 4</option>
									<option value="6000">Kaiser</option>
									<option value="6100">Kaiser 1</option>
									<option value="6110">Kaiser 2</option>
									<option value="6111">Kaiser 3</option>
									<option value="6112">Kaiser 4</option>
									<option value="6001">Angelic Buster</option>
									<option value="6500">Angelic Buster 1</option>
									<option value="6510">Angelic Buster 2</option>
									<option value="6511">Angelic Buster 3</option>
									<option value="6512">Angelic Buster 4</option>
									<option value="5100">Mihile 1</option>
									<option value="5110">Mihile 2</option>
									<option value="5111">Mihile 3</option>
									<option value="5112">Mihile 4</option>

								</select>

					</div>
					
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">GMlevel</label>
						<input name="gm" class="form-control" id="focusedInput" type="text" value="'.$c['gm'].'" placeholder="gm (MAX = 7)">
					</div>
					
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Str</label>
						<input name="_str" class="form-control" id="focusedInput" type="text" value="'.$c['str'].'" placeholder="str (MAX = 32767)">
					</div>
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Dex</label>
						<input name="_dex" class="form-control" id="focusedInput" type="text" value="'.$c['dex'].'" placeholder="dex (MAX = 32767)">
					</div>				
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Int</label>
						<input name="_int" class="form-control" id="focusedInput" type="text" value="'.$c['int'].'" placeholder="int (MAX = 32767)">
					</div>				
					<div class="col-xs-12 col-sm-3" class="form-group">
						<label class="control-label" for="focusedInput">Luk</label>
						<input name="_luk" class="form-control" id="focusedInput" type="text" value="'.$c['luk'].'" placeholder="luk (MAX = 32767)">
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
		
		if(isset($_POST['update'])) {
			//character info
			$name = $mysqli->real_escape_string($_POST['name']);
			$level = $mysqli->real_escape_string($_POST['level']);
			$job = $mysqli->real_escape_string($_POST['job']);
			$gm = $mysqli->real_escape_string($_POST['gm']);
			
			$str = $mysqli->real_escape_string($_POST['_str']);
			$dex = $mysqli->real_escape_string($_POST['_dex']);
			$int = $mysqli->real_escape_string($_POST['_int']);
			$luk = $mysqli->real_escape_string($_POST['_luk']);
			
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
			
			if($name == "") {
				echo '<div class=\"alert alert-danger\">Enter a name!</div><hr/><a href="#" class="btn btn-primary">Back</a> ';
			} else {
				$mysqli->query("UPDATE `characters` SET `name` = '{$name}', `level` = '{$level}', `job` = '{$job}', `gm` = '{$gm}', `str` = '{$str}', `dex` = '{$dex}', `int` = '{$int}', `luk` = '{$luk}', `hp` = '{$hp}', `maxhp` = '{$maxhp}', `mp` = '{$mp}', `maxmp` = '{$maxmp}', `exp` = '{$exp}', `meso` = '{$meso}' WHERE `id` = '".$c['id']."'");
				$mysqli->query("UPDATE `accounts` SET `vpoints` = '{$vpoints}', `points` = '{$points}', `nxCredit` = '{$nxCredit}', `ACash` = '{$ACash}', `mPoints` = '{$mPoints}' WHERE `id` = '".$e['id']."'");
				echo '
				<div class="col-xs-12">
					<div class="row">
						<a href="#" onclick="myFunction()" class="btn btn-primary btn-block"><b style="color:orange;">'.$name.'</b> successfully edited.<br>Click here to reload.</a>
					</div>
				</div>
				';
			}
		}
	} else {
		echo '
		<div class="col-xs-12">
			<h2>Welcome back '.$_SESSION['pname'].'</h2>
			<p>
				<b>'.$siteversion.'</b> - Maplebit-Master login support<br>
				<b>'.$siteversion.'</b> - Loading images local!<br>
				<b>'.$siteversion.'</b> - Offers you Inventory searching with some basic character information.<br>
				<b>'.$siteversion.'</b> - Search on character name<br>
				<b>'.$siteversion.'</b> - Inventory organized by tabs<br><br>
				<b>'.$siteversion.'</b> - New layout!<br>
				<b>'.$siteversion.'</b> - Edit player infomation!<br>
			</p>
			<form action="?ma=main" method="post">
				<div class="form-group"><input class="form-control" id="search" name="name" placeholder="Character Name" required></div>
				<div class="form-group"><button type="submit" href="#" name="submit" class="btn btn-success btn-lg btn-block">Check it</button></div>
			</form>
		</div>
		';
	}
} else {
	echo '
	<div class="col-xs-12">
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
				<b>'.$siteversion.'</b> - Inventory organized by tabs<br><br>
				<b>'.$siteversion.'</b> - New layout!<br>
				<b>'.$siteversion.'</b> - Edit player infomation!<br>
			</p>
		</div>
	</div>';
}
?>

<script>
function myFunction() {
    location.reload();
}
</script>
