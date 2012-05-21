<?php	
require_once("model/db.php");
require_once("model/functions.php");

//RECEIVE ARRAY OF DEPARTMENTS FROM $_POST["DEPARTMENT"]
$sql = "SELECT w_email FROM employees WHERE";
if(count($_POST["department"]) == 1){
	$sql .= " department=" . $_POST["department"][0];
}elseif(count($_POST["department"]) > 1){
	foreach($_POST["department"] as $key => $department){
		$sql .= " department=$department";
			if (each($_POST["department"])) {
				$sql .= " OR";
			}
	}
}
//CREATE EMAIL LIST
$emailList = array();
$result = db2Array(mysql_query($sql));
foreach($result as $key => $value){
	$emailList[] = $value["w_email"];
}
$list = implode(",",($emailList));
$subject = $_POST["subject"];
$message = $_POST["message"];
$header = "FROM:" . $_POST["email"];

if(mail($list, $subject, $message, $header)){
	header("Refresh: 5; URL=massEmail.php");
	?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		<html>
		<head>
		<title><?echo "Your Email was Successfully Sent."?></title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
	<?
		$names = implode(",<br/>",($emailList));
		echo "<h1>Your Email was Successfully Sent to:\n</h1><p>$names</p>";
		exit;
}
else{
	echo "NO";
}

?>