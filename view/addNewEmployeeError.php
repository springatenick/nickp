<?php header("Refresh: 5; URL=/../newEmployeeForm.php");?>
<!--VIEW # 1 FOR newTraineForm.php-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title><? echo "ERROR: EMPLOYEE WAS NOT ADDED!"?></title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="/../calendar/calendar.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>ERROR: EMPLOYEE WAS NOT ADDED!</h1>
<?php
if(!$name)
	echo "<span style='color:red'>Please Fill in the Name Field.<br /></span>";
if(!$phone)
	echo "<span style='color:red'>Please Fill in the Phone Field.<br /></span>";
if(!$check)
	echo "<span style='color:red'>This Name <b>AND/OR</b> Phone are in DB already.<br /></span>";
if(!$email)
	echo "<span style='color:red'>Please Fill in the Email Field.<br /></span>";
if(!$address)
	echo "<span style='color:red'>Please Fill in the Address Field.<br /></span>";
if(!$dateOfBirth)
	echo "<span style='color:red'>Please Fill in the DOB Field.<br /></span>";
if(!$startDate)
	echo "<span style='color:red'>Please Fill in the Training Start Date Field.<br /></span>";
if(!$department)
	echo "<span style='color:red'>Please Fill in the Department Field.<br /></span>";
if(!$position)
	echo "<span style='color:red'>Please Fill in the Position Field.<br /></span>";
if(!$shift)
	echo "<span style='color:red'>Please Fill in the Shift Field.<br /></span>";
if(!$wage)
	echo "<span style='color:red'>Please Fill in the Wage Field.<br /></span>";
if(!$w_name)
	echo "<span style='color:red'>Please Fill in the US Alias Field.<br /></span>";
if(!$w_phone_ext)
	echo "<span style='color:red'>Please Fill in the Work Phone Field.<br /></span>";
if(!$w_email)
	echo "<span style='color:red'>Please Fill in the Work Email Field.<br /></span>";
if(!$w_skype)
	echo "<span style='color:red'>Please Fill in the Work Skype Field.<br /></span>";
if(!$department)
	echo "<span style='color:red'>Please Fill in the Country->Location->Department Fields.<br /></span>";
?>
	<p>Please, Wait 5 Seconds to be Redirected Back.</p>