<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>View Department List</title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="calendar/calendar.js"></script>
		<script type="text/javascript" src="model/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="model/ajax.js"></script>
	</head>
	<body>
	<h1>View Department List</h1>
<?php
include ("menu.html");
require_once("model/db.php");
require_once("model/functions.php");
?>
		<table border="1">
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
		</table>
		<!--THIS IS WHERE DEPARTMENTS LIST WILL SHOW UP-->
		<div id="departmentList" name="departmentList" style="display: none;">
			<label>List:</label>
		</div>
	</body>
</html>