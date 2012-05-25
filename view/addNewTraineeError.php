<?php header("Refresh: 5; URL=/../newTraineeForm.php");?>
<!--VIEW # 1 FOR newTraineForm.php-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title><? echo "ERROR: TRAINEE WAS NOT ADDED!"?></title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="/../calendar/calendar.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>ERROR: TRAINEE WAS NOT ADDED!</h1>
<?php
if(!$p_name)
	echo "<span style='color:red'>Please Fill in the Name Field.<br /></span>";
if(!$p_phone)
	echo "<span style='color:red'>Please Fill in the Phone Field.<br /></span>";
if(!$dateOfBirth)
	echo "<span style='color:red'>Please Fill in the DOB Field.<br /></span>";
if(!$startDate)
	echo "<span style='color:red'>Please Fill in the Training Start Date Field.<br /></span>";
if(!$cv)
	echo "<span style='color:red'>Please Attach Trainee's CV <b>OR CV File Format is not Supported (*.doc, *.odf, *.pdf, *.rtf, *.txt)</b>.<br /></span>";
if(!$department)
	echo "<span style='color:red'>Please Fill in the Country->Location->Department Fields.<br /></span>";
if(!$check)
	echo "<span style='color:red'>This Name <b>OR</b> Phone are in DB already.<br /></span>";
?>
		<p>Please, Wait 5 Seconds to be Redirected Back.</p>