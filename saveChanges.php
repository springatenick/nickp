<?php
require_once("model/db.php");
require_once("model/functions.php");
print_r ($_POST["request"]);

$arr = array();
foreach($_POST["request"] as $key => $value){
	switch ($value){
		case "key":
			$arr[]=$value;
			break;
		case "w_name":
			$arr[]=$value;
			break;
		case "pc":
			$arr[]=$value;
			break;
		case "inContact":
			$arr[]=$value;
			break;
		case "email":
			$arr[]=$value;
			break;
		case "skype":
			$arr[]=$value;
			break;
		case "chat":
			$arr[]=$value;
			break;
		case "box":
			$arr[]=$value;
			break;
	}
}
print_r ($arr);
