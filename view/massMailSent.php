<?php header("Refresh: 5; URL=massEmail.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
		<head>
			<title>EMAIL WAS SUCCESSFULLY SENT!</title>
			<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
			<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
			<?php $names = implode(",<br/>",($emailList));?>
			<h1>Your Email was Successfully Sent to</h1>
			<p><?=$names?></p>