<?php
//CONTROLLER FOR newTraineForm.php
require_once("/model/db.php");
require_once("/model/functions.php");

//CHECK IF ALL THE REQUIRED FIELDS WERE SUBMITTED
$name = isset($_POST["name_employee"]) ? $_POST["name_employee"] : null;
$phone = isset($_POST["p_phone"]) ? $_POST["p_phone"] : null;
$email = isset($_POST["p_email"]) ? $_POST["p_email"] : null;
$address = isset($_POST["address"]) ? $_POST["address"] : null;
$dateOfBirth = isset($_REQUEST["dateOfBirth"]) ? $_REQUEST["dateOfBirth"] : null;
$startDate = isset($_REQUEST["startDate"]) ? $_REQUEST["startDate"] : null;
$department = isset($_POST["departmentDropdown"]) ? $_POST["departmentDropdown"] : null;
$position = isset($_POST["position"]) ? $_POST["position"] : null;
$shift = isset($_POST["shift"]) ? $_POST["shift"] : null;
$wage = isset($_POST["wage"]) ? $_POST["wage"] : null;
$w_name = isset($_POST["w_name"]) ? $_POST["w_name"] : null;
$w_phone_ext = isset($_POST["w_phone_ext"]) ? $_POST["w_phone_ext"] : null;
$w_email = isset($_POST["w_email"]) ? $_POST["w_email"] : null;
$w_skype = isset($_POST["w_skype"]) ? $_POST["w_skype"] : null;
$photo = check_upload($_FILES["photo"]) ? $_FILES["photo"] : null;
$copy_docs = check_upload($_FILES["copy_docs"]) ? $_FILES["copy_docs"] : null;
$notes = isset($_POST["notes"]) ? $_POST["notes"] : null;

//CHECK FOR DUPLICATES IN DB
$check = (checkForDuplicates($_POST["name_employee"], $_POST["p_phone"]) == true) ? 1 : null;
//print_r ($check);

//IF ALL FIELDS WERE SUBMITTED AND THERE IS NO SUCH A TRAINEE IN DB - INSERT NEW EMPLOYEE 
if ($name && $phone && $email && $address && $dateOfBirth && $startDate && $department && 
	$position && $shift && $wage && $w_name && $w_phone_ext && $w_email && $w_skype && $check){
	
	if (insert_new_employee($name, $phone, $email, $address, $dateOfBirth, $startDate, $department,
							$position, $shift, $wage, $w_name, $w_phone_ext, $w_email, $w_skype, $notes)){
	
		attachPhoto($photo, $id_employee, $name_employee);
		attachDoc($copy_docs, $id_employee, $name_employee);
		$content = "/view/newEmployeeAdded.php";
	}else{
		$content = "/view/addNewEmployeeError.php";
	}
}else{
	$content = "/view/addNewEmployeeError.php";
}
include ("$content");