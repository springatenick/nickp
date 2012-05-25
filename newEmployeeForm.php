<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Add a New Employee</title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="/calendar/calendar.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="/calendar/calendar.js"></script>
		<script type="text/javascript" src="/model/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="/model/ajax.js"></script>
	</head>
	<body>
		<h1>Add a New Employee</h1>
	
		<?php
		include ("/view/menu.html");
		require_once("/model/db.php");
		require_once("/model/functions.php");
		require_once("/calendar/classes/tc_calendar.php");
		?>
	
		<form action="addEmployee.php" method="POST" enctype="multipart/form-data">
			<table border="1">
				<tr>
					<td>
						NAME
					</td>
					<td>
						<input name="name_employee" type="text">
					</td>
				</tr>
				<tr>
					<td>
						CONTACT PHONE
					</td>
					<td>
						<input name="p_phone" type="text">
					</td>
				</tr>
				<tr>
					<td>
						EMAIL
					</td>
					<td>
						<input name="p_email" type="text">
					</td>
				</tr>
				<tr>
					<td>
						ADDRESS
					</td>
					<td>
						<input name="address" type="text">
					</td>
				</tr>
				<tr>
					<td>
						DOB
					</td>
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
							$myCalendar->setDate($day, $month, $year);
							$myCalendar->writeScript();
						?>
					</td>
				</tr>
				<tr>
					<td>
						START DATE
					</td>
					<td>
						<?php
							$myCalendar = new tc_calendar("startDate", true, false);
							$myCalendar->setIcon("calendar/images/iconCalendar.gif");
							$myCalendar->setDate(date('d'), date('m'), date('Y'));
							$myCalendar->setPath("/calendar/");
							$myCalendar->setYearInterval(2009, 2015);
							$myCalendar->dateAllow('', '2015-03-01', false);
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
					<td>
						COUNTRY
					</td>
					<td>
						<select name="countryDropdown" id="countryDropdown">
								<?php
									$countries_sql="SELECT * FROM `countries`";
									print_r($countries_sql);
									$countries_result=mysql_query($countries_sql) or die (mysql_error());
									while($countries_row=mysql_fetch_assoc($countries_result)){
										?>
											<option value="<?=$countries_row["id_country"]?>"><?=$countries_row["name_country"]?></option>
										<?php
									}
								?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						LOCATION
					</td>
					<td>
						<select id="areaDropdown" name="areaDropdown" disabled="disabled">
							<?php getAreasDropdown();?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						DEPARTMENT
					</td>
					<td>
						<select id="departmentDropdown" name="departmentDropdown" disabled="disabled">
							<?php getDepartmentsDropdown();?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						POSITION
					</td>
					<td>
						<select name="position">
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
					<td>
						SHIFT
					</td>
					<td>
						<select name="shift">
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
					<td>
						WAGE
					</td>
					<td>
						<input name="wage" type="text">
					</td>
				</tr>
				<tr>
					<td>
						US ALIAS
					</td>
					<td>
						<input name="w_name" type="text">
					</td>
				</tr>
				<tr>
					<td>
						PHONE EXT
					</td>
					<td>
						<input name="w_phone_ext" type="text">
					</td>
				</tr>
				<tr>
					<td>
						WORK EMAIL
					</td>
					<td>
						<input name="w_email" type="text">
					</td>
				</tr>
				<tr>
					<td>
						WORK SKYPE
					</td>
					<td>
						<input name="w_skype" type="text">
					</td>
				</tr>
				<tr>
					<td>
						PHOTO
					</td>
					<td>
						<input type="file" name="photo">
					</td>
				</tr>
				<tr>
					<td>
						COPY DOCS
					</td>
					<td>
						<input type="file" name="copy_docs">
					</td>
				</tr>
				<tr>			
					<td>
						NOTES
					</td>
					<td>
						<textarea name="notes"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="save_info" value="SAVE INFO">
					</td>
				</tr>
			</table>
		</form>