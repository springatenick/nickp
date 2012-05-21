<?php
require_once("model/db.php");
require_once("model/functions.php");

if(isset($_POST["save_req"])){
	$request_arr = array();
	foreach($_POST["request"] as $key => $value){
		switch ($value){
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
		}
	}
//print_r ($request_arr);
	if(saveRequest1($_POST["id_employee"], $_POST["name_employee"], $request_arr)){
		header("Refresh: 5; URL=editEmployee.php?id=" . $_POST["id_employee"]);
	?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		<html>
		<head>
		<title><?echo "Request for " . $_POST["name_employee"] . ", was Successfully Saved."?></title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
	<?
		echo "<b>Your request for, " . $_POST["name_employee"] . ", was Successfully Emailed.</b><p>Please, Wait 5 Seconds to be Redirected Back.</p>";
		exit;
	}else{
		header("Refresh: 5; URL=editEmployee.php?id=" . $_POST["id_employee"]);
	?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		<html>
		<head>
		<title><?echo "ERROR o_O"?></title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
	<?
		echo "<h1>ERROR o_O</h1></b><p>Please, Wait 5 Seconds to be Redirected Back.</p>";
	}	
}elseif(isset($_POST["save_info"])){

}