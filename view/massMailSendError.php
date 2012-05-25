<?php header("Refresh: 5; URL=massEmail.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
		<head>
			<title>EMAIL WAS NOT SENT!</title>
			<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
			<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
			<?php $names = implode(",<br/>",($emailList));?>
			<h1>ERROR: EMAIL WAS NOT SENT!</h1>