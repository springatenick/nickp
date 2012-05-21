<?php
require_once("model/db.php");
require_once("model/functions.php");
var_dump(checkForDuplicates($_POST["p_name"], $_POST["p_phone"]));
?>