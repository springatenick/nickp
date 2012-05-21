<?php
require_once("model/db.php");
require_once("model/functions.php");

if(isset($_POST["save_req"])){
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
			case "key_done":
				$done_arr["key_done"]=true;
				break;
			case "w_name_done":
				$done_arr["w_name_done"]=true;
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
	
	if($done_arr == null){
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
		}
		else{
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
	}elseif($done_arr <> null){
		if(saveRequestDone1($_POST["id_employee"], $_POST["name_employee"], $done_arr)){
			header("Refresh: 5; URL=editEmployee.php?id=" . $_POST["id_employee"]);
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
			<html>
			<head>
			<title><?echo "Request for " . $_POST["name_employee"] . ", was Successfully Complete."?></title>
			<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
			<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
			<?
			echo "<b>Thank you for completing this(these) request(s)!<p>Please, Wait 5 Seconds to be Redirected Back.</p>";
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
	}
}