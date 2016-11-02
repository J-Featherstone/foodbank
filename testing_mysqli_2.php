<?php

include_once 'mysqli_object.php';
include_once 'interface_object.php';
include_once 'formating_object.php';

$format = new format();

$ui = new layout();

$host = "localhost";
$username = "root";
$password = "joseph";
$database_name = "food_bank_hertford";
$table = "list_for_menu";

$main_menu = array("Add", "Withdraw", "Check");

$used = new database($host, $username, $password, $database_name);

$category_product_weights = $used->get_categories($table);

/*formating the arrays - outputs are:
 * $products_array - all the products in a numerical array
 * $category_array - all the categories in a numerical array
 * $weights_array - all the weights in a numerical, associative array array
 * these arrays retain the length of the original array and therefore the 
 * same number on each corresponds to the other appropriately.
 * 
 * 

*/
$category_array = $format->category_array($category_product_weights);

/*print_r($category_array);
print_r($category_product_weights);*/

$products_array = $format->product_array($category_product_weights);

//print_r($category_product_weights);
echo "<br/>";
//print_r($products_array);
echo"<br/>";
$weights_array = $format->weights_array($category_product_weights);

$category_with_product = $format->category_with_product($category_array, $products_array);
print_r($category_with_product);
echo"<br/>";
$product_with_weights = $format->product_with_weights($products_array, $weights_array);
//print_r($product_with_weights);
echo"<br/>";
echo "<html>";

$ui->css_intro();
echo "<p>";
$ui->menu($main_menu);
print_r($_POST);

if ($_POST["choice"] == "Add") {
	$ui->menu($category_array);
}

//print_r($_POST["choice"]);
echo "<br/>";
//print_r($category_with_product[$_POST["choice"]]);

if (array_key_exists($_POST["choice"], $category_with_product)) {
	$ui->menu($category_with_product[$_POST["choice"]]);
}

//if ($_POST
echo"</p>";


echo"</html>";

?>
