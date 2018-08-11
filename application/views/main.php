<?php include("header.php") ?>

	<div class="container">
		<?php echo form_open(base_url('main/filter')) ?>
			<p><strong>Search</strong></p>
			<p>
				<input type="text" name="filter_id" placeholder="ID" />
				<input type="text" name="filter_job" placeholder="Job" />
				<input type="text" name="filter_client" placeholder="Client" />
				<!-- <input type="text" name="filter_pm" placeholder="PM/OPM" /> -->
				<select name="filter_pm" class="select_search">
					<option value="">PM/OPM</option>
					<option value="Ronnie Manalili">Ronnie Manalili</option>
					<option value="Ashley Turner">Ashley Turner</option>
					<option value="Keelan Jones">Keelan Jones</option>
				</select>
				<input type="text" name="filter_trackno" placeholder="Tracking Number" />
				<input type="text" name="filter_date" placeholder="Date Entered" />
				<input type="text" name="filter_directinfo" placeholder="Directory Info" />
				<input type="submit" name="submit" value="Search" />
			</p>
		<?php echo form_close() ?>
	</div>

	<div class="container"><?php echo $this->pagination->create_links(); ?></div>

	<table class="data_table">

		<!-- column field -->
		<tr>
		<thead>
			<?php if($this->session->userdata("sof_usertype") == "USRADM"){ ?>
			<th class="field"></th>
			<?php } ?>
			<th class="field">Job</th>
			<th class="field">ID</th>
			<th class="field">Client</th>
			<th class="field">PM</th>
			<th class="field">Directory Info</th>
			<th class="field">Date Entered</th>
			<th class="field">Job Status</th>
			<th class="field">Date Shipped</th>
			<th class="field">Tracking No.</th>
			<th class="field">Comments</th>
		</thead>		
		</tr>

		<!-- data  -->
		<tbody>

			<?php foreach($records as $row){ ?>
			
			<tr>
				<?php if($this->session->userdata("sof_usertype") == "USRADM"){ ?>
				<td class="data"><a href="<?php echo base_url("main/edit/$row->id") ?>">Edit</a> | <a href="<?php echo base_url("main/delete/$row->id") ?>">Delete</a></td>
				<?php } ?>
				<td class="data"><?php echo $row->Job ?></td>
				<td class="data"><?php echo $row->id ?></a></td>
				<td class="data"><?php echo $row->Client ?></td>
				<td class="data"><?php echo $row->PM ?></td>
				<td class="data"><?php echo $row->DirectoryInfo ?></td>
				<td class="data"><?php echo $row->DateEntered ?></td>
				<td class="data"><?php echo $row->jobstat ?></td>
				<td class="data"><?php echo $row->dateship ?></td>
				<td class="data"><?php echo $row->TrackingNumber ?></td>
				<td class="data"><?php echo $row->Comment ?></td>
			</tr>

			<?php } ?>

		</tbody>
		
	</table>


<?php include("footer.php") ?>