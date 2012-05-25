<?php header("Refresh: 5; URL=/../editEmployee.php?id=" . $id_employee);?>
<!--VIEW # 1 FOR saveChanges.php-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Information for <?=$name_employee?>, was Successfully Updated.</title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="/../calendar/calendar.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>Information for, <?=$name_employee?>, was Successfully Updated.</h1>
		<p>Please, Wait 5 Seconds to be Redirected Back.</p>
	</body>
</html>