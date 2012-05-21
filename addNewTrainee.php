<?php
require_once("model/db.php");
require_once("model/functions.php");

$p_name = isset($_POST["p_name"]) ? 1 : null;
$p_phone = isset($_POST["p_phone"]) ? 1 : null;
$dateOfBirth = isset($_REQUEST["dateOfBirth"]) ? 1 : null;
$startDate = isset($_REQUEST["startDate"]) ? 1 : null;
$cv = check_upload($_FILES["cv"]) ? 1 : null;
$department = isset($_POST["departmentDropdown"]) ? 1 : null;
$check = checkForDuplicates($_POST["p_name"]);

if ($p_name && $p_phone && $dateOfBirth && $startDate && $cv && $department && $check){
	
		insert_new_trainee($_POST["p_name"], $_POST["p_phone"], $_REQUEST["dateOfBirth"], $_REQUEST["startDate"], $_FILES["cv"], $_POST["departmentDropdown"]);
		header("Refresh: 5; URL=newTraineeForm.php");
			?>
				<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
				<html>
				<head>
				<title><?echo "The New Trainee, " . $_POST["p_name"] . ", was Successfully Added."?></title>
				<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
				<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
			<?
				echo "<h1>The New Trainee, " . $_POST["p_name"] . ", was Successfully Added.</h1><p>Please, Wait 5 Seconds to be Redirected Back.</p>";
				exit;
}else{
		header("Refresh: 5; URL=newTraineeForm.php");
		?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
			<html>
			<head>
			<title><?echo "ERROR: One of the Fields was not Filled"?></title>
			<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
			<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
		<?
			echo '<h1>ERROR:</h1><p>Please, Wait 5 Seconds to be Redirected Back.</p>';
			
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
				echo "<span style='color:red'>This Name and Phone are in DB already.<br /></span>";
}