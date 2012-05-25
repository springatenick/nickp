<?php
//CONTROLLER FOR newTraineForm.php
require_once("/model/db.php");
require_once("/model/functions.php");

//CHECK IF ALL THE REQUIRED FIELDS WERE SUBMITTED
$p_name = isset($_POST["p_name"]) ? 1 : null;
$p_phone = isset($_POST["p_phone"]) ? 1 : null;
$dateOfBirth = isset($_REQUEST["dateOfBirth"]) ? 1 : null;
$startDate = isset($_REQUEST["startDate"]) ? 1 : null;
$cv = check_upload($_FILES["cv"]) ? 1 : null;
$department = isset($_POST["departmentDropdown"]) ? 1 : null;
$notes = isset($_POST["notes"]) ? 1 : null;

//CHECK FOR DUPLICATES IN DB
$check = (checkForDuplicates($_POST["p_name"], $_POST["p_phone"]) == true) ? 1 : null;

//IF ALL FIELDS WERE SUBMITTED AND THERE IS NO SUCH A TRAINEE IN DB - INSERT NEW EMPLOYEE 
if ($p_name && $p_phone && $dateOfBirth && $startDate && $cv && $department && $check){
	if (insert_new_trainee($_POST["p_name"], $_POST["p_phone"], $_REQUEST["dateOfBirth"], 
							$_REQUEST["startDate"], $_FILES["cv"], $_POST["departmentDropdown"], $_POST["notes"])){
		$content = "/view/newTraineeAdded.php";
	}else{
		$content = "/view/addNewTraineeError.php";
	}
}else{
	$content = "/view/addNewTraineeError.php";
}
include ("$content");