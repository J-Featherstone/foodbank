<?php
include_once 'mysqli_object.php';
include_once 'formating_object.php';
include_once 'interface_object.php';

$format = new format();
$interface = new layout();

$host = "localhost";
$username = "root";
$password = "joseph";
$database_name = "food_bank_hertford";
$table = "list_for_menu";

$used = new database($host, $username, $password, $database_name);

$columns = $used->get_categories($table);
print_r($columns);
?>
