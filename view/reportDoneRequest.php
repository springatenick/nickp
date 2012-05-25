<?php header("Refresh: 5; URL=editEmployee.php?id=" . $_POST["id_employee"]);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
		<head>
			<title>Request for <?=$name_employee?>, was Successfully Complete.</title>
			<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
			<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
			<h1>Thank you for completing this(these) request(s)!</h1>
			<p>Please, Wait 5 Seconds to be Redirected Back.</p>