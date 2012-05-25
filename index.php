<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Main Page</title>
	<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
	<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<h1>Main Page</h1>
	<?php include ("/view/menu.html");?>

	<h1>Department Sizes</h1>
	<table border="1">
		<tr>
			<td>
				<b>ID</b>
			</td>
			<td>
				<b>DEPARTMENT</b>
			</td>
			<td>
				<b>COUNT</b>
			</td>
		</tr>
	<?php
		require_once("/model/db.php");
		$departments_qty_sql="SELECT * FROM `departments`";
		$departments_qty_result=mysql_query($departments_qty_sql) or die (mysql_error());
		$departments_qty_count=mysql_num_rows($departments_qty_result);
		//echo $departments_qty_count;
		
		for($i = 1; $i <= $departments_qty_count; $i++){
			$sql="SELECT * FROM `employees` WHERE `department`=" . $i;
			$result=mysql_query($sql) or die (mysql_error());
			$count_department_emps=mysql_num_rows($result);
	?>
		<tr>
			<td>
				<?php
					$department_sql="SELECT * FROM `departments` WHERE `id_department`=" . $i;
					$department_result=mysql_query($department_sql) or die (mysql_error());
					$department_row=mysql_fetch_assoc($department_result);
					echo $department_row["id_department"];
				?>
			</td>
			<td>
				<?=$department_row["name_department"]?>
			</td>
			<td>
				<?=$count_department_emps?>
			</td>
		</tr>
	<?php
		}
	?>
</table>
</body>
</html>
