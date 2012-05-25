<?php header("Refresh: 5; URL=/../editEmployee.php?id=" . $id_employee);?>
<!--VIEW # 2 FOR saveChanges.php-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title><? echo "ERROR: INFO CHANGES WERE NOT UPDATED!"?></title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="/../calendar/calendar.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>ERROR: INFO CHANGES WERE NOT UPDATED!</h1>
<?php
if(!$id_employee)
	echo "<span style='color:red'>EMPLOYEE ID WAS NOT SET!<br /></span>";
if(!$name_employee)
	echo "<span style='color:red'>EMPLOYEE NAME WAS NOT SET<br /></span>";
if(!$p_phone)
	echo "<span style='color:red'>EMPLOYEE PHONE WAS NOT SET<br /></span>";
if(!$p_email)
	echo "<span style='color:red'>EMPLOYEE PERSONAL EMAIL WAS NOT SET<br /></span>";
if(!$address)
	echo "<span style='color:red'>EMPLOYEE ADDRESS WAS NOT SET<br /></span>";
if(!$dateOfBirth)
	echo "<span style='color:red'>EMPLOYEE DOB WAS NOT SET<br /></span>";
if(!$departmentDropdown)
	echo "<span style='color:red'>EMPLOYEE DEPARTMENT WAS NOT SET<br /></span>";
if(!$position)
	echo "<span style='color:red'>EMPLOYEE POSITION WAS NOT SET<br /></span>";
if(!$shift)
	echo "<span style='color:red'>EMPLOYEE SHIFT WAS NOT SET<br /></span>";
if(!$wage)
	echo "<span style='color:red'>EMPLOYEE WAGE WAS NOT SET<br /></span>";
if(!$w_name)
	echo "<span style='color:red'>EMPLOYEE US ALIAS WAS NOT SET<br /></span>";
if(!$w_phone_ext)
	echo "<span style='color:red'>EMPLOYEE INCONTACT # WAS NOT SET<br /></span>";
if(!$w_email)
	echo "<span style='color:red'>EMPLOYEE WORK EMAIL WAS NOT SET<br /></span>";
if(!$w_skype)
	echo "<span style='color:red'>EMPLOYEE WORK SKYPE WAS NOT SET<br /></span>";
if(!$start_date)
	echo "<span style='color:red'>EMPLOYEE START DATE WAS NOT SET<br /></span>";
if(!$notes)
	echo "<span style='color:red'>EMPLOYEE CARRER NOTES WERE NOT SET<br /></span>";
?>
		<p>Please, Wait 5 Seconds to be Redirected Back.</p>
		
		
	