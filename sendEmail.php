<?php	
require_once("model/db.php");
require_once("model/functions.php");

//RECEIVE ARRAY OF DEPARTMENTS FROM $_POST["DEPARTMENT"]
$sql = "SELECT `w_email` FROM `employees` WHERE";
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
	$content="/view/massMailSent.php";
}
else{
	$content="/view/massMailSendError.php";
}
include($content);
?>
