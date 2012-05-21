<?php
require_once("model/db.php");
require_once("model/functions.php");
print_r ($_POST["request"]);

$arr = array();
foreach($_POST["request"] as $key => $value){
	switch ($value){
		case "key":
			$arr["key"]=true;
			break;
		case "w_name":
			$arr["w_name"]=true;
			break;
		case "pc":
			$arr["pc"]=true;
			break;
		case "incontact":
			$arr["incontact"]=true;
			break;
		case "email":
			$arr["email"]=true;
			break;
		case "skype":
			$arr["skype"]=true;
			break;
		case "chat":
			$arr["chat"]=true;
			break;
		case "box":
			$arr["box"]=true;
			break;
	}
}
print_r ($arr);

saveRequest($_POST["id_employee"], $_POST["w_name"], $_POST["key"], $_POST["pc"], 
						$_POST["email"], $_POST["skype"], $_POST["inContact"], $_POST["chat"], $_POST["box"]);

						
						
						///////////////////////////////////
						
						
