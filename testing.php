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

$category_array = $used->get_categories($table);

//print_r($category_array);
$processed = $format->process_mysqli_array($category_array);

//print_r($processed);

$position = array("Dried", "Pasta");

$level = $interface->check_level($position, $processed);

print_r($level);

?>
