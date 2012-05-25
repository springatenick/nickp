<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>UPDATE EMPLOYEE INFORMATION</title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="/calendar/calendar.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="/calendar/calendar.js"></script>
		<script type="text/javascript" src="/model/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="/model/ajax.js"></script>
	</head>
	<body>
		<h1>UPDATE EMPLOYEE INFORMATION</h1>
		<?php 
		include("view/menu.html");
		
		require_once("/model/db.php");
		require_once("/model/functions.php");
		require_once("/calendar/classes/tc_calendar.php");

		$information=getEmployeeInfo(trim(strip_tags($_GET['id'])));
		$row=mysql_fetch_array($information);
		
		$date=$row["dob"]; //YYYY-MM-DD
		//print_r($date);
		$year=substr($date, 0, 4);
		$month=substr($date, 5, 2);
		$day=substr($date, 8, 2);
		?>
		
		<!--INFORMATION FORM-->
		<h1>UPDATE INFORMATION FOR <?=$row["name_employee"]?></h1>
		<?php include("/view/informationForm.php");?>
		<!--END INFORMATION FORM-->
		
		<?php
		/*echo $id;*/
		$checkboxes=checkChecked($row["id_employee"]);
		?>
		
		<!--CHECKBOXES REQUESTS FORM-->
		<h1>SUBMIT A REQUEST FOR <?=$row["name_employee"]?></h1>
		<?php include("/view/requestForm.php");?>
		<!--END REQUESTS FORM-->
	</body>
</html>