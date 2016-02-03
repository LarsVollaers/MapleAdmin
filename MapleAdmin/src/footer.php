					<?php
					if(basename($_SERVER["PHP_SELF"]) == "footer.php"){
						die("403 - Access Forbidden");
					}
					?>
				</div>
			<div class="col-xs-12"><div id="footer"><hr><p class="color_red">Copyright <?php echo ''.$sitename.' '.date("Y").' <b>'.$siteversion.'</b>';?>. - Made by Lars - All Rights Reserved.</p></div></div>
		</div>	
	</body>
</html>