<form action="saveChanges.php" method="POST">
		<table border="1">
			<tr>
				<td><b>TYPE</b></td>
				<td><b>REQUESTED</b></td>
				<td><b>COMPLETE</b></td>
			</tr>
			<tr>
				<td>uAttend Key</td>
				<td>
					<input name="request[]" type="checkbox" value="key" <?php if($checkboxes["uattendkey"] == 1) echo "checked"; ?>>
					<input name="id_employee" type="hidden" value="<?=$row["id_employee"]?>">
					<input name="name_employee" type="hidden" value="<?=$row["name_employee"]?>">
				</td>
				<td><input name="request[]" type="checkbox" value="key_done" <?php if($checkboxes["uattendkey_set"] == 1) echo "checked"; ?>></td>
			</tr>
			<tr>
				<td>US Alias name</td>
				<td><input name="request[]" type="checkbox" value="w_name" <?php if($checkboxes["w_name"] == 1) echo "checked"; ?>></td>
				<td><input name="request[]" type="checkbox" value="w_name_done" <?php if($checkboxes["w_name_set"] == 1) echo "checked"; ?>></td>
			</tr>
			<tr>
				<td>Workplace and PC</td>
				<td><input name="request[]" type="checkbox" value="pc" <?php if($checkboxes["pc"] == 1) echo "checked"; ?>></td>
				<td><input name="request[]" type="checkbox" value="pc_done" <?php if($checkboxes["pc_set"] == 1) echo "checked"; ?>></td>
			</tr>
			<tr>
				<td>inContact client and account</td>
				<td><input name="request[]" type="checkbox" value="incontact" <?php if($checkboxes["incontact"] == 1) echo "checked"; ?>></td>
				<td><input name="request[]" type="checkbox" value="incontact_done" <?php if($checkboxes["incontact_set"] == 1) echo "checked"; ?>></td>
			</tr>
			<tr>
				<td>Email client and account</td>
				<td><input name="request[]" type="checkbox" value="email" <?php if($checkboxes["email"] == 1) echo "checked"; ?>></td>
				<td><input name="request[]" type="checkbox" value="email_done" <?php if($checkboxes["email_set"] == 1) echo "checked"; ?>></td>
			</tr>
			<tr>
				<td>Skype client and account</td>
				<td><input name="request[]" type="checkbox" value="skype" <?php if($checkboxes["skype"] == 1) echo "checked"; ?>></td>
				<td><input name="request[]" type="checkbox" value="skype_done" <?php if($checkboxes["skype_set"] == 1) echo "checked"; ?>></td>
			</tr>
			<tr>
				<td>Live Chat client and account</td>
				<td><input name="request[]" type="checkbox" value="chat" <?php if($checkboxes["chat"] == 1) echo "checked"; ?>></td>
				<td><input name="request[]" type="checkbox" value="chat_done" <?php if($checkboxes["chat_set"] == 1) echo "checked"; ?>></td>
			</tr>
			<tr>
				<td>Shoes Box</td>
				<td><input name="request[]" type="checkbox" value="box" <?php if($checkboxes["box"] == 1) echo "checked"; ?>></td>
				<td><input name="request[]" type="checkbox" value="box_done" <?php if($checkboxes["box_set"] == 1) echo "checked"; ?>></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" name="save_req" value="SAVE REQ"></td>
			</tr>
		</table>
	</form>