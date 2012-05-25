<table border="1">
	<tr>
		<td>
			<form action="saveChanges.php" method="POST" enctype="multipart/form-data">
				<table border="1">
					<tr>
						<td>ID</td>
						<td>
							<?=$row["id_employee"]?>
							<input name="id_employee_info_hidden" type="hidden" value="<?=$row["id_employee"]?>">
						</td>
					</tr>
					<tr>
						<td>NAME</td>
						<td><input name="name_employee" type="text" value="<?=$row["name_employee"]?>"></td>
					</tr>
					<tr>
						<td>CONTACT PHONE</td>
						<td><input name="p_phone" type="text" value="<?=$row["p_phone"]?>"></td>
					</tr>					
					<tr>
						<td>EMAIL</td>
						<td><input name="p_email" type="text" value="<?=$row["p_email"]?>"></td>
					</tr>					
					<tr>
						<td>ADDRESS</td>
						<td><input name="address" type="text" value="<?=$row["address"]?>"></td>
					</tr>					
					<tr>
						<td>DOB</td>
						<td>
							<?php
								
								$myCalendar = new tc_calendar("dateOfBirth", true, false);
								$myCalendar->setIcon("calendar/images/iconCalendar.gif");
								$myCalendar->setDate(date('d'), date('m'), date('Y'));
								$myCalendar->setPath("/calendar/");
								$myCalendar->setYearInterval(1980, 2015);
								$myCalendar->dateAllow('1980-01-01', '2015-03-01');
								$myCalendar->setDateFormat('j F Y');
								$myCalendar->setAlignment('left', 'bottom');
								// $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
								// $myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
								//$myCalendar->setSpecificDate(array("2011-06-01"));
								$myCalendar->setDate($day, $month, $year);
								$myCalendar->writeScript();
							?>
						</td>
					</tr>					
					<tr>
						<td>COUNTRY</td>
						<td>
							<select name="countryDropdown" id="countryDropdown">
								<option selected value="<?=$row['id_country']?>"><?=$row['name_country']?></option>
								<?php
									getCountriesDropdown($row['id_country']);
								?>
							</select>
						</td>
					</tr>					
					<tr>
						<td>LOCATION</td>
						<td>
							<select id="areaDropdown" name="areaDropdown" disabled="disabled">
								<option selected value="<?=$row['id_location']?>"><?=$row['name_location']?></option>
								<?php
									getAreasDropdown();
								?>
							</select>
						</td>
					</tr>					
					<tr>
						<td>DEPARTMENT</td>
						<td>
							<input type="hidden" name="department" value="<?=$row['id_department']?>">
							<select id="departmentDropdown" name="departmentDropdown" disabled="disabled">
								<option selected value="<?=$row['id_department']?>"><?=$row['name_department']?></option>
								<?php
									getDepartmentsDropdown();
								?>
							</select>
						</td>
					</tr>					
					<tr>
						<td>POSITION</td>
						<td>
							<select name="position">
								<option selected value="<?=$row["position"]?>">
									<?
										$request="SELECT `id_position`,`name_position` FROM `positions` WHERE `id_position`=" . $row["position"];
										$result=mysql_query($request);
										$position=mysql_fetch_assoc($result);
										echo $position["name_position"];
									?>
								</option>
								<?php
									$positions = getPositionsList();
									foreach($positions as $key=>$value){
										if ($value["id_position"] == $position["id_position"])
											continue;
									echo "<option value=" . $value['id_position'] . ">" . $value['name_position'] . "</option>";
									}
								?>
							</select>
						</td>
					</tr>					
					<tr>
						<td>SHIFT</td>
						<td>
							<select name="shift">
								<option selected value="<?=$row["shift"]?>">
									<?
										$request="SELECT `id_shift`,`name_shift` FROM `shifts` WHERE `id_shift`=" . $row["shift"];
										$result=mysql_query($request);
										$shift=mysql_fetch_assoc($result);
										echo $shift["name_shift"];
									?>
								</option>
								<?php
									$shifts = getShiftsList();
									foreach($shifts as $key=>$value){
										if ($value["id_shift"] == $shift["id_shift"])
											continue;
									echo "<option value=" . $value['id_shift'] . ">" . $value['name_shift'] . "</option>";
									}
								?>
							</select>
						</td>
					</tr>					
					<tr>
						<td>WAGE</td>
						<td><input name="wage" type="text" value="<?=$row["wage"]?>"></td>
					</tr>					
					<tr>
						<td>US ALIAS</td>
						<td><input name="w_name" type="text" value="<?=$row["w_name"]?>"></td>
					</tr>					
					<tr>
						<td>PHONE EXT</td>
						<td><input name="w_phone_ext" type="text" value="<?=$row["w_phone_ext"]?>"></td>
					</tr>					
					<tr>
						<td>WORK EMAIL</td>
						<td><input name="w_email" type="text" value="<?=$row["w_email"]?>"></td>
					</tr>					
					<tr>
						<td>WORK SKYPE</td>
						<td><input name="w_skype" type="text" value="<?=$row["w_skype"]?>"></td>
					</tr>					
					<tr>
						<td>START DATE</td>
						<td><input name="start_date" type="text" value="<?=$row["start_date"]?>"></td>
					</tr>
					<tr>
						<td>PHOTO</td>
						<td><input type="file" name="photo"></td>
					</tr>
					<tr>
						<td>COPY DOCS</td>
						<td><input type="file" name="copy_docs"></td>
					</tr>
					<tr>			
						<td>NOTES</td>
						<td><textarea name="notes"><?=$row["notes"]?></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="save_info" value="SAVE INFO"></td>
					</tr>
				</table>
			</form>
		</td>
		<td>
			<img name="image" src="<?=$row["photo"]?>" />
		</td>
		<td>
			<img name="doc" src="<?=$row["copy_docs"]?>" />
		</td>
	</table>