<?php include("header.php") ?>

	<div class="container">
		
		<?php echo form_open(base_url("change_password/do_change")) ?>

			<table class="form3">
				
				<td>Set New Password</td>
				<td>
					<input type="password" name="new_pass">
					<?php echo form_error("new_pass") ?>
				</td><tr>
				
				<td>Confirm New Password</td>
				<td>
					<input type="password" name="confirm_new">
					<?php echo form_error("confirm_new") ?>
				</td><tr>
				
				<td><input type="submit" name="submit" value="Submit"></td>

			</table>

		<?php echo form_close() ?>

	</div>

<?php include("footer.php") ?>