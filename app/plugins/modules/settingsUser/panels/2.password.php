<div class="por-sec-pro">
	<h3 style="float: left;margin-bottom: 10px;">Password Settings</h3>
	<div id="accountHolder">
		<form id="frmPassword" autocomplete="off" method="post" onsubmit="return validateForm('#frmPassword');" action="<?php echo _service('settingsUser'); ?>&action=change-password" target="targetFormPass">
			<div class="author">
				<label for="password">Old Password:</label>
				<input type="password" name="password" class='textfield required' id="password">
			</div>
			<div class="author">
				<label for="new_password">New Password:</label>
				<input type="password" name="new_password" for="confirm_password" class='textfield required pwdfield' id="new_password">
			</div>
			<div class="author">
				<label for="confirm_password">Confirm Password:</label>
				<input type="password" name="confirm_password" class='textfield required' id="confirm_password">
			</div>
			<div class="portfolio-button">
				<input type="submit" class="btn save" value="Save">
				<input type="reset" class="btn" value="Reset">
			</div>
		</form>
	</div>
	<iframe id="targetFormPass" name="targetFormPass" width="100%" height="200px" frameborder="0" align="center"></iframe>
</div>