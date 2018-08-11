<?php include("header.php") ?>

<div class="container">

	<?php echo form_open(base_url('order/do_update/'.$row->id)) ?>

		<table class="form">

			<td>ID</td>
			<td><?php echo $row->id ?></td>
			<tr>
		
			<td>Job</td>
			<td>

				<select name="Job" id="Job">
					<option value="<?php echo set_value('Job',$row->Job) ?>"><?php echo set_value('Job',$row->Job) ?></option>
					<option value="SC">South Carolina</option>
				</select>
				<?php echo form_error("Job") ?>

			</td><tr>			

			<td>Client</td>
			<td>

				<select name="Client" id="Client">
					<option value="<?php echo set_value('Client',$row->Client) ?>"><?php echo set_value("Client",$row->Client) ?></option>
					<option value="Alameda Publishing Group">Alameda Publishing Group</option>
					<option value="YP">YP</option>
					<option value="Berry">Berry</option>
					<option value="Best Publications">Best Publications</option>
					<option value="BNA">BNA</option>
					<option value="Buzztown.com">Buzztown.com</option>
					<option value="Century Link">Century Link</option>
					<option value="City Books">City Books</option>
					<option value="Community Yellow Pages">Community Yellow Pages</option>
					<option value="Dex-Att">Dex Att</option>
					<option value="Dex One">Dex One</option>
					<option value="Directory Plus">Directory Plus</option>
					<option value="First Choice Yellow Pages">First Choice Yellow Pages</option>
					<option value="FRY Communications">FRY Communications</option>
					<option value="HAINES Pub">HAINES Pub</option>
					<option value="JFL Marketing">JFL Marketing</option>
					<option value="Local Pages Dir">Local Pages Dir</option>
					<option value="Magnolia Dir">Magnolia Dir</option>
					<option value="Mike McGill">Mike McGill</option>
					<option value="Neighborhood Dir">Neighborhood Dir</option>
					<option value="Northern Directory Publishers">Northern Directory Publishers</option>
					<option value="Quebecor Media">Quebecor Media</option>
					<option value="Qwest">Qwest</option>
					<option value="Redbook">Redbook</option>
					<option value="SAGE Publications">SAGE Publications</option>
					<option value="Salinas">Salinas</option>
					<option value="Southern Dir. (Exceed Pub)">Southern. (Exceed Pub)</option>
					<option value="Southern Style Publications">Southern Style Publications</option>
					<option value="UFPB">UFPB</option>
					<option value="Valley Yellow Pages">Valley Yellow Pages</option>
				</select>
				<?php echo form_error("Client") ?>

			</td><tr>			

			<td>PM/OPM</td>
			<td>

				<select name="PM" id="PM">
					<option value="<?php echo set_value('PM',$row->PM) ?>"><?php echo set_value('PM',$row->PM) ?></option>
					<option value="Ronnie Manalili">Ronnie Manalili</option>
					<option value="Ashley Turner">Ashley Turner</option>
					<option value="Keelan Jones">Keelan Jones</option>
				</select>
				<?php echo form_error("PM") ?>

			</td><tr>			

			<td>Job Status</td>
			<td>

				<select name="jobstat" id="jobstat">
					<option value="<?php echo set_value('jobstat',$row->jobstat) ?>"><?php echo set_value('jobstat',$row->jobstat) ?></option>
					<option value="Ready to Ship">Ready to Ship</option>
					<option value="Not Ready to Ship">Not Ready to Ship</option>
				</select>
				<?php echo form_error("jobstat") ?>

			</td><tr>			


			<td>Date Shipped</td>
			<td>
				<input type="text" name="dateship" id="dateship" size="32" value="<?php echo set_value('dateship',$row->dateship) ?>">
				<?php echo form_error("dateship") ?>
			</td><tr>

			<td>Directory Info</td>
			<td>
				<input type="text" name="DirectoryInfo" id="DirectoryInfo" size="32" value="<?php echo set_value('DirectoryInfo',$row->DirectoryInfo) ?>">
				<?php echo form_error("DirectoryInfo") ?>
			</td><tr>

			<td>Tracking No</td>
			<td>
				<input type="text" name="TrackingNumber" id="TrackingNumber" size="32" value="<?php echo set_value('TrackingNumber',$row->TrackingNumber) ?>">
				<?php echo form_error("TrackingNumber") ?>
			</td><tr>

			<td>COMMENT</td>
			<td>
				<textarea name="Comment" id="Comment" cols="90" rows="10"><?php echo set_value("Comment",$row->Comment) ?></textarea>
			</td><tr>

			<td><input class="button" type="submit" value="Submit"></td>

			</table>

	<?php echo form_close() ?>
	
</div>

<?php include("footer.php") ?>
