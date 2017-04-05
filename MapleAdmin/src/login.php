<div class="container">
	<div class="row">
		<div class="col-xs-12">

			<div class="well well-sm">
					<h2>Staff login</h2> <hr/>
					
					<?php
						if(isset($_POST['username'], $_POST['password'])) {
							$username = mysql_real_escape_string(stripslashes($_POST['username']));
							$password = mysql_real_escape_string(stripslashes($_POST['password']));

							$s = $mysqli->query("SELECT * FROM `accounts` WHERE `name`='".$username."'") or die();
							$i = $s->fetch_assoc();
							if($i['password'] == hash('sha512',$p.$i['salt']) || sha1($p) == $i['password']) {
								$userz = $mysqli->query("SELECT * FROM `accounts` WHERE `name`='".$i['name']."' AND `password`='".$i['password']."'") or die();
								$auser = $userz->fetch_assoc();
								
								$_SESSION['id'] = $auser['id'];
								$_SESSION['name'] = $auser['name'];	
								
								if($auser['gm'] >= 3){
									$_SESSION['gm'] = $auser['gm'];
								}
								
								if($auser['webadmin'] >= 1){
									$_SESSION['admin'] = $auser['webadmin'];
								}
							}
						header("Location:main");
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=main\">";
						} else {
						?>
					
						<form action="login" method="post">
						
							<div class="col-lg-12">				
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
										<div class="login_bar_button"><input type="username" class="form-control" name="username" placeholder="Username"></div>
									</div>
								</div>

								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
										<div class="login_bar_button"><input type="password" class="form-control" name="password" placeholder="Password"></div>
									</div>
								</div>
								<div class="form-group">
									<div class="login_bar_button"><button type="submit" href="#" name="submit" class="btn btn-success">Login</button></div>
								</div>
							</div>

						</form>
					&nbsp;<hr/>
					<?php
						}
					?>
			</div>
		</div>
	</div>
</div>
