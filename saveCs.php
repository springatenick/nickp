

foreach ($_POST["request"] as $key => $value){
	
}
$key = isset($_POST["key"]) ? 1 : null;


if (isset($_POST["save_info"])){
//ÂÎÒ ÒÓÒ ÍÀÄÀ ÄÎÏÈËÈÒÜ!
}
elseif (isset($_POST["save_req"])){
if ((isset($_POST["w_name"]) || isset($_POST["key"]) || isset($_POST["pc"]) || isset($_POST["email"]) || 
		isset($_POST["skype"]) || isset($_POST["inContact"]) || isset($_POST["chat"]) || isset($_POST["box"]))
		&&
		(isset($_POST["w_name_done"]) || isset($_POST["key_done"]) || isset($_POST["pc_done"]) || isset($_POST["email_done"]) || 
		isset($_POST["skype_done"]) || 	isset($_POST["inContact_done"]) || isset($_POST["chat_done"]) || isset($_POST["box_done"]))){
			
			saveRequestDone($_POST["id_employee"], $_POST["w_name_done"], $_POST["key_done"], $_POST["pc_done"], 
						$_POST["email_done"], $_POST["skype_done"], $_POST["inContact_done"], $_POST["chat_done"], $_POST["box_done"]);

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
}
elseif((isset($_POST["w_name"]) || isset($_POST["key"]) || isset($_POST["pc"]) || isset($_POST["email"]) || 
		isset($_POST["skype"]) || isset($_POST["inContact"]) || isset($_POST["chat"]) || isset($_POST["box"]))){
			
			saveRequest($_POST["id_employee"], $_POST["w_name"], $_POST["key"], $_POST["pc"], 
						$_POST["email"], $_POST["skype"], $_POST["inContact"], $_POST["chat"], $_POST["box"]);
				
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
}