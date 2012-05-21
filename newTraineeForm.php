<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Add a New Trainee</title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="calendar/calendar.js"></script>
		<script type="text/javascript" src="model/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="model/ajax.js"></script>
	</head>
	<body>
	<h1>Add a New Trainee</h1>
<?
include ("menu.html");
require_once("model/db.php");
require_once("model/functions.php");
require_once("calendar/classes/tc_calendar.php");
?>
		<form action="addNewTrainee.php" method="POST" enctype="multipart/form-data">
			<table border="1">
				<tr>
					<td>Name:</td>
					<td><input type="text" name="p_name" id="p_name" value="John Smith"></td>
				</tr>
				<tr>
					<td>Contact Phone:</td>
					<td><input type="text" name="p_phone" id="p_phone" value="+XX(XXX)XXX-XXXX"></td>
				</tr>
				<tr>
					<td>Date of Birth:</td>
					<td>
						<?
						  $myCalendar = new tc_calendar("dateOfBirth", true, false);
						  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
						  $myCalendar->setDate(date('d'), date('m'), date('Y'));
						  $myCalendar->setPath("calendar/");
						  $myCalendar->setYearInterval(1980, 2015);
						  $myCalendar->dateAllow('1980-01-01', '2015-03-01');
						  $myCalendar->setDateFormat('j F Y');
						  $myCalendar->setAlignment('left', 'bottom');
						  $myCalendar->writeScript();
						?>
					</td>
				</tr>
				<tr>
					<td>Training Start Date:</td>
					<td>
						<?
						  $myCalendar = new tc_calendar("startDate", true, false);
						  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
						  $myCalendar->setDate(date('d'), date('m'), date('Y'));
						  $myCalendar->setPath("calendar/");
						  $myCalendar->setYearInterval(2015, 2015);
						  $myCalendar->dateAllow(date('y-m-j'), '2015-03-01');
						  $myCalendar->setDateFormat('j F Y');
						  $myCalendar->setAlignment('left', 'bottom');
						  $myCalendar->writeScript();
						?>
					</td>
				</tr>
				<tr>
					<td>CV (*.doc, *.odf, *.pdf, *.rtf, *.txt):</td>
					<td><input type="file" name="cv"></td>
				</tr>			
				<tr>
					<td>Country:</td>
					<td>
						<select name="countryDropdown" id="countryDropdown">
								<option selected option value="">Select country</option>
								<?
									getCountriesDropdown();
								?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Location:</td>
					<td><select id="areaDropdown" name="areaDropdown" disabled="disabled"></select></td>
				</tr>
				<tr>
					<td>Department:</td>
					<td><select id="departmentDropdown" name="departmentDropdown" disabled="disabled"></select></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="SAVE"></td>
				</tr>
			</table>
		</form>
	</body>
</html>