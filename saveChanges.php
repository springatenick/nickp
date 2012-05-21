<?php
require_once("model/db.php");
require_once("model/functions.php");
print_r ($_POST["request"]);

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
print_r ($request_arr);

if(!saveRequest1($_POST["id_employee"], $_POST["w_name"], $request_arr)){
	echo "NO";
}else{
	echo "YES";
}