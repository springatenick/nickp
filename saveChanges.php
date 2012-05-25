<?php
require_once("/model/db.php");
require_once("/model/functions.php");

if(isset($_POST["save_info"])){
	//CHECK IF ALL THE REQUIRED FIELDS WERE SUBMITTED
	$id_employee = isset($_POST["id_employee_info_hidden"]) ? $_POST["id_employee_info_hidden"] : null;
	$name_employee = isset($_POST["name_employee"]) ? $_POST["name_employee"] : null;
	$p_phone = isset($_POST["p_phone"]) ? $_POST["p_phone"] : null;
	$p_email = isset($_POST["p_email"]) ? $_POST["p_email"] : null;
	$address = isset($_POST["address"]) ? $_POST["address"] : null;
	$dateOfBirth = isset($_POST["dateOfBirth"]) ? $_POST["dateOfBirth"] : null;
	$departmentDropdown = isset($_POST["departmentDropdown"]) ? $_POST["departmentDropdown"] : $_POST["department"];
	$position = isset($_POST["position"]) ? $_POST["position"] : null;
	$shift = isset($_POST["shift"]) ? $_POST["shift"] : null;
	$wage = isset($_POST["wage"]) ? $_POST["wage"] : null;
	$w_name = isset($_POST["w_name"]) ? $_POST["w_name"] : null;
	$w_phone_ext = isset($_POST["w_phone_ext"]) ? $_POST["w_phone_ext"] : null;
	$w_email = isset($_POST["w_email"]) ? $_POST["w_email"] : null;
	$w_skype = isset($_POST["w_skype"]) ? $_POST["w_skype"] : null;
	$start_date = isset($_POST["start_date"]) ? $_POST["start_date"] : null;
	$photo = isset($_FILES["photo"]) ? $_FILES["photo"] : null;
	$notes = isset($_POST["notes"]) ? $_POST["notes"] : null;
	$copy_docs = isset($_FILES["copy_docs"]) ? $_FILES["copy_docs"] : null;
	
	if(updateEmployeeRecord($id_employee, $name_employee, $p_phone, $p_email, $address, $dateOfBirth, $departmentDropdown, 
							$position, $shift, $wage, $w_name, $w_phone_ext, $w_email, $w_skype, $start_date, $notes)){
								attachPhoto($photo, $id_employee, $name_employee);
								attachDoc($copy_docs, $id_employee, $name_employee);
								$content = "/view/changesSaved.php";
							}
							else{
								$content = "/view/saveChangesError.php";
							}
	include($content);
}
if(isset($_POST["save_req"])){
	$name_employee = isset($_POST["name_employee"]) ? $_POST["name_employee"] : null;
	$request_arr = array();
	foreach($_POST["request"] as $key => $value){
		switch ($value){
			//REQUEST ARRAY
			case "key":
				$request_arr["key"]=true;
				break;
			case "w_name":
				$request_arr["w_name"]=true;
				break;
			case "pc":
				$request_arr["pc"]=true;
				break;
			case "incontact":
				$request_arr["incontact"]=true;
				break;
			case "email":
				$request_arr["email"]=true;
				break;
			case "skype":
				$request_arr["skype"]=true;
				break;
			case "chat":
				$request_arr["chat"]=true;
				break;
			case "box":
				$request_arr["box"]=true;
				break;
			//REQUEST_DONE ARRAY
			case "w_name_done":
				$done_arr["w_name_done"]=true;
				break;
			case "key_done":
				$done_arr["key_done"]=true;
				break;
			case "pc_done":
				$done_arr["pc_done"]=true;
				break;
			case "incontact_done":
				$done_arr["incontact_done"]=true;
				break;
			case "email_done":
				$done_arr["email_done"]=true;
				break;
			case "skype_done":
				$done_arr["skype_done"]=true;
				break;
			case "chat_done":
				$done_arr["chat_done"]=true;
				break;
			case "box_done":
				$done_arr["box_done"]=true;
				break;
		}
	}
	//var_dump($done_arr);
	//CHECK WHETHER IT IS A REQUEST POST OR DONE REQUEST REPORT
	if($done_arr == null){
		if(saveRequest($_POST["id_employee"], $_POST["w_name"], $request_arr) && saveRequestDone($_POST["id_employee"], $done_arr)){
			$content="/view/requestSaved.php";
		}
		else{
			$content="/view/saveRequesrError.php";
		}
	include($content);
	//IF ANY DONE REPORTS WERE 
	}elseif($done_arr <> null){
		if(saveRequestDone($_POST["id_employee"], $done_arr)/* && saveRequest($_POST["id_employee"], $_POST["w_name"], $request_arr)*/){
			$content="/view/reportDoneRequest.php";
		}else{
			$content="/view/reportDoneRequestError.php";
		}
	include($content);
	}
}