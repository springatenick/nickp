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
		<td>
			<?php
				$department_sql="SELECT `name_department` FROM `departments` WHERE `id_department`=" . $row["department"];
				//print_r($department_sql);
				$department_result=mysql_query($department_sql) or die (mysql_error());
				$department_row=mysql_fetch_assoc($department_result);
				echo $department_row["name_department"];
			?>
		</td>
		<td>
			<?php
				$position_sql="SELECT `name_position` FROM `positions` WHERE `id_position`=" . $row["position"];
				$position_result=mysql_query($position_sql) or die (mysql_error());
				$position_row=mysql_fetch_assoc($position_result);
				echo $position_row["name_position"];
			?>
		</td>
		<td>
			<?php
				$shift_sql="SELECT `name_shift` FROM `shifts` WHERE `id_shift`=" . $row["shift"];
				$shift_result=mysql_query($shift_sql) or die (mysql_error());
				$shift_row=mysql_fetch_assoc($shift_result);
				echo $shift_row["name_shift"];
			?>
		</td>
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