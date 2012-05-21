<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Update Employee</title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="calendar/calendar.js"></script>
		<script type="text/javascript" src="model/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="model/ajax.js"></script>
	</head>
	<body>
	<h1>Update Employee</h1>
<?php
include ("menu.html");
require_once("model/db.php");
require_once("model/functions.php");
require_once("calendar/classes/tc_calendar.php");

$information = getEmployeeInfo(trim(strip_tags($_GET['id'])));
while($row = mysql_fetch_array($information)){
$id=$row["id_employee"];
?>	
		<!--INFORMATION FORM-->
		<h1>CHANGE INFORMATION for <?=$row["name_employee"]?></h1>
		<form action="saveChanges.php" method="POST">
			<table border="1">
				<tr>
					<td>ID</td>
					<td><?=$row["id_employee"]?><input name="information[]" type="hidden" value="<?=$row["id_employee"]?>"></td>
				</tr>
					<td>NAME</td>
					<td><input name="information[]" type="text" value="<?=$row["name_employee"]?>"></td>
				</tr>
					<td>CONTACT PHONE</td>
					<td><input name="information[]" type="text" value="<?=$row["p_phone"]?>"></td>
				</tr>					
					<td>EMAIL</td>
					<td><input name="information[]" type="text" value="<?=$row["p_email"]?>"></td>
				</tr>					
					<td>ADDRESS</td>
					<td><input name="information[]" type="text" value="<?=$row["address"]?>"></td>
				</tr>					
					<td>DOB</td>
					<td>
						<?php
							$myCalendar = new tc_calendar("dateOfBirth", true, false);
							$myCalendar->setIcon("calendar/images/iconCalendar.gif");
							$myCalendar->setDate(date('d'), date('m'), date('Y'));
							$myCalendar->setPath("calendar/");
							$myCalendar->setYearInterval(1980, 2015);
							$myCalendar->dateAllow('1980-01-01', '2015-03-01');
							$myCalendar->setDateFormat('j F Y');
							$myCalendar->setAlignment('left', 'bottom');
							// $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
							// $myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
							// $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
							$myCalendar->writeScript();
						?>
					</td>
				</tr>					
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
					<td>DEPARTMENT</td>
					<td>
						<select id="departmentDropdown" name="departmentDropdown" disabled="disabled">
							<option selected value="<?=$row['id_department']?>"><?=$row['name_department']?></option>
							<?php
								getDepartmentsDropdown();
							?>
						</select>
					</td>
				</tr>					
					<td>POSITION</td>
					<td><input name="information[]" type="text" value="<?=$row["position"]?>"></td>
				</tr>					
					<td>SHIFT</td>
					<td><input name="information[]" type="text" value="<?=$row["shift"]?>"></td>
				</tr>					
					<td>WAGE</td>
					<td><input name="information[]" type="text" value="<?=$row["wage"]?>"></td>
				</tr>					
					<td>US ALIAS</td>
					<td><input name="information[]" type="text" value="<?=$row["w_name"]?>"></td>
				</tr>					
					<td>PHONE EXT</td>
					<td><input name="information[]" type="text" value="<?=$row["w_phone_ext"]?>"></td>
				</tr>					
					<td>WORK EMAIL</td>
					<td><input name="information[]" type="text" value="<?=$row["w_email"]?>"></td>
				</tr>					
					<td>WORK SKYPE</td>
					<td><input name="information[]" type="text" value="<?=$row["w_skype"]?>"></td>
				</tr>					
					<td>START DATE</td>
					<td><input name="information[]" type="text" value="<?=$row["start_date"]?>"></td>
				</tr>
				<tr>			
					<td>NOTES</td>
					<td><input name="information[]" type="text" value="<?=$row["notes"]?>"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="save_info" value="SAVE INFO"></td>
				</tr>

			</table>
		</form>
		<!--ENDINFORMATION FORM-->
<?php
	//echo $id;
	$checkboxes = (checkChecked($id));
?>
		<h1>REQUEST FORM for <?=$row["name_employee"]?></h1>
		<!--CHECKBOXES REQUESTS FORM-->
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
						<input name="request[]" type="hidden" value="<?=$row["id_employee"]?>">
						<input name="request[]" type="hidden" value="<?=$row["name_employee"]?>">
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
					<td><input name="request[]" type="checkbox" value="inContact" <?php if($checkboxes["incontact"] == 1) echo "checked"; ?>></td>
					<td><input name="request[]" type="checkbox" value="inContact_done" <?php if($checkboxes["incontact_set"] == 1) echo "checked"; ?>></td>
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
		<!--ENDREQUESTS FORM-->
<?php
}//THIS IS A CLOSING FOR WHILE ON LINE 18
?>
	</body>
</html>