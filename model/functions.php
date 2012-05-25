<?php
//DB -> Array
function db2Array($data){
	$arr = array();
	while($row = mysql_fetch_assoc($data)){
		$arr[] = $row;
	}
return $arr;
}

//CHECK FOR EMPLOYEE DUPLICATES in addNewTrainee.php
function checkForDuplicates($name, $phone){
	$check = false;
	$sql = "SELECT * FROM `employees`";
	$result = mysql_query($sql) or die (mysql_error());
	$row = db2Array($result);
	foreach($row as $key=>$value){
		//echo $name . "<br/>";
		//echo $phone . "<br/>";
		//echo "K: " . $key . "<br/>";
		//echo "V: " . $value["name_employee"] . " - " . $value["p_phone"] . "<br/>";
		//IF THERE IS A RECORD IN THE TABLE WITH THE SAME EMPLOYEE NAME OR PHONE
		if(($value["name_employee"] == trim($name)) || ($value["p_phone"] == trim($phone))){
			//echo "MATCH";
				$check = false; //THEN FUNCTION RETURNS FALSE
			break;
		}else{
			//echo "NO";
			$check = true; //OTHERWIZE FUNCTION RETURNS TRUE
		}
	}
//echo $check;
return $check;
}

//INSERT NEW TRAINEE FUNCTION
function insert_new_trainee($name, $phone, $dob, $startDate, $cv, $department, $notes){
	//1. DETERMINE CV FILE TYPE
	switch ($cv['type']){
		case 'application/vnd.oasis.opendocument.text':
			$type = 'odf';
			break;
		case 'application/msword':
			$type = 'doc';
			break;
		case 'application/rtf':
			$type = 'rtf';
			break;						
		case 'application/pdf':
			$type = 'pdf';
			break;
		case 'text/plain':
			$type = 'txt';
			break;
		default: return false;	
	return $type;
	}
	//2. IF FILE TYPE IS ONE OF THE ABOVE = SQL QUERY TO INSERT NEW TRAINEE
	$sql = "INSERT INTO `employees`(`name_employee`, `p_phone`, `dob`, `start_date`, `cv`, `department`, `notes`)
			VALUES ('$name', '$phone', '$dob', '$startDate', 'cv/" . $name . '.' . $type . "', $department, '$notes')";
	$result = mysql_query($sql) or die (mysql_error());
	if (!$result)
		return false;
		
	//3. SAVING THE FILE IN THE CV FOLDER
	if(!copy($cv["tmp_name"], "cv/" . $name . "." . $type))
		return false;
		
	//3.SENDING AN EMAIL TO TRAINER
	if (!sendmail("add", $name, $phone, $dob, $startDate))
		return false;

return true;
}

//INSERT NEW EMPLOYEE
function insert_new_employee($name, $phone, $email, $address, $dateOfBirth, $startDate, $department,
							$position, $shift, $wage, $w_name, $w_phone_ext, $w_email, $w_skype, $notes){
	//1. SQL QUERY TO INSERT EMPLOYEE
	$sql="INSERT INTO `employees`
						(`name_employee`,`p_phone`,`p_email`,`address`,`dob`,`start_date`,`department`,`position`,`shift`,`wage`,`w_name`,`w_phone_ext`,`w_email`,`w_skype`,`notes`)
					VALUES
						('$name','$phone','$email','$address','$dateOfBirth','$startDate',$department,$position,$shift,'$wage','$w_name','$w_phone_ext','$w_email','$w_skype','$notes')";
	
	$result = mysql_query($sql) or die (mysql_error());
	if (!$result)
		return false;

return true;
}

//UPDATE EMPLOYEE FUNCTION
function updateEmployeeRecord($id_employee, $name_employee, $p_phone, $p_email, $address, $dateOfBirth, $department, 
								$position, $shift, $wage, $w_name, $w_phone_ext, $w_email, $w_skype, $start_date, $notes){
	//1. SQL QUERY TO UPDATE EMPLOYEE
	$sql="UPDATE `employees`
			SET
				`name_employee`='$name_employee',
				`p_phone`='$p_phone',
				`p_email`='$p_email',
				`address`='$address',
				`dob`='$dateOfBirth',
				`department`=$department,
				`position`=$position,
				`shift`=$shift,
				`wage`='$wage',
				`w_name`='$w_name',
				`w_phone_ext`='$w_phone_ext',
				`w_email`='$w_email',
				`w_skype`='$w_skype',
				`start_date`='$start_date',
				`notes`='$notes'
			WHERE
				`id_employee`=$id_employee";
	
	$result = mysql_query($sql) or die (mysql_error());
	if (!$result)
		return false;

return true;
//TO BE ADDED ON HERE cv= docs_copy= end_date= status=
}

//ATTACH FILE FUNCTION
function attachPhoto($file, $id_employee, $name_employee){
//1. DETERMINE PHOTO FILE TYPE
	switch ($file['type']){
		case 'image/png':
			$type = 'png';
			break;
		case 'image/jpeg':
			$type = 'jpeg';
			break;
		case 'image/gif':
			$type = 'gif';
			break;						
		case 'image/bmp':
			$type = 'bmp';
			break;
		default: return false;	
	return $type;
	}
	//2. SQL REQUEST TO UPDATE DB WITH $PARAM PATH
	$sql="UPDATE `employees`
			SET
				`photo`='photos/" . $name_employee . "." . $type ."'		
			WHERE
				`id_employee`=$id_employee";
	//print_r($sql);
	$result = mysql_query($sql) or die (mysql_error());
	if (!$result)
		return false;
						
	//3. SAVING THE FILE IN THE $PARAM FOLDER
	if(!copy($file["tmp_name"], "photos/" . $name_employee . "." . $type))
		return false;

return true;
}


//ATTACH DOCS FUNCTION
function attachDoc($file, $id_employee, $name_employee){
//1. DETERMINE PHOTO FILE TYPE
	switch ($file['type']){
		case 'image/png':
			$type = 'png';
			break;
		case 'image/jpeg':
			$type = 'jpeg';
			break;
		case 'image/gif':
			$type = 'gif';
			break;						
		case 'image/bmp':
			$type = 'bmp';
			break;
		default: return false;	
	return $type;
	}
	//2. SQL REQUEST TO UPDATE DB WITH $PARAM PATH
	$sql="UPDATE `employees`
			SET
				`copy_docs`='copy_docs/" . $name_employee . "." . $type ."'		
			WHERE
				`id_employee`=$id_employee";
	//print_r($sql);
	$result = mysql_query($sql) or die (mysql_error());
	if (!$result)
		return false;
						
	//3. SAVING THE FILE IN THE $PARAM FOLDER
	if(!copy($file["tmp_name"], "copy_docs/" . $name_employee . "." . $type))
		return false;

return true;
}


//EMAIL NOTIFICATION
function sendmail(/*$type = "add", $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8*/){
	$arg_list = func_get_args();
	$numargs = func_num_args();
	switch ($numargs){
		case 5:
			//CREATING A MESSAGE FOR TRAINER
			$message = "Please be advised, that a new Trainee was scheduled to come for training.\nName:" . $arg_list["1"] . "\n";
			$message .= "Phone:" . $arg_list["2"] . "\n";
			$message .= "DOB:" . $arg_list["3"] . "\n";
			$message .= "Training start date:" . $arg_list["4"] . "\n";
			$to = "springate.nick@gmail.com";
			$subject = "New Trainee, " . $arg_list["1"] . ", is scheduled to start on " . $arg_list["4"] . ".";
			break;
		case 9:
			//CREATING A MESSAGE FOR ADMIN
			$message = "Please be advised, that a new Trainee need the following:\n";
			$message .= "Name: " . $arg_list["1"] . "\n";
			$message .= "Key: " . $arg_list["2"] . "\n";
			$message .= "PC: " . $arg_list["3"] . "\n";
			$message .= "Email: " . $arg_list["4"] . "\n";
			$message .= "Skype: " . $arg_list["5"] . "\n";
			$message .= "inContact: " . $arg_list["6"] . "\n";
			$message .= "Chat: " . $arg_list["7"] . "\n";
			$message .= "Shoes Box: " . $arg_list["8"] . "\n";
			$to = "springate.nick@gmail.com";
			$subject = "Request for New Trainee.";
			break;
	}			
	//SENDING EMAIL
	if(mail($to, $subject, $message)){
		return true;
	}
}

//CHECK UPLOAD FUNCTION - CHECKS IS CV FILE IS UPLOADED
function check_upload($file){
	if($file['name'] == ''){
		return false;
	}
	if($file['size'] > 1000000){
		return false;
	}
	$types = array('application/vnd.oasis.opendocument.text', 'application/msword', 'application/rtf', 'application/pdf', 'text/plain');
	if(!in_array($file['type'], $types)){
		return false;
	}
	return true;	
}

//USED TO DRAW COUNTRIES SELECT IN add_new_trainee.php
function getCountriesDropdown($id){
	$sql = "SELECT * FROM countries";
	$result = mysql_query($sql) or die (mysql_error());
	while ($row = mysql_fetch_array($result)){
		if ($row["id_country"] == $id)
			continue;
		echo "<option value=" . $row['id_country'] . ">" . $row['name_country'] . "</option>";
	}
}

//USED TO DRAW AREAS SELECT IN add_new_trainee.php
function getAreasDropdown($country){
	$array = mysql_query ("SELECT * FROM locations WHERE country = $country");
	echo "<option value=\"\">Select Location</option>";
	while ($m = mysql_fetch_array ($array)){
		echo "<option value=\"".$m["id_location"]."\">".$m["name_location"]."</option>";
	}
}

//USED TO DRAW DEPARTMENTS SELECT IN add_new_trainee.php
function getDepartmentsDropdown($area){
	$array = mysql_query ("SELECT * FROM departments WHERE location = $area");
	echo "<option value=\"\">Select Department</option>";
	while ($m = mysql_fetch_array ($array)){
		echo "<option value=\"".$m["id_department"]."\">".$m["name_department"]."</option>";
	}
}

//USED TO DRAW DEPARTMENTS TABLE IN view_dept_list.php
function getDepartmentsList($department){
	$sql = "SELECT * FROM employees WHERE department=$department ORDER BY id_employee";
	$result = mysql_query($sql);
	return $result;
}

//USED TO DRAW POSITIONS
function getPositionsList(){
	$sql = "SELECT * FROM positions";
	$result = mysql_query($sql) or die (mysql_error());
	return db2Array($result);
}

//USED TO DRAW SHIFTS
function getShiftsList(){
	$sql = "SELECT * FROM `shifts`";
	$result = mysql_query($sql) or die (mysql_error());
	return db2Array($result);
}

//USED TO DRAW EMPLOYEE INFORMATION edit.php
function getEmployeeInfo($id){
	$sql = "SELECT c.id_country, c.name_country, 
				l.id_location, l.name_location, 
				d.id_department, d.name_department, 
				e.id_employee, e.name_employee, e.w_name, e.department, e.address, 
				e.p_phone, e.w_phone_ext, e.p_email, e.w_email, 
				e.w_skype, e.position, e.status, e.start_date, e.notes, e.wage, e.shift, e.dob, e.photo, e.copy_docs
			FROM countries c INNER JOIN
					(locations l INNER JOIN
						(departments d INNER JOIN employees e
						ON d.id_department=e.department)
					ON l.id_location=d.location)
				ON c.id_country=l.country
			WHERE e.id_employee=$id";
$result = mysql_query($sql) or die (mysql_error());
return $result;
}

//USED TO SAVE REQUEST PARAMETERS from editEmployee.php
function saveRequest($id_employee, $w_name, $array){
	//CHECKING WHAT ARE THE FIELS SELECTED
	$w_name = ($array["w_name"] == true) ? 1 : 0;
	$key = ($array["key"] == true) ? 1 : 0;
	$pc = ($array["pc"] == true) ? 1 : 0;
	$incontact = ($array["incontact"] == true) ? 1 : 0;
	$email = ($array["email"] == true) ? 1 : 0;
	$skype = ($array["skype"] == true) ? 1 : 0;
	$chat = ($array["chat"] == true) ? 1 : 0;
	$box = ($array["box"] == true) ? 1 : 0;
		
	//CHECKING IF THERE IS ANY REQUEST IN THE REQUESTS TABLE FOR THIS EMPLOYEE
	$exsists = 0;
	$sql = "SELECT * FROM requests";
	$result = mysql_query($sql) or die (mysql_error());
		while($row = mysql_fetch_assoc($result)){
			//IF THERE IS A RECORD IN THE TABLE WITH THE SAME ID_EMPLOYEE...
			if ($row["id_employee"] == $id_employee){
				$exsists = 1;
			}else{
				$exsists = 0;
			}
		}
		// echo "ID:" . $id_employee;
		// echo "<br/>";
		// echo "NAME:" . $w_name;
		// echo "<br/>";
		// echo "EXISTS:" . $exsists;
		// echo "<br/>";
		switch ($exsists){
			case 1:
				//...UPDATE THAT RECORD 
				$sql = "UPDATE `requests`
						SET 
							`id_employee`=$id_employee,
							`uattendkey`=$key,
							`pc`=$pc,
							`email`=$email,
							`skype`=$skype,
							`incontact`=$incontact,
							`chat`=$chat,
							`box`=$box
						WHERE `id_employee`=$id_employee";
			break;
			case 0:
				//...INSERT NEW
				$sql = "INSERT INTO `requests`(`id_employee`, `w_name`, `uattendkey`, `pc`, `email`, `skype`, `incontact`, `chat`, `box`)
							 VALUES($id_employee, $w_name, $key, $pc, $email, $skype, $incontact, $chat, $box)";
			break;
		return $sql;
		}
		//print_r($sql);
		$result = mysql_query($sql) or die (mysql_error());
		if(!$result)
			return false;
		if(!sendmail("request", $w_name, $key, $pc, $email, $skype, $incontact, $chat, $box))
			return false;
	return true;
}

//USED TO SAVE REQUEST_DONE PARAMETERS from editEmployee.php
function saveRequestDone($id_employee, $array){
	//CHECKING WHAT ARE THE FIELS SELECTED
	$w_name_done = ($array["w_name_done"] == true) ? 1 : 0;
	$key_done = ($array["key_done"] == true) ? 1 : 0;
	$pc_done = ($array["pc_done"] == true) ? 1 : 0;
	$incontact_done = ($array["incontact_done"] == true) ? 1 : 0;
	$email_done = ($array["email_done"] == true) ? 1 : 0;
	$skype_done = ($array["skype_done"] == true) ? 1 : 0;
	$chat_done = ($array["chat_done"] == true) ? 1 : 0;
	$box_done = ($array["box_done"] == true) ? 1 : 0;
		
	//...UPDATE THAT RECORD 
	$sql = "UPDATE requests 
			SET 
				w_name_set = $w_name_done, 
				uattendkey_set = $key_done, 
				pc_set = $pc_done, 
				email_set = $email_done, 
				skype_set = $skype_done, 
				incontact_set = $incontact_done, 
				chat_set = $chat_done, 
				box_set = $box_done
			WHERE id_employee=$id_employee";
	$result = mysql_query($sql) or die (mysql_error());
	if(!$result)
		return false;
	// if(!sendmail("request", $w_name, $key, $pc, $email, $skype, $incontact, $chat, $box))
		// return false;
	return true;
}

//FOR DONE REQUEST REPORTS TO SHOW UP ON THE EMPLOYEE PAGE
function checkChecked($id){
	//CHECKING IF THERE IS ANY REQUEST IN THE REQUESTS TABLE FOR THIS EMPLOYEE
	$sql = "SELECT * FROM requests";
	$result = mysql_query($sql) or die (mysql_error());
		while($row = mysql_fetch_assoc($result)){
			//IF THERE IS A RECORD IN THE TABLE WITH THE SAME ID_EMPLOYEE...
			if ($row["id_employee"] == $id){
				return $row;
				//print_r ($row);
				//echo $row["id_employee"];
				//echo $id;
				//return $row;
			}
		}
}

//USED TO DRAW DEPARTMENTS CHECKBOXES in massEmail.php
function getDepartmentsCheckBoxList(){
	$sql = "SELECT * FROM `departments` ORDER by `name_department`";
	$result = mysql_query ($sql) or die (mysql_error());
	return db2Array($result);	
}
?>