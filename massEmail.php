<?php
require_once("model/db.php");
require_once("model/functions.php");

if ($_SERVER["REQUEST_METHOD"] == POST){
	echo "EMAIL";
	print_r ($departments);
	//header("Location:" . $_SERVER["PHP_SELF"]);
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Send Mass Email Notification</title>
		<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
		<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="calendar/calendar.js"></script>
		<script type="text/javascript" src="model/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="model/ajax.js"></script>
	</head>
	<body>
		<h1>Send Mass Email Notification</h1>
		<?php include ("menu.html");?>
		<form action="sendEmail.php"  method="POST" enctype="multipart/form-data">
			<table border="1">
				<?php
				$departments = getDepartmentsCheckBoxList();
				//print_r ($departments);
				
				foreach ($departments as $department){
				?>
				<tr>
					<td><input type="checkbox" name="department[]" value="<?=$department["id_department"]?>"></td>
					<td><?=$department["name_department"]?></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td>From:</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>Subject:</td>
					<td><input type="text" name="subject"></td>
				</tr>
				<tr>
					<td>Message:</td>
					<td><textarea name="message"></textarea></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit_email" value="SEND"></td>
				</tr>
			<table>
		</form>
	</body>
</html>
<?php
}
?>