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

$position = array("Canned");

//print_r($processed);

$buttons_array = array("Withdraw Items", "Add New Items", "Check Inventory");

$main_menu = array("Add", "Withdraw", "Check");

echo "<html>";
$interface->css_intro();
echo "<body>";

/*if (isset($_GET['keys'])) {
	$keys = explode("/",$_GET['keys']);
	foreach( $keys as $key) {
		$processed = $processed[$key];
		print_r($processed);
	}
} else {
	$keys = array();
}
$menu_choices = array_keys( $processed);
echo "<br/>";
print_r($menu_choices);
echo "<br/>";
print_r($keys);

if (isset($_GET['choice'])) {
	$choice = $_GET['choice'];
	$keys[] = $choice;
	$keystring = implode(" ", $keys);
} else {
	$keystring = "";
}
echo "<br/>$keystring<br/>";
print_r($keys);

$interface->menu_2($keystring, $menu_choices);

if (isset($_GET['choice2'])) {
	/*$choice2 = $_GET['choice2'];
	$interface->menu_3($choice, $choice2, $processed);
	echo $choice;
}*/
//$choice2 = $_POST['choice2'];
//echo $choice2 . " " . $choice;
//
$interface->menu_2($processed, $position);

echo "</body>";
echo "</html>";

?>
