<table border="1">
	<tr>
		<td>ID</td>
		<td>NAME</td>
		<td>CONTACT PHONE</td>
		<td>EMAIL</td>
		<td>ADDRESS</td>
		<td>DOB</td>
		<td>DEPARTMENT</td>
		<td>POSITION</td>
		<td>SHIFT</td>
		<td>WAGE</td>
		<td>US ALIAS</td>
		<td>PHONE EXT</td>
		<td>WORK EMAIL</td>
		<td>WORK SKYPE</td>
		<td>START DATE</td>
		<td>EDIT</td>
	</tr>
<?php
require_once("db.php");
require_once('functions.php');
$result = getDepartmentsList($_POST["department"]);
	while ($row = mysql_fetch_array($result)){
?>
	<tr>
		<td><?=$row["id_employee"]?></td>
		<td><?=$row["name_employee"]?></td>
		<td><?=$row["p_phone"]?></td>
		<td><?=$row["p_email"]?></td>
		<td><?=$row["address"]?></td>
		<td><?=$row["dob"]?></td>
		<td><?=$row["department"]?></td>
		<td><?=$row["position"]?></td>
		<td><?=$row["shift"]?></td>
		<td><?=$row["wage"]?></td>
		<td><?=$row["w_name"]?></td>
		<td><?=$row["w_phone_ext"]?></td>
		<td><?=$row["w_email"]?></td>
		<td><?=$row["w_skype"]?></td>
		<td><?=$row["start_date"]?></td>
		<td><a href="editEmployee.php?id=<?=$row["id_employee"]?>">EDIT</a></td>
	</tr>
<?
	}
?>