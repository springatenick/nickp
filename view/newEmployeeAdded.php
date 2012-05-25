<?php header("Refresh: 5; URL=/../newEmployeeForm.php");?>
<!--VIEW # 2 FOR newTraineForm.php-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title><?echo "The New Employee, " . $name . ", was Successfully Added."?></title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="/../calendar/calendar.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>The New Employee, <?=$name?>, was Successfully Added.</h1>
		<p>Please, Wait 5 Seconds to be Redirected Back.</p>
	</body>
</html>